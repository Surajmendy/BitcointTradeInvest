<?php
session_start();
require_once "includes/dbconfig.php";
include_once "includes/functions.php";
if(!isset($_SESSION['username'])){
    redirect_to("user_login.php");
}


?>





    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>USER DASHBOARD</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
 <link rel="shortcut icon" type="image/x-icon" href="images/fav.png">
        <link href="css/sb-admin.css" rel="stylesheet">

        <link href="css/mystyle.css" rel="stylesheet" type="text/css">
        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        
        
    <![endif]-->


        <script type="text/javascript">
            <!--
            function getConfirmation() {
                var retVal = confirm("Do you want to continue ?");
                if (retVal == true) {
                    document.write("User wants to continue!");
                    return true;
                } else {
                    document.write("User does not want to continue!");
                    return false;
                }
            }
            //-->

        </script>

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                   <div style="background-color: #a73b39;" class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                    <a class="navbar-brand" href="index.php">BITCOIN TRADE INVEST</a>
                </div>
                <!-- Top Menu Items -->
                <ul style="background-color: #c58b27;" class="nav navbar-right top-nav">


                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php  echo $_SESSION['username']  ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="user_profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                            </li>
                          
                            
                            <li class="divider"></li>
                            <li>
                                <a href="user_logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul id="suraj-left-nav" class="nav navbar-nav side-nav">
                         <li style="background-color: #a94442;">
                            <a href="user_dashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li style="    background-color: #3c763d;">


                            <a href="user_profile.php"><i class="fa fa-fw fa-user"></i> My Profile</a>



                        </li>




                       
                        <li style="background-color:#801a79;">
                            <a href="user_logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>








                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            <div id="page-wrapper">

                <div class="container-fluid">

                    <!-- Page Heading -->

                    <br><br><br><br>
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                               
                               
                               
                               
     <?php
                     $updated = 0;
                      $session_user_id = $_SESSION['tp_user_unique_id'];
                   $get_user_details_query=mysqli_query($con,"SELECT * FROM tp_users WHERE tp_user_unique_id = '$session_user_id' ")  ;
                            while($user_row=mysqli_fetch_assoc($get_user_details_query)){
                                $user_momo_name = $user_row['tp_user_momo_name'];
                                $user_momo_number = $user_row['tp_user_momo_number'];
                                $user_contact = $user_row['tp_user_contact_number'];
                                
                            }
                            
                            if (isset($_POST['update'])){
                                $new_user_momo_name = checkValues($_POST['momo_name']);
                                $new_user_momo_number = checkValues($_POST['momo_number']);
                                $new_user_contact = checkValues($_POST['contact_number']);
                              
                                
                               // $check_number = mysqli_query($con,"SELECT * FROM tp_users WHERE tp_user_momo_number ='{$new_user_momo_number}' ");
                               // $total_number = mysqli_num_rows( $check_number);
                               // if($total_number>0){
                               //     echo '<div class="alert-danger"><h1> Mobile money number already exist</h1></div>';
                                //}
                            //else{
                                
                                $insert_update = mysqli_query($con,"UPDATE tp_users SET tp_user_momo_name='$new_user_momo_name',tp_user_momo_number='$new_user_momo_number' ,tp_user_contact_number='$new_user_contact' WHERE tp_user_unique_id = '$session_user_id' ");
                               // }
                                if($insert_update){
                                    $updated=1;
                                     //echo '<div class="alert-success"> <h1>UPDATE MADE SUCCESSFULLY</h1></div>';
                                }
                                else{
                                    $updated=2;
                                    // echo '<div class="alert-success"> <h1>UPDATE FAILED</h1></div>';
                                }
                            }
                            
                             $get_user_details_query=mysqli_query($con,"SELECT * FROM tp_users WHERE tp_user_unique_id = '$session_user_id' ")  ;
                            while($user_row=mysqli_fetch_assoc($get_user_details_query)){
                                $user_momo_name = $user_row['tp_user_momo_name'];
                                $user_momo_number = $user_row['tp_user_momo_number'];
                                $user_contact = $user_row['tp_user_contact_number'];
                                
                            }
                            
                          $_SESSION['momo_name'] = $user_momo_name;
                              
     ?>
                               
                               
                              <h1 class="page-header">
                                <center> 
                                  Your Profile Information </center>

                            </h1>
                            <!--WELCOME MESSAGE AND NOTICE -->


                     
     <?php
          if($updated == 1){
              echo '<div class="alert-success"> <h1>UPDATE MADE SUCCESSFULLY</h1></div>';
          }     elseif($updated==2){
              echo '<div class="alert-success"> <h1>UPDATE FAILED</h1></div>';
          }else{
              echo '';
          }                  
     ?>
                         
       <div id="update-user-row" class= "row">
           <div id="update-user" class="col-md-12 col-sm-12 col-xs-12">
               <form method="post" action="">
                   <div class="form-group">
		<label class="control-label col-sm-2" for="contact_number">Registered Mobile Money Name :</label>
            <div class="input-group">
                 <div class="  col-sm-10">
                <input type="text" class="form-control" placeholder="<?php echo  $user_momo_name;?>" name="momo_name" id="contact_number" required/>
				</div>
            </div>
        </div>
		
		
		<div class="form-group">
		  <label class="control-label col-sm-2" for="mobile_money_number"> Registered Mobile Money Number :</label>
            <div class="input-group">
                 <div class="  col-sm-10">
                <input id ="input" type="text" class="form-control" placeholder="<?php echo  $user_momo_number;?>" name="momo_number" id="mobile_money_name" required/>
				</div>
            </div>
        </div>
		
		
		<div class="form-group">
		  <label class="control-label col-sm-2" for="mobile_money_number">Registered Mobile Calling Number:</label>
            <div class="input-group">
                 <div class="  col-sm-10">
                <input type="text" class="form-control" placeholder="<?php echo $user_contact;?>" name="contact_number" id="mobile_money_number" required/>
				</div>
            </div>
        </div>
               <div class="form-group">
            <button type="submit" class="btn btn-default product-button" name="update" id="submit"  data-toggle="odal" data-target="#myModal">
                <span class="glyphicon glyphicon-log-in"></span> &nbsp;Update Profile
            </button>
        </div>
               </form>
           </div>
       </div>
                         
                                        <!--START PACKAGES/ PLEDGES -->


                                       
                                        <!--END PACKAGES/ PLEDGES -->



                   
                        <!-- /.container-fluid -->
                    </div>
                    <!-- /#page-wrapper -->








                </div>


            </div>


            <div class="footer">

                <p>&copy; Copyright 2018 BITCOIN TRADE INVEST </p>

            </div>
        </div>
        <!-- /#wrapper -->

       <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
      <script src="js/jquery.confirm.min.js"></script>  
        
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

    </body>

    </html>
