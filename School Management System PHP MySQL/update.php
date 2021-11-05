<?php
	include"database.php";
	session_start();
    if(isset($_POST["submit"]))
	{
        $id = $_GET["id"];
        $cname= $_POST["cname"];
        $sec=$_POST["sec"];
        $sq="update class set CNAME='$cname', CSEC= '$sec' where CID=$id ";
		if($db->query($sq))
		{
			echo "<div class='success'>Updated Success..</div>";
		}
		else
		{
			echo "<div class='error'>Updated failed..</div>";
		}
							
							
	}
	if(!isset($_SESSION["AID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";
		
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
		<img src="img/1.jpg" style="margin-left:90px;" class="sha">
			<div id="section">
				<?php include"sidebar.php";?><br>
				<h3 class="text">Welcome <?php echo $_SESSION["ANAME"]; ?></h3><br><hr><br>
				<div class="content1">
					
						<h3 > Update Class Details</h3><br>
					
						
				<form method="post" action="">
                
				<label>Class Name</label><br>
				<select name="cname"  required class="input2">
						<option value="">Select</option>
						<option value="I">I</option>
						<option value="II">II</option>
						<option value="III">III</option>
						<option value="IV">IV</option>
						<option value="V">V</option>
						<option value="VI">VI</option>
						<option value="VII">VII</option>
						<option value="VIII">VIII</option>
						<option value="IX">IX</option>
						<option value="X">X</option>
						
					</select><br><br>
					<label>Section </label><br>
					<select name="sec"  required class="input2">
						<option value="">Select</option>
					
						<option value="A">A</option>
						<option value="B">B</option>
						
					</select>
					<br>
					<button type="submit" class="btn" name="submit">Update Class Details</button>
				</form>
				
				
				</div>