<?php
    // configuration
    require("../includes/config.php"); 
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // Validate the name
        if (empty($_POST["symbol"]))
        {
            apologize("Please enter the stock symbol.");
        }
        
        $stock = lookup($_POST["symbol"]);
        
        // Check if we returned nothing
        if ($stock === false)
        {
            apologize("Entered stock symbol was invalid.");
        }
        else
        {
            // Render the result form
            render("view_quote.php", ["title" => "Quote", "stock" => $stock]);
        }
    }
    else
    {
        // else render form
        render("quote_form.php", ["title" => "Quote"]);
    }
?>