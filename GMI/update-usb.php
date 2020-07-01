<?php 
    include 'inc/connection.php';
    
    $req="SELECT * FROM usb WHERE id_usb LIKE '".$_REQUEST['id_usb']."'";
    $sql=mysqli_query($connection ,$req);
    while($row  = mysqli_fetch_array($sql)){
    ?>
    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 align="center" class="modal-title">MODIFIER USB</h4>
          </div>
          <div class="modal-body">
              <div class="form-group">
              
              <h4>	<label> <?php echo $_REQUEST['id_usb']?> :  </label></h4>
				
				<input type="hidden" name="id_usb" id="id_usb" value="<?php echo $_REQUEST['id_usb']?>">
				
				<div class="form-group">
                <label>Marque</label>
                <input type="text" id="marque_usb" class="form-control" name="marque_usb" value="<?php echo $row['marque_usb'];?>" >
                </div>
	
				<div class="form-group">
                <label>Capacite de stockage</label>
                <input type="number" id="cap_stock" class="form-control" name="cap_stock" value="<?php echo $row['cap_stock'];?>" step="0.2">
                </div>
    
    <?php }?>    
    	</div>
			
			<input type="hidden" id="userId" class="form-control">
			 
				
                

<input type="hidden" id="userId" class="form-control">
          </div>
          
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" class="btn btn-primary pull-right" id="uptade_u">Update</button>
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          </div>
        </div>
    	

 <script>   

  
     $('#uptade_u').click(function(){
         
        
          var id_usb  = $('#id_usb').val(); 
          var marque_usb =  $('#marque_usb').val();
          var cap_stock =   $('#cap_stock').val();
		 var method="usb" ;        
		 //alert(cap_stock);
          $.ajax({
              url      : 'requette.php',
     
              method   : 'post', 
              data     : {marque_usb : marque_usb , cap_stock : cap_stock, id_usb:id_usb , method:method  },
              success  : function(response){
                  
                            // now update user record in table 
                          <!--     $('#'+id).children('td[data-target=node]').text(node);  -->
                             $('#usb'+id_usb).children('td[data-target=marque_usb]').text(marque_usb);
                             $('#usb'+id_usb).children('td[data-target=cap_stock]').text(cap_stock);
                             $('#myModal').modal('toggle'); 

                         }
          });
       });
      
      </script>
       
        	
    	
    	
    	