<?php
	include"database.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>zender</title>
	
	</head>
	
	<body>
			
				
			
					
						<h3 > wijzigen nummers</h3><br>
						
					<?php
						if(isset($_POST["submit"]))
						{
							$ids=$_POST['ids'];
$du=$_POST['du'];
$ti=$_POST['ti'];


	$sql= @mysqli_query($db_conc,"UPDATE song SET 
		titel = '$ti',
		 duur='$du' WHERE idsong ='$ids'");
		if($sql){
			echo' update success';
		}else{
			echo' update not success';
		}
	}
						
					?>
					<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					     <label>id artiest</label><br>
					     <input type="text" name="ids" required class="input">
					     <br><br>
					     <label>duur</label><br>
					     <input type="text" name="du" >
					     <br><br>
					     <label>titel</label><br>
					     <input type="text" name="ti" >
					     <br><br>
					     <button type="submit"  name="submit">wijzigen nummers</button>
					</form>
				
				
				</div>
				<br>
				
				
				
			</div>
	
	</body>
</html>