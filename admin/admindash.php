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
?>
<div class="Shoppingtitle" align="center">
    <h4><a href="logout.php" style="float:right; margin-right:30px; color:#fff; font: size 20px;">Logout</a></h4>
    <h1>Welcome to Shopping Dashboard</h1>
</div>
<div class="dashboard">
    <table style="width:50%;" align="center">
        <tr>
            <td>1.</td>
            <td><a href="adduser.php">Insert User Details</a></td>
        </tr>
        <tr>
            <td>2.</td>
            <td><a href="updateuser.php">Update User Details</a></td>
        </tr>
        <tr>
            <td>3.</td>
            <td><a href="deleteuser.php">Delete User Details</a></td>
        </tr>
    </table>
</div>
 
</body>

</html>