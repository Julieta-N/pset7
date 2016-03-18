<head> <style type="text/css"> body { background-color: #f9f3e9; font-family: Candara; color:#853724} </style> </head>

<table class = "table table-bordered">
    <th> Transaction </th>
    <th> Date/Time </th>
    <th> Symbol </th>
    <th> Shares </th>
    <th> Price </th>
    <tbody>
        <?php
            foreach ($positions as $position)
            {
                echo("<tr>");
                echo("<td>" . $position["transaction"] . "</td>");
                echo("<td>" . $position["datetime"] . "</td>");
                echo("<td>" . $position["symbol"] . "</td>");
                echo("<td>" . $position["shares"] . "</td>");
                echo("<td>$" . number_format($position["price"], 2) . "</td>");
                echo("</tr>");
            }
    
        ?>
    </tbody>
</table>