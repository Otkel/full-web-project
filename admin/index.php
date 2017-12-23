<!DOCTYPE html>
<html>
<head>
    <title>
        Admin Panel
    </title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>


<div class="container flex-center">
    <form action="auth.php" method="post">
        <label for="fname">Login</label> <br>
        <input type="text" id="fname" name="userName" placeholder="Your login.."> <br>
        <br>
        <label for="pass">Password</label>
        <br>
        <input type="password" id="pass" name="password" placeholder="Your password..">
        <br>
        <input type="submit" value="Enter">
    </form>
</div>

</body>
</html>
