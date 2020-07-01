<?php 
    include 'inc/connection.php' ;
    
    $req="SELECT * FROM serveur WHERE id_serveur LIKE '".$_REQUEST['id_serveur']."'";
    $sql=mysqli_query($connection ,$req);
    while($row  = mysqli_fetch_array($sql)){
?>
	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 align="center" class="modal-title">MODIFIER SERVEUR</h4>
          </div>
          <div class="modal-body">
              <div class="form-group">
              
              <h4>	<label> <?php echo $_REQUEST['id_serveur']?> :  </label></h4>
				
				<input type="hidden" name="id_serveur" id="id_serveur" value="<?php echo $_REQUEST['id_serveur']?>">
				
				<div class="form-group">
                <label>Adresse IP</label>
                <input type="text" id="adresse_ip" class="form-control" name="adresse_ip" value="<?php echo $row['adresse_ip'];?>" pattern="((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)" title="Adresse IPV4 Invalide !">
                </div>
                
                <div class="form-group">
                <label>Adresse MAC</label>
                <input type="text" id="adresse_mac" class="form-control" name="adresse_mac" value="<?php echo $row['adresse_mac'];?>" pattern="([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})" title="Adresse MAC Invalide !">
                </div>
	
				<div class="form-group">
                <label>Conctructeur</label>
                <input type="text" id="constructeur" class="form-control" name="constructeur" value="<?php echo $row['constructeur'];?>">
                </div>
                
                <div class="form-group">
                <label>Systeme d'exploitation</label>
                <input type="text" id="os" class="form-control" name="os" value="<?php echo $row['os'];?>" >
                </div>
                
                <div class="form-group">
                <label>Processeur</label>
                <input type="text" id="cpu" class="form-control" name="cpu" value="<?php echo $row['cpu'];?>" >
                </div>
                
                <div class="form-group">
                <label>Nombre de coeurs</label>
                <input type="number" id="nb_coeur" class="form-control" name="nb_coeur" value="<?php echo $row['nb_coeur'];?>" >
                </div>
                
                <div class="form-group">
                <label>Capacité RAM</label>
                <input type="number" id="cap_ram" class="form-control" name="cap_ram" value="<?php echo $row['cap_ram'];?>" step="0.2">
                </div>
                
                <div class="form-group">
                <label>Frequence</label>
                <input type="number" id="freq_cpu" class="form-control" name="freq_cpu" value="<?php echo $row['freq_cpu'];?>"  step="0.2">
                </div>
                
                <div class="form-group">
                <label>Capacité de stockage</label>
                <input type="number" id="cap_stock" class="form-control" name="cap_stock" value="<?php echo $row['cap_stock'];?>"  step="0.2">
                </div>
                
                <div class="form-group">
                <label>Date d'installation</label>
                <input type="date" id="date_instal" class="form-control" name="date_instal" value="<?php echo $row['date_instal'];?>" >
                </div>
    
    <?php }?>    
    	</div>
			
			<input type="hidden" id="userId" class="form-control">
			 
				
                

<input type="hidden" id="userId" class="form-control">
          </div>
          
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" class="btn btn-primary pull-right" id="update_s">Update</button>
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          </div>
        </div>
        
        
         <script>   

  
     $('#update_s').click(function(){
        // alert(os);
        
          var id_serveur  = $('#id_serveur').val(); 
          var adresse_ip  = $('#adresse_ip').val(); 
          var adresse_mac  = $('#adresse_mac').val(); 
          var constructeur  = $('#constructeur').val(); 
          var os  = $('#os').val(); 
          var cpu  = $('#cpu').val(); 
          var nb_coeur  = $('#nb_coeur').val(); 
          var cap_ram  = $('#cap_ram').val(); 
          var freq_cpu  = $('#freq_cpu').val(); 
          var cap_stock  = $('#cap_stock').val();
          var date_instal  = $('#date_instal').val();
          

		 var method="serveur" ;        
          $.ajax({
              
              url      : 'requette.php',
              method   : 'post', 
              data     : {id_serveur:id_serveur , adresse_ip:adresse_ip , adresse_mac:adresse_mac , constructeur:constructeur , os:os, cpu:cpu ,nb_coeur:nb_coeur , cap_ram:cap_ram , freq_cpu:freq_cpu , cap_stock:cap_stock , date_instal:date_instal , method:method  },
              success  : function(response){
                  
                            // now update user record in table 
                          <!--     $('#'+id).children('td[data-target=node]').text(node);  -->
                             $('#serveur'+id_serveur).children('td[data-target=adresse_ip]').text(adresse_ip);
                             $('#serveur'+id_serveur).children('td[data-target=adresse_mac]').text(adresse_mac);
                             $('#serveur'+id_serveur).children('td[data-target=constructeur]').text(constructeur);
                             $('#serveur'+id_serveur).children('td[data-target=os]').text(os);
                             $('#serveur'+id_serveur).children('td[data-target=cpu]').text(cpu);
                             $('#serveur'+id_serveur).children('td[data-target=nb_coeur]').text(nb_coeur);
                             $('#serveur'+id_serveur).children('td[data-target=cap_ram]').text(cap_ram);
                             $('#serveur'+id_serveur).children('td[data-target=freq_cpu]').text(freq_cpu);
                             $('#serveur'+id_serveur).children('td[data-target=cap_stock]').text(cap_stock);
                             $('#serveur'+id_serveur).children('td[data-target=date_instal]').text(date_instal);
							 $('#myModal').modal('toggle'); 

                         }
          });
       });
      
      </script>
       