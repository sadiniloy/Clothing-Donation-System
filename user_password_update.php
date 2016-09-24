<?php

session_start();


                               $pass=$_POST["password"];

                               $id=$_POST["id"];             
                               $_SESSION['id']=$id;
                               $_SESSION['password']=$pass;
                                 include 'user_password_update_process.php';
                                             



?>