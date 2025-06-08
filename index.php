<?php



include 'function.php';

$obj = new crud();

if (isset($_POST['btn_submit'])) {
    $msg = $obj->addInfo();
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOT - Apps</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>

    <section>
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                        <h3 class="text-center mb-4">LOT REGISTRATION</h3>

                    <?php

                    if (isset($msg)) {
                        echo $msg; 
                    }

                    ?>


                    <form action="" method="post">
                        <div class="shadow border p-4 bg-dark rounded-4">
                            <div class="form-group mb-3 d-flex gap-1">
                                <input type="number" class="form-control" placeholder="CN-number" name="cn_number">
                                <!-- <button class="btn btn-sm btn-dark" onclick="addLots()">+</button> -->
                            </div>
                            <div class="form-group mb-3  d-flex gap-3">
                                <input type="text" placeholder="Lot Number" name="lot_number" class="form-control">
                                <select name="lot_selection" id="" class="form-control">
                                    <option value="">--select--</option>
                                    <option value="GC">GC</option>
                                    <option value="MC">MC</option>
                                    <option value="DC">DC</option>
                                </select>
                            </div>
                            <div class="form-group mb-3 d-flex gap-1">
                                <textarea name="remarks" class="form-control" placeholder="remarks" id=""></textarea>
                            </div>
                            <div class="form-group mb-3 text-uppercase d-flex gap-1 justify-content-between">
                                 <button type="submit" name="btn_submit" class="btn btn-sm btn-success text-uppercase  ">submit</button>
                                <a href="view.php" name="btn_submit" class="btn btn-sm btn-success ">view all data</a> 
                            </div>
                           
                        </div>
                    </form>
                     
                </div>
            </div>
        </div>
    </section>










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></>

                <script>






        </script>


</body>

</html>