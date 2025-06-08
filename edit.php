<?php

include 'function.php';

$obj = new crud();
$id = $_GET['userID'];
$data = $obj->showDataById($id);

if (isset($_POST['update_btn'])) {
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
      <div class="col-lg-6 mx-auto border  shadow p-4 ">

        <?php

        if (isset($msg)) {
          echo $msg;
        }

        while ($user = mysqli_fetch_assoc($data)) {

          ?>

          <h4 class="text-center bg-dark text-light py-2  ">UPDATE INFO</h4>

          <div class="mb-3">
            CN Number: <input type="text" class="form-control" value="<?php echo $user['cn_number']; ?>"
              name="update_cn_number" />
          </div>
          <div class="mb-3">
            LOT Number: <input type="text" class="form-control" value="<?php echo $user['lot_number']; ?>"
              name="update_lot_number" />
          </div>
          <div class="mb-3">
            <p>
              Current selected Lot: <span class="bg-dark text-light px-3 rounded-2"> <?php echo $user['lot_selection']; ?>
              </span>
            </p>
            Update Lot :
            <select name="update_lot_selection" class="form-control">
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="B">B</option>
              <option value="GC">GC</option>
              <option value="GL">GL</option>
              <option value="GW">GW</option>
              <option value="GR">GR</option>
              <option value="GE">GE</option>
            </select>
          </div>
          <div class="mb-3">
            Remarks:
            <input class="form-control" value="<?php echo $user['remarks']; ?>" name="update_remarks">
          </div>

          <div class="mb-3">
            <button type="submit" name="update_btn" class="btn btn-dark">update data</button>
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