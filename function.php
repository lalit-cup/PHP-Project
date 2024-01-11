<?php
function showdetails($email, $password)
{

    include('dbcon.php');

    $sql = "SELECT * FROM `user` WHERE `email`='$email' AND `password`= '$password'";
    $run = mysqli_query($con, $sql); // Change $qry to $sql
    if (mysqli_num_rows($run)) {

        $data = mysqli_fetch_assoc($run);
?>
        <table border="1" style="width: 50%; margin-top:20px;" align="center">
            <tr>
                <th colspan="2">User Details Show</th>
            </tr>
            <tr>
                <th>First Name</th>
                <td><?php echo $data['first_name']; ?></td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td><?php echo $data['last_name']; ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $data['email']; ?></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><?php echo $data['address']; ?></td>
            </tr>
            <tr>
                <th>Mobile</th>
                <td><?php echo $data['mobile']; ?></td>
            </tr>
            <tr>
                <th>Type</th>
                <td>
                    <?php if ($data['type'] == 'Admin') echo 'checked'; ?>
                    <label for="option1">Admin</label>

                    <?php if ($data['type'] == 'User') echo 'checked'; ?>
                    <label for="option2">User</label>
                </td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    <?php if ($data['status'] == 'Active') echo 'checked'; ?>
                    <label for="option1">Active</label>

                    <?php if ($data['status'] == 'Inactive') echo 'checked'; ?>
                    <label for="option2">Inactive</label>
                </td>
            </tr>
            <tr>
                <th>Created</th>
                <td><?php echo $data['created']; ?></td>
            </tr>
            <tr>
                <th>Updated</th>
                <td><?php echo $data['updated']; ?></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><?php echo $data['password']; ?></td>
            </tr>
        </table>
<?php
    } else {
        echo "<script>alert('No User Found !!');</script>";
    }
}
?>