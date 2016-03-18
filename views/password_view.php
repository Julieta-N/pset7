<head> <style type="text/css"> body { background-color: #ffefcb; font-family: Candara; } </style> </head>

<form action="password.php" method="post">
    <fieldset>
        <div class="form-group">
            <input class="form-control" name="new_psw" placeholder="New password" type="password"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="confirmation" placeholder="Confirm your password" type="password"/>
        </div>
        <div class="form-group">
            <button class="btn btn-warning" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-sort"></span>
                Change password
            </button>
        </div>
    </fieldset>
</form>
<div>
    or <a href="password.php">log in</a>
</div>


