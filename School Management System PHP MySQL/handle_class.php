<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["AID"]))
	{
		echo"<script>window.open('teacher_login.php?mes=Access Denied...','_self');</script>";
		
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
				<?php include"sidebar.php";?><br>
					<h3 class="text">Welcome <?php echo $_SESSION["ANAME"]; ?></h3><br><hr><br>
				<div class="content">
				
					<h3>Add Classes</h3><br>
					
					<div class="lbox1">
					<?php
						if(isset($_POST["submit"]))
						{
                            $class= $_POST["cla"];
                            $sub = $_POST["sub"];
                            $s = "select * from hclass where CLA='$class' and SUB='$sub'";
                            $query=mysqli_query($db,$s);
                            $ecount= mysqli_num_rows($query);
                            if($ecount>0){
                                echo "<div class='error'>This class is already exist..</div>";
                            }
                            else{
							 $sq="insert into hclass(CLA,SUB) values ('$class','$sub')";
							if($db->query($sq))
							{
								echo "<div class='success'>Insert Success..</div>";
							}
							else
							{
								echo "<div class='error'>Insert Failed..</div>";
							}
		
						}
                        }
					
					
					?>					
						
						
					<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					
					<label>Class</label><br>
						
						<select name="cla" required class="input3">
							<?php
								$sl="select DISTINCT(CNAME) from class";
								$r=$db->query($sl);
								 if($r->num_rows>0)
								 {
									 echo "<option value=''>Select</option>";
									 while($ro=$r->fetch_assoc())
									 {
										 echo "<option value='{$ro["CNAME"]}'>{$ro["CNAME"]}</option>";
									 }
								 }
							
							
							?>
					
						</select>
						
					<br><br>
					
					
						
						
						
					<label>Subject</label><br>
					
						<select name="sub" required class="input3">
						<?php
							$s="select * from sub";
							$re=$db->query($s);
							if($re->num_rows>0)
							{
								echo "<option value=''>Select</option>";
								while($r=$re->fetch_assoc())
								{
								echo "<option value='{$r["SNAME"]}'>{$r["SNAME"]}</option>";
								}
							}
						
						
						?>
						</select>
						
					<br><br>
					
					<button type="submit" class="btn" name="submit">Add  Details</button>
					</form>
					
					
					
					</div>
					<div class="rbox1">
					<h3> Details</h3><br>
						<?php
						if(isset($_GET["mes"]))
						{
							echo"<div class='error'>{$_GET["mes"]}</div>";	
						}
					
					?>
					<table border="1px" >
						<tr>
							<th>S.No</th>
							<th>Class Name</th>
							<th>Subject</th>
							<th>Delete</th>
						</tr>
						<?php
							$s="select * from hclass";
							$res=$db->query($s);
							if($res->num_rows>0)
							{
								$i=0;
								while($r=$res->fetch_assoc())
								{
									$i++;
									echo"
									<tr>
										<td>{$i}</td>
										<td>{$r["CLA"]}</td>
										<td>{$r["SUB"]}</td>
										<td><a href='hclass.php?id={$r["HID"]}' class='btnr'>Delete</a></td>
									</tr>
									
									";
								}
							}
						
						
						
						?>
						
						</table>
					</div>
				</div>
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>