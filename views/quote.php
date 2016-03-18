<?php
/**
** Quote View
** Created by : Julieta Natalia
**
**/
?>

<head> <style type="text/css"> body { background-color: #ecf4f9; font-family: Candara; color:#1b51a6 } </style> </head> 

<h1>A share of <?= $stock["name"] ?> $<?= $stock["price"] ?></h1>

<div class="form-group">
            <a class="btn btn-default" href="buy.php?symbol=<?= $stock["symbol"] ?>">
                <span aria-hidden="true" class="glyphicon glyphicon-export"></span>
                Buy
            </a>
        </div>

