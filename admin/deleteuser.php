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
<table align="center">
    <form action="deleteuser.php" method="post">
        <tr>
            <th>Username</th>
            <td><input type="text" name="email" placeholder="Enter Email" required="required"></td>
        </tr>
        <tr>
            <th>Password</th>
            <td><input type="text" name="password" placeholder="Enter Password" required="required"></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" name="submit" value="search"></td>
        </tr>
    </form>
</table>

<table align="center" width:"80%" border="1" style="margin-top: 10px;">
    <tr style="background-color:#000; color:#fff">
        <th>No</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Mobile</th>
        <th>Type</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Password</th>
        <th>Edit</th>
    </tr>

    <?php
    if (isset($_POST['submit'])) {
        include('../dbcon.php');
        $Username = $_POST['email'];
        $Password = $_POST['password'];

        $sql = "SELECT * FROM `user` WHERE `email`='$Username' AND `password`='$Password'";
        $run = mysqli_query($con, $sql);
        if (mysqli_num_rows($run) > 1) {
            echo "<tr><td colspa=11'>No Records Found !!</td></tr>";
        } else {
            $count = 0;
            while ($data = mysqli_fetch_assoc($run)) {
                $count++;
    ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $data['first_name']; ?></td>
                    <td><?php echo $data['last_name']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo $data['address']; ?></td>
                    <td><?php echo $data['mobile']; ?></td>
                    <td><?php echo $data['type']; ?></td>
                    <td><?php echo $data['status']; ?></td>
                    <td><?php echo $data['created']; ?></td>
                    <td><?php echo $data['updated']; ?></td>
                    <td><?php echo $data['password']; ?></td>
                    <td><a href="deleteform.php?sid=<?php echo $data['id']; ?>">Delete</a></td>
                </tr>
    <?php


            }
        }
    }
    ?>
</table>