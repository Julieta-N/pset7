<head> <style type="text/css"> body { background-color: #fbeff7; font-family: Candara; color: #ff8d9e } </style> </head>

<form action="buy.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="symbol" placeholder="Symbol" type="text"/>
        </div>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="shares" placeholder="Shares" type="text"/>
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-plus"></span>
                Buy
            </button>
        </div>
    </fieldset>
</form>