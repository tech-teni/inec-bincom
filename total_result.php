<?php   
session_start();
echo($_POST['lga']);

// function calculateTotalPartyScore ($row){
//     $total_pdp =0;
//     foreach($row as  $row){

    // if(isset($row['party_score'])){
        // $total_pdp= $total_pdp + (int) $row['party_score']; 
        // return   $row['party_score'];

    //  }else{
        // $total_pdp =  $total_pdp + 0;
    //    return   0;

    //  }

    // }}


if(isset($_POST['lga'])){
    if($_POST['lga'] == 'all'){
        include('server/connection.php');
        $stmt = "SELECT * FROM lga ;";
        $lga= mysqli_query($conn, $stmt );
        $lga_row = $lga->fetch_assoc(); 
        // print_r($lga_row);
        $lga_id=  $lga_row['lga_id'];
        // 

        $stmt2 = "SELECT * FROM polling_unit;";
        $polling_units= mysqli_query($conn, $stmt2 );

        $total_pdp = 0;
        $total_dpp = 0;
        $total_acn = 0;
        $total_ppa = 0;
        $total_cdc = 0;
        $total_jp = 0;
        $total_anpp = 0;
        $total_labo = 0;
        $total_cpp = 0;






    
        while( $polling_unit= $polling_units->fetch_assoc()){
    
            // get the LGA to find the annouce result
            $lga_id_pu = $polling_unit['lga_id'];
            $stmt_lga_id_pu = "SELECT * FROM lga where lga_id =  $lga_id_pu ;";
             $result_for_pu= mysqli_query($conn, $stmt_lga_id_pu );
             $row_for_pu= $result_for_pu->fetch_assoc();
    
                //  getting announce result
                $unique_id = $polling_unit['uniqueid'];
                
                // pdp
                $stmt_find_result_pdp = "SELECT * FROM announced_pu_results where polling_unit_uniqueid =   $unique_id and party_abbreviation = 'PDP';";
                $polling_result_pdp= mysqli_query($conn, $stmt_find_result_pdp );
                $row_pdp= $polling_result_pdp->fetch_assoc();
                //  print_r($row_pdp);
                if(isset( $row_pdp['party_score'])){
                    $total_pdp= $total_pdp + (int)$row_pdp['party_score']; 
            
                 }
            
                //    print_r($polling_result_pdp);
    
                // dpp
                $stmt_find_result_dpp = "SELECT * FROM announced_pu_results where polling_unit_uniqueid =   $unique_id and party_abbreviation = 'DPP';";
                $polling_result_dpp= mysqli_query($conn, $stmt_find_result_dpp );
                $row_dpp= $polling_result_dpp->fetch_assoc();
                // print_r($row_dpp);
                if(isset( $row_dpp['party_score'])){
                    $total_dpp= $total_dpp+ (int)$row_dpp['party_score']; 
            
                 }
            
                
    
                // ACN
                $stmt_find_result_acn = "SELECT * FROM announced_pu_results where polling_unit_uniqueid =   $unique_id and party_abbreviation = 'ACN';";
                $polling_result_acn= mysqli_query($conn, $stmt_find_result_acn );
                $row_acn= $polling_result_acn->fetch_assoc();
                // print_r($row_acn);
                if(isset( $row_acn['party_score'])){
                    $total_acn= $total_acn+ (int)$row_acn['party_score']; 
            
                 }

    
    
                // ppa
                $stmt_find_result_ppa = "SELECT * FROM announced_pu_results where polling_unit_uniqueid =   $unique_id and party_abbreviation = 'PPA';";
                $polling_result_ppa= mysqli_query($conn, $stmt_find_result_ppa );
                $row_ppa= $polling_result_ppa->fetch_assoc();
                // print_r($row_ppa);
                if(isset( $row_ppa['party_score'])){
                    $total_ppa= $total_ppa+ (int)$row_ppa['party_score']; 
            
                 }

    
                // cdc
                $stmt_find_result_cdc = "SELECT * FROM announced_pu_results where polling_unit_uniqueid =   $unique_id and party_abbreviation = 'CDC';";
                $polling_result_cdc= mysqli_query($conn, $stmt_find_result_cdc );
                $row_cdc= $polling_result_cdc->fetch_assoc();
                // print_r($row_cdc);
                if(isset( $row_cdc['party_score'])){
                    $total_cdc= $total_cdc+ (int)$row_cdc['party_score']; 
            
                 }


    
                // jp
                $stmt_find_result_jp = "SELECT * FROM announced_pu_results where polling_unit_uniqueid =   $unique_id and party_abbreviation = 'JP';";
                $polling_result_jp= mysqli_query($conn, $stmt_find_result_jp );
                $row_jp= $polling_result_jp->fetch_assoc();
                // print_r($row_jp);
                if(isset( $row_jp['party_score'])){
                    $total_jp= $total_jp+ (int)$row_jp['party_score']; 
            
                 }

    
                // ANPP
                $stmt_find_result_anpp = "SELECT * FROM announced_pu_results where polling_unit_uniqueid =   $unique_id and party_abbreviation = 'ANPP';";
                $polling_result_anpp= mysqli_query($conn, $stmt_find_result_anpp );
                $row_anpp= $polling_result_anpp->fetch_assoc();
                // print_r($row_anpp);
                if(isset( $row_anpp['party_score'])){
                    $total_anpp= $total_anpp+ (int)$row_anpp['party_score']; 
            
                 }


    
                //  LABO 
                $stmt_find_result_labo = "SELECT * FROM announced_pu_results where polling_unit_uniqueid =   $unique_id and party_abbreviation = 'LABO';";
                $polling_result_labo= mysqli_query($conn, $stmt_find_result_labo );
                $row_labo= $polling_result_labo->fetch_assoc();
                // print_r($row_labo);
                if(isset( $row_labo['party_score'])){
                    $total_labo= $total_labo + (int)$row_labo['party_score']; 
            
                 }

    
                //  CPP
                $stmt_find_result_cpp = "SELECT * FROM announced_pu_results where polling_unit_uniqueid =   $unique_id and party_abbreviation = 'CPP';";
                $polling_result_cpp= mysqli_query($conn, $stmt_find_result_cpp );
                $row_cpp= $polling_result_cpp->fetch_assoc();
                // print_r($row_cpp);
                if(isset( $row_cpp['party_score'])){
                    $total_cpp= $total_cpp + (int)$row_cpp['party_score']; 
            
                 }


    
    
    
    
        }
        echo"this is the pdp". $total_pdp ;
        echo"this is the dpp".$total_dpp ;
        echo"this is the acn".$total_acn ;
        echo"this is the ppa".$total_ppa ;
        echo"this is the cdc".$total_cdc ;
        echo"this is the jp". $total_jp ;
        echo"this is the anpp".$total_anpp ;
        echo"this is the labo".$total_labo ;
        echo"this is the cpp".$total_cpp ;






    }else{
        $submitted_lga_name = $_POST['lga'];
        include('server/connection.php');
        $stmt = "SELECT * FROM lga where lga_name = '$submitted_lga_name';";
        $lga= mysqli_query($conn, $stmt );
        $lga_row = $lga->fetch_assoc(); 
        // print_r($lga_row);
        $lga_id=  $lga_row['lga_id'];

        $stmt2 =  "SELECT * FROM polling_unit where lga_id =$lga_id;";
        $polling_units= mysqli_query($conn, $stmt2);



        // 
        $total_pdp = 0;
        $total_dpp = 0;
        $total_acn = 0;
        $total_ppa = 0;
        $total_cdc = 0;
        $total_jp = 0;
        $total_anpp = 0;
        $total_labo = 0;
        $total_cpp = 0;

    
        while( $polling_unit= $polling_units->fetch_assoc()){
    
            // get the LGA to find the annouce result
            $lga_id_pu = $polling_unit['lga_id'];
            $stmt_lga_id_pu = "SELECT * FROM lga where lga_id =  $lga_id_pu ;";
             $result_for_pu= mysqli_query($conn, $stmt_lga_id_pu );
             $row_for_pu= $result_for_pu->fetch_assoc();
    
                //  getting announce result
                $unique_id = $polling_unit['uniqueid'];
                // pdp
                $stmt_find_result_pdp = "SELECT * FROM announced_pu_results where polling_unit_uniqueid =   $unique_id and party_abbreviation = 'PDP';";
                $polling_result_pdp= mysqli_query($conn, $stmt_find_result_pdp );
                $row_pdp= $polling_result_pdp->fetch_assoc();
                //  print_r($row_pdp);
                if(isset( $row_pdp['party_score'])){
                    $total_pdp= $total_pdp + (int)$row_pdp['party_score']; 
            
                 }
            
    
    
    
    
                //    print_r($polling_result_pdp);
    
                // dpp
                $stmt_find_result_dpp = "SELECT * FROM announced_pu_results where polling_unit_uniqueid =   $unique_id and party_abbreviation = 'DPP';";
                $polling_result_dpp= mysqli_query($conn, $stmt_find_result_dpp );
                $row_dpp= $polling_result_dpp->fetch_assoc();
                // print_r($row_dpp);
                if(isset( $row_dpp['party_score'])){
                    $total_dpp= $total_dpp+ (int)$row_dpp['party_score']; 
            
                 }
            
    
                // ACN
                $stmt_find_result_acn = "SELECT * FROM announced_pu_results where polling_unit_uniqueid =   $unique_id and party_abbreviation = 'ACN';";
                $polling_result_acn= mysqli_query($conn, $stmt_find_result_acn );
                $row_acn= $polling_result_acn->fetch_assoc();
                // print_r($row_acn);
                if(isset( $row_acn['party_score'])){
                    $total_acn= $total_acn+ (int)$row_acn['party_score']; 
            
                 }

    
                // ppa
                $stmt_find_result_ppa = "SELECT * FROM announced_pu_results where polling_unit_uniqueid =   $unique_id and party_abbreviation = 'PPA';";
                $polling_result_ppa= mysqli_query($conn, $stmt_find_result_ppa );
                $row_ppa= $polling_result_ppa->fetch_assoc();
                // print_r($row_ppa);
                if(isset( $row_ppa['party_score'])){
                    $total_ppa= $total_ppa+ (int)$row_ppa['party_score']; 
            
                 }

    
                // cdc
                $stmt_find_result_cdc = "SELECT * FROM announced_pu_results where polling_unit_uniqueid =   $unique_id and party_abbreviation = 'CDC';";
                $polling_result_cdc= mysqli_query($conn, $stmt_find_result_cdc );
                $row_cdc= $polling_result_cdc->fetch_assoc();
                // print_r($row_cdc);
                if(isset( $row_cdc['party_score'])){
                    $total_cdc= $total_cdc+ (int)$row_cdc['party_score']; 
            
                 }


    
                // jp
                $stmt_find_result_jp = "SELECT * FROM announced_pu_results where polling_unit_uniqueid =   $unique_id and party_abbreviation = 'JP';";
                $polling_result_jp= mysqli_query($conn, $stmt_find_result_jp );
                $row_jp= $polling_result_jp->fetch_assoc();
                // print_r($row_jp);
                if(isset( $row_jp['party_score'])){
                    $total_jp= $total_jp+ (int)$row_jp['party_score']; 
            
                 }

    
                // ANPP
                $stmt_find_result_anpp = "SELECT * FROM announced_pu_results where polling_unit_uniqueid =   $unique_id and party_abbreviation = 'ANPP';";
                $polling_result_anpp= mysqli_query($conn, $stmt_find_result_anpp );
                $row_anpp= $polling_result_anpp->fetch_assoc();
                // print_r($row_anpp);
                if(isset( $row_anpp['party_score'])){
                    $total_anpp= $total_anpp+ (int)$row_anpp['party_score']; 
            
                 }


    
                //  LABO 
                $stmt_find_result_labo = "SELECT * FROM announced_pu_results where polling_unit_uniqueid =   $unique_id and party_abbreviation = 'LABO';";
                $polling_result_labo= mysqli_query($conn, $stmt_find_result_labo );
                $row_labo= $polling_result_labo->fetch_assoc();
                // print_r($row_labo);
                if(isset( $row_labo['party_score'])){
                    $total_labo= $total_labo + (int)$row_labo['party_score']; 
            
                 }

    
                //  CPP
                $stmt_find_result_cpp = "SELECT * FROM announced_pu_results where polling_unit_uniqueid =   $unique_id and party_abbreviation = 'CPP';";
                $polling_result_cpp= mysqli_query($conn, $stmt_find_result_cpp );
                $row_cpp= $polling_result_cpp->fetch_assoc();
                // print_r($row_cpp);
                if(isset( $row_cpp['party_score'])){
                    $total_cpp= $total_cpp + (int)$row_cpp['party_score']; 
            
                 }
    
    
    
    
        }
    
        echo"this is the pdp". $total_pdp ;
        echo"this is the dpp".$total_dpp ;
        echo"this is the acn".$total_acn ;
        echo"this is the ppa".$total_ppa ;
        echo"this is the cdc".$total_cdc ;
        echo"this is the jp". $total_jp ;
        echo"this is the anpp".$total_anpp ;
        echo"this is the labo".$total_labo ;
        echo"this is the cpp".$total_cpp ;




    
// caluculate all -->



    }








}else{
header('location:index.php?message=pls select an LGA');
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


<body>


    <!--  -->
    <div class="main-box container">
        <h2>TOTAL FOR EACH PARTY</h2>
        <table class="table db-result table-dark">
            <tr>
                <th>PDP</th>
                <th>DPP</th>
                <th>ACN</th>
                <th>PPA</th>
                <th>CDC</th>
                <th>JP</th>
                <th>ANPP</th>
                <th>CPP</th>
                <th>LABO</th>
            </tr>
            <tr>
                <td><?php echo $total_pdp?></td>
                <td><?php echo $total_dpp?></td>
                <td><?php echo $total_acn?></td>
                <td><?php echo $total_ppa?></td>
                <td><?php echo $total_cdc?></td>
                <td><?php echo $total_jp?></td>
                <td><?php echo $total_anpp?></td>
                <td><?php echo $total_labo?></td>
                <td><?php echo $total_cpp?></td>

            </tr>

        </table>

        <br>
        <br>

        <div class="row result-container">
            <h2>polling unit for <?php echo $_POST['lga']?></h2>

            <!-- per result -->

            <?php  foreach($polling_units as $polling_unit){


                     ?>
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
                <span>lgi id:
                    <?php if(!empty($row_for_pu['lga_id'] )){echo $row_for_pu['lga_id'];}else{echo 0;}?></span>
                <span>lgi name:
                    <?php if(!empty($row_for_pu['lga_id'] )){echo $row_for_pu['lga_name'];}else{echo 'nill';}?>
                </span>

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
                                echo $row_pdp['party_score']; 
                            }else{
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
            <?php  
                                //   if(isset($row_pdp['party_score'])){
                                //     $total_pdp= $total_pdp + (int) $row_pdp['party_score'];    
                                //  }
                                //  if(isset($row_dpp['party_score'])){
                                //     $total_dpp= $total_dpp + (int) $row_dpp['party_score'];
            
                                //  }
                                //  if(isset($row_acn['party_score'])){
                                //     $total_acn= $total_acn + (int) $row_acn['party_score'];
            
                                //  }
                                //  if(isset($row_ppa['party_score'])){
                                //     $total_ppa= $total_ppa + (int) $row_ppa['party_score'];
            
                                //  }
                                //  if(isset($row_cdc['party_score'])){
                                //     $total_cdc= $total_cdc + (int) $row_cdc['party_score'];
            
                                //  }
                                //  if(isset($row_jp['party_score'])){
                                //     $total_jp= $total_jp + (int) $row_jp['party_score'];
            
                                //  }

                                //     if(isset($row_anpp['party_score'])){
                                //         $total_anpp= $total_anpp + (int) $row_anpp['party_score'];

                                //     }
                                //     if(isset($row_labo['party_score'])){
                                //         $total_labo= $total_labo + (int) $row_labo['party_score'];

                                //     }
                                //     if(isset($row_cpp['party_score'])){
                                //         $total_cpp= $total_cpp + (int) $row_cpp['party_score'];

                                //     }

                                    
                                    
                                    // 
                                    // echo 'this '. $total_pdp." ". $total_dpp." ".  $total_acn ." ".$total_ppa." ". $total_cdc ." ".$total_jp." ". $total_anpp." ".$total_labo." ".$total_cpp;                

                    }?>



        </div>




    </div>


    <?     // <!-- caluculate all -->
?>


</body>

</html>