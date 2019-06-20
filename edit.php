<?php
require_once('connection\connect.php');


$fetch_selected_data = "SELECT * FROM user_reg WHERE user_id='$edit_data_id'";
$run_fetch_selected = $dbconnect->query($fetch_selected_data);

$selected_row = mysqli_fetch_array($run_fetch_selected);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css\bootstrap.min.css" />
    <title>Edit User</title>
</head>

<body>
    <div class="container-fluid">
        <h4>Edit User</h4>
        <form action="" method="POST">
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" class="form-control"  name="edit_full_name" value="<?php echo $selected_row['full_name']; ?>">
            </div>
            <div class="form-group">
                <label for="user_name">Username</label>
                <input type="text" class="form-control" name="edit_user_name" value="<?php echo $selected_row['user_name']; ?>">
            </div>

            <div class="form-group">
                <label for="user_email">Email address</label>
                <input type="email" class="form-control" name="edit_user_email" value="<?php echo $selected_row['user_email']; ?>">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="user_pass">Password</label>
                <input type="password" class="form-control" name="edit_user_pass" value="<?php echo $selected_row['user_pass']; ?>">
            </div>
            <input type="submit" class="btn btn-primary" name="edit_user" value="Edit User">
        </form>
       
    </div>
<?php 
 if (isset($_POST['edit_user'])) {
    $n_fn = $_POST['edit_full_name'];
    $n_un = $_POST['edit_user_name'];
    $n_ue = $_POST['edit_user_email'];
    $n_up = $_POST['edit_user_pass'];

    $updt_query = "UPDATE user_reg SET full_name='$n_fn', user_name='$n_un', user_pass='$n_up', user_email='$n_ue' WHERE user_id='$edit_data_id'";
    $run_updt = $dbconnect->query($updt_query);
    if ($run_updt == TRUE) {
        echo "<script>alert('User Updated')</script>";
        echo "<script>window.open('data.php', '_self');</script>";
    } else {
        mysqli_error($dbconnect);
    }
}

?>
</body>

</html>