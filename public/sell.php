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
     
        $gain = $shares[0]["shares"] * $stock["price"];
        
        CS50::query("UPDATE users SET cash = (cash + ".$gain.") WHERE id = ?", $_SESSION["id"]);
        
        // Symbol eliminates because it is already sold
        $rows = CS50::query("DELETE FROM portfolio WHERE user_id = ? AND symbols = ?", $_SESSION["id"], 
        $stock["symbol"]);
        
        //history
        CS50::query("INSERT INTO history (user_id, type, time, symbols, shares, price) VALUES(?,'Sold',NOW(), ?, ?, ?)", $_SESSION["id"], $_POST["symbol"], $_POST["shares"], $stock["price"]);

        redirect("/");
    }
?>