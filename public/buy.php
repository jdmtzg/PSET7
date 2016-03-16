<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // render form
        render("buy_form.php", ["title" => "Buy"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // if you leave empty space
        if (empty($_POST["symbol"]) || empty($_POST["shares"]))
        {
            apologize("Please fill in the empty spot(s)");
        }
        
        // if you write an invalid symbol
        if (lookup($_POST["symbol"]) === false)
        {
            apologize("Please select a valid symbol");
        }
        
        // if you write an invalid amount of ashres
        if (preg_match("/^\d+$/", $_POST["shares"]) == false)
        {
            
            apologize("Please select a right amount of shares");
        }
        
        else
        {
            $stock = lookup($_POST["symbol"]);
            $purchase = $_POST["shares"] * $stock["price"];
            $cash_row = CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
            $cash = $cash_row[0]["cash"];
            
            // if the user has enough money
            if ($cash > $purchase)
            {
                CS50::query("INSERT INTO portfolio (user_id, symbols, shares) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + ?", $_SESSION["id"], $_POST["symbol"], $_POST["shares"], $_POST["shares"]); 
                CS50::query("UPDATE users SET cash = (cash - ".$purchase.") WHERE id = ?", $_SESSION["id"]);
                
                CS50::query("INSERT INTO history (user_id, type, time, symbols, shares, price) VALUES(?,'Bought',NOW(), ?, ?, ?)", $_SESSION["id"], $_POST["symbol"], $_POST["shares"], $stock["price"]);

                // return to Portfolio
                redirect("/");
            }
            else
            {
                apologize("You're out of cash");
            }

        }
    }
?>
