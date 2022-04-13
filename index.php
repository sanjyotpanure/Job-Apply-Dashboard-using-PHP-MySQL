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
                <img src="image.webp" alt="svg">
                <h3>Welcome</h3>
                <p>Please fill all the details carefully. This form can change your life.</p>
                <a href="showdata.php">Check Form</a> <br>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Apply for Company Placement</h3>
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Enter your name" name="name" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" class="form-control" placeholder="Enter phone number" name="phone" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Any references" name="refer" value="" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Enter your qualification" name="degree" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Enter your email" name="email" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Programming Language" name="plang" value="" required>
                                    </div>
                                    <input type="submit" class="btnRegister" name="submit" value="Register">
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

<?php
    if (isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $degree = mysqli_real_escape_string($con, $_POST['degree']);
        $refer = mysqli_real_escape_string($con, $_POST['refer']);
        $plang = mysqli_real_escape_string($con, $_POST['plang']);

        $insertquery = " INSERT INTO jobregistration(name, phone, email, degree, refer, planguage) 
                                VALUES('$name', '$phone', '$email', '$degree', '$refer', '$plang') ";
        $iquery = mysqli_query($con, $insertquery);

        if ($iquery){
            ?>
                <div class="alert alert-success alert-dismissible">
                    <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> Data Inserted Successfully.
                </div>
            <?php
        }else{
            ?>
                <div class="alert alert-danger alert-dismissible">
                    <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Failed!</strong> Data Insertion Unsuccessful.
                </div>
            <?php
        }
    }
?>