<div class="sidebar"><br>
<h3 class="text">Dashboard</h3><br><hr><br>
<ul class="s">
<?php
	if(isset($_SESSION["AID"]))
	{
		echo'
			<li class="li"><a href="admin_home.php">School Information</a></li>
			<li class="li"><a href="add_class.php"> Class</a></li>
            <li class="li"><a href="handle_class.php"> Handled Class</a></li>
            
			<li class="li"><a href="add_sub.php"> Subject</a></li>
            
            <li class="li"><a href="add_stud.php"> Students</a></li>
            <li class="li"><a href="student.php"target="_blank"> View Student</a></li>
            
			<li class="li"><a href="add_mark.php">Add Marks</a></li>
			<li class="li"><a href="view_mark.php">View Marks</a></li>
            
			<li class="li"><a href="view_report.php">View Report</a></li>
			
			
			<li class="li"><a href="logout.php">Logout</a></li>
		
		';
	
	
	}
	else{

		
		
	}


?>
	

</ul>

</div>