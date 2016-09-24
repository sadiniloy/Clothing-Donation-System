<?php


    $db_connect = mysql_connect("localhost","root","") or die("unable to connect");
    mysql_select_db("cds",$db_connect) or die ("unable to select cds");
    
    $firstname = $_POST["FirstName"];
    $lastname= $_POST["LastName"];
    $houseaddress=$_POST["houseaddress"];
    $password=$_POST["password"];
    $Phone=$_POST["Phone"];
    $email=$_POST["email"]; 
    $check = mysql_query("select * from users")
        or die("failed to query ".mysql_error());
    while($row= mysql_fetch_array($check))
    {
        if($row['email']==$email)
            echo '<script type="text/javascript">alert("insert uniqe email address")</script>';


    }
    $dob=$_POST["DOB"];
    $district=$_POST["district"];
    if($_POST["Gender"] == "male") {
        $gender="male";
    } elseif($_POST["Gender"] == "female") {
         $gender="female";
    }
    if(isset($_POST['submit']))
    {
        $date = date('YmdHis');
        $filetmp = $_FILES["file_img"]["tmp_name"];
        //$filename = $_FILES["file_img"]["name"];
        //$filetype = $_FILES["file_img"]["type"];
        //echo $filename;
        //$info = pathinfo($filename);
        //$name = $filename['filename'];
        //$format = $filename['extension'];

        //$base = basename($_FILES["file_img"]["name"]);
        //$_FILES['basename']
        $base = pathinfo($_FILES["file_img"]["name"], PATHINFO_FILENAME);
        $ext = pathinfo($_FILES["file_img"]["name"], PATHINFO_EXTENSION);
        //echo $filename;
        //echo $ext;
        //echo $base;
        //$filename = end(explode(".", $filename));
        $filepath = "images/".$base."_".$date.".".$ext;
        //echo $filepath;

        
        //copy($filetmp,$filepath);
        move_uploaded_file($filetmp,$filepath);

    }
    $role="donor";
    //echo $firstname ."</br>".$lastname."</br>".$dob ."</br>".$gender."</br>".$houseaddress."</br>".$password."</br>".$Phone."</br>".$email;

    $query = "INSERT INTO users(first,last,dob,address,district,gender,phone,email,pass,role,imgpath)
    VALUES('$firstname','$lastname','$dob','$houseaddress','$district', '$gender','$Phone','$email','$password','$role','$filepath')";
    if(mysql_query($query))
    {
        echo '<script type="text/javascript">alert("Welcome!")</script>';
        include "index.php";
    }
    else
    {
        echo '<script type="text/javascript">alert("try again")</script>';
        include "login.php";
    }


?>