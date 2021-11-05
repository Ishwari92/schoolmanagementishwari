<?php
	include"database.php";
	session_start();
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
	
			<div id="section">
				<?php include"sidebar.php";?><br>
						<h3 class="text">Welcome <?php echo $_SESSION["ANAME"]; ?></h3><br><hr><br>
				<div class="content">
				
					<h3>Add Marks</h3><br>
					
					 <?php
						if(isset($_GET["err"]))
						{
							echo "<div class='error'>{$_GET["err"]}</div>";
						}
					?>
					<form  method="get" action="mark.php">
					<div class="lbox1">	
					
						<label>Enter Roll No</label><br>
						<input type="text" class="input3" name="rno"><br><br>
					
					
					</div>
			
					<button type="submit" class="btn" name="view"> View Details</button>
				
					</form>
			
				</div>
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>