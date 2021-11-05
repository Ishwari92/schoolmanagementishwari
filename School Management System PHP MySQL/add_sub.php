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
       <script src="https://code.jquery.com/jquery-1.12.4.min.js" 
        integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" 
        crossorigin="anonymous">
</script>
<script src="/js/repeater.js"></script>
    <script src="/js/repeater_1.2.js"></script>
	<body>
				<?php include"navbar.php";?><br>
				<img src="img/1.jpg" style="margin-left:90px;" class="sha">
				
			<div id="section">
					<?php include"sidebar.php";?><br><br><br>
					<h3 class="text">Welcome <?php echo $_SESSION["ANAME"]; ?></h3><br><hr><br>
					<div class="content1">
					
						<h3 > Add Subject Details</h3><br>
						<?php
							if(isset($_POST["submit"]))
							{
								$sq="insert into sub(SNAME) values ('{$_POST["sname"]}')";
								if($db->query($sq))
								{
									echo "<div class='success'>Insert Success..</div>";
								}
								else
								{
									echo "<div class='error'>Insert Failed..</div>";
								}
							}
						?>
						
				
				
					</div>
				
				
				
				<div id="repeater">
					<?php
						if(isset($_GET["mes"]))
						{
							echo"<div class='error'>{$_GET["mes"]}</div>";	
						}
					
					?>
					<table border="1px" id="repeater">
					
						<tr class="repeater-heading">
				
							<th>Subject Name</th>
                            <th>Out of Marks</th>
                            <th>Total Marks</th>
							<th>Delete</th>
                            <th><button  class="btnb btn-primary repeater-add-btn">
         Add
      </button></th>
						</tr>
						
				        <tr class="items">
									
										<td class="item-content form-group"><input type="text" class="input1" name="name"><br><br></td>
                                        <td class="item-content form-group"><input type="text" class="input2" name="sname"><br><br></td>
                                        <td class="item-content form-group"><input type="text" class="input3" name="outm"><br><br></td>
                                        <td class="item-content form-group"><input type="text" class="input3" name="outm"><br><br></td>
										<td class="item-content form-group"><button id="remove-btn" class="btnr btn-danger" onclick="$(this).parents('.items').remove()">
          Remove
      </button></td>
										</tr>
                        
                        
                         <form class="repeater">
    <!--
        The value given to the data-repeater-list attribute will be used as the
        base of rewritten name attributes.  In this example, the first
        data-repeater-item's name attribute would become group-a[0][text-input],
        and the second data-repeater-item would become group-a[1][text-input]
    -->
    <div data-repeater-list="category-group">
      <div data-repeater-item>
        <input type="hidden" name="id" id="cat-id"/>
       <input type="text" name="subjectName" placeholder="Subject Name"/>
       <input type="text" name="outOfMarks" placeholder="Out of Marks"/>
        <input type="text" name="totalMarks" placeholder="Total Marks" />
       <input data-repeater-delete type="button" value="Delete"/>
      </div>
    </div>
    <input data-repeater-create type="button" value="Add"/>

   
</form>

						
					</table>
				</div>
			</div>
	
				
     
        
        <script>
        $( document ).ready(function() {
            $("#repeater").createRepeater();
        }
        
        </script>
        <?php include"footer.php";?>
	</body>
</html>