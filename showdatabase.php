<link rel="stylesheet" href="./bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">
<style>
    body{
        background:url(1.jpg);
       
    }
</style>
<script>
    function fun() {
        // alert("You Want to Delete an Data");
        var result = confirm('you want to Delete');
        if (result == false) {
            event.preventDefault();
        }

    }
</script>

<?php
include 'database.php';
$select = mysqli_query($con, "select * from logins");
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="showdatabase.php">
                <table border="4" class="table table-success table-striped text-center" >
                    <tr>
                        <th>sno</th>

                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>PASSWORD</th>
                        <th>delete</th>
                        <th>edit</th>
                        <?php

                        while ($row = mysqli_fetch_array($select, MYSQLI_ASSOC)) {
                            $_SESSION['user'] = $row['user'];
                            echo "<tr>";
                            echo "<td>" . $row['sno'] . "</td>";
                            echo "<td>" . $row['user'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['pass'] . "</td>";
                            ?>
                            <td> <button type="submit" class="btn btn-success" onclick="fun()"
                                    value="<?php echo $row['sno']; ?>" name="del">DELETE</button></td>
                            <td> <button type="submit" class="btn btn-primary" value="<?php echo $row['sno']; ?>"
                                    name="update">UPDATE</a></button>
                            </td>

                            <?php
                        }
                        echo '</tr>';
                        echo '</table></form>
                        <button class="btn btn-danger"><a href="index.php"  style="text-decoration: none;color: black;"> BACK</a></button>
                        </div>
                        </div>
                        </div>';
                        ?>
                        <?php
                        if (isset($_POST['del'])) {
                            include 'database.php';
                             $id = $_POST['del'];
                            echo $id;
                            $delete = mysqli_query($con, "DELETE FROM `logins` WHERE `sno` = '$id' ");
                         }
                        ?>
                        <?php
                        if (isset($_POST['update'])) {
                            include 'database.php';
                            $select = mysqli_query($con, "select * from logins where sno=$_POST[update] ");
                            while ($row1 = mysqli_fetch_array($select, MYSQLI_ASSOC)) {
                                 $id = $_POST['update'];?>  
                                <div class="container">
                                    <div class="row ">
                                        <div class=" offset-lg-3 col-lg-6 text-center bg-warning" style="border-radius: 20px;">
                                            <div class="mt-3">
                                                <h2>update</h2>
                                                <form action="showdatabase.php" method="post">

                                                    <input type="text" name="name1" class="form-control" value="<?php echo $row1['user'];
                                                    ?>" id="">
                                                    <br>
                                                    <input type="text" name="email1" class="form-control"
                                                        value="<?php echo $row1['email']; ?>" id="">
                                                    <button type="submit" class="btn btn-danger" name="c" value="<?php echo $row1['sno'];
                                                    ?>">update</button>
                                                </form>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } ?>
                        <?php
                        if (isset($_POST['c'])) {
                            include 'database.php';
                            // echo $id;
                            display($_POST['name1'], $_POST['email1'], $_POST['c']);
                             }
                        function display($n, $e, $id)
                        {
                            include 'database.php';
                            $update = mysqli_query($con, "UPDATE `logins` SET `user`='$n',`email`='$e' WHERE sno=$id ");
                            if ($update) {
                                echo '<script>alert("update");
                                window.location.href="showdatabase.php";</script>';
                            } else {
                                echo "not ";
                            }
                        }

                        ?>