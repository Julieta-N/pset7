<?php
/**
** Quote Controller
** Created by : Julieta Natalia
**
**/

    // configuration
    require("../includes/config.php"); 
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $symbol = empty($_GET["symbol"]) ? "" : $_GET["symbol"];
        // else render form
        render("quote_form.php", ["title" => "Get Quote", "symbol"=>$symbol]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["symbol"]))
        {
            apologize("You must provide a symbol.");
        }
        
        $stock = lookup($_POST["symbol"]);
    
        if(!$stock)
            apologize("Invalid symbol");
        
        
        // render(quote, title stock)
        render("quote.php", ["title" => "Quote of " . $stock["name"], "stock" => $stock]);

    }
    
    
?>