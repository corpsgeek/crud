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
    <div class="container-fluid" id="showata">
        <h1>Update User Data</h1>
        <p><a href="index.php">Create User Data</a></p>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">USER ID</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th colspan="2">Modify User Data</th>
                </tr>
            </thead>
            <tbody>

                <?php

                #fetch data
                $fetch_query = "SELECT * FROM user_reg";
                $run_fetch = $dbconnect->query($fetch_query);

                while ($row = mysqli_fetch_array($run_fetch)) :

                    ?>
                    <tr>
                        <td scope="row"><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['full_name']; ?></td>
                        <td><?php echo $row['user_name']; ?></td>
                        <td><?php echo $row['user_email']; ?></td>
                        <td><?php echo $row['user_pass']; ?></td>
                        <td><a href="data.php?edit_id=<?php echo  $row['user_id'];  ?>">Edit<a></td>
                        <td><a href="data.php?delete_data=<?php echo$row['user_id']; ?>">Delete<a></td>
                    </tr>
                <?php endwhile; ?>

            </tbody>
        </table>
    </div>
    <?php

    if (isset($_GET['edit_id'])) {
        $edit_data_id = $_GET['edit_id'];
        include_once('edit.php');
    }
   
    if(isset($_GET['delete_data'])){
        $delete_id = $_GET['delete_data'];

        $delete_query = "DELETE FROM user_reg WHERE user_id='$delete_id'";
        $run_delete = $dbconnect->query($delete_query);
        if($run_delete == TRUE){
            echo "<script>alert('User Deleter')</script>";
            echo "<script>window.open('data.php', '_self');</script>";
        }
    }
    ?>


</body>

</html>