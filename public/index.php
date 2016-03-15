<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $rows = CS50::query("SELECT symbol, shares FROM Portfolio where user_id = ?", $_SESSION["id"]);
        
        $positions = [];
        foreach ($rows as $row)
        {
            $stock = lookup($row["symbol"]);
            if ($stock !== false)
            {
                $positions[] = [
                    "name" => $stock["name"],
                    "price" => $stock["price"],
                    "shares" => $row["shares"],
                    "symbol" => $row["symbol"],
                    "total" => $stock["price"] * $row["shares"]
                ];
            }
        }
        
        $rows = CS50::query("SELECT * FROM users WHERE id = ?",$_SESSION["id"]);
        $user = $rows[0];
        
        render("portfolio.php", ["positions" => $positions, "title" => "Portfolio","user"=>$user]);
    }
    
    
   
?>
