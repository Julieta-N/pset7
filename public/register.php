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
    
        // TODO
        //Error si hay una vacante
        if ( empty($_POST["Username"]) || empty($_POST["Name"]) ||  empty($_POST["Last_Name"]) || empty($_POST["password"])) {
            apologize("Fill in the blanks.");
        }
        
        if ($_POST["password"] != $_POST["confirmation"]) {
            apologize("Write the password again.");
        }
        
        $success = CS50::query("INSERT IGNORE INTO users (username, hash, cash, name, last_name) VALUES(?, ?, 10000.0000, ?, ?)", $_POST["Username"], password_hash($_POST["password"], PASSWORD_DEFAULT), $_POST["Name"], $_POST["Last_Name"]);
        
        if($success) {
            $rows = CS50::query("SELECT LAST_INSERT_ID() AS id");
            $id = $rows[0]["id"];
            $_SESSION["id"] = $id;
            
            redirect("/");
        }
        apologize("Username already exists.");
        
        
    }

?>