<?php

//session_start();
if( isset($_SESSION['id']) )
 {
                                              
                               
                               $id= $_SESSION['id'];
                               $first= $_SESSION['first'];
                               $last= $_SESSION['last'];
                               $email= $_SESSION['email'];
                               $phone= $_SESSION['phone'];
                               $dob= $_SESSION['dob'];
                               $address= $_SESSION['address'];
                               $district= $_SESSION['district'];
                               
                              

                                            //echo $doneid;


                                          $db_connect = mysql_connect("localhost","root","") or die("unable to connect");

    mysql_select_db("cds",$db_connect) or die ("unable to select cds");



        $result="select * from users where id='$id' "
		or die("failed to query ".mysql_error());
	
if(mysql_query($result))
    {
        //$d="done";
        //echo $d;
       $updatestatus= "update users set first='$first' , last='$last' , email='$email' , phone= '$phone' , dob= '$dob' , address='$address' , district='$district' where id='$id' "
       or die("failed to query ".mysql_error());
            if(mysql_query($updatestatus))
            {
                echo '<script type="text/javascript">alert("updated!")</script>'.mysql_error();
                header("location: user_profile.php");
                //session_destroy();
                //include 'index.php';


            }
            else
            {
                echo '<script type="text/javascript">alert("try again!")</script>'.mysql_error();
        include 'user_profile.php';
            }
    	
        
    }
    else
    {
        echo '<script type="text/javascript">alert("try again!")</script>'.mysql_error();
        include 'user_profile.php';
    }
                                              
}

?>