<head> <style type="text/css"> body { background-color: #d1e1e5; font-family: Candara; } </style> </head> 

<form action="register.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="Name" placeholder="Name" type="text"/>
        </div>
         <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="Last_Name" placeholder="Last Name" type="text"/>
        </div>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="Username" placeholder="Username" type="text"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="password" placeholder="Password" type="password"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="confirmation" placeholder="Confirmation" type="password"/>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                <head> <style type="text/css"> body { color: #691336 ;} </style> </head>
                Register
            </button>
        </div>
    </fieldset>
</form>
<div>
    or <a href="login.php">log in</a>
</div>
