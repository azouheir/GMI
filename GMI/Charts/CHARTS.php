<?php 

  $con = mysqli_connect('localhost', 'root', '','gmi'); 
      $resu=$con->query("SELECT id_cluster FROM cluster;");
      
      foreach($resu as $val){
        $id=$val['id_cluster'];
        break;
      }
?>
 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<div class="well">
<legend>Caractéristiques et performances</legend><br>
  <div class="skills">
  <div class="charts" style="position: static;">
    <?php if($_SESSION['var']==$id){?>
    <div class="container col-xs-6">
    <h2><i class='fa fa-server fa-xs'></i>   Serveurs</h2>
    <div class="chart chart--dev">
      <span class="chart__title"><i class="fa fa-microchip fa-lg"></i>  Processeur</span>
      <ul class="chart--horiz">
      <?php 
      include("Perfcpu_serv.php"); 
      ?>
      </ul>
    </div>
    <div class="chart chart--dev">
      <span class="chart__title"><i class="glyphicon glyphicon-barcode"></i>  Mémoire vive</span>
      <ul class="chart--horiz">
      <?php 
      include("PerfRAM_serv.php"); 
      ?>
      </ul>
    </div>
    <div class="chart chart--dev">
      <span class="chart__title"><i class='fa fa-hdd-o fa-lg'></i>   Capacité de stockage</span>
      <ul class="chart--horiz">
      <?php 
      include("PerfSSD_serv.php"); 
      ?>
      </ul>
    </div>
    </div><?php } ?>

     <div class="container col-xs-6">
         <h2><i class='material-icons'>memory</i>  Nodes </h2>
     <div class="chart chart--dev">
      <span class="chart__title"><i class='fa fa-hdd-o fa-lg'></i>   Capacité de stockage</span>
      <ul class="chart--horiz">
      <?php 
      include("PerfSSD_node.php"); 
      ?>
      </ul>
    </div>
    <div class="chart chart--dev">
      <span class="chart__title"><i class="fa fa-microchip fa-lg"></i>  Processeur</span>
      <ul class="chart--horiz">
      <?php 
      include("Perfcpu_node.php"); 
      ?>
      </ul>
    </div>
    <div class="chart chart--dev">
      <span class="chart__title"><i class="glyphicon glyphicon-barcode"></i>   Mémoire vive</span>
      <ul class="chart--horiz">
      <?php 
      include("PerfRAM_node.php"); 
      ?>
      </ul>
    </div>
    </div>
  </div>
  </div>
</div>



  <script src='http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular.min.js'></script>
