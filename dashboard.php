<?php
    include 'config.php';
    if(!isset($_COOKIE['auth']))
    {
        if(!isset($_SESSION['auth']))
        {
            echo "<script>alert('Login to continue');
                            window.location='index.php';</script>";

        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/head.php'; ?>
</head>
<body>
    <?php include 'includes/navbar.php'; ?>
    <div class="container view-contact mt-3">
        <h1 class="text-center">
            Welcome, <span class="text-primary">
            <?php 
                if(isset($_COOKIE['auth']))
                {
                    $data=$_COOKIE['auth']; 
                    echo $data;
                }
                else
                {
                    $data=$_SESSION['auth']['email']; 
                    echo $data;
                }
            ?>
            </span>
        </h1>
        <div>
            <a class="add-contact-btn" href="addcontact.php"
                data-bs-toggle="tooltip" data-bs-placement="right" title="Add New Contact">
                <img src="https://img.icons8.com/fluency/48/000000/add.png"/>
            </a>
        </div>
        <hr>
        <div class="row">
            <?php
                $sql="SELECT * FROM contacts WHERE userid='$data'";
                $result=$conn->query($sql);

                if($result->num_rows>0)
                {

                    while($row=$result->fetch_assoc())
                    {

            ?>
            <div class="col-md-3">
                <div class="card ">
                    <img src="<?php echo $row['profile_img'] ?>" class="card-img-top contacts" alt="User Profile Image" style="height:150px">
                    <div class="card-body">
                        <h6 class="card-title"><?php echo $row['fullname'] ?></h6>
                        <p class="mb-1">
                           <a href="tel:<?php echo $row['mobile'] ?>" target="_blank"><?php echo $row['mobile'] ?></a>
                        </p>
                        <p class="mb-2">
                            <a href="mailto:<?php echo $row['email'] ?>" target="_blank"><?php echo $row['email'] ?></a>
                        </p>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <!-- Edit contact button start here-->
                            <a href="editcontact.php?q=<?php echo $row['id'];?>&f=<?php echo $row['profile_img'];?>" class="add-contact-btn"
                            data-bs-toggle="tooltip" data-bs-placement="right" title="Edit Contact">
                                <img src="https://img.icons8.com/color/48/000000/edit--v2.png" style="height: 30px;" />
                            </a>
                             <!-- Edit contact button  ends here-->

                             <!-- Delete contact button start here-->
                            <a href="deletecontact.php?q=<?php echo $row['id'];?>&f=<?php echo $row['profile_img'];?>" class="add-contact-btn"
                            data-bs-toggle="tooltip" data-bs-placement="right" title="Delete Conatct">
                                <img src="https://img.icons8.com/color/48/000000/delete-forever.png" style="height: 30px;"/>
                            </a>
                             <!-- Delete contact button ends here -->
                        </div>
                        
                    </div>
                </div>
            </div>
            <?php
                }
            }
            else
            {
                echo "<h3 class='text-danger'>No Record Found</h3>";  
            }
            ?>
        </div>
    </div>
    <?php include 'includes/script.php'; ?>
</body>
</html>