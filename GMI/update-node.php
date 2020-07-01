 <?php 
    include 'inc/connection.php';
    
    
    $requette="SELECT * FROM node WHERE id_node LIKE '".$_REQUEST['id_node']."'";
    
         $sql=mysqli_query($connection ,$requette);
         while($row  = mysqli_fetch_array($sql)){
         //echo '<pre>';print_r($row);echo'</pre>';
    ?>
    <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 align="center" class="modal-title">MODIFIER NODE </h4>
          </div>
          <div class="modal-body">
              <div class="form-group">
              
              	<h4><label> <?php echo $_REQUEST['id_node']?>: </label></h4>
				<br>
				<input type="hidden" name="id_node" id="id_node" value="<?php echo $_REQUEST['id_node']?>">
				
				<div class="form-group">
                <label>Adresse IP</label>
                <input type="text" id="adresse_ip" class="form-control" name="adresse_ip" value="<?php echo $row['adresse_ip'];?>" pattern="((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)" title="Adresse IPV4 Invalide !">
                </div>
	
				<div class="form-group">
                <label>Adresse MAC</label>
                <input type="text" id="adresse_mac" class="form-control" name="adresse_mac" value="<?php echo $row['adresse_mac'];?>"  pattern="([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})" title="Adresse MAC Invalide !">
                </div>
				
				<div class="form-group">
                <label>Processeur</label>
                <input type="text" id="marque_cpu" class="form-control" name="marque_cpu" value="<?php echo $row['marque_cpu'];?>" >
                </div>
                
                <div class="form-group">
                <label>Fréquence</label>
                <input type="number" id="freq_cpu" class="form-control" name="freq_cpu" value="<?php echo $row['freq_cpu'];?>" step="0.2" >
                </div>
                
                <div class="form-group">
                <label>Nombre des coeurs</label>
                <input type="number" id="nb_coeur" class="form-control" name="nb_coeur" value="<?php echo $row['nb_coeur'];?>" min="1">
                </div>
                
                <div class="form-group">
                <label>Marque RAM</label>
                <input type="text" id="marque_ram" class="form-control" name="marque_ram" value="<?php echo $row['marque_ram'];?>" >
                </div>
                
                <div class="form-group">
                <label>Capacité RAM</label>
                <input type="number" id="cap_ram" class="form-control" name="cap_ram" value="<?php echo $row['cap_ram'];?>" step="0.2" >
                </div>
                
                <div class="form-group">
                <label>Type RAM</label>
                <input type="text" id="type_ram" class="form-control" name="type_ram" value="<?php echo $row['type_ram'];?>" >
                </div>
                
                <div class="form-group">
                <label>Chip et Module</label>
                <input type="text" id="chip_module" class="form-control" name="chip_module" value="<?php echo $row['chip_module'];?>" >
                </div>
                
                <div class="form-group">
                <label>Nombre des ports USB</label>
                <input type="text" id="nb_port_usb" class="form-control" name="nb_port_usb" value="<?php echo $row['nb_port_usb'];?>" >
                </div>
                
                <div class="form-group">
                <label>Date installation</label>
                <input type="date" id="date_instal" class="form-control" name="date_instal" value="<?php echo $row['date_instal'];?>" >
                </div>

 <?php } ?>
				</div>
				</ul>
				<input type="hidden" id="userId" class="form-control">	  
	  
	  			<input type="hidden" id="userId" class="form-control">
	  			</div>
	  			
	  			<div class="modal-footer">
           		 <button type="submit" class="btn btn-success" class="btn btn-primary pull-right" id="save">Update</button>
            	<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          		</div>
        </div>
	  			
	  			
 <script>   

  
     $('#save').click(function(){
        
          var id_node  = $('#id_node').val(); 
          var adresse_ip  = $('#adresse_ip').val(); 
          var adresse_mac  = $('#adresse_mac').val(); 
          var marque_cpu  = $('#marque_cpu').val(); 
          var freq_cpu  = $('#freq_cpu').val(); 
          var nb_coeur  = $('#nb_coeur').val(); 
          var marque_ram  = $('#marque_ram').val(); 
          var cap_ram  = $('#cap_ram').val(); 
          var type_ram  = $('#type_ram').val();
          var chip_module  = $('#chip_module').val(); 
          var nb_port_usb  = $('#nb_port_usb').val(); 
          var date_instal  = $('#date_instal').val();  
          
		 var method="node" ;        
          $.ajax({
              url      : 'requette.php',
              method   : 'post', 
              data     : {id_node:id_node , adresse_ip:adresse_ip , adresse_mac:adresse_mac , marque_cpu:marque_cpu , freq_cpu:freq_cpu , nb_coeur:nb_coeur , marque_ram:marque_ram ,cap_ram:cap_ram , type_ram:type_ram , chip_module:chip_module , nb_port_usb:nb_port_usb , date_instal:date_instal , method:method  },
              success  : function(response){
                  
                            // now update user record in table 
                          <!--     $('#'+id).children('td[data-target=node]').text(node);  -->
                             $('#node'+id_node).children('td[data-target=adresse_ip]').text(adresse_ip);
                             $('#node'+id_node).children('td[data-target=adresse_mac]').text(adresse_mac);
                             $('#node'+id_node).children('td[data-target=marque_cpu]').text(marque_cpu);
                             $('#node'+id_node).children('td[data-target=freq_cpu]').text(freq_cpu);
                             $('#node'+id_node).children('td[data-target=nb_coeur]').text(nb_coeur);
                             $('#node'+id_node).children('td[data-target=marque_ram]').text(marque_ram);
                             $('#node'+id_node).children('td[data-target=cap_ram]').text(cap_ram);
                             $('#node'+id_node).children('td[data-target=type_ram]').text(type_ram);
                             $('#node'+id_node).children('td[data-target=chip_module]').text(chip_module);
                             $('#node'+id_node).children('td[data-target=nb_port_usb]').text(nb_port_usb);
                             $('#node'+id_node).children('td[data-target=date_instal]').text(date_instal);
                             $('#myModal').modal('toggle'); 

                         }
          });
       });
      
      </script>
       
	  
	  
	  
	  
	  
	  
	  