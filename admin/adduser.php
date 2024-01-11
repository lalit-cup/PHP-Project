<?php
session_start();
if (isset($_SESSION['uid'])) {
    echo "";
} else {
    header('location: ../login.php');
}
?>
<?php
include('header.php');
include('titlehead.php')
?>
<form method="post" action="adduser.php">
    <table align="center" border="1" style="width: 70%; margin-top: 4px;">
        <tr>
            <td>First Name</td>
            <td><input type="text" name="f_name" placeholder="first_name" required></a></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><input type="text" name="l_name" placeholder="last_name" required></a></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" placeholder="email" required></a></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type="text" name="address" placeholder="address" required></a></td>
        </tr>
        <tr>
            <td>Mobile</td>
            <td><input type="text" name="mobile" placeholder="mobile" required></a></td>
        </tr>
        <tr>
            <td>Type</td>
            <td>
                <input type="radio" name="type" value="admin">
                <label for="option1">Admin</label>

                <input type="radio" name="type" value="user">
                <label for="option2">User</label>
            </td>
        </tr>
        <tr>
            <td>Status</td>
            <td>
                <input type="radio" name="status" value="active">
                <label for="option1">Active</label>

                <input type="radio" name="status" value="inactive">
                <label for="option2">Inactive</label>
            </td>
        </tr>
        <tr>
            <td>Created</td>
            <td><input type="text" name="created" placeholder="created	"></a></td>
        </tr>
        <tr>
            <td>Updated</td>
            <td><input type="text" name="updated" placeholder="updated"></a></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="text" name="password" placeholder="password"></a></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="Submit" name="save" value="save"></td>
        </tr>
    </table>
</form>
</body>

</html>

<?php
if (isset($_POST['save'])) {
    include('../dbcon.php');

    $first_name = mysqli_real_escape_string($con, $_POST['f_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['l_name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    $type = mysqli_real_escape_string($con, $_POST['type']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $qry = "INSERT INTO `user`(`first_name`, `last_name`, `email`, `address`, `mobile`, `created`, `updated`, `type`, `status`, `password`)
            VALUES ('$first_name', '$last_name', '$email', '$address', '$mobile', NOW(), NOW(), '$type', '$status', '$password')";

    $run = mysqli_query($con, $qry);

    if ($run) { ?>
        <script>
            alert('Data inserted successfully!');
        </script>
<?php
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>