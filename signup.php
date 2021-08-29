<?php
    include 'config.php';
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $name=$_POST['username'];
        $contact=$_POST['usermobile'];
        $email=$_POST['useremail'];
        $pass=$_POST['userpassword'];
        $cnf_pass=$_POST['userconfirmpassword'];


        if($pass==$cnf_pass)
        {
            $sql="INSERT INTO auth(name,email,contact,password,created) VALUES
                                    ('$name','$email',$contact,'$pass',now())";

            if($conn->query($sql))
            {
                    echo "Data saved Successfully";
            }
            else
            {
                    echo $sql."ERROR : ".$conn->error;
            }
            
        }   
        else
        {
            echo "Password not Matched !!";
        }


    }
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8"/>
    <title>MY CONTACT | SIGNUP</title>
    <!-- our Bootstrap 5.0 CSS File -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body>
<!-- <?php include 'includes/navbar.php'; ?> -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="https://img.icons8.com/color/48/000000/new-contact.png" alt="" width="30" height="24" />
                <sapn class="text-danger">MY CONTACT</sapn>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>

            </div>
        </div>
    </nav> 
    <div class="container mt-5">
        <h2 class="text-primary text-center">SIGN UP NOW !</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" class="form-control" name="username" placeholder="Full name">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Mobile</label>
                <input type="tel" class="form-control" name="usermobile" placeholder="Enter without +91">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" class="form-control" name="useremail" placeholder="name@example.com">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password</label>
                <input type="password" class="form-control" name="userpassword" placeholder="Password">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="userconfirmpassword" placeholder="Confirm Password ">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">PROFILE</label>
                <input type="file" class="form-control" name="userprofile">
              </div>
                <button type="submit" class="btn btn-outline-danger" name="submit">Create Account</button>
        </form>
      </div>
    <!-- Our Bootstrap 5.0 JS File -->
    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>