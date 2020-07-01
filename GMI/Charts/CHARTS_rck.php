<div class="well">
<legend>Caractéristiques et performances</legend><br>
  <div class="skills">
  <div class="charts" style="position: static;">
    <h2><i class='material-icons'>memory</i>   Nodes</h2>
  <div class="chart chart--dev">
      <span class="chart__title"><i class='fa fa-hdd-o fa-lg'></i>   Capacité de stockage</span>
      <ul class="chart--horiz">
      <?php 
      include("PerfSSD_node.php"); 
      ?>
      </ul>
    </div>
  <div class="chart chart--dev">
      <span class="chart__title"><i class="fa fa-microchip fa-lg"></i>   Processeur</span>
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
    <script src='http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular.min.js'></script>
