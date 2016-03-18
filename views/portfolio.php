<head> <style type="text/css"> body { background-color: #f5fff4; font-family: Candara; color:#4d764e  } </style> </head>

<table class = "table table-condensed">
    <th> Symbol </th>
    <th> Shares </th>
    <th> Name </th>
    <th> Price </th>
    <th> TOTAL</th>
    <tbody>
        <?php
            foreach ($positions as $position)
            {
                echo("<tr>");
                echo("<td>" . $position["symbol"] . "</td>");
                echo("<td>" . $position["shares"] . "</td>");
                echo("<td>" . $position["name"] . "</td>");
                echo("<td>$" . number_format($position["price"], 2) . "</td>");
                echo("<td>$" . number_format($position["total"], 2) . "</td>");
                echo("</tr>");
            }
    
        ?>
    </tbody>
</table>
<h4>Hello, <?= $user["name"] ." ". $user["last_name"]?> !! You have $<?= number_format($user["cash"],2) ?></h4>
