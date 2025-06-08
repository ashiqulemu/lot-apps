<?php

include 'function.php';

$obj = new crud();
$id = $_GET['userID'];
$data = $obj->showDataById($id); 

   if(isset($_POST['update_btn'])){
    $msg = $obj->update($id);
   }

?>










<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>crud</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>


  <div class="row mx-0 my-5 text-uppercase">


    <form action="" method="post" enctype="multipart/form-data">
      <div class="col-lg-6 mx-auto">
     
        <?php

        if(isset($msg)){
          echo $msg;
        }

        while ($user = mysqli_fetch_assoc($data)) {

          ?>

          <div class="mb-3">
            CN Number: <input type="text" class="form-control" value="<?php echo $user['cn_number']; ?>" name="update_cn_number" /> <br>
          </div>
          <div class="mb-3">
            LOT Number: <input type="text" class="form-control" value="<?php echo $user['lot_number']; ?>" name="update_lot_number" /> <br>
          </div>



          <div class="mb-3">
            

            Current Lot: <span> <?php echo $user['lot_selection']; ?> </span>
             <select name="update_lot_selection">
              <option value="GC">GC</option>
              <option value="MC">MC</option>
              <option value="DC">DC</option>
            </select>
          </div>
          <div class="mb-3">
            Remarks: <input type="text" class="form-control" value="<?php echo $user['remarks']; ?>" name="update_remarks" /> <br>
          </div>
         
          <div class="mb-3">
            <button type="submit" name="update_btn">update data</button>
          </div>


          <?php

        }

        ?>
      </div>
    </form>

  </div>
  </div>


</body>

</html>