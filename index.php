<?php

include('server/connection.php');

$stmt = "SELECT * FROM polling_unit;";
$polling_units= mysqli_query($conn, $stmt );

//  total number  of polling_unit 
$stmt1 = "SELECT COUNT(*) as number_of_polling_unit FROM polling_unit;";
$number_of_polling_unit= mysqli_query($conn, $stmt1 );

//  total number  of WARD 
$stmt2 = "SELECT COUNT(*) as number_of_ward FROM ward;";
$number_of_ward= mysqli_query($conn, $stmt2 );


//  total number  of lga
$stmt3 = "SELECT COUNT(*) as number_of_lga FROM lga;";
$number_of_lga= mysqli_query($conn, $stmt3 );


// total all from lga
$stmt4 = "SELECT * FROM lga;";
$all_lga = mysqli_query($conn, $stmt4 );





?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
    <!-- <link rel="stylesheet" href="style.css"> -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />


    <title>Document</title>
</head>
<style>
<?php include('style.css');

?>
</style>

<body>
    <div class="body">
        <div class="main-box container">
            <div class="heading">
                <img src="images/inec.jpeg" alt="nimc logo" class="nimc-logo">
                <div class="mini-heading">
                    <h1>The Independent National Electoral Commission (INEC)</h1>
                    <h3>-vote wisely</h3>
                </div>
            </div>


            <nav>
                <div class="move">
                    <ul>
                        <li>Home</li>
                        <li>+ About Us</li>
                        <li>+ Our Services</li>
                        <li>+Media</li>
                        <li>+ Resources</li>
                        <li>+ Contact</li>
                </div>
                </ul>
            </nav>
            <!-- end of nav -->
            <section class="search container">

                <h2>Search Result</h2>
                <p style="color:red"><?php if(isset($_GET['message'])){
                echo $_GET['message'];
            }?></p>
                <form action="total_result.php" method="POST" class="row">
                    <div class="col-3">
                        <label for="state">State</label>
                        <select class="form-control form-control-lg" name="state" id="cars">
                            <option value="volvo" selected>Delta</option>
                            <option value="volvo">Delta</option>
                        </select>
                    </div>
                    <div class="col-3"> <label for="LGA">LGA</label>
                        <select class="form-control form-control-lg" name="lga" id="cars">
                            <option value="all" selected>All</option>
                            <?php 
                        $stmt5 = "SELECT * FROM lga;";
                        $lga = mysqli_query($conn, $stmt5 );
                        
                        
                        foreach($lga as $lga){?>
                            <option value="<?php echo $lga['lga_name']?>"><?php echo $lga['lga_name']?></option>
                            <?php }?>

                        </select>
                    </div>


                    <div class="col-3">
                        <label for="ward">Ward</label>
                        <select class="form-control form-control-lg" name="ward" id="cars">
                            <option value="volvo" selected>All</option>
                        </select>

                    </div>
                    <div class="col-3">
                        <label for="ward">Polling Unit</label>
                        <select class="form-control form-control-lg" name="polling_unit" id="cars">
                            <option value="volvo" selected>all</option>

                        </select>


                    </div>
                    <div class="col-12 mx-auto">
                        <input type="submit" name='submit_btn' class="submit_btn">
                    </div>

                </form>
            </section>

            <!-- displaying result -->
            <section class="result">

                <div class="row result-container">
                    <h2>All polling unit</h2>

                    <!-- per result -->
                    <?php  foreach($polling_units as $polling_unit){?>
                    <div class="col-lg-5 col-4-md  col-12-sm per-result">
                        <h5>polling unit number: <?php echo $polling_unit['polling_unit_number']?></h5>
                        <h5>polling unit name: <?php echo $polling_unit['polling_unit_name']?></h5>
                        <span>Dsc: <?php echo $polling_unit['polling_unit_description']?></span>
                        <?php  
                    $lga_id_pu = $polling_unit['lga_id'];
                           $stmt_lga_id_pu = "SELECT * FROM lga where lga_id =  $lga_id_pu ;";
                            $result_for_pu= mysqli_query($conn, $stmt_lga_id_pu );
                            $row_for_pu= $result_for_pu->fetch_assoc();
                    ?>
                        <apan>lgi id:
                            <?php if(!empty($row_for_pu['lga_id'] )){echo $row_for_pu['lga_id'];}else{echo 0;}?>
                        </apan>
                        <span>lgi name:
                            <?php if(!empty($row_for_pu['lga_id'] )){echo $row_for_pu['lga_name'];}else{echo 'nill';}?></span>

                        <span>unique id: <?php echo $polling_unit['uniqueid']?></span>
                        <?php
                        $unique_id = $polling_unit['uniqueid'];
                    // pdp
                     $stmt_find_result_pdp = "SELECT * FROM announced_pu_results where polling_unit_uniqueid =   $unique_id and party_abbreviation = 'PDP';";
                     $polling_result_pdp= mysqli_query($conn, $stmt_find_result_pdp );
                     $row_pdp= $polling_result_pdp->fetch_assoc();
                    //  print_r($row_pdp);

                    //    print_r($polling_result_pdp);

                    // dpp
                    $stmt_find_result_dpp = "SELECT * FROM announced_pu_results where polling_unit_uniqueid =   $unique_id and party_abbreviation = 'DPP';";
                    $polling_result_dpp= mysqli_query($conn, $stmt_find_result_dpp );
                    $row_dpp= $polling_result_dpp->fetch_assoc();
                    // print_r($row_dpp);

                    // ACN
                    $stmt_find_result_acn = "SELECT * FROM announced_pu_results where polling_unit_uniqueid =   $unique_id and party_abbreviation = 'ACN';";
                    $polling_result_acn= mysqli_query($conn, $stmt_find_result_acn );
                    $row_acn= $polling_result_acn->fetch_assoc();
                    // print_r($row_acn);


                    // ppa
                    $stmt_find_result_ppa = "SELECT * FROM announced_pu_results where polling_unit_uniqueid =   $unique_id and party_abbreviation = 'PPA';";
                    $polling_result_ppa= mysqli_query($conn, $stmt_find_result_ppa );
                    $row_ppa= $polling_result_ppa->fetch_assoc();
                    // print_r($row_ppa);

                    // cdc
                    $stmt_find_result_cdc = "SELECT * FROM announced_pu_results where polling_unit_uniqueid =   $unique_id and party_abbreviation = 'CDC';";
                    $polling_result_cdc= mysqli_query($conn, $stmt_find_result_cdc );
                    $row_cdc= $polling_result_cdc->fetch_assoc();
                    // print_r($row_cdc);
    
                    // jp
                    $stmt_find_result_jp = "SELECT * FROM announced_pu_results where polling_unit_uniqueid =   $unique_id and party_abbreviation = 'JP';";
                    $polling_result_jp= mysqli_query($conn, $stmt_find_result_jp );
                    $row_jp= $polling_result_jp->fetch_assoc();
                    // print_r($row_jp);

                    // ANPP
                    $stmt_find_result_anpp = "SELECT * FROM announced_pu_results where polling_unit_uniqueid =   $unique_id and party_abbreviation = 'ANPP';";
                    $polling_result_anpp= mysqli_query($conn, $stmt_find_result_anpp );
                    $row_anpp= $polling_result_anpp->fetch_assoc();
                    // print_r($row_anpp);

                    //  LABO 
                    $stmt_find_result_labo = "SELECT * FROM announced_pu_results where polling_unit_uniqueid =   $unique_id and party_abbreviation = 'LABO';";
                    $polling_result_labo= mysqli_query($conn, $stmt_find_result_labo );
                    $row_labo= $polling_result_labo->fetch_assoc();
                    // print_r($row_labo);

                    //  CPP
                    $stmt_find_result_cpp = "SELECT * FROM announced_pu_results where polling_unit_uniqueid =   $unique_id and party_abbreviation = 'CPP';";
                    $polling_result_cpp= mysqli_query($conn, $stmt_find_result_cpp );
                    $row_cpp= $polling_result_cpp->fetch_assoc();
                    // print_r($row_cpp);

                    ?>

                        <table class="table">
                            <tr>
                                <th><?php if(isset($row_pdp['party_abbreviation'])){
                                 echo $row_pdp['party_abbreviation'];

                            }else{
                                echo 'PDP';
                            }?></th>
                                <th><?php if(isset($row_dpp['party_abbreviation'])){
                                echo $row_dpp['party_abbreviation'];
                            }else{
                                echo 'DPP';
                            }  ?></th>
                                <th><?php if(isset($row_acn['party_abbreviation'])){
                               echo $row_acn['party_abbreviation'];
                            }else{
                                echo 'ACN';
                            } ?></th>
                                <th><?php
                             if(isset($row_ppa['party_abbreviation'])){
                                echo $row_ppa['party_abbreviation'];
                             }else{
                                 echo 'PPA';
                             } 
                           ?></th>
                                <th><?php 
                            if(isset($row_cdc['party_abbreviation'])){
                                echo $row_cdc['party_abbreviation'];
                             }else{
                                 echo 'CDC';
                             }?></th>
                                <th>
                                    <?php if(isset($row_jp['party_abbreviation'])){
                               echo $row_jp['party_abbreviation'];
                             }else{
                                 echo 'JP';
                             } ?>
                                </th>
                                <th>
                                    <?php if(isset($row_anpp['party_abbreviation'])){
                               echo $row_jp['party_abbreviation'];
                             }else{
                                 echo 'ANPP';
                             } ?>
                                </th>
                                <th>
                                    <?php if(isset($row_labo['party_abbreviation'])){
                               echo $row_labo['party_abbreviation'];
                             }else{
                                 echo 'LABO';
                             } ?>
                                </th>
                                <th>
                                    <?php if(isset($row_cpp['party_abbreviation'])){
                               echo $row_cpp['party_abbreviation'];
                             }else{
                                 echo 'CPP';
                             } ?>
                                </th>

                            </tr>
                            <tr>

                                <td>
                                    <?php if(isset($row_pdp['party_score'])){
                                echo $row_pdp['party_score']; }else{
                                echo 0;
                                }?>
                                </td>

                                <td>
                                    <?php if(isset($row_dpp['party_score'])){
                                echo $row_dpp['party_score']; }else{
                                echo 0;
                                }?>
                                </td>
                                <td>
                                    <?php if(isset($row_acn['party_score'])){
                                echo $row_acn['party_score']; }else{
                                echo 0;
                                }?>
                                </td>
                                <td>
                                    <?php if(isset($row_ppa['party_score'])){
                                echo $row_ppa['party_score']; }else{
                                echo 0;
                                }?>
                                </td>
                                <td>
                                    <?php if(isset( $row_cdc['party_score'])){
                                echo $row_cdc['party_score']; }else{
                                echo 0;
                                }?>
                                </td>
                                <td>
                                    <?php if(isset( $row_jp['party_score'])){
                                echo $row_jp['party_score']; }else{
                                echo 0;
                                }?>
                                </td>
                                <td>
                                    <?php if(isset( $row_anpp['party_score'])){
                                echo $row_anpp['party_score']; }else{
                                echo 0;
                                }?>
                                </td>
                                <td>
                                    <?php if(isset( $row_labo['party_score'])){
                                echo $row_labo['party_score']; }else{
                                echo 0;
                                }?>
                                </td>
                                <td>
                                    <?php if(isset( $row_cpp['party_score'])){
                                echo $row_cpp['party_score']; }else{
                                echo 0;
                                }?>
                                </td>








                            </tr>

                        </table>
                    </div>
                    <?php  }?>




                </div>


            </section>

        </div>

    </div>
</body>

</html>