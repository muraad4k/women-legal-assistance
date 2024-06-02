<?php
include 'config.php';
if(isset($_POST['delete'])){
  deleteOne($_POST['id'],$_POST['table']);
}else if (isset($_POST['read'])){
  read($_POST['table']);
}
else if (isset($_POST['readpaid'])){
  readpaid($_POST['table']);
}
else if (isset($_POST['readpay'])){
  readpay();
}
else if (isset($_POST['ReadProblems'])){
  ReadProblems();
}
else if (isset($_POST['reportAll'])){
  readReport();
}

// get all data
function ReadProblems(){
  extract($_POST);
  $data=array();
  $array_data=array();
  session_start();
$name=$_SESSION['ADVOCATE'];
// $result = mysqli_query($conn,"SELECT * FROM `requests` WHERE advocate='$name';");

  $conn= new mysqli("localhost","root","","women_legal");
     $sql = "SELECT * FROM `requests` WHERE advocate='$name';";   
     $result = $conn->query($sql);
     if($result){
      $result = $conn->query($sql);
      if($result){
       while($row=$result->fetch_assoc()){
         $array_data []=$row;
       }
       $data=array("status"=>true,"data"=>$array_data);
 
      }}
      else{
       
       $data=array("status"=>false, "data"=>$conn->error);
      }
      echo json_encode($data); 
}
function readpaid(){
  extract($_POST);
  $data=array();
  $array_data=array();
  $conn= new mysqli("localhost","root","","women_legal");
     $sql = "SELECT * FROM `user_login` WHERE `status`='$fee' ";   
     $result = $conn->query($sql);
     if($result){
      $result = $conn->query($sql);
      if($result){
       while($row=$result->fetch_assoc()){
         $array_data []=$row;
       }
       $data=array("status"=>true,"data"=>$array_data);
 
      }}
      else{
       
       $data=array("status"=>false, "data"=>$conn->error);
      }
      echo json_encode($data); 
}
function readpay(){
  extract($_POST);
  // $FROM=date_format(new date($from), 'Y-m-d H:i:s');
  // $TO=date_format(new date($to), 'Y-m-d H:i:s');
  $FROM = date("Y-m-d", strtotime($from));
  $TO = date("Y-m-d", strtotime($to));
  // echo "New date format is: ". $FROM.$TO;
  $data=array();
  $array_data=array();
  $conn= new mysqli("localhost","root","","women_legal");
  if($table=='advocate'){
    $sql = "SELECT email,field_1 as name,field_7 as city,field_8 as mobile,field_9 as status,created_date as date from advocate WHERE   created_date BETWEEN '$FROM' AND '$TO' ";   
    $result = $conn->query($sql);
    if($result){
     $result = $conn->query($sql);
     if($result){
      while($row=$result->fetch_assoc()){
        $array_data []=$row;
      }
      $data=array("status"=>true,"data"=>$array_data);

     }}
     else{
      
      $data=array("status"=>false, "data"=>$conn->error);
     }
     echo json_encode($data); 
  }else{
    $sql = "SELECT * from user_login WHERE   created_date BETWEEN '$FROM' AND '$TO' ";   
    $result = $conn->query($sql);
    if($result){
     $result = $conn->query($sql);
     if($result){
      while($row=$result->fetch_assoc()){
        $array_data []=$row;
      }
      $data=array("status"=>true,"data"=>$array_data);

     }}
     else{
      
      $data=array("status"=>false, "data"=>$conn->error);
     }
     echo json_encode($data); 
  }
   
}
// function readAdvocate(){
//   extract($_POST);
//   // $FROM=date_format(new date($from), 'Y-m-d H:i:s');
//   // $TO=date_format(new date($to), 'Y-m-d H:i:s');
//   $FROM = date("Y-m-d", strtotime($from));
//   $TO = date("Y-m-d", strtotime($to));
//   // echo "New date format is: ". $FROM.$TO;
//   $data=array();
//   $array_data=array();
//   $conn= new mysqli("localhost","root","","women_legal");
//      $sql = "SELECT * from advocate";   
//      $result = $conn->query($sql);
//      if($result){
//       $result = $conn->query($sql);
//       if($result){
//        while($row=$result->fetch_assoc()){
//          $array_data []=$row;
//        }
//        $data=array("status"=>true,"data"=>$array_data);
 
//       }}
//       else{
       
//        $data=array("status"=>false, "data"=>$conn->error);
//       }
//       echo json_encode($data); 
// }
function readReport(){
  extract($_POST);
  $data=array();
  $array_data=array();
  if($table=='advocate'){
    $conn= new mysqli("localhost","root","","women_legal");
     $sql = "SELECT email,field_1 as name,field_7 as city,field_8 as mobile,field_9 as status,created_date as date from `advocate`;";
     $result = $conn->query($sql);
     if($result){
      while($row=$result->fetch_assoc()){
        $array_data []=$row;
      }
      $data=array("status"=>true,"data"=>$array_data);

     }
     else{
      
      $data=array("status"=>false, "data"=>$conn->error);
     }
     echo json_encode($data);   
  }
  else{
  $conn= new mysqli("localhost","root","","women_legal");
     $sql = "SELECT * from `user_login`;";
     $result = $conn->query($sql);
     if($result){
      while($row=$result->fetch_assoc()){
        $array_data []=$row;
      }
      $data=array("status"=>true,"data"=>$array_data);

     }
     else{
      
      $data=array("status"=>false, "data"=>$conn->error);
     }
     echo json_encode($data);   }
}




?>