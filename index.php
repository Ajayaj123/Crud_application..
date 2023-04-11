<?php
session_start();
// echo $_SESSION['name'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Crud Application</title>
    <link rel="stylesheet" href="./bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">
</head>
<style>
    body{
        background:url(1.jpg);
       
    }
    .crud{
        /* background-color: antiquewhite; */
        padding-top: 100px;
        padding-left: 360px;
    }
</style>
<body>
    <div class="container crud mt-5">
        <div class="row align-items-center">
            <div class="col-lg-6 text-center" style="background-color:dodgerblue; border-radius: 20px">
            <h2>CRUD Application</h2>
             <form action="" method="post" class="text-center">
                    <input type="text" name="user" id="" value="" class="form-control mt-4" placeholder="Username" required/>
                    <input type="email" name="email" id="" class="form-control mt-3" placeholder="Email" required/>
                    <input type="password" name="ps" id="" class="form-control mt-3" placeholder="Password" required/>
                    <input type="submit" name="click" id="" class="btn btn-warning mt-4" />
                     <button  class="btn btn-danger mt-4" onclick="func()">show Database</button>
             </form>
            </div>
        </div>
    </div>
</body>
<script> func=()=>window.location.href="showdatabase.php";</script>
</html>

<?php
if (isset($_POST['click'])) {
    display($_POST['user'], $_POST['email'], $_POST['ps']);
}

function display($u, $e, $p)
{
    include 'database.php';
    $insert = mysqli_query($con, "insert into logins (user,email,pass) value ('$u','$e','$p')");
    if ($insert) {
        echo '<script>
        alert("SuccessFully")
        </script>';

    } else {
        echo 'not logins';
    }

}
