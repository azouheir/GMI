<?php 
    include'inc/connection.php';
    $requette="SELECT * FROM node WHERE id_node LIKE '".$_REQUEST['id_node']."'";
    $sql=mysqli_query($connection ,$requette);
    while($row  = mysqli_fetch_array($sql)){
    
?>

<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
    <h3 class="modal-title" align="center">SUPPRIMER NODE :</h3>

</div>
 <div class="modal-body">
       <p align="center"> êtes-vous sûr de vouloir supprimer <u> <?php echo $_REQUEST['id_node']?> ? </u> </p>
 </div>
 <div class="modal-footer">
            <button type="submit" class="btn btn-danger" class="btn btn-primary pull-right" id="suppp" value="<?php echo $row['id_node'];?>">oui</button>
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">annuler</button>
          <?php }?>
 </div>
 <script>   

$(document).ready(function(){
	
	$('#suppp').click(function(){
		 var id_node =this.value;
		 var method="defaultrack";
		 $.ajax({
			 url : 'update-rack.php',
			 method : 'post',
			 data : {id_node:id_node},
			 success  : function(response){
				 $("#node"+id_node).empty();
				 $('#myModal').modal('toggle');
			 }
})
	});
});
 
      </script>
       
        	