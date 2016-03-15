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
        $stock = $share_rows[0]["shares"];
        
        // How much money
         $stock= lookup($_POST["symbol"]);
         
         
        // Multiplicar
        $abono = $share_rows[0]["shares"] * $stock["price"];
        
        // abono saldo
        CS50::query("UPDATE users SET cash = cash + $abono WHERE id = ?", $_SESSION["id"]);
        
        //Remove stock from portfolio
        $rows = CS50::query("DELETE FROM Portfolio WHERE user_id = ? AND Symbol = ?", $_SESSION["id"],$_POST["symbol"]);
        
        //update history
        CS50::query("INSERT INTO history (user_id, transaction, datetime, symbol, shares, price) VALUES (?, 'SELL', NOW(), ?, ?, ?)",
            $_SESSION["id"], $_POST["symbol"],$share_rows[0]["shares"], $stock["price"]);
            redirect("/");
    }
    
    
?>