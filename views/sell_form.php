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
        <button class="btn btn-default" type="submit">
            <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
            Sell
        </button>
    </div>
</form>