        <?php


if(!isset($_SESSION))
{
session_start();
}
if (isset($_SESSION['varname']))
{
    unset($_SESSION['varname']);
     include("index.php");
}



?>