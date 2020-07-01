<?php 
    include 'inc/connection.php';
    
    
    $requette="SELECT * FROM ssd WHERE id_ssd LIKE '".$_REQUEST['id_ssd']."'";
    
         $sql=mysqli_query($connection ,$requette);
         while($row  = mysqli_fetch_array($sql)){
         //echo '<pre>';print_r($row);echo'</pre>';
    ?>
    <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" align="center"> MODIFIER SSD </h4>
          </div>
          <div class="modal-body">
              <div class="form-group">
              
              	<h4><label><?php echo $_REQUEST['id_ssd']?> </label></h4>
				
				<input type="hidden" name="id_ssd" id="id_ssd" value="<?php echo $_REQUEST['id_ssd']?>">
				
				<div class="form-group">
                <label>Fabriquant</label>
                <input type="text" id="fabriquant" class="form-control" name="fabriquant" value="<?php echo $row['fabriquant'];?>" >
                </div>
	
				<div class="form-group">
                <label>Capacite de stockage</label>
                <input type="number" id="cap_stockage" class="form-control" name="cap_stockage" value="<?php echo $row['cap_stockage'];?>" step="0.2">
                </div>
                
                <div class="form-group">
                <label>Systeme d'exploitation</label>
                <input type="text" id="os" class="form-control" name="os" value="<?php echo $row['os'];?>">
                </div>
                
       <?php } ?>
       </div>
			
			<input type="hidden" id="userId" class="form-control">
          </div>
          
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" class="btn btn-primary pull-right" id="save">Update</button>
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          </div>
        </div>
        
<script>   

  
     $('#save').click(function(){
        
          var id_ssd  = $('#id_ssd').val(); 
          var fabriquant =  $('#fabriquant').val();
          var cap_stockage =   $('#cap_stockage').val();
          var os =   $('#os').val();
		 var method="ssd" ;        
          $.ajax({
              url      : 'requette.php',
              method   : 'post', 
              data     : {id_ssd:id_ssd , fabriquant:fabriquant , cap_stockage:cap_stockage , os:os , method:method  },
              success  : function(response){
                  
                            // now update user record in table 
                          <!--     $('#'+id).children('td[data-target=node]').text(node);  -->
                             $('#ssd'+id_ssd).children('td[data-target=fabriquant]').text(fabriquant);
                             $('#ssd'+id_ssd).children('td[data-target=cap_stockage]').text(cap_stockage);
                             $('#ssd'+id_ssd).children('td[data-target=os]').text(os);
                             $('#myModal').modal('toggle'); 

                         }
          });
       });
      
      </script>
       
        	
        
        
        
        
        
        
        
        
        
       