<!DOCTYPE html>
<html lang="en_US">

<head>
    <meta charset="UTF-8">
    <title>Shopping Website</title>
</head>

<body>
    <h3 align="right" style="margin-right: 20px;"><a href="login.php">Admin Login</a></h3>
    <h1 align="center">Welcome to the Shopping Website</h1>
    <form method="post" action="index.php">
        <table style="width:28%" ; align="center" border="1">
            <tr>
                <td colspan="2" align="center">User Information</td>
            </tr>
            <tr>
                <td align="left">Username</td>
                <td><input type="text" name="email" required></td>
            </tr>
            <tr>
                <td align="left">Password</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="submit" value="Show Info"></td>
            </tr>
        </table>
    </form>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    include('dbcon.php');
    include('function.php');
    showdetails($email, $password);
}
?>