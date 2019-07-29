<?php
// This class handles the users and login functionality
//test
namespace CMSCore;
session_start();
class User extends CMSObject {
    public $rights;
    public $firstName;
    public $lastName;
    
// Function Verifies Login from login.php and sets the $_SESSION['username']  acordingly
    public function login($userName, $password){
      
      $sql = "SELECT * FROM CUSTOMERS WHERE cus_username = '$userName' OR cus_email = '$userName'";
      
      $result = $this->readObject($sql);
      //echo print_r($result);
      
      // The password in the database needs to be a hashed string, plain text is not allowed.
      // echo $hash = password_hash("dev", PASSWORD_BCRYPT);
      // thislogin method is vunreable to SQL injection
      // investigate:http://piotrpasich.com/how-to-hack-the-form-sql-injection/
      // $stmt = $db->prepare(�update users set parameter = ? where id = ?�);<br>$stmt->bind_param(�si�,$name,$id);<br>$stmt->execute();
      
      
      
      if ($result['responseContent']->num_rows > 0){
         
          while ($row = $result['responseContent']->fetch_assoc()) {
            
                if(($userName == $row["cus_username"]  || $userName == $row["cus_email"]) && password_verify($password,$row["cus_pass"])){
              
              $_SESSION['valid'] = true;
              $_SESSION['timeout'] = time();
              $_SESSION['username'] = $userName;
              $_SESSION['status'] = 'good';
              echo 'You have entered valid user name and password';
              $response=TRUE;
              break;
              } else {
              $response=FALSE;
              }
             
        
        
        if ($response == FALSE) {
          //bad input
          echo "Username or password dont match our records";
          $_SESSION['status']='bad';
          //header("Location:"."../../templates/loginRegistration/index.php");
          exit();
        }
        
      }
      header("Location:"."../index.php");
      exit();
      } elseif ($result->num_rows == 0){
          //there are no such users in the database
          echo "Username or password dont match our records. No such user";
          $_SESSION['status']='bad';
          //header("Location:"."../../templates/loginRegistration/index.php");
          exit();
          
      } else {
          //There is another error
          echo $result['responseMessage'];
          echo "Ops. There is something wrong with the database!";
          $_SESSION['status']='error';
          //header("Location:"."../../templates/loginRegistration/index.php");
          exit();
      }
        

    }
    private function getFK_id(){
        
        $sql = "SELECT COUNT(*) FROM ACCOUNTS";
        $result = $this->readObject($sql);
        $row = $result['responseContent']->fetch_array(MYSQLI_NUM);
        print_r ($row[0]);
        return $row[0];
    }
    private function createAccount($number){
        
        $type = "ACCOUNTS";
        //$arguments = "'acc_no','balance'";
        $values = ++$number."','"."100";
        $result = $this->saveObject($type,$values);
        print_r($result);
    }

    public function createUser($cus_name,$cus_surname,$cus_email,$cus_password,$cus_username) {
        $cus_phone = "123 456 789";
        $password = password_hash($cus_password, PASSWORD_BCRYPT);
        
        $type = "CUSTOMERS";
        //$arguments = "'cus_name','cus_surname','cus_username','cus_pass','cus_email','FK_account_id'";
        
        $number = ($this->getFK_id());
        //echo print_r($number);
        
        $resultA = $this->createAccount($number);
        $FK_account_id = $number+1;
        
        //Customer id is always 0, the field is AutoIncremented.
        $values = '0'."','".$cus_name."','".$cus_surname."','".$cus_username."','".$password."','".$cus_phone."','".$cus_email."','".$FK_account_id;
        $result = $this->saveObject($type,$values);
        //print_r($result['responseMessage']);
        
        return $result['responseMessage'];
    }
    public function editUser() {

    }


}


?>
