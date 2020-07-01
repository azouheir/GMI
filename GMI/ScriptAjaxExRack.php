
<?php
$q=$_GET['q'];
 $con=mysqli_connect('localhost','root','','GMI');
 $requ = "SELECT id_cluster FROM rack WHERE id_rack='".$q."';";
 $resu = $con->query($requ);
 foreach ($resu as $val) {
 	$def= "DEFAULT_".substr($val['id_cluster'], 8);
 }
 
 
 $req = "SELECT id_node FROM node n WHERE n.id_rack='".$def."'";

$resultat = $con->query($req);
if($resultat)
{ 
echo "
    <div class ='col-md-4 inputGroupContainer'>
      <div class='checkbox'>";

foreach ($resultat as $v){
              $id=$v['id_node'];
              echo "<label><input name='ExRck[]' type='checkbox' value='$id'>$id</label><br><br>";
          }
  
echo "</div>
     </div>";
mysqli_close($con);
 }
?>