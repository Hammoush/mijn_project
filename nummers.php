<?php
	
  $db=new mysqli("localhost:3307","root","","examen");

 $r= mysqli_query($db, "SELECT * from song")

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>overzicht</title>
    <style type="text/css">
      body{
        text-align: center;
      }
      table{
        margin-left: 40%;
      
      }
    </style>
   
  </head>
  <body>

          <from method="post">
            <table border= 1 solid black>
              <tr><th colspan="3">nummers</th></tr>
               <tr>
                 <td>id artiest</td>
                 <td>duur</td>
                 <td>titel</td>
               </tr>
               <?php
                while ($row= mysqli_fetch_array($r)) {
                   echo "<tr>";
                      echo "<td>. $row[0]</td>"."<br>";
                      echo "<td >. $row[1]</td>";
                      echo "<td >. $row[2]</td>";
                      

                   echo "<tr>";
                 } 


               ?>
            </table>
          </from>
  
  </body>
</html> 
