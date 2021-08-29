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

    $dir='image/upload/users/';

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $name=$_POST['username'];
        $contact=$_POST['usermobile'];
        $email=$_POST['useremail'];
        $adress=$_POST['useradress'];

        if(isset($_COOKIE['auth']))
        {
            $userid=$_COOKIE['auth'];
        }
        else
        {
            $userid=$_SESSION['auth']['email'];
        }


        $sql1="SELECT email from contacts WHERE email='".$email."'";

        $result=$conn->query($sql1);

        if($result->num_rows<=0)
        {
            $path=$dir.$_FILES["userprofile"]['name'];
            
            if(file_exists($path))
            {
                echo "<script>
                    alert('This image already in use');
                </script>";
            }
            else
            {
                move_uploaded_file($_FILES['userprofile']['tmp_name'],$path);

                $sql="INSERT INTO contacts(fullname,email,mobile,adress,profile_img,userid,created) VALUES
                                ('$name','$email',$contact,'$adress','$path','$userid',now())";
                
                if($conn->query($sql)) 
                {
                    echo "<script>
                        alert('Data Saved Succfully');
                        window.location='dashboard.php';
                    </script>";
                }
                else
                {
                    echo $sql ."ERROR : ".$conn->error;
                }
            }
        }
        else
        {
            echo "<script>
                    alert('This email in use');
                </script>";
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
    <div class="container mt-3 add-contact-form">
        <h2 class="text-primary mt-3 mb-3 text-center">Add Contact</h2>
        <a class="add-contact-btn border border-primary p-3" href="dashboard.php"
                data-bs-toggle="tooltip" data-bs-placement="right" title="View All Contacts">
            <img src="https://img.icons8.com/color-glass/48/000000/list.png"/>
        </a>
        <hr>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Profile Image</label>
                <input type="file" name="userprofile" class="form-control" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="username" class="form-control" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label class="form-label">Mobile Number</label>
                <input type="tel" name="usermobile" class="form-control" placeholder="xxxxxxxx">
            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" name="useremail" class="form-control" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label class="form-label">Your Adress</label>
                <textarea class="form-control" name="useradress" rows="3"></textarea>
            </div>
            <button class="btn btn-success" type="submit" name="submit">
                Add Contact
            </button>
        </form>
    </div>
    <?php include 'includes/script.php'; ?>
</body>
</html>