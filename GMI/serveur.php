<?php 
include 'inc/connection.php';

?>

<meta charset="UTF-8">



<?php 
$req="SELECT * FROM cluster 
WHERE cluster.id_cluster LIKE '".$_REQUEST['id_c']."'";

$sql=mysqli_query($connection ,$req);
WHILE($row = mysqli_fetch_array($sql)){
    ?>
  
<div class="a" id="div<?php  echo $row['id_cluster'] ; ?>">



<i class="tree-indicator glyphicon glyphicon-chevron-right"></i><a href="#" id="se">GESTION DES SERVEURS : </a> 
<div class="container" id="table-serveur">
			<?php 
			 $requette="SELECT * FROM serveur 
                        INNER JOIN cluster ON serveur.id_cluster = cluster.id_cluster
                        WHERE cluster.id_cluster LIKE '".$row['id_cluster']."'";
			 $sqi=mysqli_query($connection ,$requette);
			 $r = mysqli_fetch_array($sqi);
			 if($r){?>
			 <center>
	<table class="table table-hover table-bordered table-responsive table-condensed"  id="table-serveur">
		<thead>
			<tr class='bg-info'>
				<th>Libellé</th>
				<th>Adresse IP</th>
				<th>Adresse MAC</th>
				<th>Constructeur</th>
				<th>Système d'exploitation</th>
				<th>Processeur</th>
				<th>Coeurs</th>
				<th>Memoire vive</th>
				<th>Frequence</th>
				<th>Stockage</th>
				<th>Date d'installation</th>
				<th style="text-align: center;" colspan="2">Action </th>
			</tr>
		</thead>
		
		<tbody>
			
			 <?php
			 mysqli_data_seek($sqi,0);
			 while($r = mysqli_fetch_array($sqi)){
			    ?>
			    <tr id="serveur<?php echo $r['id_serveur']?>">
			    	<!-- <th> <?php echo $r['id_serveur'];?> </th>  -->
			    	<td data-target="id_serveur"> <?php echo $r['id_serveur'];?> </td>
			    	<td data-target="adresse_ip"> <?php echo $r['adresse_ip'];?> </td>
			    	<td data-target="adresse_mac"> <?php echo $r['adresse_mac'];?> </td>
			    	<td data-target="constructeur"> <?php echo $r['constructeur'];?> </td>
			    	<td data-target="os"> <?php echo $r['os'];?> </td>
			    	<td data-target="cpu"> <?php echo $r['cpu'];?> </td>
			    	<td data-target="nb_coeur"> <?php echo $r['nb_coeur'];?> </td>
			    	<td data-target="cap_ram"> <?php echo $r['cap_ram']." Go";?> </td>
					<td data-target="freq_cpu"> <?php echo $r['freq_cpu']." Ghz";?> </td>
					<td data-target="cap_stock"> <?php echo $r['cap_stock']." Go";?> </td>
					<td data-target="date_instal"> <?php echo $r['date_instal'];?> </td>		    
			   		<td align='center'><a data-role="update-serveur" id="<?php echo $r['id_serveur'] ;?>"><button type='button' class='btn btn-success btn-xs'><i title="modifier" class="fa fa-edit"></i> Modifier</button> </a></td>
			   		<td align='center'><a data-role="delete-serveur" id="<?php echo $r['id_serveur'] ;?>"><button type='button' class='btn btn-danger btn-xs'><i title="supprimer" class="fa fa-trash"></i> Supprimer</button> </a></td>
			    </tr>
			 <?php } ?>   
		</tbody>
	</table>
	</center>
	<?php } ?>
</div>
<br>
<br>
<i class="tree-indicator glyphicon glyphicon-chevron-right"></i><a href="#" id="n">	GESTION DES NODES : </a>
	
	<div id="table-node">
	<?php
	$str="DEFAULT_".substr($_REQUEST['id_c'], 8);
				    $re="SELECT node.* FROM node
                        INNER JOIN cluster ON node.id_cluster = cluster.id_cluster
                        WHERE cluster.id_cluster LIKE '".$row['id_cluster']."'
                        AND node.id_rack='$str' " ;
				    $sq=mysqli_query($connection , $re);
				    $roo = mysqli_fetch_array($sq);
				    if($roo){
	?>
		<table class="table table-hover table-bordered table-responsive table-condensed"  id="table-node">
			<thead>
				<tr class='bg-info'>
					<th> Libellé </th>
					<th> Adresse IP </th>
					<th> Adresse MAC </th>
					<th> Processeur </th>
					<th> Fréquence </th>
					<th> Coeurs </th>
					<th> Marque RAM </th>
					<th> Mémoire vive</th>
					<th> Type RAM </th>
					<th> Chip</th>
					<th> Ports USB </th>
					<th> Date d'installation </th>
					<th style="text-align: center;" colspan="2"> Action </th>
				</tr>
			</thead>
			<tbody>
				 <?php 
				 	 mysqli_data_seek($sq,0);
				    while ($roo = mysqli_fetch_array($sq)){
				    ?>
				    <tr id="node<?php echo $roo['id_node']?>">
				    
				    	<td data-target="id_node"> <?php echo $roo['id_node'];?> </td>
				    	<td data-target="adresse_ip"> <?php echo $roo['adresse_ip'];?> </td>
			    		<td data-target="adresse_mac"> <?php echo $roo['adresse_mac'];?> </td>
				    	<td data-target="marque_cpu"> <?php echo $roo['marque_cpu'];?> </td>
				    	<td data-target="freq_cpu"> <?php echo $roo['freq_cpu']." Ghz";?> </td>
				    	<td data-target="nb_coeur"> <?php echo $roo['nb_coeur'];?> </td>
				    	<td data-target="marque_ram"> <?php echo $roo['marque_ram'];?> </td>
				    	<td data-target="cap_ram"> <?php echo $roo['cap_ram']." Go";?> </td>
				    	<td data-target="type_ram"> <?php echo $roo['type_ram'];?> </td>
				    	<td data-target="chip_module"> <?php echo $roo['chip_module'];?> </td>
				    	<td data-target="nb_port_usb"> <?php echo $roo['nb_port_usb'];?> </td>
				    	<td data-target="date_instal"> <?php echo $roo['date_instal'];?> </td>
				    	<td align='center'> <a data-role="update-node" id="<?php echo $roo['id_node'] ;?>"><button type='button' class='btn btn-success btn-xs'><i title="modifier" class="fa fa-edit"></i>Modifier</button> </a></td> 
        		<td align='center'><a data-role="delete-node" id="<?php echo $roo['id_node'] ;?>"><button type='button' class='btn btn-danger btn-xs'><i title="supprimer" class="fa fa-trash"></i> Supprimer</button></a></td>
				    </tr>
				    <?php } ?>
			</tbody>
		</table> 
		<?php } ?>
	</div>
	<br>
	<br>
	
	
	
<i class="tree-indicator glyphicon glyphicon-chevron-right"></i><a href="#" id="u">	GESTION DES USB : </a> 
	
	<div id="table_usb">
	<?php
					$a="SELECT usb.* FROM usb
                    INNER JOIN node ON usb.id_node = node.id_node
                    INNER JOIN cluster ON node.id_cluster = cluster.id_cluster
                    WHERE cluster.id_cluster LIKE '".$row['id_cluster']."'";
				//echo $a;
				$sq=mysqli_query($connection , $a);
				$ro = mysqli_fetch_array($sq);
				if($ro){
				    	?>
		<table class="table table-hover table-bordered table-responsive table-condensed" id="table-usb">
			<thead>
				<tr class='bg-info'>
					<th> Libellé </th>
					<th> Fabriquant </th>
					<th> Capacité de stockage </th>
					<th> Node </th>
					<th style="text-align: center;"> Action </th>
				</tr>
			</thead>
			<tbody>
				<?php
				mysqli_data_seek($sq,0);
				while ($ro = mysqli_fetch_array($sq)){
				?>
				<tr id="usb<?php echo $ro['id_usb']?>">
				<!-- <th> <?php echo $r['id_usb'];?> </th>  -->
					<td data-target="id_usb"> <?php echo $ro['id_usb'];?> </td>
					<td data-target="marque_usb"> <?php echo $ro['marque_usb'];?> </td>
					<td data-target="cap_stock"> <?php echo $ro['cap_stock']." Go";?> </td>
					<td> <?php echo $ro['id_node'];?> </td>
					<td align='center'> <a data-role="update-usb" id="<?php echo $ro['id_usb'] ;?>"><button type='button' class='btn btn-success btn-xs'><i title="modifier" class="fa fa-edit"></i> Modifier</button></a>  
        			<a data-role="delete-usb" id="<?php echo $ro['id_usb'] ;?>"><button type='button' class='btn btn-danger btn-xs'><i title="supprimer" class="fa fa-trash"></i> Supprimer</button></a></td>
				</tr>
			<?php }?>
			</tbody>
		</table>
		<?php } ?>
	</div>
	
<br>	
<i class="tree-indicator glyphicon glyphicon-chevron-right"></i><a href="#" id="s"> GESTION DES SSD : </a>
	
<div id="table-ssd">
				<?php
				$b="SELECT ssd.* FROM ssd
                    INNER JOIN node ON ssd.id_node = node.id_node
                    INNER JOIN cluster ON node.id_cluster = cluster.id_cluster
                    WHERE cluster.id_cluster LIKE '".$row['id_cluster']."'";
				$s=mysqli_query($connection , $b);
				$rw = mysqli_fetch_array($s);
			 if($rw){?>
		<table class="table table-hover table-bordered table-responsive table-condensed" id="table-ssd">
			<thead>
				<tr class='bg-info'>
					<th> Libellé </th>
					<th> Fabriquant </th>
					<th> Capacité de stockage</th>
					<th> Système d'exploitation </th>
					<th> Node </th>
					<th style="text-align: center;"> Action </th>
				</tr>
			</thead>
			<tbody>
				<?php 
				mysqli_data_seek($s,0);
				while ($rw = mysqli_fetch_array($s)){
				    	//echo '<pre>';print_r($row);echo'</pre>';
				?>
				<tr id="ssd<?php echo $rw['id_ssd']?>">
				<!-- <th> <?php echo $rw['id_ssd'];?> </th>  -->
					<td data-target="id_ssd"> <?php echo $rw['id_ssd'];?> </td>
					<td data-target="fabriquant"> <?php echo $rw['fabriquant'];?> </td>
					<td data-target="cap_stockage"> <?php echo $rw['cap_stockage']." Go";?> </td>
					<td data-target="os"> <?php echo $rw['os'];?> </td>
					<td> <?php echo $rw['id_node'];?> </td>
					<td align="center"> <a data-role="update-ssd" id="<?php echo $rw['id_ssd'] ;?>"><button type='button' class='btn btn-success btn-xs'><i title="modifier" class="fa fa-edit"></i> Modifier</button></a>  </td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
		<?php } ?>
</div>
<br>
<br>
<i class="tree-indicator glyphicon glyphicon-chevron-right"></i><a href="#" id="r">  GESTION DES RACKS :</a> 

 <div id="table-rack">
 <?php 
 $re="SELECT node.* FROM node
                        INNER JOIN cluster ON node.id_cluster = cluster.id_cluster
                        WHERE cluster.id_cluster LIKE '".$row['id_cluster']."'
                        AND node.id_rack <> '$str' " ;
				    // echo $re;
				    $sq=mysqli_query($connection , $re);
				    $roo = mysqli_fetch_array($sq);
			 if($roo){
				    ?>
    	<table class="table table-hover table-bordered table-responsive table-condensed"  id="table-rack-node" >
    		
			<thead>
				<tr class='bg-info'>
					<th> Rack</th>
					<th> Nodes </th>
					<th> Adresse IP </th>
					<th> Adresse MAC </th>
					<th> Processeur </th>
					<th> Fréquence</th>
					<th> Coeurs</th>
					<th> Marque RAM</th>
					<th> Mémoire vive</th>
					<th> Type</th>
					<th> Chip</th>
					<th> Ports USB </th>
					<th> Date d'installation </th>
					<th style="text-align: center;" colspan="2"> Action </th>
				</tr>
			</thead>
			<tbody>
				 <?php 
				    mysqli_data_seek($sq,0);
				    while ($roo = mysqli_fetch_array($sq)){
				    ?>
				    <tr id="node<?php echo $roo['id_node']?>">
				    	<td data-target="id_rack" title="<?php echo $roo['date_instal'];?>"> <?php echo $roo['id_rack'];?> </td>
				    	<td data-target="id_node"> <?php echo $roo['id_node'];?> </td>
				    	<td data-target="adresse_ip"> <?php echo $roo['adresse_ip'];?> </td>
			    		<td data-target="adresse_mac"> <?php echo $roo['adresse_mac'];?> </td>
				    	<td data-target="marque_cpu"> <?php echo $roo['marque_cpu'];?> </td>
				    	<td data-target="freq_cpu"> <?php echo $roo['freq_cpu']." Ghz";?> </td>
				    	<td data-target="nb_coeur"> <?php echo $roo['nb_coeur'];?> </td>
				    	<td data-target="marque_ram"> <?php echo $roo['marque_ram'];?> </td>
				    	<td data-target="cap_ram"> <?php echo $roo['cap_ram']." Go";?> </td>
				    	<td data-target="type_ram"> <?php echo $roo['type_ram'];?> </td>
				    	<td data-target="chip_module"> <?php echo $roo['chip_module'];?> </td>
				    	<td data-target="nb_port_usb"> <?php echo $roo['nb_port_usb'];?> </td>
				    	<td data-target="date_instal"> <?php echo $roo['date_instal'];?> </td>
				    	<td align="center"><a data-role="update-node" id="<?php echo $roo['id_node'] ;?>"><button type='button' class='btn btn-success btn-xs'><i title="modifier" class="fa fa-edit"></i> Modifier</button></a></td>  
        		        <td align="center"><a data-role="delete-rack-node" id="<?php echo $roo['id_node'] ;?>"><button type='button' class='btn btn-danger btn-xs'><i title="supprimer" class="fa fa-trash"></i> Enlever</button></a></td>
				    </tr>
				    <?php }?>
			</tbody>
    	</table>
    	<?php } ?> 
    
    </div>
    
</div>
	
	
	
</div>
<?php }?>
<div class="container"><?php $_SESSION['var']=$_REQUEST['id_c']; include('charts/CHARTS.php'); ?></div>

<script>
$(document).ready(function(){
	$("#table-serveur").hide();
    $("#se").click(function(){
    	//$(".").css("display", "none");
        $("#table-serveur").toggle();
	});
    $("#table-node").hide();
    $("#n").click(function(){
    	//$(".a").css("display", "none");
        $("#table-node").toggle();
	});
    $("#table-usb").hide();
    $("#u").click(function(){
    	//$(".a").css("display", "none");
        $("#table-usb").toggle();
	});
    $("#table-ssd").hide();
    $("#s").click(function(){
    	//$(".a").css("display", "none");
        $("#table-ssd").toggle();
	});
    $("#table-rack").hide();
    $("#r").click(function(){
    	//$(".a").css("display", "none");
        $("#table-rack").toggle();
	});
});
</script>




