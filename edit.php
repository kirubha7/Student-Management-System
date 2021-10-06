<html>
	<head>
		<title>Student registration form.....</title>
		<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="bootstrap/bootstrap.css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

		<script type="text/javascript">
			    $(function () {
			        $("#submit").click(function () {
			        	if ( $("#name").val()=='')
			            {
			            	 alert("Name is Required..Please Enter Your Name..");
                             return false;
			            }
			            else  if ( $("#name").val().match('[a-zA-Z ]') )
			           {
			                return true;
			            }
			            alert("Name Field is wrong..Please Enter only characters..");
                         return false;
			        });
			    });
        </script>
        
        <script type="text/javascript">
			    $(function () {
			        $("#submit").click(function () {
			           if ( $("#phone").val()=='')
			           {
			                alert("PhoneNumber is Required..Please Enter Your Number..");
                            return false;
			            }
			            else if ( $("#phone").val().match('[0-9]') )
			           {
			                return true;
			            }
			            else
			            {
			            alert("PhoneNumber is wrong..Please Enter only Numbers..");
                         return false;
                     }
			        });
			    });
        </script>
        

	</head>
	<body>
       
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">STUDENT MANAGEMENT SYSTEM</a>
        </nav>

                   
			        <div class="container">
				       <form action="update.php" method="POST" enctype="multipart/form-data">
				  <fieldset>
				  	 <?php
                    include 'configuration.php';
                      $id1=$_GET['id'];
                    $qry= "SELECT * from registration WHERE id='$id1'";
                    $s= mysqli_query($conn, $qry);
                    while($row=mysqli_fetch_array($s))
					 {
                    ?>
				    <legend>Update Registration Form</legend>
				    <div class="row">
				    	<div class="col-lg-6">
				     <div class="form-group">
				      <label>NAME</label> 
				       <input type="hidden" name="studentid" value="<?php echo $row['id']; ?>" >
				      <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name" value="<?php echo $row['name']; ?>" required>
				   
				    </div></div></div>
				     <div class="row">
				    <div class="col-lg-6">
				    <div class="form-group">
				      <label>Email</label>
				      <input type="email" class="form-control" name="email" placeholder="Enter Your email" value="<?php echo $row['mail']; ?>" required>
				
				    </div></div></div>
				    <div class="row">
				    <div class="col-lg-6">
				    <div class="form-group">
				      <label >Phone Number</label>
				      <input type="text" class="form-control" name="phone1" id="phone" placeholder="Enter Your PhoneNumber"    
				      value="<?php echo $row['phonenumber']; ?>" required>
				  
				    </div></div></div>
				    <fieldset class="form-group">
				      <legend>Gender</legend>
				      <div class="form-check">
				        <label class="form-check-label">
				          <input <?php if($row['gender']=="MALE") { echo "checked"; } ?> type="radio" class="form-check-input" name="gender"  value="male">
				         MALE 
				        </label>
				      </div>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input <?php if($row['gender']=="FEMALE") { echo "checked"; } ?> type="radio" class="form-check-input" name="gender" value="female">
				        FEMLAE 
				        </label>
				      </div>
				    </fieldset>
                     <?php 
                      } 
                      ?>
				    <button type="submit" class="btn btn-primary" name="update" id="submit">Update</button>
				  </fieldset>
				     </form>
			        </div>
                   
	</body>
</html>