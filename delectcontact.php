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

    $id=$_GET['q'];
    $f=$_GET['f'];

    if(isset($_GET['q'])&&isset($_GET['f']))
    {
        $sql="DELETE FROM contacts WHERE id='$id'";
        if($conn->query($sql)===TRUE)
        {
            unlink($f);
            
            echo "<script>alert('Data deleted successfully');
                window.location='dashboard.php';        
            </script>";
        }
        else
        {
            echo $sql."Error :".$conn->error;
        }
    }
    else
    {
        echo "<script>alert('This is not a proper way to delete');
                window.location='dashboard.php';        
        </script>";
    }

?>