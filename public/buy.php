<?php
/**
** Buy Controller
** Created by : Julieta Natalia
**
**/

    // configuration
    require("../includes/config.php"); 
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
         // Crear variable para rellenar
        $symbol = !empty($_GET["symbol"]) ? $_GET["symbol"]: "";
        
        render("buy_form.php", ["title" => "Buy", "symbol" => $symbol]);
    }    
       
        
        
        // else if user reached page via POST (as by submitting a form via POST)
        else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["symbol"]) || empty($_POST["shares"]))
        {
            apologize("You must provide a symbol.");
        }
        if (!preg_match("/^\d+$/", $_POST["shares"]))
        {
            apologize("Enter a correct number of shares.");
        }
        $stock = lookup($_POST["symbol"]);
        
        //
        if (! $stock)
        {
            apologize("Invalid stock.");
        }
        
        $costo = $stock["price"] * $_POST["shares"];
        $rows = CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
        
        // compare the users cash with the money the have  to give
        if ( $costo > $rows[0]["cash"]) 
         {
            apologize("You cannot buy it.");
        }
        
        
            // add shares to the user
            CS50::query("INSERT INTO Portfolio (user_id, symbol, shares) VALUES(?,?,?)
            ON DUPLICATE KEY UPDATE shares = shares + ?",$_SESSION["id"],$_POST["symbol"],$_POST["shares"],$_POST["shares"]);
            
            // price from cash
            CS50::query("UPDATE users SET cash = cash - ? WHERE id = ?", $costo, $_SESSION["id"]);
            
            //update history
            CS50::query("INSERT INTO history (user_id, transaction, datetime, symbol, shares, price) VALUES (?, 'BUY', NOW(), ?, ?, ?)",
            $_SESSION["id"], $_POST["symbol"], $_POST["shares"], $stock["price"]);
            redirect("/");
        
     }   

?>