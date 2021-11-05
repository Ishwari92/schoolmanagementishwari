<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["AID"]))
	{
		echo"<script>window.open('teacher_login.php?mes=Access Denied...','_self');</script>";
		
	}	
	
	if(isset($_GET["rno"]))
	{
		$sql="select * from student where RNO='{$_GET["rno"]}'";
		$res=$db->query($sql);
		if($res->num_rows<=0)
		{
			header("location:add_mark.php?err=Invalid Register no..");
		}
		else
		{
			$rows=$res->fetch_assoc();
			$class=$rows["SCLASS"];
            $div=$rows["SSEC"];
			$regno=$_GET["rno"];
		}
	}

    $s="SELECT *  FROM hclass";
    $re=$db->query($s);
    if($re->num_rows>0){
        while($r=$re->fetch_assoc())
        {
            $sub=$r["SUB"];
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
					<h3 class="text">Welcome <?php echo $_SESSION["ANAME"]; ?></h3><br><hr><br>
				<div class="content">
					
					<h3>Add Marks</h3><br>
					<?php
						if(isset($_POST["submit"]))
						{
                            
                            $reg= $_POST["regno"];
                            $mark= $_POST["mark"];
                       
                            $class= $_POST["class"];
                            
                            $s = "select * from mark where SUB='$sub' and CLASS='$class'";
                            $query=mysqli_query($db,$s);
                            $ecount= mysqli_num_rows($query);
                            if($ecount>0){
                                echo "<div class='error'>This class this term is already exist..</div>";
                            }
                            else{
                                
                            
                            
							$sq="insert into mark(REGNO,SUB,MARK,CLASS) values ('$reg','$sub','$mark','$class')";
                            $query1=mysqli_query($db,$sq);
                           
							if($db->query($sq))
							{
								echo "<div class='success'>Insert Success</div>";
							}
							else
							{
								echo "<div class='error'>Insert Failed</div>";
							}
							
						}
					
					
                        }
					?>
					
					<form method="post" action="<?php echo $_SERVER["REQUEST_URI"];?>">
						<div class="lbox">
							<label> Register No</label><br>
							<input type="text" style="background:#b1b1b1;" value="<?php echo $regno;?>" class="input3" name="regno" readonly><br><br>
							
							<label>Class</label><br>
							<input type="text" style="background:#b1b1b1;"  value="<?php echo $class ?>" class="input3" name="class" readonly><br><br>
                            <label>Section</label><br>
                            <input type="text" style="background:#b1b1b1;"  value="<?php echo $div ?>"class="input3" name="sec"><br><br>
						  
						
						</div>
						<div class="rbox">
							
						<label>Subject</label><br><br>
							
						
								<?php 
                                     
                                    
								      if(isset($_GET["rno"]))
	                                   {
		                              $sql="select * from mark,sub where REGNO='{$_GET["rno"]}' and mark.SUB = sub.SNAME";
                                        $re=$db->query($sql);
										if($re->num_rows>0)
											{
												
												while($r=$re->fetch_assoc())
												{
													
                                                    echo "<label  value='{$r["SUB"]}' >{$r["SUB"]}</label><br><br>";
                                                    
                                                    echo '<label >Mark :</label><br>
							                     <input class="input3" name="mark"  id="mark" type="mark" required>'.' /'.$r["OUTM"].'<br><br>';
                                                    
												}
                                               
											}
                                      }
								?>
		
							<br><br>
							
							<button type="submit" style="float:right;" class="btn" name="submit"> Add Mark Details</button>
                        </div>
                        
					</form>							
						</div>
						
				</div>
    
				
			</div>

	
				<?php include"footer.php";?>
	</body>
</html>