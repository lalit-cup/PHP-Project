<?php
include('../dbcon.php');

$id = $_REQUEST['sid'];
$qry = "DELETE FROM `user` WHERE `id` = '$id'";

$run = mysqli_query($con, $qry);

if ($run) { ?>
    <script>
        alert('Data Deleted successfully!');
        window.open('deleteuser.php', '_self');
    </script>
<?php
} else {
    echo "Error: " . mysqli_error($con);
}
?>