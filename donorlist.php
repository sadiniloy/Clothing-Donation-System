<?php



?>

<!DOCTYPE HTML>
<html >
  <head>
       
        <title>register</title>
        <link type="text/css" rel="stylesheet" href="css/style.css">
         <script src="plugins/jquery-1.10.2.js" type ="text/javascript"></script>
          <script src="plugins/dataTables/jquery.dataTables.js" type ="text/javascript"></script>
        <style type="text/css">
            
            #reg{
                padding:0px 0px 0px 0px;
            }

            table td{
                width:320px;
                padding:5px;
                border:1px solid;
                text-align:center;
                
            }
            
        </style>
         <script type ="text/javascript" charset="utf-8">

      
                $(document).ready(function() {
            $('#dataTables-example').dataTable( {
                "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]]
            } );
        } );
    </script>

  </head>    
  <body>
      <div id="wrapper">
      <header id="header">
      <div id="header_area">
        <div id="logo"><img src="files/icon/logo.png" alt="Logo"></div>
        <div id="session" align="right">
        <?php 
            
          if(!isset($_SESSION))
                           {
                                  session_start();

                                      if(isset($_SESSION['varname']))
                                      {
                                      $sid = $_SESSION['varname'];
                                      echo $sid;
                                      echo '<a href="logout.php"><button>log out</button></a>';

                                      }
                                      else
                                      {
                                        echo "not loggggged in";
                                      }
                            }
                            else
                            {
                if(isset($sid)) // if sid  has any value then it will enter inside else dont
                                  {
                                  //$sid = $_SESSION['varname'];
                                      echo $sid;
                                      echo '<a href="logout.php"><button>log out</button></a>';
                                  }
                                  else // 
                                  {   //session_start();
                                    $sid = $_SESSION['varname'];
                                      echo $sid;
                                      echo '<a href="logout.php"><button>log out</button></a>';
                                  }
                            }

          ?>
          </div>
                  
      </div>

      <div id="menu_area">
        <nav id="menu">
          <ul>
            <?php 
              if(isset($sid)) // if sid  has any value then it will enter inside else dont
                                 {
                                  echo '<li><a href="index.php"> Home </a></li>
                                  <li><a href="about_us.php"> About Us</a></li>
                                  <li><a href="contact_us.php"> Contact Us </a></li>
                                
                                  <li><a href="dashboard_for_mod.php"> Dashboard</a></li>';
                                  }
                                  else
                                  {
                                    echo '<li><a href="index.php"> Home </a></li>
            
                        <li><a href="login.php"> Already A Donor? </a></li>                             
                        <li><a href="about_us.php"> About Us</a></li>
                        <li><a href="register.php"> Become A Donor </a></li> 
                        <li><a href="contact_us.php"> Contact Us </a></li>';

                                  }

            ?>

                    </ul>
        </nav>
      </div>
    </header> 

    
     
    <div id="contents_area" >
          
            
         
                       
                    <h1>DONOR LIST!!!</h1>
                   <div id="reg">
                   <form name="myForm"    action="done.php" method="post" >
                    <table id="dataTables-example">

                    <thead>
                            <tr>
                              <th>Serial</th>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Appoinment Date</th>
                              <th>Shirt</th>
                              <th>Pant</th>
                              <th>jacket</th>
                              <th>blanket</th>
                              <th>Status</th>
                              
                            </tr>

                       </thead>
                       <tbody>
                    

                      

                      <?php 

                                                    //session_start();
                      $sid = $_SESSION['varname'];
                      mysql_connect("localhost","root","");
                      mysql_select_db("cds");

                      $one=mysql_query("select * from users where id='$sid'")
                              or die("failed to query from users".mysql_error());
                              
                              $rowone= mysql_fetch_array($one);
                              $modid=$rowone['id'];
                              $moddis=$rowone['district'];
                             echo "area : " .$moddis.'</br>';

                          $two=mysql_query("select * from users where district='$moddis' and role='donor'")
                              or die("failed to query from users ".mysql_error());
                              $count=1;

                      ?>


                      <?php
                             while($rowtwo= mysql_fetch_array($two))
                             {
                                $idone= $rowtwo['id'] ;    
                      ?>
     

     
                                           
                                           
       <?php 
              $three=mysql_query("select * from inventory where user_id='$idone' and mod_id='$modid' ")
           or die("failed to query from users ".mysql_error());
           
          while($rowthree= mysql_fetch_array($three))
          {
       ?>
                  
                

                  <tr>
                  
                  <td><?=$count ?></td>
                  <td ><input type="hidden" name="statusid" value="
                  <?=$rowtwo['id'];
                      //$_SESSION['statusid']=$rowthree['id'];
                      ?>"></td>
                  <td><?=$rowtwo['first']?>&nbsp<?=$rowtwo['last']?></td>
                  <td><?=$rowthree['appdate']?></td>
                  <td><?=$rowthree['shirt']?></td>
                  <td><?=$rowthree['pant']?></td>
                  <td><?=$rowthree['jacket']?></td>
                  <td><?=$rowthree['blanket']?></td>
                  <td>
                  <select name="statuschange">
                            <?php 
                                if($rowthree['status']=="pending")
                                {
                                  echo "<option value='pending' selected>pending</option>";
                                  echo "<option value='done' >done</option>";
                                 // $_SESSION['statuschange']=$rowthree['status'];
                                  //$_SESSION['statusid']=$rowthree['id'];

                                 
                                }
                                else
                                {
                                  echo "<option value='done' selected>done</option>";
                                  echo "<option value='pending' >pending</option>";
                                  //$_SESSION['statuschange']=$rowthree['status'];
                                 // $_SESSION['statusid']=$rowthree['id'];
                                }

                            ?>
                    </select >
                      </td>
                  </tr> 
              <?php
                    
                      $count++;
                      }

                        
                    }
              ?>
 </tbody>
       

     </table>
              


         
        
      
        
  




                      
                       
                       <input type="submit" name="done" value="done!!">
                       </form>
                   </div>
                </div>
                
                <footer id="footer">
                  &copy;All Rights are reserved 2016.
                </footer>    
               
                        
         
    </div>
  

  </body>
</html>
        
    
    
    
       
