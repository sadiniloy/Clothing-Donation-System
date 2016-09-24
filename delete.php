<?php

if(isset($_SESSION['searchid']))
 {
                                              
                               $searchid= $_SESSION['searchid'];
                                            //echo $searchid;


    $db_connect = mysql_connect("localhost","root","") or die("unable to connect");

    mysql_select_db("cds",$db_connect) or die ("unable to select cds");


//$result="delete from users where id='$searchid'";
    $result="delete from users where id='$searchid' "
        or die("failed to query ".mysql_error());
        /*$result=mysql_query("delete from users where id='$searchid'")
		or die("failed to query ".mysql_error());*/
	
if(mysql_query($result))
    {
        echo '<script type="text/javascript">alert("deleted!")</script>'.mysql_error();
       include "useredit.php";

    	
        
    }
    else
    {
        echo '<script type="text/javascript">alert("try again")</script>'.mysql_error();
        include "useredit.php";
    }
                                              
}

?>