<?php
include('../dbcon.php');
$first_name = mysqli_real_escape_string($con, $_POST['f_name']);
$last_name = mysqli_real_escape_string($con, $_POST['l_name']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$address = mysqli_real_escape_string($con, $_POST['address']);
$mobile = mysqli_real_escape_string($con, $_POST['mobile']);
$type = mysqli_real_escape_string($con, $_POST['type']);
$status = mysqli_real_escape_string($con, $_POST['status']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$id = mysqli_real_escape_string($con, $_POST['sid']);

$qry = "UPDATE `user` SET `first_name` = '$first_name', `last_name` = '$last_name', `email` = '$email', `address` = '$address', `mobile` = '$mobile', `password` = '$password' WHERE `user`.`id` = $id";

$run = mysqli_query($con, $qry);

if ($run) { ?>
    <script>
        alert('Data updated successfully!');
        window.open('updateform.php?sid=<?php echo $id; ?>', '_self');
    </script>
<?php
} else {
    echo "Error: " . mysqli_error($con);
}
?>