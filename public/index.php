<?php
    // configuration
    require("../includes/config.php"); 
    
    $rows = CS50::query("SELECT * FROM portfolio WHERE user_id = ?", $_SESSION["id"]);

    $positions = [];
    foreach ($rows as $row)
    {
        $stock = lookup($row["symbols"]);
        if ($stock !== false)
        {
            $positions[] = [
                "name" => $stock["name"],
                "symbol" => $row["symbols"],
                "shares" => $row["shares"],
                "price" => $stock["price"],
                "total" => $row["shares"] * $stock["price"]
            ];
        }
    }
    $cash = CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
    $cash = $cash[0]["cash"];
    
    // render portfolio        
    render("portfolio.php", ["title" => "Portfolio", "positions" => $positions, "cash" => $cash]);
?>
