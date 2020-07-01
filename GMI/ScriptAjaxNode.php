
<?php
$q=$_GET['q'];
 $con=mysqli_connect('localhost','root','','GMI');
 $def= "DEFAULT_".substr($q, 8);
 $req = "SELECT id_node FROM node n WHERE n.id_rack='".$def."' and n.id_cluster='".$q."';";
/**/
$resultat = $con->query($req);
if($resultat)
{ 
echo "
    <div class ='col-md-4 inputGroupContainer'>
      <div class='checkbox'>";

foreach ($resultat as $v){
              $id=$v['id_node'];
              echo "<label><input name='node[]' type='checkbox' value='$id'>$id</label><br><br>";
          }
  
echo "</div>
     </div>";
mysqli_close($con);
 }
?>