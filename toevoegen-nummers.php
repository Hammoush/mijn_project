<?php
	include"database.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>zender</title>
	
	</head>
	
	<body>
			
				
			
					
						<h3 > Add nummers</h3><br>
						
					<?php
						if(isset($_POST["submit"]))
						{
							$sq="INSERT INTO `song` (`idsong`, `duur`, `titel`) VALUES('{$_POST["idz"]}','{$_POST["oms"]}','{$_POST["slo"]}')";
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
					<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					     <label>id artiest</label><br>
					     <input type="text" name="idz" required class="input">
					     <br><br>
					     <label>duur</label><br>
					     <input type="text" name="oms" required class="input">
					     <br><br>
					     <label>titel</label><br>
					     <input type="text" name="slo" required class="input">
					     <br><br>
					     <button type="submit" class="btn" name="submit">Add nummers</button>
					</form>
				
				
				</div>
				<br>
				
				
				
			</div>
	
	</body>
</html>