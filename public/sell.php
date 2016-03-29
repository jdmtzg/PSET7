<?php
    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $symbol = CS50::query("SELECT symbols FROM portfolio WHERE user_id = ?", $_SESSION["id"]);
        
        if(sizeof($symbol) == 0)
        {
            apologize("You have no shares to sell");
        }
        
        render("sell_form.php", ["title" => "Sell","symbols"=>$symbol]);
        
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if($_POST["symbol"] =="Symbol")
        {
            apologize("Please enter a stock symbol");
        }
        
        $shares = CS50::query("SELECT shares FROM portfolio WHERE user_id = ? AND symbols = ?", $_SESSION["id"], $_POST["symbol"]);
        $stock = lookup($_POST["symbol"]);
        $shareamount = $_POST["shareamount"];
        
        if ($_POST["shareamount"] == NULL)
        {
            apologize("Enter a number of shares");
        }
        
        else if ($_POST["shareamount"] < 0)
        {
            apologize("Enter a possible amount");
        }
        
        else if ($_POST["shareamount"] > $shares[0]["shares"])
        {
            apologize("Not enough shares to sell");
        }
        $value = $stock["price"] * $shareamount;
        
       
        if ($_POST["shareamount"] < $shares[0]["shares"])
        {
            $rows = CS50::query("UPDATE portfolio SET shares = (shares - ".$shareamount.") WHERE user_id = ? AND symbols = ?", $_SESSION["id"], $stock["symbol"]);
        }
        
        else if ($_POST["shareamount"] == $shares[0]["shares"])
        {
            $rows = CS50::query("DELETE FROM portfolio WHERE user_id = ? AND symbols = ?", $_SESSION["id"], $stock["symbol"]);
        }
        CS50::query("UPDATE users SET cash = (cash + ".$value.") WHERE id = ?", $_SESSION["id"]);
        CS50::query("INSERT INTO history (user_id, type, time, symbols, shares, price) VALUES(?,'Sold',NOW(), ?, ?, ?)", $_SESSION["id"], $_POST["symbol"], $_POST["shareamount"], $stock["price"]);
        
        redirect("/");    
    }    
?>     
