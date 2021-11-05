<?php
	include"database.php";
	session_start();
    $id = $_GET["id"];
    $sql = "select * from student where ID=$id"; 
    $res=$db->query($sql);
    $row=$res->fetch_assoc();
   
                   
						if(isset($_POST["submit"]))
						{
                            $id = $_GET["id"];
                            $name = $_POST["name"];
                            $fname = $_POST["fname"];
                    
                            $pho = $_POST["pho"];
                            $email = $_POST["email"];
                            $add = $_POST["addr"];
                            $class = $_POST["cla"];
                            $div = $_POST["sec"];
                            
                            
							
							$target="student/";
							$target_file=$target.basename($_FILES["img"]["name"]);
							if(move_uploaded_file($_FILES['img']['tmp_name'],$target_file))
							{
								$sq="update student set NAME='$name', FNAME='$fname',PHO='$pho',MAIL='$email',
                                    ADDR='$add',SCLASS='$class',SSEC='$div', SIMG='$target' where ID=$id";
                                
								
								if($db->query($sq))
								{
									echo "<div class='success'>Updated Success</div>";
								}
								else
								{
									echo "<div class='error'>Updated Failed</div>";
								}
							}
							
						}
					
	if(!isset($_SESSION["TID"]))
	{
		echo"<script>window.open('_login.php?mes=Access Denied...','_self');</script>";
		
	}	

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Tutor Joe's</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<?php include"navbar.php";?><br>
		
			<div id="section">
				<?php include"sidebar.php";?><br><br><br>
				<h3 class="text">Welcome <?php echo $_SESSION["TNAME"]; ?></h3><br><hr><br>
				<div class="content">
					
						<h3 >Set Exam Time Table Details</h3><br>
					
					
			
				<form method="post" enctype="multipart/form-data" action="">
				<div class="lbox">
					<label> ID</label><br>
						
                    
					<input type="text" class="input3" name="rno" style="background:#b1b1b1;" value="<?php echo $row['RNO']; ?>" readonly  ><br><br>
                   
                        
					<label> Student Name</label><br>
                    
					<input type="text" class="input3" name="name" value="<?php echo $row['NAME']; ?>"><br><br>
                    
					<label> Father Name</label><br>
					<input type="text" class="input3" name="fname" value="<?php echo $row['FNAME']; ?>"><br><br>
				    
						
					<label>  Date of Birth</label><br>
                    <input type="text" class="input3" maxlength="10" name="dob" style="background:#b1b1b1;" value="<?php echo $row['DOB']; ?>" readonly>
					<br><br>
					<label>Gender</label>
					<input type="text" class="input3" maxlength="10" name="gen"  style="background:#b1b1b1;" value="<?php echo $row['GEN']; ?>" readonly><br><br>
                    
					
					<label> Phone No</label><br>
					<input type="text" class="input3" maxlength="10" name="pho" value="<?php echo $row['PHO']; ?>"><br><br>
				</div>
				
                        
				<div class="rbox">
				
				<label> Parent's Mail Id</label><br>
					<input type="email" class="input3" name="email" value="<?php echo $row['MAIL']; ?>"><br><br>
					
					<label>  Address</label><br>
					<input type="text" class="input3" name="addr" value="<?php echo $row['ADDR']; ?>"><br><br>
				
					<label>Class</label><br>
					<select name="cla" required class="input3" value="<?php echo $row['SCLASS']; ?>">
				
						<?php 
							 $sl="SELECT DISTINCT(CNAME) FROM class";
							$r=$db->query($sl);
								if($r->num_rows>0)
									{
										echo"<option value=''>Select</option>";
										while($ro=$r->fetch_assoc())
										{
											echo "<option value='{$ro["CNAME"]}'>{$ro["CNAME"]}</option>";
										}
									}
						?>
					
					</select>
					<br><br>
						<label>Section</label><br>
						<select name="sec" required class="input3" value="<?php echo $row['SSEC']; ?>">
						<?php 
							 $sl="SELECT DISTINCT(CSEC) FROM hclass where CLA=$";
							$r=$db->query($sl);
								if($r->num_rows>0)
									{
										echo"<option value=''>Select</option>";
										while($ro=$r->fetch_assoc())
										{
											echo "<option value='{$ro["CSEC"]}'>{$ro["CSEC"]}</option>";
										}
									}
						?>
					
					</select><br><br>
					<label> Image</label><br>
					<input type="file"  class="input3" required name="img"><br><br>
			
			<button type="submit" style="float:right;" class="btn" name="submit">Add Student Details</button>
				</div>
					
				</form>
				
				
				</div>
				
				
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>