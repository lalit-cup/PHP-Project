<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('location: ../login.php');
    exit();
}
?>
<?php
include('header.php');
include('titlehead.php');
include('../dbcon.php');

$sid = $_GET['sid'];
$sql = "SELECT * FROM `user` WHERE `id`='$sid'";
$run = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($run);
?>

<form method="post" action="updatedata.php">
    <table align="center" border="1" style="width: 70%; margin-top: 4px;">
        <tr>
            <th>First Name</th>
            <td><input type="text" name="f_name" value="<?php echo $data['first_name']; ?>" required></td>
        </tr>
        <tr>
            <th>Last Name</th>
            <td><input type="text" name="l_name" value="<?php echo $data['last_name']; ?>" required></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><input type="text" name="email" value="<?php echo $data['email']; ?>" required></td>
        </tr>
        <tr>
            <th>Address</th>
            <td><input type="text" name="address" value="<?php echo $data['address']; ?>" required></td>
        </tr>
        <tr>
            <th>Mobile</th>
            <td><input type="text" name="mobile" value="<?php echo $data['mobile']; ?>" required></td>
        </tr>
        <tr>
            <th>Type</th>
            <td>
                <input type="radio" name="type" value="Admin" <?php if ($data['type'] == 'Admin') echo 'checked'; ?>>
                <label for="option1">Admin</label>

                <input type="radio" name="type" value="User" <?php if ($data['type'] == 'User') echo 'checked'; ?>>
                <label for="option2">User</label>
            </td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
                <input type="radio" name="status" value="Active" <?php if ($data['status'] == 'Active') echo 'checked'; ?>>
                <label for="option1">Active</label>

                <input type="radio" name="status" value="Inactive" <?php if ($data['status'] == 'Inactive') echo 'checked'; ?>>
                <label for="option2">Inactive</label>
            </td>
        </tr>
        <tr>
            <th>Created</th>
            <td><input type="text" name="created" value="<?php echo $data['created']; ?>" required></td>
        </tr>
        <tr>
            <th>Updated</th>
            <td><input type="text" name="updated" value="<?php echo $data['updated']; ?>"></td>
        </tr>
        <tr>
            <th>Password</th>
            <td><input type="text" name="password" value="<?php echo $data['password']; ?>"></td>
        </tr>
        <tr>


            <td colspan="2" align="center">
                <input type="hidden" name="sid" value="<?php echo $data['id']; ?>">
                <input type="Submit" name="submit" value="submit">
            </td>
        </tr>
    </table>
</form>
</body>

</html>