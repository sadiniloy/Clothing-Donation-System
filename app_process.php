<?php
session_start();
    if(isset($_SESSION['varname']))
            {
                                              
                                              $sid = $_SESSION['varname'];
                                             // echo $sid;
                                             // echo '<a href="logout.php"><button>log out</button></a>';

            }
            else
            {
                echo "not logged in";
            }

    $db_connect = mysql_connect("localhost","root","") or die("unable to connect");

    mysql_select_db("cds",$db_connect) or die ("unable to select cds");

    $one=mysql_query("select * from users where id='$sid'")
        or die("failed to query from users".mysql_error());
        
        $rowone= mysql_fetch_array($one);
        $dis=$rowone['district'];
        //echo $dis.'</br>';

    $two=mysql_query("select * from users where district='$dis' and role='moderator'")
        or die("failed to query from users ".mysql_error());
        $rowtwo= mysql_fetch_array($two);
        $modid=$rowtwo['id'];
        //echo $modid;
    
    $shirt = $_POST["shirt"];
    $pant= $_POST["pant"];
    $jacket=$_POST["jacket"];
    $blanket=$_POST["blanket"];
    $appdate=$_POST["appdate"];
    $p="pending";
   
    //echo $firstname ."</br>".$lastname."</br>".$dob ."</br>".$gender."</br>".$houseaddress."</br>".$password."</br>".$Phone."</br>".$email;

    $query = "INSERT INTO inventory(shirt,pant,jacket,blanket,appdate,user_id,mod_id,status)
    VALUES($shirt,$pant,$jacket,$blanket,'$appdate',$sid,$modid,'$p')";
    if(mysql_query($query))
    {
        echo '<script type="text/javascript">alert("inserted!")</script>'.mysql_error();
        include "index.php";
    }
    else
    {
        echo '<script type="text/javascript">alert("try again")</script>'.mysql_error();;
       include "login.php";
    }


?>