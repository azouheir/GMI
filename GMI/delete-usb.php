<?php 
    include'inc/connection.php';
    $requette="SELECT * FROM usb WHERE id_usb LIKE '".$_REQUEST['id_usb']."'";
    $sql=mysqli_query($connection ,$requette);
    while($row  = mysqli_fetch_array($sql)){
    
?>

<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
     <h3 class="modal-title" align="center">SUPPRIMER USB :</h3>

</div>
 <div class="modal-body">
       <p align="center"> êtes-vous sûr de vouloir supprimer <u> <?php echo $_REQUEST['id_usb']?> ? </u> </p>
 </div>
 <div class="modal-footer">
            <button type="submit" class="btn btn-danger" class="btn btn-primary pull-right" id="supp" value="<?php echo $row['id_usb'];?>">oui</button>
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">annuler</button>
          <?php }?>
 </div>
 <script>   

$(document).ready(function(){
	$('#supp').click(function(){
		 var id_usb =this.value;
		 //alert(id_serveur);
		 var method="susb";
		 $.ajax({
			 url : 'requette-sup.php',
			 method : 'post',
			 data : {id_usb:id_usb},
			 success  : function(response){
				 $("#usb"+id_usb).empty();
				 $('#myModal').modal('toggle');
			 }
})
	});
});
 
      </script>
       
    