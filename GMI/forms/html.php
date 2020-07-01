<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Ajouter un péripherique </title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
 
  
   <form class="forme-horizontal" action="ajouterpériphrique.php" method="post" id="id_form" >
   <fieldset>
   <legend> NODE </legend>
   <div class="form-group">
   <label class="col-md-4-control-label"> id_node :</label>
    <div class =" col-md-4 inputGroupContainer">
     	<div class ="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user "></i></span>
     	<input name="id_node" placeholder="Id node" class="form-control" type="text">
     	
     </div>
     </div>
   </div>
   <div class="form-group">
   <label class="col-md-4-control-label"> Adresse_Ip :</label>
    <div class =" col-md-4 inputGroupContainer">
     	<div class ="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user "></i></span>
     	<input name="adresse_ip" placeholder="Adresse ip " class="form-control" type="text">
     	</div>
     </div>
   </div>
    <div class="form-group">
   <label class="col-md-4-control-label"> Adresse_Mac :</label>
    <div class =" col-md-4 inputGroupContainer">
     	<div class ="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user "></i></span>
     	<input name="adresse_mac"   placeholder="Adresse mac " class="form-control" type="text">
     	</div>
     </div>
   </div>
    <div class="form-group">
   <label class="col-md-4-control-label"> Marque(CPU):</label>
    <div class =" col-md-4 inputGroupContainer">
     	<div class ="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user "></i></span>
     	<input name="marque_cpu"   placeholder="Marque cpu "  class="form-control" type="text">
     	</div>
     </div>
   </div>
  <div class="form-group">
   <label class="col-md-4-control-label"> Type(CPU) :</label>
    <div class =" col-md-4 inputGroupContainer">
     	<div class ="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user "></i></span>
     	<input name="type_cpu" placeholder="Type cpu" class="form-control" type="text">
     	</div>
     </div>
   </div>
  <div class="form-group">
   <label class="col-md-4-control-label"> Fréquence(CPU):</label>
    <div class =" col-md-4 inputGroupContainer">
     	<div class ="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user "></i></span>
     	<input name="frequence_cpu" placeholder="Frequence cpu en Ghz " class="form-control" type="text">
     	</div>
     </div>
   </div>
 <div class="form-group">
   <label class="col-md-4-control-label"> Socket:</label>
    <div class =" col-md-4 inputGroupContainer">
     	<div class ="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user "></i></span>
     	<input name="socket" placeholder="Socket"  class="form-control" type="text">
     	</div>
     </div>
   </div>
 <div class="form-group">
   <label class="col-md-4-control-label"> Capacité(RAM):</label>
    <div class =" col-md-4 inputGroupContainer">
     	<div class ="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user "></i></span>
     	<input name="capacite_ram" placeholder="Capacité ram en To " class="form-control" type="text">
     	</div>
     </div>
   </div>
    <div class="form-group">
   <label class="col-md-4-control-label"> Marque(RAM):</label>
    <div class =" col-md-4 inputGroupContainer">
     	<div class ="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user "></i></span>
     	<input name="marque_ram" placeholder="Marque ram " class="form-control" type="text">
     	</div>
     </div>
   </div>
   <div class="form-group">
   <label class="col-md-4-control-label"> Type(RAM):</label>
    <div class =" col-md-4 inputGroupContainer">
     	<div class ="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user "></i></span>
     	<select name="type_ram" class="form-control">
     	<option>SDR</option>
     	<option>DDR</option>
     	<option>DDR2</option>
     	<option>DDR3</option>
     	<option>DDR4</option>
     	</select>
     	</div>
     </div>
   </div>
   <div class="form-group">
   <label class="col-md-4-control-label"> Selectionner un Switch:</label>
    <div class =" col-md-4 inputGroupContainer">
     	<div class ="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user "></i></span>
     	<?php 
     	  $con=mysqli_connect('localhost','root','','pfe');
     	  $res=$con->query("SELECT id_switch,nb_port,COUNT(id_node) FROM `switch` LEFT OUTER JOIN node USING(id_switch) GROUP BY (id_switch) HAVING COUNT(id_node) < nb_port-1;");
     	?><select name="id_switch" class="form-control">
 					<?php 
 					foreach ($res as $v){
 					    $id=$v['id_switch'];
 					    echo "<option>$id</option>";
 					}
 					?>    	
     	</select>

     	</div>
     </div>
   </div>
 
  
   
   <div class="form-inline">
    <div class ="">
     <button type="submit"  class="btn btn-warning">Enregister<span class="glyphicon glyphicon-send"></span></button> 
     	</div>
<!--    </div> -->
<!--     <div class="form-group"> -->
   <label class="col-md-4-control-label"></label>
    <div class =" col-md-4">
     <button type="submit"  class="btn btn-warning">Enregister et lie avec un SSD <span class="glyphicon glyphicon-send"></span></button> 
     	</div>
   </div>
   </fieldset>
   
   </form>
   
  
  
  
  
  
  
  















</body>


















</html>
