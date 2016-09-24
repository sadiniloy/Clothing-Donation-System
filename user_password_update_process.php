<?php

//session_start();
if(isset($_SESSION['password']) && isset($_SESSION['id']) )
 {
                                              
                               $pass= $_SESSION['password'];
                               $id= $_SESSION['id'];
                              

                                            //echo $doneid;


                                          $db_connect = mysql_connect("localhost","root","") or die("unable to connect");

    mysql_select_db("cds",$db_connect) or die ("unable to select cds");



        $result="select * from users where id='$id' "
		or die("failed to query ".mysql_error());
	
if(mysql_query($result))
    {
        //$d="done";
        //echo $d;
       $updatestatus= "update users set pass='$pass' where id='$id' "
       or die("failed to query ".mysql_error());
            if(mysql_query($updatestatus))
            {
                echo '<script type="text/javascript">alert("updated!")</script>'.mysql_error();
                  session_destroy();
                  header("location: index.php");

            }
            else
            {
                echo '<script type="text/javascript">alert("try again!")</script>'.mysql_error();
        header("location: index.php");
            }
    	
        
    }
    else
    {
        echo '<script type="text/javascript">alert("try again!")</script>'.mysql_error();
        header("location: index.php");
    }
                                              
}

?>