<?php



include 'function.php';

$obj = new crud();
$singleUser = $obj->showData();
$countAllData = $obj->totalCount();

//  var_dump($countAllData );

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
    <link href="./css/bootstrap.min.css" rel="stylesheet">
      
    <style>
        body{
                background-image: linear-gradient(165deg, rgba(82, 39, 176, 0.9490196078) 23%, rgba(108, 3, 193, 0.968627451)), url(images/4863805.png);
        }
    </style>
</head>

<body>
    <section>
        <div class="container">
            <div class="row mx-0 my-5 text-uppercase border rounded shadow p-4 mb-5" style="background: #ffffff91;">
                <div class="col-lg-12 align-items-center d-flex justify-content-between mb-4">
                    <p class=" mb-0">
                        <a class=" btn btn-sm btn-dark" href="index.php">Go back </a>
                    </p>
                                        <div
                        class="rounded-pill px-3 py-1 d-flex align-items-center justify-content-center text-capitalize text-white bg-dark">
                        <?php
                        if (isset($countAllData)) {
                            foreach ($countAllData as $data) {
                                echo "total <span height='20px' width='20px' class='rounded-circle p-2 py-1 mx-2 bg-success'>" . $data . "</span> Items  ";
                            }
                        }
                        ?>
                    </div>
                    <p class=" mb-0">
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

                    <table class="table table-striped table-hover table-success">
                        <tr class="bg-warning fw-bold">
                            
                            <td>CN Number</td>
                            <td>Lot Number</td>
                            <td>Lot Location</td>
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
                                <td class="time"> <?php echo $user['Time']; ?> </td>

                                <td class="d-flex gap-3">
                                    <a title="Edit" class="btn btn-sm btn-warning d-flex align-items-center" href="edit.php?userID=<?php echo $user['id']; ?>">
                                        <iconify-icon icon="solar:pen-bold" width="24" height="24"></iconify-icon>
                                    </a>
                                    <a class="btn btn-sm btn-danger d-flex align-items-center"
                                    title="Delete" onclick="confirm('really want to delete!');"
                                        href="delete.php?userID=<?php echo $user['id']; ?>">
                                        <iconify-icon
                                            icon="mynaui:trash" width="24" height="24"></iconify-icon>
                                        </a>
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

    <script src="js/iconify-icon.min.js"></script>

    <script>
        let gettime = document.querySelectorAll(".time");

        gettime.forEach(element => {
            console.log(element.innerHTML = element.innerHTML.slice(0, 20))
        });

    </script>


</body>

</html>