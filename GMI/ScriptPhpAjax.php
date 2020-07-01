

<?php
$q=$_GET['q'];
 $con=mysqli_connect('localhost','root','','GMI');
 $req = "SELECT chip,module FROM carram WHERE type_ram ='".$q."';";
/**/
$resultat = $con->query($req);
if($resultat)
{ 
echo "<label class='col-md-2 control-label'> Chip et module :</label>
    <div class ='col-md-4 inputGroupContainer'>
      <div class ='input-group'>
      <select name='chipmodule' class='form-control' >";
echo "<option value='0'>------</option>";

foreach ($resultat as $v){
              $id=$v['chip'];
              $id2=$v['module'];
              echo "<option>$id   $id2</option>";
          }
  
echo "</div>
     </div>
</select>";
mysqli_close($con);
 }
?>