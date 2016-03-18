<head> <style type="text/css"> body { background-color: #f9f3e9; font-family: Candara; color:#853724} </style> </head>

<table class = "table table-bordered">
    <th class=info> Transaction </th>
    <th class=active> Date/Time </th>
    <th class=success> Symbol </th>
    <th class=warning> Shares </th>
    <th class=danger> Price </th>
    <tbody>
        <?php
            foreach ($positions as $position)
            {
                echo("<tr>");
                echo("<td class=info>" . $position["transaction"] . "</td>");
                echo("<td class=active>" . $position["datetime"] . "</td>");
                echo("<td class=success>" . $position["symbol"] . "</td>");
                echo("<td class=warning>" . $position["shares"] . "</td>");
                echo("<td class=danger>$" . number_format($position["price"], 2) . "</td>");
                echo("</tr>");
            }
    
        ?>
    </tbody>
</table>