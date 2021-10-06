
<html>
	<head>
		<title>Student registration form.....</title>
		<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="bootstrap/bootstrap.css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        
			        <script type="text/javascript">
			function deletes(id)
			{
			 
			     if(confirm('Sure To Remove This Record ?'))
			     {
			        window.location.href='delete.php?id1='+id;
			     }
				 
			}
			</script>

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
			        	if ( $("#email").val()=='')
			            {
			            	 alert("mail is Required..Please Enter Your Mail..");
                             return false;
			            }
			            else  if ( $("#email").val().match('[/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/]') )
			           {
			                return true;
			            }
			            alert("Please Enter valid mail..");
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
			            alert("PhoneNumber is wrong..Please Enter only Numbers..");
                         return false;
			        });
			    });
        </script>
        <style>
img {
  border-radius: 50%;
}
</style>

	</head>
	<body>
       
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">STUDENT MANAGEMENT SYSTEM</a>
        </nav>

			        <div class="container">
				       <form action="registration_db.php" method="POST" enctype="multipart/form-data">
				  <fieldset>
				    <legend>Student Registration Form</legend>
				    <div class="row">
				    	<div class="col-lg-6">
				     <div class="form-group">
				      <label>NAME</label>
				      <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name" required>
				   
				    </div></div></div>
				     <div class="row">
				    <div class="col-lg-6">
				    <div class="form-group">
				      <label>Email</label>
				      <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your email" required>
				
				    </div></div></div>
				    <div class="row">
				    <div class="col-lg-6">
				    <div class="form-group">
				      <label >Phone Number</label>
				      <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Your PhoneNumber" required>
				  
				    </div></div></div>
				    <fieldset class="form-group">
				      <legend>Gender</legend>
				      <div class="form-check">
				        <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="gender"  value="male" required>
				         MALE 
				        </label>
				      </div>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="gender" value="female" required>
				        FEMLAE 
				        </label>
				      </div>
				    </fieldset>
                       <div class="row">
				    <div class="col-lg-6">
				      <div class="form-group">
				      <label for="exampleInputFile">File input</label>
				      <input type="file" class="form-control-file" name="image" required>
				      </div></div></div>
				    <button type="submit" class="btn btn-primary" name="upload" id="submit">Submit</button>
				  </fieldset>
				     </form>
			        </div>
                    <?php
                    include 'configuration.php';
                    $qry= "SELECT * from registration";
                    $s= mysqli_query($conn, $qry);
                    ?>
                 
					        <table class="table table-hover">
								  <thead>
								    <tr class="table-primary">
								      <th scope="col">Student Image</th>
								      <th scope="col">Student Name</th>
								      <th scope="col">Email</th>
                                      <th scope="col">Phonenumber</th>
								      <th scope="col">Gender</th>
								      <th scope="col"></th>
								      <th scope="col"></th>
								    </tr>
								  </thead>
								  <tbody>
								  	<?php 

								  	 $num_rows = mysqli_num_rows($s);
								  	 if($num_rows>0)
								  	 {
								  	 while($row=mysqli_fetch_array($s))
								  	 {
								  	 ?>


								    <tr class="table-success">
								      <th scope="row"><img src="images/<?php echo $row['image'];?>"  width="100" height="100"/></th>
								      <td><?php echo $row['name']; ?></td>
								       <td><?php echo $row['mail']; ?></td>
								        <td><?php echo $row['phonenumber']; ?></td>
								      <td><?php echo $row['gender']; ?></td>
								      <td><button class="btn btn-success" onclick="window.location.href='edit.php?id=<?php echo $row['id']; ?>'">Edit</button></td>
								      <td><button class="btn btn-danger" onclick="javascript:deletes(<?php echo $row['id']; ?>)">Delete</button></td>
								    </tr>
                                   <?php 
                               } 
                           }
                           else
                           	{ 
                           		echo "NO RECORDS FOUND";
                           	}

                               ?>
								  </tbody>
					         </table>




	</body>
</html>