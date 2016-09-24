<?php

session_start();


                               $searchid=$_POST["searchid"];              
                               $_SESSION['searchid']=$searchid;
                                            include 'delete.php';
                                             



?>