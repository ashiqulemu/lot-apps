<?php


date_default_timezone_set("Asia/Dhaka");
 

class crud
{
  private $conn;
  public function __construct()
  {
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'lot_management';

    $this->conn = mysqli_connect($host, $user, $pass, $db);

    if (!$this->conn) {
      die('connection not stablished');
    }


  }

  public function addInfo()
  {
    $cn_number = $_POST['cn_number'];
    $lot_number = $_POST['lot_number'];
    $lot_selection = $_POST['lot_selection'];
    $remarks = $_POST['remarks']; 

    if (empty($cn_number)) {
      return "<p class='text-danger alert alert-danger'> must be fillup all the fields! otherwise you cant submit any data! </p>";
    } else if (empty($lot_number)) {
      return "<p class='text-danger alert alert-danger'> must be fillup all the fields! otherwise you cant submit any data! </p>";
    } else if (empty($lot_selection)) {
      return "<p class='text-danger alert alert-danger'> must be fillup all the fields! otherwise you cant submit any data! </p>";
    } else if (empty($remarks)) {
      return "<p class='text-danger alert alert-danger'> must be fillup all the fields! otherwise you cant submit any data! </p>";
    } else {

      $query = "insert into infos(cn_number,lot_number,lot_selection,remarks,time)
      values('$cn_number','$lot_number','$lot_selection','$remarks',NOW())";
             mysqli_query($this->conn, "SET time_zone = '+06:00'"); // for time zone fix
      $res = mysqli_query($this->conn, $query);
      

      if ($res) {
        return "<h6 class='text-center text-success mb-2 text-capitalize alert alert-success mb-0 '>your data has been successfully inserted!</h6> ";
      } else {
        return 'failed';
      }

    }
  }

  public function showData()
  {
    $query = "select * from infos ORDER BY Time DESC";
    return $res = mysqli_query($this->conn, $query);

  }

  public function totalCount(){
     $query  = "SELECT COUNT(*) AS total_rows FROM infos";
     $res = mysqli_query($this->conn, $query);
    return mysqli_fetch_assoc($res);
  }

  public function showDataById($id)
  {
    $query = "select * from infos where id='$id'";

    return mysqli_query($this->conn, $query);
  }


  public function update($id)
  {

    $cn_number = $_POST['update_cn_number'];
    $lot_number = $_POST['update_lot_number'];
    $lot_selection = $_POST['update_lot_selection'];
    $remarks = $_POST['update_remarks']; 

    $query = "UPDATE infos SET cn_number = '$cn_number', lot_number = '$lot_number', lot_selection = '$lot_selection',  remarks = '$remarks', Time = NOW()  WHERE id='$id';";


    $res = mysqli_query($this->conn, $query);

    if ($res) {

       header("Location:view.php?msg=data updated successfully");
     
    }

  }

    public function searchData(){

      $search_cn_number = $_POST['search_cn_number'];
      
      // $query = "select DISTINCT * from infos where 
      //   cn_number='$search_cn_number'"; 
      
      $query = "select DISTINCT * from infos where 
        cn_number LIKE '%$search_cn_number%'"; 

      $res = mysqli_query($this->conn, $query); 
      if($res){
        return $res ; 
      }  

    } 

    public function searchDataCount(){ 
      $search_cn_number = $_POST['search_cn_number'];
      $query = "select distinct count(*) from infos where cn_number = $search_cn_number" ; 

      $res = mysqli_query($this->conn, $query); 
      if($res){
        return $res; 
      }  

    }

  public function destroy($id)
  {
    $query = "DELETE FROM infos WHERE id='$id'";
    $res = mysqli_query($this->conn, $query);
    if ($res) {
      header('Location:view.php');

    }
  }



  // admin

  public function register_admin()
  {
    $name = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //  var_dump($name);

    $query = "insert into admin(name,phone,email,password)
     value('$name','$phone','$email','$password')";

    $res = mysqli_query($this->conn, $query);

    if ($res) {
      return "<p class='text-success text-center'>User Registered!</p>";
    } else {
      return 'failed';
    }

  }

  public function admin_login()
  {

    $email = $_POST['email'];
    $pass = $_POST['password'];

    $query = "select * from admin where email='$email' && password='$pass'";

    $result = mysqli_query($this->conn, $query);

    $t = mysqli_fetch_assoc($result);

     if($t){
      session_start();
      $_SESSION['email']= $t['email'];
      $_SESSION['password']=  $t['password'];
      header('location:dashboard.php');
     }else{
       return 'your info is false';
     }

   
   

  }



}




?>