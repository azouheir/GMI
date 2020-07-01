<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title></title>
  <meta name="viewport" content="width = device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <?php 

  $db_host        = 'localhost';
  $db_user        = 'root';
  $db_pass        = '';
  $db_database    = 'pfe';   
  $con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);?>
  </head>

  <body>
                <form action="" method="get">
                <label>ID NODE:</label>
                  <input type="text" name="id">
                  <input type="submit" name="submit" value="OKEY">
              </form>
          
      <?php
          if(isset($_GET['submit']))
            {if (isset($_GET['id'])) {
                $id=$_GET['id'];
                //Affichage Selon ID et affichage detail:
                $res=$con->query("SELECT * FROM node WHERE id_node='$id'");
                ?>      
<div class="container">          
  <table class="table table-hover">
    <thead>
      <tr>
        <th>NODE</th>
        <th>ADRESSE IP</th>
        <th>ADRESSE MAC</th>
        <th>Frequence CPU</th>
        <th>Capacité RAM</th>
        <th>Lié au Switch</th> 
      </tr>
    </thead>
    <tbody>
      
                  <?php   
              while($row=$res->fetch_row()){
                echo "<tr>";
                echo "<td>$row[0]</td>
                      <td>$row[1]</td>
                      <td>$row[2]</td>
                      <td>$row[5]</td>
                      <td>$row[10]</td>
                      <td>$row[13]</td>"; 
              };echo "</tr>";
              }
            }
            ?>
    <?php 
      if (isset($_GET['id'])) {
                $id=$_GET['id'];
                $row=0;
                //Affichage Selon ID et affichage detail:
                $res=$con->query("SELECT * FROM hypercluster WHERE id_hypercl='$id'");
                 $row=$res->fetch_row();
                 if ($row) {
                   /*AFFICHER HyperCLUSTER DETAIL*/ 
                  ?>
                   <div class="container">          
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>HyperCluster</th>
                                 <th>Date Installation</th>
                                <th>Administrateur</th>
                                 <th>Switch Cluster</th> 
                              </tr>
                            </thead>
                             <tbody>
      
                  <?php                  $res->data_seek(0); 
                                       while($row=$res->fetch_row()){
                                         echo "<tr>";
                                        for($i=0;$i<count($row);$i++){
                                         echo "<td>",$row[$i],"</td>";
                                       }echo "</tr>";
                                                              }
            
                   ?>
                             </tbody>
                          </table>
                        </div>
                  <?php }
                        
                        $res=$con->query("SELECT * FROM cluster WHERE id_cluster='$id'");
                        $row=$res->fetch_row();
                        if ($row) {
                        /*AFFICHER CLUSTER DETAIL*/ 
                        ?>
                            <div class="container">          
                                   <table class="table table-hover">
                                     <thead>
                                       <tr>
                                         <th>Cluster</th>
                                         <th>N° Serie</th>
                                         <th>Date Installation</th>
                                         <th>lié à</th> 
                                       </tr>
                                     </thead>
                                      <tbody>
               
                           <?php                 $res->data_seek(0); 
                                                while($row=$res->fetch_row()){
                                                  echo "<tr>";
                                                 for($i=0;$i<count($row);$i++){
                                                  echo "<td>",$row[$i],"</td>";
                                                }echo "</tr>";
                                                                       }
                     
                            ?>
                                      </tbody>
                                   </table>
                                 </div>
                           <?php
                        }
                        
                            $res=$con->query("SELECT * FROM rack WHERE id_rack='$id'");
                            $row=$res->fetch_row();
                            if ($row) {
                            /*AFFICHER Rack DETAIL*/ 
                                               ?>
                                           <div class="container">          
                                                  <table class="table table-hover">
                                                    <thead>
                                                      <tr>
                                                        <th>Rack</th>
                                                        <th>Niveau</th>
                                                        <th>Switch des nodes</th>
                                                        <th>lié à</th> 
                                                      </tr>
                                                    </thead>
                                                     <tbody>
               
                                          <?php   
                                                              $res->data_seek(0); 
                                                               while($row=$res->fetch_row()){
                                                                 echo "<tr>";
                                                                for($i=0;$i<count($row);$i++){
                                                                 echo "<td>",$row[$i],"</td>";
                                                               }echo "</tr>";
                                                                                      }
                                    
                                           ?>
                                                     </tbody>
                                                  </table>
                                                </div>
                                          <?php
                         }
                                  $res=$con->query("SELECT * FROM node WHERE id_node='$id'");
                                  $row=$res->fetch_row();
                                 if ($row){
                                 /*AFFICHER Node DETAIL*/ 
                                    ?>      
                                        <div class="container">          
                                          <table class="table table-hover">
                                            <thead>
                                              <tr>
                                                <th>NODE</th>
                                                <th>ADRESSE IP</th>
                                                <th>ADRESSE MAC</th>
                                                <th>Frequence CPU</th>
                                                <th>Capacité RAM</th>
                                                <th>Lié au Switch</th> 
                                              </tr>
                                            </thead>
                                            <tbody>
      
                                                          <?php  
                                                          $res->data_seek(0); 
                                                      while($row=$res->fetch_row()){
                                                        echo "<tr>";
                                                        echo "<td>$row[0]</td>
                                                              <td>$row[1]</td>
                                                              <td>$row[2]</td>
                                                              <td>$row[5]</td>
                                                              <td>$row[10]</td>
                                                              <td>$row[13]</td>"; 
                                                      echo "</tr>";
                                                      }
                                                    }
                                                    ?>
                                             </tbody>
                                          </table>
                                         </div>
                                          <?php
                              }
                  ?>


    </tbody>
  </table>
</div>

  </body>
</html>