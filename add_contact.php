<!-- ADD Contact code -->
<?php
    $thisPage="Add Contact";

    include 'config.php';

    if(!isset($_SESSION['auth']))
    {
        header("Location:signup.php");
    }

    $flag=0;

    if($SERVER["REQUEST_METHOD"]=="POST")
    {
        $fullname=$_POST['fullname'];
        $email=$_POST['email'];
        $mobile=$_POST['moblie'];
        $address=$_POST['address'];
        $group_name=$_POST['group name'];
        $auth_id=$_SESSION['auth']['auht_id'];

        $upload_at="img/profile/";

        $path=$upload_at.basename($profile_img);

        move_uploaded_file($_FILES["profile_img"]["temp_name"],$path);

        $sql=INSERT INTO contacts(profile_img,fullname,email,mobile,address,group_name,auth_id,created)VALUES('$path','$fullname','$email','$mobile','address','group_name','auth_id');
        
        if($conn->query($sql)==TRUE)
        {
          $flag=1;
        }
        else
        {
          echo"ERROR".$sql."Error name".$conn->error;
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
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Add New CONTACT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Logout</a>
                    </li>                    

            </div>
        </div>
    </nav> 
    <div class="container mt-5">
        <h2 class="text-primary text-center">Add CONTACT</h2>
        <div class="card bg-light"> 
          <div class="card-body">
           <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
             <div class="mb-3">
                <label  class="form-label">Select Profile</label>
                <input type="file" class="form-control" name="profile_img">
              </div>
              <div class="mb-3">
                <label  class="form-label">Full Name</label>
                <input type="text" class="form-control" name="username" placeholder="Full name">
              </div>
              <div class="mb-3">
                <label  class="form-label">Mobile</label>
                <input type="tel" class="form-control" name="usermobile" placeholder="Enter without +91">
              </div>
              <div class="mb-3">
                <label  class="form-label">Email</label>
                <input type="email" class="form-control" name="useremail" placeholder="name@example.com">
              </div>
              <div class="mb-3">
                <label  class="form-label">Address</label>
                <textarea class="form-control" id="Adress" rows="3"></textarea>
              </div>
              
              <div class="mb-3">
              <label  class="form-label">Select Group</label>
                <select class="from-select" aria-lable="Default select example" name="group_name">
                    <option value="Family">Family</option>
                    <option value="Friend">Friend</option>
                    <option value="Other">Other</option>
                </select>
              </div>
                <button type="submit" class="btn btn-outline-danger" name="submit">ADD CONTACT</button>
            </form>
          </div>
       </div>
        
    </div>
    <!-- Our Bootstrap 5.0 JS File -->
    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>