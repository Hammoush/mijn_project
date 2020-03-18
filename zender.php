
<?php
	
  $db=new mysqli("localhost:3307","root","","examen");

 $r= mysqli_query($db, "SELECT * from zender")

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>overzicht</title>
    <link rel="stylesheet" href="style.css">
   
  </head>
  <body>
          <from method="post">
            <table border= 1 solid black>
               <tr>
                 <td>naam zonder</td>
                 <td>omschrijven</td>
                 <td>programmaoverzicht</td>
               </tr>
               <?php
                while ($row= mysqli_fetch_array($r)) {
                   echo "<tr>";
                      echo "<td>. $row[1]</td>"."<br>";
                      echo "<td >. $row[2]</td>";
                      echo "<td >";
                          echo '<a href="Programmaoverzicht.php">programmaoverzicht</a>';
                      echo "</td";

                   echo "<tr>";
                 } 


               ?>
            </table>
          </from>
  
  </body>
</html> 
