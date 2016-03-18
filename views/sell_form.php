<head> <style type="text/css"> body { background-color: #e3d5ee; font-family: Candara; color: #601a92 } </style> </head>

<form action="sell.php" method="post">
    <div class="form-group">
        <select name="symbol" class="form-control">
          <?php 
            foreach($positions as $position)
            {
                echo '<option value="'.$position['symbol'].'">'.$position['name'].'</option>';
            }
          ?>
        </select>
    </div>
    <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="shares" placeholder="Shares" type="text"/>
        </div>
    <div class="form-group">
        <button class="btn btn-default" type="submit">
            <span aria-hidden="true" class="glyphicon glyphicon-hand-right"></span>
            Sell
        </button>
    </div>
</form>