<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        // check if username is empty
		if(empty($_POST["username"]))
		{
			apologize("Please insert a username");
	    }
	    
	    // check if password is empty
	    else if(empty($_POST["password"]))
		{
		    apologize("Please insert a password");
	    }
	    
	    // check if confirmation matches password
		else if($_POST["password"] != $_POST["confirmation"])
		{
		    apologize("Please confirm password correctly");
		}
		
		// insert the new user into database
		$new_user = CS50::query("INSERT IGNORE INTO users (username, hash, cash) VALUES(?, ?, 10000.0000)", $_POST["username"], password_hash($_POST["password"], PASSWORD_DEFAULT));
        
        // check if user already exists
        if ($new_user != true)
        {
            apologize("Please select another username");
        }
        else
        {
            // find out the id that was assigned to the user
            $rows = CS50::query("SELECT LAST_INSERT_ID() AS id");
            if (count($rows) == 1)
            {
                $id = $rows[0]["id"];
                // remember that user by storing user's id in session
                $_SESSION["id"] = $id;
            }    
        }
        // redirect user to index.php
        redirect("/");
    }

?>