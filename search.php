<?php



    include 'function.php';

    $obj = new crud();


    if (isset($_POST['btn-search'])) {
        $alldata = $obj->searchData(); 
    }




?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOT - Apps</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <section>

        <div class="container">


            <div class="row mx-0 my-5 text-uppercase">
                <div class="col-lg-12 mx-auto">
                    <p class=" ">
                        <a class=" btn btn-sm btn-dark" href="index.php">Go back </a>
                    </p>
                    <h4>
                        <?php



                        ?>
                    </h4>
                    <form action="" method="post">
                        <div class="row justify-content-between d-flex">
                            <div>
                                <b> search By: </b> <input type="text" class="form-control mb-3"
                                placeholder="CN Number / Lot Number / Time / Lot selection" name="search_cn_number"> 
                            </div>
                            <button type="submit" name="btn-search" class="btn btn-success">submit</button>
                        </div>
                    </form>
<br>

                    <table class="table table-striped">
                        <tr class="bg-warning fw-bold">
                            <td>CN Number</td>
                            <td>Lot Number</td>
                            <td>Lot Selection</td>
                            <td>Remarks</td>
                            <td>Current Date/Time</td>
                            <td>Action</td>
                        </tr>


                        <!-- loop strat  -->


                        <?php

                        if (isset($alldata)) {
                            // if alldata exist, then apply loop 
                            while ($user = mysqli_fetch_assoc($alldata)) {

                                ?>
                                <tr>
                                    <td> <?php echo $user['cn_number']; ?> </td>
                                    <td> <?php echo $user['lot_number']; ?> </td>
                                    <td> <?php echo $user['lot_selection']; ?> </td>
                                    <td> <?php echo $user['remarks']; ?> </td>
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