

<!DOCTYPE HTML>
<html >
  <head>
       
        <title>register</title>
        <link type="text/css" rel="stylesheet" href="css/style.css">
         <script src="plugins/jquery-1.10.2.js" type ="text/javascript"></script>
          <script src="plugins/dataTables/jquery.dataTables.js" type ="text/javascript"></script>
        <style type="text/css">
            
            #reg{
                padding:0px 0px 0px 50px;
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

      <div id="menu_area">
        <nav id="menu">
          <ul>
            <?php 
              if(isset($sid)) // if sid  has any value then it will enter inside else dont
                                 {
                                  echo '<li><a href="index.php"> Home </a></li>
                                  <li><a href="about_us.php"> About Us</a></li>
                                  <li><a href="contact_us.php"> Contact Us </a></li>
                                  
                                  <li><a href="dashboard.php"> Dashboard </a></li>';
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


          
            
        
                    <h1>USERS LIST!!!</h1>
                   <div id="reg">
                   <form name="myForm"    action="useredit_process.php" method="post" >

                   <table id="dataTables-example">
                     <thead>
                                        <tr>
                                            <th>Serial No</th>
                                            <th>User Id</th>
                                            <th>Name</th>
                                            
                                            <th>District</th>
                                           
                                           
                                            <th>Role</th>
                                           
                                            
                                        </tr>
                                    </thead>
                      <tbody>
                            <?php

                                    mysql_connect("localhost","root","");
                                    mysql_select_db("cds");

                            $sql=mysql_query("select * from users where role <> 'admin' ")
                                                or die("failed to query from users".mysql_error());
                                                //$rowone= mysql_fetch_array($one);
                                               
                                                $count=1;
                                              while($rows = mysql_fetch_array($sql))
                                              {

                                  ?>
                                          
                                         <tr>
                                         <td><?=$count?></td>
                                           <td><?=$rows['id']?></td>
                                           <td><?=$rows['first']?>&nbsp<?=$rows['last']?></td>
                                           
                                           <td><?=$rows['district']?></td>
                                          
                                           <td><?=$rows['role']?></td>


                                         

                                     
                                    
                                         


                                         </tr>   

                                    <?php

                                     
                                      $count++;
                                     }
                                    ?>                   
                                                        

                                                      
    


                                                 
                                                          
                                              
                          

                      </tbody>
                   </table>
                       
                            
                              <input type="search" name="searchid">
                              <input type="submit" name="search" value="delete">
                                                        

                       
                       </form>
                   </div>
                </div>
                
               
                        
      
      <footer id="footer">
      &copy;All Rights are reserved 2016.
    </footer>   
    </div>
  
    
 
  </body>
</html>
        
    
    
    
       
