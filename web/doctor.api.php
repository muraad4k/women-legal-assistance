<?php
include_once './conn.db.php';
// include './delivery_email.php';
// header ("Content-type: application/json");
$action = $_POST['action'];

class Doctors extends DatabaseConnection
{


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
           $sql = "SELECT * from $table where 'created_date'  BETWEEN '$FROM' AND '$TO' ";   
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
        public function readDoctorsHospital($conn)
        {
            $response=array();
            $data=array();
            $sql="SELECT hospitals.hospital_id as hos_id, doctors.dr_id as drID,
            hospitals.name as hosName, doctors.name as drName, doctors.mobile, doctors.profile_image, 
            proffision.name as pro_name, proffision.pro_id FROM doctors
                        INNER JOIN hospitals
                        ON doctors.hospital_id=hospitals.hospital_id
                        JOIN proffision
                        on doctors.profision_id=proffision.pro_id
                        WHERE doctors.verified='YES'";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                while ($rows = $result->fetch_assoc()) {
                    $data[] = $rows;
                }
                $response = array("status" => true, "data" => $data);
            }
        }
    }
        public function readSelectedDoctor($conn)
        {
            extract($_POST);
            $response=array();
            $data=array();
            $sql="SELECT hospitals.hospital_id as hos_id, doctors.dr_id as drID, doctors.description as drDescription,
            hospitals.name as hosName, doctors.name as drName, doctors.mobile, doctors.profile_image, 
            proffision.name as pro_name, proffision.pro_id FROM doctors
                        INNER JOIN hospitals
                        ON doctors.hospital_id=hospitals.hospital_id
                        JOIN proffision
                        on doctors.profision_id=proffision.pro_id
                        WHERE doctors.verified='YES' AND doctors.dr_id='$dr_id'";
            if(!$conn)
                $response=array("error"=>"error from database","status"=>false);
            else{
                $result=$conn->query($sql);
                if($result)
                    {
                        while($rows=$result->fetch_assoc()){
                            $data[]=$rows;
                        }
                        $response=array("status"=>true,"data"=>$data);
                    }   
                }    
            echo json_encode($response);
        }
        public function readScheduleSelectedDoctor($conn)
        {
            extract($_POST);
            $response=array();
            $data=array();
            $sql="SELECT schedules.sch_id,schedules.date,schedules.from_time,
schedules.to_time, schedules.available,schedules.duration,schedules.card_price, doctors.name as drName from schedules
JOIN doctors
ON schedules.dr_id=doctors.dr_id
WHERE doctors.verified='YES' AND schedules.available='yes' AND doctors.dr_id='$dr_id'";
            if(!$conn)
                $response=array("error"=>"error from database","status"=>false);
            else{
                $result=$conn->query($sql);
                if($result)
                    {
                        while($rows=$result->fetch_assoc()){
                            $data[]=$rows;
                        }
                        $response=array("status"=>true,"data"=>$data);
                    }   
                }    
            echo json_encode($response);
        }
        public function readpaid($conn)
        {
            extract($_POST);
            $res = array();
            $data = array();
            $sql = "SELECT * FROM `user_login` WHERE status='$fee'";
            if (!$conn)
                $res = array("error" => "there is an error");
            else {
                $result = $conn->query($sql);
                if ($result) {
                    while ($rows = $result->fetch_assoc()) {
                        $data[] = $rows;
                    }
                    $res = array("message" => "success", "data" => $data);
                } else {
                    $res = array("error" => "there is an error");
                }
            }
            echo json_encode($res);
        }
    // public function displayFeedback(){
    //     $response = array();
    //     $data = array();
    //     $sql = "select * from feedback";
    //     if (!$conn)
    //         $response = array("error" => "error from database", "status" => false);
    //     else {
    //         $result = $conn->query($sql);
    //         if ($result) {
    //             while ($rows = $result->fetch_assoc()) {
    //                 $data[] = $rows;
    //             }
    //             $response = array("status" => true, "data" => $data);
    //         }
    //     }
    //     echo json_encode($response);
    // }
    
    public function readDoctors($conn)
    {
        $response = array();
        $data = array();
        $sql = "select * from doctors";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                while ($rows = $result->fetch_assoc()) {
                    $data[] = $rows;
                }
                $response = array("status" => true, "data" => $data);
            }
        }
        echo json_encode($response);
    }
    public function ReadProblemsUser($conn)
    {
        $response = array();
        $data = array();
        session_start();
        $id =$_SESSION['email'];
        $sql = "SELECT problem.cus_id as caseId, problem.field_2 as caseType, user_login.email as userEmail,user_login.mobile as mobile,
        problem.field_3 as background, problem.field_4 as caseNumber,
        problem.field_5 as address, requests.advocate from requests
        join user_login
        ON requests.email=user_login.email
        join problem
        ON requests.cus_id=problem.cus_id
        WHERE user_login.email='$id'";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                while ($rows = $result->fetch_assoc()) {
                    $data[] = $rows;
                }
                $response = array("status" => true, "data" => $data);
            }
        }
        echo json_encode($response);
    }

    public function getAdvocates($conn)
    {
        extract($_POST);
        $response = array();
        $data = array();
        session_start();
        $id =$_SESSION['email'];
        $sql = "SELECT problem.cus_id as caseId,requests.advocate from requests
        join user_login
        ON requests.email=user_login.email
        join problem
        ON requests.cus_id=problem.cus_id
        WHERE problem.cus_id='$caseId' and requests.status in ('pending', 'accepted')";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                while ($rows = $result->fetch_assoc()) {
                    $data[] = $rows;
                }
                $response = array("status" => true, "data" => $data, "case"=> $caseId);
            }
        }
        echo json_encode($response);
    }
    public function deleteCase($conn)
    {
        extract($_POST);
        $response = array();
        $data = array();
        session_start();
        $id =$_SESSION['email'];
        $sql = "CALL deletAdvocate('$caseId')";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
            
                $response = array("status" => true, "message" => "successfully removed", "case"=> $caseId);
            }
        }
        echo json_encode($response);
    }
    public function updateCaseFromAdvocate($conn)
    {
        extract($_POST);
        $response = array();
        $data = array();
        session_start();
        $name=$_SESSION['ADVOCATE'];
        $sql = "CALL updateCaseStatus('$caseId','$name');";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
            
                $response = array("status" => true, "message" => "successfully accepted", "case"=> $caseId);
            }
        }
        echo json_encode($response);
    }
    public function updateCaseFromAdvocatedeny($conn)
    {
        extract($_POST);
        $response = array();
        $data = array();
        session_start();
        $name=$_SESSION['ADVOCATE'];
        $sql = "UPDATE requests SET requests.status='rejected' WHERE requests.cus_id='$caseId' and requests.advocate='$name';";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
            
                $response = array("status" => true, "message" => "successfully accepted", "case"=> $caseId);
            }
        }
        echo json_encode($response);
    }
    public function finish($conn)
    {
        extract($_POST);
        $response = array();
        $data = array();
        session_start();
        $name=$_SESSION['ADVOCATE'];
        $sql = "UPDATE requests SET requests.status='Finished' WHERE requests.cus_id='$caseId' and requests.advocate='$name';";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
            
                $response = array("status" => true, "message" => "successfully accepted", "case"=> $caseId);
            }
        }
        echo json_encode($response);
    }
    
    
    function readCases(){
        extract($_POST);
        $data=array();
        $array_data=array();
        session_start();
      $name=$_SESSION['ADVOCATE'];
      // $result = mysqli_query($conn,"SELECT * FROM `requests` WHERE advocate='$name';");
      
        $conn= new mysqli("localhost","root","","women_legal");
           $sql = "SELECT 
           requests.id,
               requests.advocate as 'advocate',
               requests.name as 'user',
               requests.status,
               problem.field_2 as 'caseType'
           FROM  requests
           JOIN 
               problem  ON requests.id = problem.cus_id
           
           ";   
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
    public function displayFeedback($conn)
    {
        $response = array();
        $data = array();
        $sql = "select feedback.created_date as rateAt, feedback.cus_id, advocate.field_1 as Advocate,feedback.field_1 as user, feedback.field_2 as feedback,
        feedback.rating from feedback join advocate on feedback.email=advocate.email";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                while ($rows = $result->fetch_assoc()) {
                    $data[] = $rows;
                }
                $response = array("status" => true, "data" => $data);
            }
        }
        echo json_encode($response);
    }
    public function viewPdf($conn)
    {
        extract($_POST);
        $response = array();
        $filePath = "./uploads/". $file;
        $fileContent = file_get_contents($filePath);
        echo $fileContent;
        // header("Content-Type: application/pdf");
        // header('Content-Disposition: inline; filename="' . basename($filePath) . '"');
        // readfile($filePath);

    }
    public function deleteDoctor($conn)
    {
        extract($_POST);
        $response = array();
        $sql = "DELETE FROM doctors WHERE dr_id=$id";
        if (!$conn) {
            $response = array("error" => "there is an error connection", "status" => false);
        } else {
            $result = $conn->query($sql);
            if ($result) {
                $response = array("message" => "Doctor successfully deleted", "status" => true);
            } else {
                $response = array("error" => "there is an error connection", "status" => false);
            }
        }
        echo json_encode($response);

    }

    public function createUser($conn)
    {
        extract($_POST);
        $response = array();
      
        $fileName1 = $_FILES['passport']['name'];
        // $ext = explode(".", $fileName)[1];
        $ext1 = pathinfo($fileName1, PATHINFO_EXTENSION);
        $temp1 = $_FILES['passport']['tmp_name'];
        // echo $ext;
        $newName1 = rand().".".$ext1 ;
        $uploadedPath1 = "./uploads/" . $newName1;



        $fileName = $_FILES['profile_image']['name'];
        // $ext = explode(".", $fileName)[1];
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $temp = $_FILES['profile_image']['tmp_name'];
        // echo $ext;
        $newName = rand().".".$ext ;
        $uploadedPath = "./uploads/" . $newName;
        // echo $newName;
        if (move_uploaded_file($temp, $uploadedPath)) {
            $sql = "INSERT INTO `user_login`( `name`, `email`, `password`, `mobile`, `field_1`, `field_2`,`image`,`passport`) VALUES ('$username','$email','$password','$mobile','$city','$address','$newName','$newName1')";
            if (!$conn) {
                $response = array("error" => "there is an error connection", "status" => false);
            } else {
                $result = $conn->query($sql);
                if ($result) {
                    $response = array("message" => "profile successfully created...", "status" => true);
                } else {
                    $response = array("error" => " error connection", "Status" => false);
                }
            }
        }




        echo json_encode($response);
    }

    private function registerProblem($conn): bool{
        extract($_POST);
        $sql = "INSERT INTO `problem`(`field_1`, `field_2`, `field_3`, `field_4`, `field_5`, `field_6`) VALUES ('$name','$case','$problem','$cnumber','$address','$mobile')";
        if (!$conn) {
           return false;
        } else {
            $result = $conn->query($sql);
            if ($result) {
               return true;
            } else {
                return false;
            }
        }
    }

    private function getLastInsertID($conn){
        extract($_POST);
        $sql = "SELECT cus_id from  `problem` ORDER BY cus_id DESC LIMIT 1";
        if (!$conn) {
           return false;
        } else {
            $result = $conn->query($sql);
           

             
            if ($result) {
                $ROW =$result->fetch_assoc();
               return $ROW['cus_id'];
            } else {
                return 0;
            }
        }
    }
     public function createProblem($conn)
    {
        extract($_POST);
        $response = array();
        $err = array();
        $actualValue =explode(",",$advocate);
    
       $problem = Doctors::registerProblem(Doctors::getConnection());
        $lastID = Doctors::getLastInsertID(Doctors::getConnection());

        foreach ($actualValue as $key => $value) {
            $sql = "INSERT INTO `requests`(cus_id,advocate,email,name) VALUES ('$lastID','$value','$email','$name');";
            $result = $conn->query($sql);
            if (!$conn) {
                $err[] = array("error" => " error connection in the dtabase", "Status" => false);
            }
            else{
                if ($result) {
                    $response[] = array("message" => "profile successfully created...", "status" => true);
                } else {
                    $err[] = array("error" => $conn->error, "Status" => false);
                }
            }
           
           
        }
        
        

      
        // if (move_uploaded_file($temp, $uploadedPath)) {
        //     $sql = "INSERT INTO `problem`(`field_1`, `field_2`, `field_3`, `field_4`, `field_5`, `field_6`) VALUES ('$name','$case','$problem','$cnumber','$address','$mobile')";
        //     if (!$conn) {
        //         $response = array("error" => "there is an error connection", "status" => false);
        //     } else {
        //         $result = $conn->query($sql);
        //         if ($result) {
        //             $response = array("message" => "profile successfully created...", "status" => true);
        //         } else {
        //             $response = array("error" => " error connection", "Status" => false);
        //         }
        //     }
        // }



        $data =[
            "success"=> $advocate,
            "error"=> $err
        ];
        echo json_encode($data);
    }

    function ReadProblems(){
        extract($_POST);
        $data=array();
        $array_data=array();
        session_start();
      $name=$_SESSION['ADVOCATE'];
      // $result = mysqli_query($conn,"SELECT * FROM `requests` WHERE advocate='$name';");
      
        $conn= new mysqli("localhost","root","","women_legal");
           $sql = "SELECT * FROM `requests` join problem on requests.cus_id=problem.cus_id WHERE advocate='$name'
                   and status in ('pending','accepted','Finished');";   
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
    public function createProfile($conn)
    {
        extract($_POST);
        $response = array();
      

        $fileName = $_FILES['passport']['name'];
        $ext = explode(".", $fileName)[1];
        $temp = $_FILES['passport']['tmp_name'];
        $newName = rand() . "." . $ext;
        $uploadedPath = "./uploads/" . $newName;


       

        // $fileName = $_FILES['profile_image']['name'];
        // // $ext = explode(".", $fileName)[1];
        // $ext = explode(".", $fileName)[1];
        // $temp = $_FILES['profile_image']['tmp_name'];
        // // echo $ext;
        // $newName = rand().".".$ext ;
        // $uploadedPath = "./uploads/" . $newName;
        if (move_uploaded_file($temp, $uploadedPath)) {
            $sql = "INSERT INTO `advocate`(`email`, `field_1`, `field_2`, `field_3`, `field_4`, `field_5`, `field_6`, `field_7`, `field_8`,`field_13`)
            VALUES(	'$email','$name','$field_2', 
                    '$field_3', '$field_4', '$field_5','$field_6',
                    '$field_7','$mobile','$newName')";
            if (!$conn) {
                $response = array("error" => "there is an error connection", "status" => false);
            } else {
                $result = $conn->query($sql);
                if ($result) {
                    $response = array("message" => "profile successfully created...", "status" => true);
                } else {
                    $response = array("error" => " error connection", "Status" => false);
                }
            }
        }




        echo json_encode($response);
    }
    public function registerDoctor($conn)
    {
        extract($_POST);
        $response = array();

        if ($hasProfile == "true") {
            $fileName = $_FILES['profile_image']['name'];
            $ext = explode(".", $fileName)[1];
            $temp = $_FILES['profile_image']['tmp_name'];
            $newName = rand() . "." . $ext;
            $uploadedPath = "../uploads/" . $newName;
            if (move_uploaded_file($temp, $uploadedPath)) {
                $sql = "INSERT INTO `doctors` (`name`, `gender`, `mobile`, `address`, `email`, `password`, `profision_id`, `hospital_id`, `description`, `profile_image`) VALUES ('$name', '$gender', '$mobile', '$address', '$email', '$password', '$proffision_id', '$hospital_id', '$description', '$newName')";
                if (!$conn) {
                    $response = array("error" => "there is an error connection", "status" => false);
                } else {
                    $result = $conn->query($sql);
                    if ($result) {
                        $response = array("message" => "Doctor successfully created...", "status" => true);
                    } else {
                        $response = array("error" => " error connection", "Status" => false);
                    }
                }
            } else
                $response = array("error" => "there is an error during uploading", "status" => false);

        } else {
            $sql = "INSERT INTO `doctors` (`name`, `gender`, `mobile`, `address`, `email`, `password`, `profision_id`, `hospital_id`, `description`, `profile_image`) VALUES ('$name', '$gender', '$mobile', '$address', '$email', '$password', '$proffision_id', '$hospital_id', '$description', 'no image')";
            if (!$conn) {
                $response = array("error" => "there is an error connection", "status" => false);
            } else {
                $result = $conn->query($sql);
                if ($result) {
                    $response = array("message" => "Doctor successfully created...", "status" => true);
                } else {
                    $response = array("error" => " error connection", "Status" => false);
                }
            }
        }
        echo json_encode($response);
    }

    public function createFeedback($conn)
    {
        extract($_POST);
        $response = array();    

        
            $sql = "INSERT INTO feedback(email, field_1, field_2,rating)
            VALUES(	'$email','$name', '$feedback','$rating')";
            if (!$conn) {
                $response = array("error" => "there is an error connection", "status" => false);
            } else {
                $result = $conn->query($sql);
                if ($result) {
                    $response = array("message" => "Doctor successfully created...", "status" => true);
                } else {
                    $response = array("error" => " error connection", "Status" => false);
                }
            }
        
        echo json_encode($response);
    }


    public function updateDoctor($conn)
    {
        extract($_POST);
        $response = array();
        // UPDATE `doctors` SET `dr_id`='[value-1]',`name`='[value-2]',`gender`='[value-3]',`mobile`='[value-4]',`address`='[value-5]',`email`='[value-6]',`password`='[value-7]',`profision_id`='[value-8]',`hospital_id`='[value-9]',`verified`='[value-10]',`description`='[value-11]',`profile_image`='[value-12]' WHERE 1
        if ($hasProfile == "true") {
            $fileName = $_FILES['profile_image']['name'];
            $ext = explode(".", $fileName)[1];
            $temp = $_FILES['profile_image']['tmp_name'];
            $newName = rand() . "." . $ext;
            $uploadedPath = "../uploads/" . $newName;
            if (move_uploaded_file($temp, $uploadedPath)) {
                $sql = "UPDATE `doctors` SET `name`='$name',`gender`='$gender',`mobile`='$mobile',`address`='$address',`email`='$email',`password`='$password',`profision_id`='$proffision_id',`hospital_id`='$hospital_id',`description`='$description',`profile_image`='$newName' WHERE dr_id='$id'";
                if (!$conn) {
                    $response = array("error" => "there is an error connection", "status" => false);
                } else {
                    $result = $conn->query($sql);
                    if ($result) {
                        $response = array("message" => "Doctor was updated", "status" => true);
                    } else {
                        $response = array("error" => "there is an error connection", "status" => false);
                    }
                }
            }

        } else {
            $sql = "UPDATE `doctors` SET `name`='$name',`gender`='$gender',`mobile`='$mobile',`address`='$address',`email`='$email',`password`='$password',`profision_id`='$profision_id',`hospital_id`='$hospital_id',`description`='$description' WHERE dr_id='$id'";
            if (!$conn) {
                $response = array("error" => "there is an error connection", "status" => false);
            } else {
                $result = $conn->query($sql);
                if ($result) {
                    $response = array("message" => "Doctor was updated", "status" => true);
                } else {
                    $response = array("error" => "there is an error connection", "status" => false);
                }
            }
        }


        echo json_encode($response);
    }
    public function updateStatus($conn)
    {
        extract($_POST);
        $response = array();
        // UPDATE `doctors` SET `dr_id`='[value-1]',`name`='[value-2]',`gender`='[value-3]',`mobile`='[value-4]',`address`='[value-5]',`email`='[value-6]',`password`='[value-7]',`profision_id`='[value-8]',`hospital_id`='[value-9]',`verified`='[value-10]',`description`='[value-11]',`profile_image`='[value-12]' WHERE 1
   
            $sql = "UPDATE `user_login` SET `status`='$status' WHERE `user_id`='$id'";
            if (!$conn) {
                $response = array("error" => "there is an error connection", "status" => false);
            } else {
                $result = $conn->query($sql);
                if ($result) {
                    $response = array("message" => "Doctor was updated", "status" => true);
                } else {
                    $response = array("error" => "there is an error connection", "status" => false);
                }
            }
        


        echo json_encode($response);
    }
    public function unverifyDoctor($conn)
    {
        extract($_POST);
        $response = array();
        $sql = "UPDATE `doctors` SET `verified`='$unverify' WHERE dr_id='$id'";
        if (!$conn) {
            $response = array("error" => "there is an error connection", "status" => false);
        } else {
            $result = $conn->query($sql);
            if ($result) {
                $response = array("message" => "Doctor is unverified know", "status" => true);
            } else {
                $response = array("error" => "there is an error connection", "status" => false);
            }
        }
        echo json_encode($response);
    }
    public function verifyDoctor($conn)
    {
        extract($_POST);
        $response = array();
        $sql = "UPDATE `doctors` SET `verified`='$verify' WHERE dr_id='$id'";
        if (!$conn) {
            $response = array("error" => "there is an error connection", "status" => false);
        } else {
            $result = $conn->query($sql);
            if ($result) {
                $response = array("message" => "Doctor is verified know ✔", "status" => true);
                $sendEmailMessage="SELECT name,email from doctors where dr_id='$id';";
                $resultRow=$conn->query($sendEmailMessage);
                if($resultRow){
                   
                    $row=$resultRow->fetch_assoc(); 
                    // echo $row['name'].$row['email'];
                    $mail= new Mail();
                    $mail->setFullName($row['name']);
                    $mail->setReceiverEmail($row['email']);
                    $mail->setMessageContent("<h2> Congrats! ".$row['name']. "</h2> <p style='line-height: 1.7'>you verified from doctor apointment system, your account has been verified and now you are one of the doctors of <strong>doctor apointment</strong> system
                    of  titanic tech group. you can use this site and you can know make schedule and apointment for the petients. <strong>Welcome Again</strong></p> <a href='http://localhost:5173/login' style='text-decoration: none; padding: 10px; font-size: 16px; background: #6c3fff; color: white;'>Login Here!</a>. ");
                    $mail->sendEmail();
                    $response = array("message"=> "email is sent bye $row[email] ","status"=> true);
                }
                

            } else {
                $response = array("error" => "there is an error connection", "status" => false);
            }
        }
        echo json_encode($response);
    }



    public function fetchingOne($conn)
    {
        extract($_POST);
        $res = array();
        $data = array();
        $sql = "SELECT *from doctors where 
            dr_id='$id'";
        if (!$conn)
            $res = array("error" => "there is an error");
        else {
            $result = $conn->query($sql);
            if ($result) {
                while ($rows = $result->fetch_assoc()) {
                    $data[] = $rows;
                }
                $res = array("message" => "success", "data" => $data);
            } else {
                $res = array("error" => "there is an error");
            }
        }
        echo json_encode($res);
    }



}
$doctors = new Doctors;

if ($action) {
    $doctors->$action(Doctors::getConnection());
} else
    echo "action is required";













?>