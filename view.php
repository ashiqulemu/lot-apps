<?php



include 'function.php';

$obj = new crud();
$singleUser = $obj->showData();
// var_dump($singleUser)

if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
}


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOT - Apps</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet" >
</head>

<body>

    <section>

        <div class="container">


            <div class="row mx-0 my-5 text-uppercase border rounded shadow p-4">
                <div class="col-lg-12 d-flex justify-content-between">
                    <p class=" ">
                        <a class=" btn btn-sm btn-dark" href="index.php">Go back </a>
                    </p>
                    <p class=" ">
                        <a class=" btn btn-sm btn-dark" href="search.php">Search Specific Data </a>
                    </p>
                </div>
                <div class="col-lg-12 mx-auto" style="  overflow-x: auto;">

                    
                        <?php
                        if (isset($msg)) {
                            echo "
                            
                            <h4 class='text-center mb-4 alert alert-success'>$msg</h4>
                            
                            ";
                             
                        }

                        ?>
                    
                    <table class="table table-striped">
                        <tr class="bg-warning fw-bold">
                            <td>CN Number</td>
                            <td>Lot Number</td>
                            <td>Lot Selection</td>
                            <td width="260">Remarks</td>
                            <td>Current Date/Time</td>
                            <td>Action</td>
                        </tr>


                        <!-- loop strat  -->


                        <?php

                        
                            while ($user = mysqli_fetch_assoc($singleUser)) {

                                ?>
                                <tr>
                                    <td> <?php echo $user['cn_number']; ?> </td>
                                    <td> <?php echo $user['lot_number']; ?> </td>
                                    <td> <?php echo $user['lot_selection']; ?> </td>
                                    <td width="260"> <?php echo $user['remarks']; ?> </td>
                                    <td> <?php echo $user['Time']; ?> </td>

                                    <td class="d-flex gap-3">
                                        <a class="btn btn-sm btn-warning"
                                            href="edit.php?userID=<?php echo $user['id']; ?>">edit</a>
                                        <a class="btn btn-sm btn-danger" onclick="confirm('really want to delete!');"
                                            href="delete.php?userID=<?php echo $user['id']; ?>">delete</a>
                                    </td>
                                </tr>
                                <?php
                            }
                         



                        ?>


                        <!-- loop end -->



                    </table>

                </div>
            </div>
        </div>
    </section>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>

    <script>


        function addLots() {
            let maindiv = document.getElementById("main");

            let i = 0;

            maindiv.innerHTML += ` <div class="form-group mb-3  d-flex gap-3">
                                                <input type="text" placeholder="Lot Number" name="" class="form-control">
                                                <select name="lot-${i + 1}" id="" class="form-control">
                                                    <option value="">--select--</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="b">b</option>
                                                    <option value="GC">GC</option>
                                                </select>
                          </div>
                     `;


        }



    </script>


</body>

</html>