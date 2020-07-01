
<?php 
    if (isset($_GET['id'])) 
    {
                $id=$_GET['id'];
                $row=0;
                $check=0;
                //Affichage Selon ID et affichage detail:
                        $res=$con->query("SELECT * FROM cluster WHERE id_cluster='$id'");
                        $row=$res->fetch_row();
      if ($row) {
                        /*AFFICHER CLUSTER DETAIL*/ 
                        ?>
                        <div  id="print"> 
                    <div class="container">          
                      <legend>Fiche technique</legend>
                              <table class="table table-hover table-bordered table-responsive " style="background-color: #ffffff">
                                     <thead>
                                       <tr class='bg-info'>
                                         <th>Cluster</th>
                                         <th>Code</th>
                                         <th>Date Installation</th>
                                         <th>Action</th>
                                       </tr>
                                     </thead>
                                      <tbody>
                                      <?php                 
                                                $res->data_seek(0); 
                                                while($row=$res->fetch_row()){
                                                  echo "<tr>";
                                                 for($i=0;$i<count($row)-1;$i++){
                                                  echo "<td>",$row[$i],"</td>";
                                                }
                                                }$check=1;                  
                                      ?>
                                      <td align='center'><button type='button' class='btn btn-danger btn-xs' onclick="showConfirmationNotification('confirmNotifi')"><i title='supprimer' class='fa fa-trash'></i> Supprimer</button></td>
                                      </tr>
                                      </tbody>
                              </table>
                      </div>
  
  <div id="confirmNotifi" class="confirmNotifi" onclick="hideConfirmationNotification(this)">
      <div class="content">
          <div class="title">
              <h2>Etes vous sûr de vouloir supprimer ce Cluster : <?php echo "$id"; ?>?</h2>
              Attention : La suppresion de ce Cluster produit la suppresion de ces descendants aussi !
          </div>
          <a href='delete-cluster.php?id=<?php echo $id;?>' style="color: black;"><div class="yes">Oui</div></a>
          <div class="no">Non</div>
      </div>
  </div>
  <script>
      function showConfirmationNotification(id){
          document.getElementById(id)
                  .classList.add("show");
      }
      
      function hideConfirmationNotification(x){
          x.classList.remove("show");
      }
  </script>

                          <?php
                          /*Serveur des cluster*/
                          $res=$con->query("SELECT * FROM serveur WHERE id_cluster='$id'  ");
                          if($row=$res->fetch_row()){?>
                    <div class="container">
                      <table class="table table-hover table-bordered table-responsive" style="background-color: #ffffff">
                          <?php
                          echo "
                          <thead>
                            <tr class='bg-warning'>
                                <th>Serveur</th>
                                <th>Adresse IP</th>
                                <th>Adresse MAC</th>
                                <th>Constructeur</th>
                                <th>CPU</th>
                                <th>Date d'installation</th>
                                <th>Details</th>
                              </tr>
                          </thead>
                          <tbody>";
                                       $res->data_seek(0); 
                                       while($row=$res->fetch_row()){
                                         echo "<tr>";
                                          echo "<td>$row[0]</td>
                                          <td>$row[1]</td>
                                          <td>$row[2]</td>
                                          <td>$row[3]</td>
                                          <td>$row[5]</td>
                                          <td>$row[10]</td>
                                          <td align='center'><button type='button' class='btn btn-warning btn-xs' onclick=\"window.location.href='Dash2.php?id=$row[0]'\">Details </button></td>";
                                        echo "</tr>";}
                          "</tbody>";}
                        ?>
                      </table>
                    </div>
                    <?php
                          /*node hors racks des cluster*/
                          $res=$con->query("SELECT * FROM node WHERE id_cluster='$id'");
                          if($row=$res->fetch_row()){?>
                    <div class="container">
                      <table class="table table-hover table-bordered table-responsive" style="background-color: #ffffff">
                          <?php
                          echo "
                          <thead>
                            <tr class='bg-warning'>
                                <th>Node</th>
                                <th>Adresse IP</th>
                                <th>Adresse MAC</th>
                                <th>Processeur</th>
                                <th>Mémoire vive</th>
                                <th>Date d'installation</th>
                                <th>Rack</th>
                                <th>Details</th>
                              </tr>
                          </thead>
                          <tbody>";
                                       $res->data_seek(0); 
                                       while($row=$res->fetch_row()){
                                         echo "<tr>";
                                          echo "<td>$row[0]</td>
                                          <td>$row[1]</td>
                                          <td>$row[2]</td>
                                          <td>$row[3] $row[4] Ghz</td>
                                          <td>$row[6] $row[7] Go</td>
                                          <td>$row[11]</td>
                                          <td><a href='Dash2.php?id=$row[13]'>$row[13]</a></td>
                                          <td align='center'><button type='button' class='btn btn-warning btn-xs' onclick=\"window.location.href='Dash2.php?id=$row[0]'\">Details </button></td>";
                                        echo "</tr>";}
                          "</tbody>";}
                        ?>
                      </table>
                    </div>
                         </div> 
                          <div class="container"><?php $_SESSION['var']=$id; include('charts/CHARTS.php'); ?></div>
                           <?php
              }
            $res=$con->query("SELECT * FROM rack WHERE id_rack ='$id'");
           $row=$res->fetch_row();
            if ($row) {
           /*AFFICHER Rack DETAIL*/ 
                            ?>
                            <div  id="print"> 
                    <div class="container">          
                      <legend>Fiche technique</legend>
                      <table class="table table-hover table-bordered table-responsive" style="background-color: #ffffff">
                        <thead>
                          <tr class='bg-info'>
                            <th>Rack</th>
                            <th>Date de création</th>
                            <th>Cluster</th> 
                            <?php
                            if(substr($row[0],0,7)!="DEFAULT"){
                            echo "<th>Action</th>";}
                            ?>
                          </tr>
                        </thead>
                          <tbody>
                            <?php   
                            $res->data_seek(0); 
                            while($row=$res->fetch_row()){
                            echo "<tr>";
                            for($i=0;$i<count($row)-1;$i++){
                            echo "<td>",$row[$i],"</td>";
                            }
                            echo "<td><a href='Dash2.php?id=$row[2]'>$row[2]</a></td>";
                            if(substr($row[0],0,7)!="DEFAULT"){
                            echo "<td align='center'><button type='button' class='btn btn-danger btn-xs' onclick=\"window.location.href='delete-rack.php?id=$row[0]'\"><i title='supprimer' class='fa fa-trash'></i> Supprimer</button></td>";}
                            echo "</tr>";
                            $check=1;                                }
                            ?>

                          </tbody>
                       </table>
                     </div>
                    
                          <?php
                          /*node racks*/
                          $res=$con->query("SELECT * FROM node WHERE id_rack='$id'");
                          if($row=$res->fetch_row()){?>
                    <div class="container">
                      <table class="table table-hover table-bordered table-responsive" style="background-color: #ffffff">
                          <?php
                          echo "
                          <thead>
                            <tr class='bg-warning'>
                                <th>Node</th>
                                <th>Adresse IP</th>
                                <th>Adresse MAC</th>
                                <th>Processeur</th>
                                <th>Mémoire vive</th>
                                <th>Date d'installation</th>
                                <th>Rack</th>
                                <th>Details</th>
                              </tr>
                          </thead>
                          <tbody>";
                                       $res->data_seek(0); 
                                       while($row=$res->fetch_row()){
                                         echo "<tr>";
                                          echo "<td>$row[0]</td>
                                          <td>$row[1]</td>
                                          <td>$row[2]</td>
                                          <td>$row[3] $row[4] Ghz</td>
                                          <td>$row[6] $row[7] Go</td>
                                          <td>$row[11]</td>
                                          <td>$row[13]</td>
                                          <td align='center'><button type='button' class='btn btn-warning btn-xs' onclick=\"window.location.href='Dash2.php?id=$row[0]'\">Details !</button></td>";
                                        echo "</tr>";}
                          "</tbody>";}
                        ?>
                      </table>
                    </div>
                    </div>
                    <div class="container"> <?php $_SESSION['var']=$id; include('charts/CHARTS_rck.php'); ?></div>
                        
                                          
                                          <?php
              }
        $res=$con->query("SELECT * FROM node WHERE id_node='$id'");
        $row=$res->fetch_row();
                                 if ($row){
                                 /*AFFICHER Node DETAIL*/ 
                                    ?>   
                                    <div  id="print">    
                    <div class="container">
                    <legend>Fiche technique</legend>       
                      <table class="table table-hover table-bordered table-responsive" style="background-color: #ffffff">
                        <tbody>
      
                                       <?php  
                                       $res->data_seek(0); 
                                   while($row=$res->fetch_row()){
                                     echo "<tr>";
                                          echo "<th class='bg-info'>Node</th><td>$row[0]</td></tr>
                                          <tr><th class='bg-info'>Adresse IP</th><td>$row[1]</td></tr>
                                          <tr><th class='bg-info'>Adresse MAC</th><td>$row[2]</td></tr>
                                          <tr><th class='bg-info'>Processeur</th><td>$row[3] $row[4] Ghz $row[5] coeurs</td></tr>
                                          <tr><th class='bg-info'>Mémoire vive</th><td>$row[6] $row[7] Go</td></tr>
                                          <tr><th class='bg-info'>Type de RAM</th><td>$row[8] $row[9]</td></tr>
                                          <tr><th class='bg-info'>Date d'installation</th><td>$row[11]</td></tr>
                                          <tr><th class='bg-info'>Rack</th><td><a href='Dash2.php?id=$row[13]'>$row[13]</a></td>";
                                        echo "</tr>";}
                                      $check=1;
                                                    ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="container">  
                         <?php
                             $res=$con->query("SELECT s.id_SSD,fabriquant,cap_stockage,os FROM ssd s JOIN node USING(id_node)
                              WHERE s.id_node='$id'");
                              if($row=$res->fetch_row()){ ?>
                                <legend>Dispositifs de stockage</legend>
                    <div class="container col-lg-6 col-md-6">
                      <table class="table table-hover table-bordered table-responsive" style="background-color: #ffffff">                            
                                    <thead>
                                    <tr class='bg-warning'>
                                         <th>SSD</th>
                                         <th>Fabriquant</th>
                                         <th>Capacité</th>
                                         <th>Système d'exploitation</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                   <?php
                                   $res->data_seek(0); 
                                   while($row=$res->fetch_row()){
                                                    echo "<tr>";
                                                    echo "<td>$row[0]</td>
                                                         <td>$row[1]</td>
                                                          <td>$row[2] Go</td>
                                                          <td>$row[3]</td>
                                    </tr>";}?>
                                   </tbody>
                      </table>
                    </div>
                         <?php }
                             $res=$con->query("SELECT id_USB,marque_usb,cap_stock FROM usb JOIN node USING(id_node)
                              WHERE id_node='$id'");
                            if($row=$res->fetch_row()){ ?>
                    <div class="container col-lg-6 col-md-6">
                      <table class="table table-hover table-bordered table-responsive" style="background-color: #ffffff">
                                    <thead>
                                     <tr class='bg-warning'>
                                          <th>USB</th>
                                          <th>Marque</th>
                                         <th>Capacité</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $res->data_seek(0); 
                                   while($row=$res->fetch_row()){
                                                    echo "<tr>";
                                                    echo "<td>$row[0]</td>
                                                          <td>$row[1]</td>
                                                          <td>$row[2] GB</td> 
                                                                       </tr>";}?>
                                    </tbody>
                          </table>
                    </div>
                    </div> 
                     </div><?php }}
                    $res=$con->query("SELECT * FROM ssd WHERE id_ssd='$id'");
                    $row=$res->fetch_row();
                 if ($row) {
                   /*AFFICHER SSD DETAIL*/ 
                  ?>
                  <div  id="print"> 
                   <div class="container">
                   <legend>Fiche technique</legend>          
                          <table class="table table-hover table-bordered table-responsive" style="background-color: #ffffff">
                            <thead>
                              <tr class='bg-warning'>
                                 <th>SSD</th>
                                 <th>Fabriquant</th>
                                 <th>Capacité de stockage</th> 
                                 <th>Système d'exploitation</th>
                                 <th>Node</th> 
                              </tr>
                            </thead>
                             <tbody>
                             <?php                  
                                        $res->data_seek(0); 
                                       while($row=$res->fetch_row()){
                                         echo "<tr>";
                                                    echo "<td>$row[0]</td>
                                                         <td>$row[1]</td>
                                                          <td>$row[2] Go</td>
                                                          <td>$row[3]</td>
                                                          <td><a href='Dash2.php?id=$row[4]'>$row[4]</a></td>
                                    </tr>";}$check=1;        
                              ?>
                             </tbody>
                          </table>
                    </div>
                    </div>
                    <?php }
                    $res=$con->query("SELECT * FROM usb WHERE id_usb='$id'");
                    $row=$res->fetch_row();
                 if ($row) {
                   /*AFFICHER USB DETAIL*/ 
                  ?>
                  <div  id="print"> 
                   <div class="container">
                   <legend>Fiche technique</legend>          
                          <table class="table table-hover table-bordered table-responsive" style="background-color: #ffffff">
                            <thead>
                              <tr class='bg-warning'>
                                 <th>USB</th>
                                 <th>Marque</th>
                                 <th>Capacité de stockage</th>
                                 <th>Node</th> 
                              </tr>
                            </thead>
                             <tbody>
                             <?php                  
                                      $res->data_seek(0); 
                                       while($row=$res->fetch_row()){
                                         echo "<tr>";
                                                    echo "<td>$row[0]</td>
                                                         <td>$row[1]</td>
                                                          <td>$row[2] GB</td>
                                                          <td><a href='Dash2.php?id=$row[3]'>$row[3]</a></td>
                                    </tr>";}$check=1;       
                              ?>
                             </tbody>
                          </table>
                    </div>
                    </div>
                    <?php }
                    $res=$con->query("SELECT * FROM serveur WHERE id_serveur='$id'");
                        $row=$res->fetch_row();
      if ($row) {
                        /*AFFICHER CLUSTER DETAIL*/ 
                        ?>
                        <div  id="print"> 
                    <div class="container">          
                      <legend>Fiche technique</legend>
                              <table class="table table-hover table-bordered table-responsive " style="background-color: #ffffff">
                                      <tbody>
                                      <?php                 
                                                $res->data_seek(0); 
                                                while($row=$res->fetch_row()){
                                                  echo "<tr>";
                                          echo "<th class='bg-success'>Serveur</th><td>$row[0]</td></tr>
                  <tr><th class='bg-success'>Adresse IP</th><td>$row[1]</td></tr>
                  <tr><th class='bg-success'>Adresse MAC</th><td>$row[2]</td></tr>
                  <tr><th class='bg-success'>Constructeur</th><td>$row[3]</td></tr>
                  <tr><th class='bg-success'>Système d'exploitation</th><td>$row[4]</td></tr>
                  <tr><th class='bg-success'>Processeur</th><td>$row[5] $row[8] Ghz $row[6] coeurs</td></tr>
                  <tr><th class='bg-success'>Mémoire vive</th><td>$row[7] Go</td></tr>
                  <tr><th class='bg-success'>Capacité de stockage</th><td>$row[9] Go</td></tr>
                  <tr><th class='bg-success'>Date d'installation</th><td>$row[10]</td></tr>
                  <tr><th class='bg-success'>Cluster</th><td><a href='Dash2.php?id=$row[11]'>$row[11]</a></td>";
                                        echo "</tr>";
                                                }$check=1;                  
                                      ?>
                                      </tbody>
                              </table>
                      </div></div>
                      <?php }
        if ($_GET['id']=='zone') {
          $res=$con->query("SELECT * FROM cluster ;");
                        $row=$res->fetch_row();
      if ($row) {
                        /*AFFICHER CLUSTER DETAIL*/ 
                        ?>
                        <div  id="print"> 
                    <div class="container">          
                      <legend>Fiche technique</legend>
                              <table class="table table-hover table-bordered table-responsive " style="background-color: #ffffff">
                                     <thead>
                                       <tr class='bg-info'>
                                         <th>Cluster</th>
                                         <th>Code</th>
                                         <th>Date Installation</th>
                                       </tr>
                                     </thead>
                                      <tbody>
                                      <?php                 
                                                $res->data_seek(0); 
                                                while($row=$res->fetch_row()){
                                                  echo "<tr>";
                                                  echo "<td><a href='Dash2.php?id=$row[0]'>$row[0]</a></td>";
                                                  echo "<td>$row[1]</td>";
                                                  echo "<td>$row[2]</td>";
                                                  echo "</tr>";
                                                }$check=1;                  
                                      ?>
                                      </tbody>
                              </table>
                      </div>
                      </div>
                      <div class="container"> <?php $_SESSION['var']='zone';include('charts/CHARTS.php'); ?></div>
       <?php } }
      if($check==0){ 
        echo "<div class='container' style='margin-top: 50px; align-self: center;width: 800px'>
                <div class='row'>
                  <div class='alert alert-danger alert-dismissable page-alert' role='alert'>
                    <button type='button' onclick='this.parentNode.parentNode.removeChild(this.parentNode);' class='close' data-dismiss='alert'><span aria-hidden='true'>×</span><span class='sr-only'>Close</span></button>
                        <p style='text-align: center'><strong><i class='fa fa-times'></i> Matériel non-trouvé :</strong>
                        Revérifiez le libellé saisi !</p>
                  </div>
                </div>
              </div>";
        }}?>