<?php
      include("db_con.php");
      
      if(isset($_POST['login']))
      {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        date_default_timezone_set("Asia/Manila"); 
        $timein = date('H:i:s');
        $datein = date('Y-m-d');
        
        $query = "SELECT * FROM t_user_accounts WHERE acc_username = '".$username."' and acc_password = '".$password."'";

        $result = mysqli_query($connection,$query) or die(mysqli_error());
        if (mysqli_num_rows($result) > 0)
        {
         while($row = mysqli_fetch_assoc($result))
           {
             $user_id = $row['acc_ID'];
             $UserName = $row['acc_username'];
             $userrole = $row['acc_user_role'];
             $status = $row['acc_active_flag'];
            // $email= $row['acc_email'];

           }
          if($status == "Active")
          {
             session_start();
             $_SESSION['Logged_In'] = $UserName;
             $_SESSION['UserRole'] = $userrole;
             $_SESSION['UserID'] = $user_id;
             //$_SESSION['email'] = $email;
            if($_SESSION['UserRole'] == "1")
            {
              $header ='Location:Web/admin/views/index.php';
              header($header);
            }
            else if($_SESSION['UserRole'] == "2")
            {
              
              $header ='Location:Web/MPDC/views/index.php';
              header($header);
            } 
            else if($_SESSION['UserRole'] == "3")
            {
              
              $header ='Location:Web/Zoning_Officer/views/index.php';
              header($header);
            } 
            else if($_SESSION['UserRole'] == "4")
            {
              
              $header ='Location:Web/Mapping_Expert/views/index.php';
              header($header);
            } 
            else if($_SESSION['UserRole'] == "5")
            {
              
              $header ='Location:Web/PDO/views/index.php';
              header($header);
            } 
            $ins_query = "INSERT INTO t_users_log (log_userID, log_usertype, log_datestamp, log_timestamp) 
                          VALUES('$user_id', '$userrole', '$datein', '$timein')";
            mysqli_query($connection,$ins_query);
          }
          else if($status == "Disabled") 
          {
            
            echo "<script type=\"text/javascript\">".
                     "alert
                     ('Your Account has been Disabled; Sorry, you cannot proceed to your account.');".
                    "</script>";
            echo "<script>setTimeout(\"location.href = 'login.php';\",0);</script>";
          }
       
      }
      else
      {
           
            echo "<script type=\"text/javascript\">".
                     "alert
                     ('Incorrect Username or Password!');".
                    "</script>";
            echo "<script>setTimeout(\"location.href = 'login.php';\",0);</script>";      
      }
     }
?>