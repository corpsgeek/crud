<?php 
    require_once('connection\connect.php');
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css\bootstrap.min.css" />
    <title>Register User</title>
</head>

<body>
    <div class="container-fluid">
        <h1>Create User</h1>
        <p><a href="data.php">Manage User Data</a></p>
        <form action="index.php" method="POST">
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" class="form-control" placeholder="Enter full name" name="full_name">
            </div>
            <div class="form-group">
                <label for="user_name">Username</label>
                <input type="text" class="form-control" name="user_name">
            </div>

            <div class="form-group">
                <label for="user_email">Email address</label>
                <input type="email" class="form-control" name="user_email" >
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="user_pass">Password</label>
                <input type="password" class="form-control" name="user_pass" >
            </div>
            <button type="submit" class="btn btn-primary" name="create_user">Create User</button>
        </form>
    </div>
    <?php 
        if(isset($_POST['create_user'])){
            $full_name = $_POST['full_name'];
            $user_name = $_POST['user_name'];
            $user_email = $_POST['user_email'];
            $user_pass = $_POST['user_pass'];

            $insert_query = "INSERT INTO user_reg(full_name, user_name, user_email, user_pass) VALUES('$full_name', '$user_name', '$user_email', '$user_pass')";

            $run_insert = $dbconnect->query($insert_query);

            if($run_insert == TRUE){
                echo "<script>alert('User created')</script>";
                echo "<script>window.open('data.php', '_self')</script>";
            }
            

        }
    
    
    ?>
</body>

</html>