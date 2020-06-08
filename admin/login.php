<!DOCTYPE html>
<html lang="en">
    <head>  
        <title>BITWeb- Login</title>
    </head>
    <body>
        <h1>Admin Login</h1>
        <form action="login_code.php" method="post">
            <div class="form-group">
                <label class="small mb-1" for="">Username</label>
                <input name="u_name" placeholder="Enter Username" />
            </div><br>
            <div class="form-group">
                <label class="small mb-1" for="inputPassword">Password</label>
                <input class="form-control py-4" id="inputPassword" type="password" name="u_pwd" placeholder="Enter password" />
            </div><br>
            <div>
                <input type="submit" name="btn_login" value="login">
            </div>
        </form>
    </body>
</html>
