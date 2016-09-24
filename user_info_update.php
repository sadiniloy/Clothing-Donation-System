<?php

session_start();


                               $_SESSION['id']=$_POST["id"];
                               $_SESSION['first']=$_POST["first"];
                               $_SESSION['last']=$_POST["last"];
                               $_SESSION['email']=$_POST["email"];
                               $_SESSION['phone']=$_POST["phone"];
                               $_SESSION['dob']=$_POST["dob"];
                               $_SESSION['address']=$_POST["address"];
                               $_SESSION['district']=$_POST["district"];

                               
                                 include 'user_info_update_process.php';
                                             



?>