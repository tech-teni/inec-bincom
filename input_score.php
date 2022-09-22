<?php 
include('server/connection.php');

if(isset($_POST['submit_btn'])){

// info sun=bmitted

    $polling_unit_id= $_POST['polling_unit_id'];
    $ward_id= $_POST['ward_id'];
    $lga_id= $_POST['lga_id'];
    $uniquewardid= $_POST['uniquewardid'];

    $polling_unit_number= $_POST['polling_unit_number'];
    $polling_unit_name= $_POST['polling_unit_name'];
    $polling_unit_description= $_POST['polling_unit_description'];
    $entered_by_user= $_POST['entered_by_user'];
    $date_entered= date('Y-m-d H:i:s');



// connect to the database

    $stmt= "INSERT INTO `polling_unit` (`polling_unit_id`, `ward_id`, `lga_id`, `uniquewardid`, `polling_unit_number`, `polling_unit_name`, `polling_unit_description`, `entered_by_user`, `date_entered`	) 
    VALUES('$polling_unit_id', '$ward_id', '$lga_id', '$uniquewardid','$polling_unit_number',  '$polling_unit_name',' $polling_unit_description', '$entered_by_user', '$date_entered' );";
    $user = mysqli_query($conn, $stmt);
    echo    $stmt;
 echo $user;
 if($user != 0){
    header('location:input_score.php?message=info saved'); }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />


    <title>Document</title>
</head>

<style>
<?php include('style.css');

?>
</style>

<body style="background-color:darkgreen; height:100vh;">
    <div class="container form-container" style="background-color:white;">
        <h2>STORE NEW POLLING UNIT INFORMATION</h2>
        <?php 
        if(isset($_GET['message'])){?>
        <p style="color: blue; text-align: center;"><?php echo $_GET['message'];?></p>
        <?php } ?>
        <form action="input_score.php" class="row form  form-group" method="POST">
            <div class=" col-3">
                <label for="">Polling_unit_id </label>
                <input type="number" class="form-control" name="polling_unit_id" required>
            </div>
            <br>
            <div class="col-3">
                <label for="">Ward Id </label>
                <input type="number" name="ward_id" class="form-control" required>
            </div>
            <br>
            <div class="col-3">
                <label for=""> LGA Id</label>
                <input type="number" name="lga_id" class="form-control" required>
            </div>
            <br>
            <div class="col-3">
                <label for="">unique ward id </label>
                <input type="number" name="uniquewardid" class="form-control" required>
            </div>
            <br>
            <div class="col-3">
                <label for="">Polling_unit_number</label>
                <input type="id" name="polling_unit_number" class="form-control">
            </div>
            <br>
            <div class="col-3">
                <label for="">Polling_unit_name</label>
                <input type="text" name="polling_unit_name" class="form-control">
            </div>
            <br>
            <div class="col-3">
                <label for="">Polling_unit_description</label>
                <input type="text" name="polling_unit_description" class="form-control">
            </div>
            <br>
            <div class="col-3">
                <label for="">Latitude</label>
                <input type="text" name="lat" class="form-control">
            </div>
            <br>
            <div class="col-3">
                <label for="">Longitude</label>
                <input type="text" name="long" class="form-control">
            </div>
            <br>

            <div class="col-3">
                <label for="">entered_by_user</label>
                <input type="text" name="entered_by_user" class="form-control">
            </div>
            <br>
            <div class="col-3">
                <label for="">date_entered</label>
                <input type="text" name="date_entered" class="form-control">
            </div>
            <br>
            <div class="col-12">
                <input type="submit" name='submit_btn' class="submit_btn" class="form-control">
            </div>
            <br>






        </form>
    </div>

</body>

</html>