<?php 
    include 'dbcon.php';
    // code for pagination
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }else {
        $page = 1;
    }

    $records_per_page = 12;
    $start_from = ($page-1)*$records_per_page;

    $pquery = " select * from jobregistration limit $start_from, $records_per_page ";
    $presult = mysqli_query($con, $pquery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Show Details</title>
    <link rel="stylesheet" href="style.css">
    <?php include 'links.php' ?>
</head>
<body>
    <div class="main-div">
        <h1>List of Candidates Applied</h1>
        <div class="center-div">
            <div class="table-responsive">
                <table>
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Degree</th>
                        <th>Refer</th>
                        <th>Language</th>
                        <th colspan="2">Operations</th>
                    </thead>
                    <tbody>
                    <?php
                    
                        while (($result = mysqli_fetch_assoc($presult))) {
                    ?>
                        <tr>
                        <td><?php echo $result['id']; ?></td>
                        <td><?php echo $result['name']; ?></td>
                        <td><?php echo $result['phone']; ?></td>
                        <td><?php echo $result['email']; ?></td>
                        <td><?php echo $result['degree']; ?></td>
                        <td><?php echo $result['refer']; ?></td>
                        <td><?php echo $result['planguage']; ?></td>
                        <td><a href="update.php?id=<?php echo $result['id']; ?>" data-toggle="tooltip" 
                            data-placement="left" title="Edit"><i class="fa fa-edit"></i></a></td>
                        <td><a href="delete.php?id=<?php echo $result['id']; ?>" data-toggle="tooltip" 
                            data-placement="left" title="Delete"><i class="fa fa-trash"></i></a></td>
                        </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
                <div class="nav-buttons">
                    <div class="main-page">
                        <a href="index.php" class="btnMainpage">Add More Records</a>
                    </div>
                    <div class="pagination">
                    <?php
                        $pr_query = " select * from jobregistration ";
                        $pr_result = mysqli_query($con, $pr_query);
                        $total_records = mysqli_num_rows($pr_result);
                        // echo $total_records;
                        $total_pages = ceil($total_records/$records_per_page);
                        // echo $total_pages;
                        if ($page>1) {
                            echo " <a href='showdata.php?page=".($page-1)."' class='btnPage'>Previous</a> ";
                        }
                        for ($i=1; $i < $total_pages; $i++) { 
                            echo " <a href='showdata.php?page=".$i."' class='btnPage'>$i</a> ";
                        }
                        if ($page<$i) {
                            echo " <a href='showdata.php?page=".($page+1)."' class='btnPage'>Next</a> ";
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
    <script>
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
</html>