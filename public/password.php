<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("password_view.php", ["title" => "Password"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // TODO
        //Error si hay una vacante
        if ( empty($_POST["new_psw"]) ||  empty($_POST["confirmation"])) {
            apologize("Fill in the blanks.");
        }
        
        $success = CS50::query("UPDATE users SET hash = ? WHERE id = ?",password_hash($_POST["new_psw"], PASSWORD_DEFAULT),$_SESSION["id"]);
            
            redirect("/");
        
        
        
    }

?>