<?php


                                              
                               //$doneid= $_SESSION['doneid'];
                               //$status=$_SESSION['statuschange'];
                               //$statusid=$_SESSION['statusid'];
                                $statuschange=$_POST["statuschange"];
                               $statusid=$_POST["statusid"];
                                           //echo $statusid;
                                            //echo $statuschange;


                                          $db_connect = mysql_connect("localhost","root","") or die("unable to connect");

    mysql_select_db("cds",$db_connect) or die ("unable to select cds");



        $result="select * from inventory where user_id='$statusid' "
		or die("failed to query ".mysql_error());
	
if(mysql_query($result))
    {
        //$d="done";
        //echo $d;
       $updatestatus= "update inventory set status='$statuschange' where user_id='$statusid' "
       or die("failed to query ".mysql_error());
            if(mysql_query($updatestatus))
            {
                echo '<script type="text/javascript">alert("updated!")</script>'.mysql_error();
       include "donorlist.php";
            }
            else
            {
                echo '<script type="text/javascript">alert("try1 again!")</script>'.mysql_errno();
        include "donorlist.php";
            }
    	
        
    }
    else
    {
        echo '<script type="text/javascript">alert("try2 again!")</script>'.mysql_error();
        include "donorlist.php";
    }
                                              


?>