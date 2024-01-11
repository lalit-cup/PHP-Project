<?php
session_start();
if (isset($_SESSION['uid'])) {
    header('location:admin/admindash.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <h1 align="center">Login</h1>
    <form action="login.php" method="post">
        <table align="center">
            <tr>
                <td>Username</td>
                <td><input type="text" name="uname" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="pass" required></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="login" value="Login"></td>
            </tr>
        </table>
    </form>

</body>

</html>
<?php
include('dbcon.php');

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($con, $_POST['uname']); // Use mysqli_real_escape_string to prevent SQL injection
    $password = mysqli_real_escape_string($con, $_POST['pass']); // Use mysqli_real_escape_string to prevent SQL injection

    $qry = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $run = mysqli_query($con, $qry);

    if (!$run) {
        // Query execution error
        die("Query failed: " . mysqli_error($con));
    }

    $row = mysqli_num_rows($run);

    if ($row < 1) {
?>
        <script>
            alert('Username or password not match !!');
            window.open('login.php', '_self');
        </script>
<?php
    } else {
        $data = mysqli_fetch_assoc($run);
        $id = $data['id'];


        $_SESSION['uid'] = $id;
        header('location:admin/admindash.php');
    }
}
?>