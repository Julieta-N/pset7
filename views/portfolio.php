<head> <style type="text/css"> body { background-color: #f5fff4; font-family: Candara; color:#4d764e  } </style> </head>

<table class = "table table-bordered">
    <th class=info> Symbol </th>
    <th class=active> Shares </th>
    <th class=success> Name </th>
    <th class=warning> Price </th>
    <th class=danger> TOTAL</th>
    <tbody>
        <?php
            foreach ($positions as $position)
            {
                echo("<tr>");
                echo("<td class=info>" . $position["symbol"] . "</td>");
                echo("<td class=active>" . $position["shares"] . "</td>");
                echo("<td class=success>" . $position["name"] . "</td>");
                echo("<td class=warning>$" . number_format($position["price"], 2) . "</td>");
                echo("<td class=danger>$" . number_format($position["total"], 2) . "</td>");
                echo("</tr>");
            }
    
        ?>
    </tbody>
</table>
<h4>Hello, <?= $user["name"] ." ". $user["last_name"]?> !! You have $<?= number_format($user["cash"],2) ?></h4>
