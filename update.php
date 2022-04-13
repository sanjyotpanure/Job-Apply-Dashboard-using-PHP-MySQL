<?php include 'dbcon.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Job Description Site</title>
    <link rel="stylesheet" href="style.css">
    <?php include 'links.php' ?>
</head>
<body>
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="penguinadmin_3.svg" alt="svg">
                <h3>Welcome</h3>
                <p>Please fill all the details carefully. This form can change your life.</p>
                <a href="showdata.php">Check Form</a> <br>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Update your details</h3>
                        <form action="" method="post">
                            <div class="row register-form">
                            <?php
                                $id = $_GET['id'];
                                $selectquery = " select * from jobregistration where id='$id' ";
                                $query = mysqli_query($con, $selectquery);

                                $result = mysqli_fetch_assoc($query);

                                if (isset($_POST['submit'])) {
                                    $name = mysqli_real_escape_string($con, $_POST['name']);
                                    $phone = mysqli_real_escape_string($con, $_POST['phone']);
                                    $email = mysqli_real_escape_string($con, $_POST['email']);
                                    $degree = mysqli_real_escape_string($con, $_POST['degree']);
                                    $refer = mysqli_real_escape_string($con, $_POST['refer']);
                                    $plang = mysqli_real_escape_string($con, $_POST['plang']);

                                    $updatequery = " update jobregistration set id=$id, name='$name', phone='$phone', 
                                    email='$email', degree='$degree', refer='$refer', planguage='$plang' where id=$id ";
                                    $uquery = mysqli_query($con, $updatequery);

                                    if ($uquery){
                                        ?>
                                            <!-- <script>alert("Data Inserted Successfully!");</script> -->
                                            <div class="alert alert-success alert-dismissible">
                                                <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>Success!</strong> Data Updated Successfully.
                                            </div>
                                        <?php
                                    }else{
                                        ?>
                                            <!-- <script>alert("Insertion Unsuccessful!!!");</script> -->
                                            <div class="alert alert-danger alert-dismissible">
                                                <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>Failed!</strong> Data Updation Unsuccessful.
                                            </div>
                                        <?php
                                    }
                                }
                            ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Enter your name" name="name" value="<?php echo $result['name']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" class="form-control" placeholder="Enter phone number" name="phone" value="<?php echo $result['phone']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Any references" name="refer" value="<?php echo $result['refer']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Enter your qualification" name="degree" value="<?php echo $result['degree']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Enter your email" name="email" value="<?php echo $result['email']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Programming Language" name="plang" value="<?php echo $result['planguage']; ?>" required>
                                    </div>
                                    <input type="submit" class="btnRegister" name="submit" value="Update">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
