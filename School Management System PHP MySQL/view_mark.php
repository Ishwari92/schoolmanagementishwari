<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["AID"]))
	{
		echo"<script>window.open('teacher_login.php?mes=Access Denied...','_self');</script>";
		
	}	
	$sum= "select sum(MARK) as 'total' from mark";
    $re=$db->query($sum);
    $data=mysqli_fetch_array($re);
    $sum1=$data['total'];
    echo "Sum of marks:".$sum1;

    $s="SELECT *  FROM sub";
    $result=$db->query($s);
    if($result->num_rows>0){
        while($r=$result->fetch_assoc())
        {
            $out=$r["OUTM"];
            $pas= $r["PASSM"];
        
        }
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
					<h3 class="text">Welcome <?php echo $_SESSION["TNAME"]; ?></h3><br><hr><br>
				<div class="content">
				
					<h3>Mark Details</h3><br>
					<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="lbox1">	
					
						<label>Enter Roll No</label><br>
						<input type="text" class="input3" name="rno"><br><br>
					</div>
				
					<button type="submit" class="btn" name="view"> View Details</button>
				
					</form>
					<br><br>
					<div class="Output">
						<?php
							if(isset($_POST["view"]))
							{
								echo "<h3>Mark Details</h3><br>";
								$sql="select * from mark where REGNO='{$_POST["rno"]}'";
								$re=$db->query($sql);
								if($re->num_rows>0)
								{
                                    
									echo'
									<table border="1px">
										<tr>
											<th>S.No</th>
											<th>Reg.No</th>
											<th>Class</th>
											
											<th>Subject</th>
											<th>Mark</th>
                                            <th>Out of Mark</th>
                                            <th>Passing  Mark</th>
										</tr>
									';
									$i=0;
									while($r=$re->fetch_assoc())
									{
                                        
										$i++;
										echo "
											<tr>
												<td>{$i}</td>
												<td>{$r["REGNO"]}</td>
												<td>{$r["CLASS"]}</td>
										
												<td>{$r["SUB"]}</td>
												<td>{$r["MARK"]}</td>
                                                <td>$out</td>
                                                <td>$pas</td>
                                                
											</tr>
										
										
										
										
										";
									}
								}
								else
								{
									echo "No Record Found";
								}
								echo "</table>";
							}
						
						
						?>
					
					
					</div>
				</div>
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>