<?php  
    include 'includesAdminPanel/sessionSrartForAdmin.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <?php  
            include 'includesAdminPanel/headerPart1.php';
        ?>
        <link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
        <title>Update application Form - Complain Box</title>
    </head>
    
    <body>
        <nav class="navbar navbar-light" style="background-color: #009688;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="../../index.php"><img src="../pictures/icon/complain.png" id="indexLogo-complain-box"></a>
                </div>
            
                <ul class="nav navbar-nav">             
                    <li><a href="../../index.php#description-div-custom" class="nev-custom-css" id="ourAppAnc">Our App</a></li>
                    <li><a href="../../index.php#purpose-container" class="nev-custom-css">Purpose</a></li>
                    <li><a href="../../index.php#developers-container" class="nev-custom-css">Supervisor & Developers</a></li>
                </ul>


                <?php
                    include 'includesAdminPanel/adminLogout.php';
                ?>
                
          </div>
        </nav><!-- end of nevigation -->


        <div class="wrapper">
            <nav id="sidebar">
                <a href="../../index.php#complainBoxDev">
                    <div class="sidebar-header">
                        <h3>Complain Box</h3>
                        <strong>CB</strong>
                    </div>
                </a>

                <ul class="list-unstyled components">
                    <li >
                    	<a href="home.php">
                            <i class="glyphicon glyphicon-home"></i>
                            Home
                        </a>
                    </li>


                    <li>
                        <a href="problem.php">
                             <i class="glyphicon glyphicon-exclamation-sign"></i>
                            Problems
                        </a>
                    </li >

                    <!-- active event  -->
                    <li>
                        <a href="event.php">
                            <i class="glyphicon glyphicon-calendar"></i>
                            Events
                        </a>
                    </li>

                    <li>
                        <a href="notice.php">
                            <i class="glyphicon glyphicon-list-alt"></i>
                            Notices
                        </a>
                    </li>
                    <li class="active">
                        <a href="applicationForm.php">
                            <i class="glyphicon glyphicon-file"></i>
                            Application Forms
                        </a>
                    </li>

                    <li>
                        <a href="emergencySupport.php">
                            <i class="glyphicon glyphicon-bell"></i>
                            Emergency Support
                        </a>
                    </li>

                    

                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div id="content" style="width: 100%">
                
                <div class="container-fluid">
                    <div class="row no-gutters">
                        <div class="col-md-5" style="height: 100px;">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn" style="background-color: #009688;">
                                <i class="glyphicon glyphicon-align-left"></i>
                            </button></div>
                        <div class="col-md-5">
                            <h1>Update Application Form</h1>
                        </div>

                        <div class="col-md-2">
                        </div>
                    </div>
                    <hr>
                </div>

                <form action="../serverPHP/updateApplicationForm.php" method="POST" enctype="multipart/form-data">

                	<?php
                		if(isset($_GET['id']) == true) {
                			$id = $_GET['id'];
                			require_once('../serverPHP/dbConnection.php');				
                			$sql = "SELECT * FROM applicationform WHERE applicationID = '$id'";
                    		$result = mysqli_query($db,$sql);
                    		$row = mysqli_fetch_array($result, MYSQLI_NUM);
                    		$name = $row[1];
                    		mysqli_close($db);

                            $name = base64_decode($name);
                            $description = base64_decode($row[3]);
                            $application_form_type = $row[2];

                    		echo '
                    			<div class="form-group">
                                        <label for="exampleInputEmail1">Application Form Title: '.$name.'</label><br>
                                        <label for="exampleInputEmail1">Application Form Type: '.$application_form_type.'</label>
                                </div>

                                <input type="hidden" class="form-group" value="'.$id.'" name="id"/>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    <textarea name="description" maxlength="500" class="form-control" rows="5" id="applicationFormDescription" required>'.$description.'</textarea>
                                </div>

                                <div class="form-group">
                        			<input type="file" name="file" required>
                        			<small id="fileHelp" class="form-text text-muted">Please upload a pdf file.</small>
                    			</div>
                    		';
     					}  
                	?>

                    <button type="submit" name="submit" class="btn btn-primary" style="background-color: #009688;">Update</button>                
                    <a href="applicationForm.php">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                    </a>
                </form>
            </div>
        </div>

         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>

         <?php  
            include 'footer.php';
        ?>
    </body>
</html>



