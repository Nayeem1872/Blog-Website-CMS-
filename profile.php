<?php require_once("function.php") ?>
<?php require_once("php/functions.php") ?>
<?php require_once("php/DB.php") ?>
<?php
 session_start();
 Confirm_login();
 $success= false;
 $Username = $_SESSION['username'];
    
       

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>

    <script src="https://kit.fontawesome.com/7ccd1e194b.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
</head>

<body>
 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <div class="container">
        <a href="#" class="navbar-brand p-0">CMS News </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarcollapseCMS">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarcollapseCMS">
            <ul class="navbar-nav mr-auto ">
                <li class="nav-item">
                    <a href="profile.php" class="nav-link"><i class="fa-solid fa-user text-light"></i> My Profile</a>
                </li>
                <li class="nav-item">
                    <a href="post.php" class="nav-link">DashBoard</a>
                </li>
                
                <li class="nav-item">
                    <a href="cate_list.php" class="nav-link ">Categories</a>
                </li>
                <li class="nav-item">
                    <a href="manage_admin.php" class="nav-link ">Manage Admin</a>
                </li>
                
                <li class="nav-item">
                    <a href="blog.php?page=1" class="nav-link">Live Blog</a>
                </li>
            </ul>
            
        
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="logout.php" class="nav-link text-danger"><i class="fa-solid fa-arrow-right-from-bracket text-light"></i> Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


    <!-- Exam list part Starts -->


    <div class="container">
        <div class="card">

            <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="panel-title"> Profile Info.</h3>
                    </div>
                </div>
            </div>


            <div class="card-body ">
                <div class="table-responsive">
                    <table id="exam_data_table" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <!-- <th>Image</th> -->
                                <th>Username</th>
                                <th>Name</th>
                                <th>Password</th>
                                <th>AddedBy</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                             global $connectingDB;
                             $un=$_SESSION["username"];
                             $sql = "SELECT * FROM admin WHERE username LIKE '$un'";
                             $result = mysqli_query($connectingDB, $sql);
                             while($DataRows = mysqli_fetch_assoc ($result ))
                             {
             
             
                                 $array[]=$DataRows;
                                
                             }
                             if(!empty($array)){
                             foreach($array as $i){
                             ?>
                            
                                    <tr>

                                        
                                        <td><?php echo $i['username']; ?></td>
                                        <td><?php echo $i['admin_name']; ?></td>
                                        <td><?php echo $i['password']; ?></td>
                                        <td><?php echo $i['addedby']; ?></td>
                                        <td>
                                            <a class="btn btn-outline-info" href="faculty_update.php?facultyId=<?php echo Session::get('id'); ?>">Edit</a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>

    <!-- Exam list part Ends -->


</body>

</html>