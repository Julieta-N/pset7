<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $positions = CS50::query("SELECT * FROM history where user_id = ?", $_SESSION["id"]);
        
        render("history_form.php", ["positions" => $positions, "title" => "history"]);
    }

?>
