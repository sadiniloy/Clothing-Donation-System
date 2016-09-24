<?php

session_start();
$sid = $_SESSION['varname'];
mysql_connect("localhost","root","");
mysql_select_db("cds");

$result=mysql_query("select * from users where id='$sid' ")
		or die("failed to query ".mysql_error());
	
$row= mysql_fetch_array($result);
if($row['id']==$sid  )
{ 
	
  $role=$row['role'];
}

else
echo "failed";
?>
<!DOCTYPE HTML>
<html >
	<head>
       
        <title>Basic Information</title>
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
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type ="text/javascript" charset="utf-8">

      
                $(document).ready(function() {
            $('#dataTables-example').dataTable( {
                "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]]
            } );
        } );
    </script>
        
    
   <link href="plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

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
		                                  	echo "not logged in";
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
                                  {
                                 echo "not logged in";
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

                                  if($role=='admin')
                                  {
                                    echo '<li><a href="index.php"> Home </a></li>
                                  <li><a href="about_us.php"> About Us</a></li>
                                  <li><a href="contact_us.php"> Contact Us </a></li>
                                  <li><a href="dashboard.php"> Dashboard</a></li>';

                                  }
                                  else

                                  echo '<li><a href="index.php"> Home </a></li>
                                  <li><a href="about_us.php"> About Us</a></li>
                                  <li><a href="contact_us.php"> Contact Us </a></li>
                                  
                                  <li><a href="user_profile.php"> User Profile </a></li>';
                                  }
                                  

						?>
                    </ul>
				</nav>
			</div>
		</header>	

		
     
		<div id="contents_area" >
        	
            
				
                    <h1>Basic Information</h1>
                   <div id="reg">
                   
                   <table id="dataTables-example">
                     <thead>
                                        <tr>
                                            <th>Serial No</th>
                                            <th>User Id</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>District</th>
                                            <th>Date Of Birth</th>
                                            <th>PhoneNo</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Role</th>
                                            <th>Image</th>
                                            
                                        </tr>
                                    </thead>
                      <tbody>
                            <?php

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
                                           <td><?=$rows['address']?></td>
                                           <td><?=$rows['district']?></td>
                                           <td><?=$rows['dob']?></td>
                                           <td><?=$rows['phone']?></td>
                                           <td><?=$rows['email']?></td>
                                           <td><?=$rows['gender']?></td>
                                           <td><?=$rows['role']?></td>


                                         

                                         <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#<?php echo $rows['id'];?>">Click Here</button></td>

                                          <!-- Modal -->
                                          <div class="modal fade" id="<?php echo $rows['id'];?>" role="di alog">
                                            <div class="modal-dialog">
                                            
                                              <!-- Modal content-->
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                  <h4 class="modal-title"><?php echo $rows['first']?>&nbsp<?=$rows['last']?></h4>
                                                </div>
                                                <div class="modal-body">
                                                  <?php echo '<img src="'.$rows['imgpath'].'" width="400" heigh="350"  >'; ?>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                              </div>
                                              
                                            </div>
                                          </div>

                                     
                                    
                                         


                                         </tr>   

                                    <?php

                                     
                                      $count++;
                                     }
                                    ?>                   
                                                        

                                                      
    


                                                 
                                                          
                                              
                          

                      </tbody>
                   </table>
                  
                   </div>
                </div>
                
               
                <footer id="footer">
                  &copy;All Rights are reserved 2016.
                </footer>                 
			   
		</div>	
	</div> 
   
  </body>
</html>
        
    
    
    
       
