<!DOCTYPE html>
<html lang="en">
<?php
    // database connection
    include('dbconnection.php'); 

    if(isset($_POST["name"]) && isset($_POST["role"]) && isset($_POST["email"])){
        $name = $_POST['name'];
        $role = $_POST['role'];
        $email = $_POST['email'];
        $user_id = $_GET["id"];
        $sql = "UPDATE userdetails SET `name` = '$name', `role` = '$role', `email` = '$email' WHERE id = $user_id";        
        $query_userdata = mysqli_query($db, $sql);
        if ($query_userdata) {
            header("location: user_details.php");
        } else {
            echo "Something went wrong. Please try again.";
        }
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</head>

<body>
    <section>
        <h1 style="text-align: center;margin: 50px 0;">Update User Details</h1>
        <div class="container">
            <?php 
                require_once "dbconnection.php";
                $sql_query = "SELECT * FROM userdetails WHERE id = ".$_GET["id"];
                if ($result = $db ->query($sql_query)) {
                    while ($row = $result -> fetch_assoc()) { 
                        $Id = $row['id'];
                        $Name = $row['name'];
                        $role = $row['role'];
                        $email = $row['email'];
            ?>
                            <form action="updateUser_details.php?id=<?php echo $Id; ?>" method="post">
                                <div class="row">
                                        <div class="form-group col-lg-4">
                                            <label for="">Name</label>
                                            <input type="text" name="name" id="name" class="form-control" value="<?php echo $Name ?>" required>
                                        </div>
                                        <div class="form-group  col-lg-3">
                                            <label for="">Role</label>
                                            <select name="role" id="role" class="form-control" required >
                                                <option value="">Select a Role</option>
                                                <option value="admin" <?php if($role == "admin"){ echo "Selected"; } ?> >Admin</option>
                                                <option value="manager" <?php if($role == "manager"){ echo "Selected"; } ?> >Manager</option>
                                                <option value="user" <?php if($role == "user"){ echo "Selected"; } ?> >User</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label for="">Email</label>
                                            <input type="text" name="email" id="email" class="form-control" value="<?php echo $email ?>" required>
                                        </div>
                                        <div class="form-group col-lg-2" style="display: grid;align-items:  flex-end;">
                                            <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Update">
                                        </div>
                                </div>
                            </form>
            <?php 
                    }
                }
            ?>
        </div>
    </section>
</body>

</html>