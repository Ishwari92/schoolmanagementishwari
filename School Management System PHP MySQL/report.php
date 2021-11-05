<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
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
            $name = $rows["NAME"];
            $gen = $rows["GEN"];
            $dob = $rows["DOB"];
            $div=$rows["SSEC"];
            $gen=$rows["GEN"];
			$regno=$_GET["rno"];
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
					
					<h3>View Report</h3><br>
					
					<form method="post" action="<?php echo $_SERVER["REQUEST_URI"];?>">
						<div class="lbox">
                            <label>Roll NO.:      </label>     <input name="roll" value="<?php echo $regno;?>" readonly><br><br>
                            
                            
							<label>Name:    </label> <label value="<?php echo $name ?>"><?php echo $name ?> </label><br><br>
                            
                            <label>Date of Birth:    </label> <label value="<?php echo $dob ?>"><?php echo $dob ?> </label><br><br>
                            
							<label>Class:    </label> <label value="<?php echo $class ?>"><?php echo $class ?> </label><br><br>
							
							
                            <label>Section:   </label> <label value="<?php echo $div ?>"><?php echo $div ?> </label><br><br>
                            
                            <label>Gender:   </label> <label value="<?php echo $gen ?>"><?php echo $gen ?> </label><br><br>
                            <label>Subject</label><br><br>
							<?php 
                                include"database.php";
                    
                                if(isset($_GET["rno"]))
	                               {
		                              $sql="select * from mark,sub where REGNO='{$_GET["rno"]}' and mark.SUB = sub.SNAME";
		                              $re=$db->query($sql);
										if($re->num_rows>0)
											{
												
												while($r=$re->fetch_assoc())
												{
													
                                                    echo "<label  value='{$r["SUB"]}' >{$r["SUB"]}</label><br><br>
                                                            <label >Marks:</label>
                                                        <label  value='{$r["MARK"]}'>{$r["MARK"]}</label>./.<label>{$r["OUTM"]}</label><br><br>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    ";
                               
                                      }
                                }
                                }
                                
								?>
		
							<br><br>
                            
                            <label>Total Marks:   </label>
                            <?php 
                                $q= "select SUM(MARK) as 'SUMSAL' from mark";
                                $qu= "select SUM(OUTM) as 'SUMTOT' from sub, mark where mark.SUB = sub.SNAME ";
                                $res = mysqli_query($db,$q);
                                $resu = mysqli_query($db,$qu);
                                $data = mysqli_fetch_array($res);
                                $data1 = mysqli_fetch_array($resu);
                                $tot= $data['SUMSAL'];
                                $tot1= $data1['SUMTOT'];
                                echo  $tot.'/'.$tot1;
                                
                            ?>
                            <br><br>
                            
                            <label>Percentage:   </label>
                            <?php
                                $avg= $tot/$tot1;
                                $per= $avg*100;
                                
                                echo $per.'%';
                                
                            ?>
                            <br><br>
                            
                            <label>Status:</label>
                            <?php
                            if($per>50){
                                echo "Student is pass and promoted to next class";
                            }
                            else{
                                echo "Student is fail";
                            }
                            ?>
							
							<button type="submit" style="float:right;" class="btn" name="submit"> Add Mark Details</button>
                        </div>
                        
					</form>							
						</div>
						
				</div>
    
				
			</div>

	
				<?php include"footer.php";?>
	</body>
</html>