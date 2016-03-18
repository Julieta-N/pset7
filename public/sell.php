<?php
/**
** Sell Controller
** Created by : Julieta Natalia
**
**/

    // configuration
    require("../includes/config.php"); 
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // Display the user's stock
        $rows = CS50::query("SELECT * FROM Portfolio WHERE user_id = ?", $_SESSION["id"]);
        // else render form
        $positions = [];
        
        foreach ($rows as $row)
        {
            $stock = lookup($row["Symbol"]);
            if ($stock !== false)
            {
                $positions[] = [
                    "name" => $stock["name"],
                    "symbol" => $row["Symbol"],
                ];
            }
        }
        
        
        render("sell_form.php", ["positions" => $positions,"title" => "Sell",]);
    }
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        // How many shares
        $share_rows = CS50::query("SELECT shares FROM Portfolio WHERE user_id = ? AND Symbol = ?",$_SESSION["id"],$_POST["symbol"]);
        $number_of_shares = $share_rows[0]["shares"];
         
        // How much money
        $stock= lookup($_POST["symbol"]);
        
         // Shares to sell
            if ($number_of_shares < $_POST["shares"])
            {
                apologize("Enter a correct number of shares.");
            }
        
            else if (!preg_match("/^\d+$/", $_POST["shares"]))
            {
                if($_POST["shares"] != "ALL")
                    apologize("Enter a correct number of shares.");
            } 
            
            
            if ($number_of_shares > $_POST["shares"])
            {
               
                CS50::query("UPDATE Portfolio SET shares = shares - ? WHERE user_id = ? AND symbol = ?",  $_POST["shares"], $_SESSION["id"], $_POST["symbol"]);
            }
            else if ($number_of_shares == $_POST["shares"] || $_POST["shares"] == "ALL" )
            {
                // Multiplicar
                $abono = $share_rows[0]["shares"] * $stock["price"];
                // abono saldo
                CS50::query("UPDATE users SET cash = cash + $abono WHERE id = ?", $_SESSION["id"]);
                //Remove stock from portfolio
                $rows = CS50::query("DELETE FROM Portfolio WHERE user_id = ? AND Symbol = ?", $_SESSION["id"],$_POST["symbol"]);
            }
         
            
        
        
        //update history
        CS50::query("INSERT INTO history (user_id, transaction, datetime, symbol, shares, price) VALUES (?, 'SELL', NOW(), ?, ?, ?)",
            $_SESSION["id"], $_POST["symbol"],$share_rows[0]["shares"], $stock["price"]);
            redirect("/");
    }
    
    
?>