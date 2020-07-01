<?php
$con=mysqli_connect('localhost','root','','pfe');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/Tree.css">
	<script type="text/javascript" src="Javascript/Tree.js"></script>

</head>



<body>

		<!------------------- TREEVIEW CODE -->
            <ul class="treeview">
                <li>
                <!-- Recuperer hypercluster -->
                <?php 
                $res=$con->query("SELECT id_hypercl FROM hypercluster");
                //Importer les données: 
                while ($row=$res->fetch_row()) {
                  $recup=$row[0];
                echo "<a href='index.php?id=$row[0]'>$row[0]</a>";}
                ?> 
                <!-- fin hypercluster -->   
                <ul>
                  <li>
                  <!-- Recuperer switchhcl -->
                   <?php 
                   $res1=$con->query("SELECT id_switch_hcl FROM switchhcl WHERE id_hypercl='$recup'");
                   while ($row=$res1->fetch_row()) {
                   $recup=$row[0];
                   echo "<a href='index.php?id=$row[0]'>$row[0]</a>";}
                   ?>
                   <!-- Fin switchhcl -->
                     <!-- Recuperer cluster --> 
                     <?php 
                     $res1=$con->query("SELECT id_cluster FROM cluster WHERE id_switch_hcl='$recup'");
                     while ($row=$res1->fetch_row()) {
                     $recup=$row[0];
                     ?> 
                     <ul>
                      <?php
                       echo "<li><a href='index.php?id=$row[0]'>$row[0]</a>"; 
                        ?>
                        <!-- Recuperer switchcl --> 
                        <?php 
                        $res2=$con->query("SELECT id_switch_cl FROM switchcl WHERE id_cluster='$recup'");
                        while ($row1=$res2->fetch_row()) {
                        $recup=$row1[0];
                        ?>
                        <ul>
                          <li>
                          <?php echo "<a href='index.php?id=$row1[0]'>$row1[0]</a>";
                          ?>
                          <!-- Recuperer rack -->
                          <?php 
                          $res3=$con->query("SELECT id_rack FROM rack WHERE id_switch_cl='$recup'");
                          while ($row2=$res3->fetch_row()) {
                          $recup=$row2[0];
                          ?>
                            <ul>
                              <li>
                              <?php echo "<a href='index.php?id=$row2[0]'>$row2[0]</a>";
                              ?>
                              <!-- recuperer switch -->
                              <?php 
                              $res4=$con->query("SELECT id_switch FROM switch WHERE id_rack='$recup'");
                              while ($row3=$res4->fetch_row()) {
                              $recup=$row3[0];
                              ?>
                                <ul>
                                <li>
                                <?php echo "<a href='test.php?id=$row3[0]'>$row3[0]</a>";
                                ?>
                                <!-- recuperer node -->
                                <?php 
                                $res5=$con->query("SELECT id_node FROM node WHERE id_switch='$recup'");
                                while ($row4=$res5->fetch_row()) {
                                $recup=$row4[0];
                                ?>
                                  <ul>
                                  <li>
                                  <?php echo "<a href='test.php?id=$row4[0]'>$row4[0]</a>";
                                  ?>
                                  </li>
                                  </ul>
                                <?php } ?>
                               <!-- fin switch -->
                                </li>
                                </ul>
                              <?php } ?>
                              <!-- fin switch -->
                              </li>
                            </ul>
                          <?php } ?>
                          <!-- fin rack -->
                          </li>
                        </ul>
                      <?php } ?>
                      <!-- fin switchcl -->
                      </li>
                    </ul>
                 <?php } ?> 
                 <!-- Fin cluster -->
                  </li>
                </ul>
              </li>
            </ul>
            <!-- TREEVIEW CODE -->
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Treeview Div</div>
        <div class="panel-body">
            <!-- TREEVIEW CODE -->
            <div class="treeview">
                <ul>
                    <li><a href="#">Tree</a>
                    <ul>
                      <li><a href="#">Branch</a></li>
                      <li><a href="#">Branch</a>
                        <ul>
                          <li><a href="#">Stick</a></li>
                          <li><a href="#">Stick</a></li>
                          <li><a href="#">Stick</a>
                            <ul>
                              <li><a href="#">Twig</a></li>
                              <li><a href="#">Twig</a></li>
                              <li><a href="#">Twig</a></li>
                              <li><a href="#">Twig</a>
                                <ul>
                                  <li><a href="#">Leaf</a></li>
                                  <li><a href="#">Leaf</a></li>
                                  <li><a href="#">Leaf</a></li>
                                  <li><a href="#">Leaf</a></li>
                                  <li><a href="#">Leaf</a></li>
                                  <li><a href="#">Leaf</a></li>
                                  <li><a href="#">Leaf</a></li>
                                  <li><a href="#">Leaf</a></li>
                                  <li><a href="#">Leaf</a></li>
                                </ul>
                              </li>
                              <li><a href="#">Twig</a></li>
                              <li><a href="#">Twig</a></li>
                            </ul>
                          </li>
                          <li><a href="#">Stick</a></li>
                        </ul>
                      </li>
                      <li><a href="#">Branch</a></li>
                      <li><a href="#">Branch</a></li>
                    </ul>
                  </li>
                </ul>
            </div>
            <!------------------ TREEVIEW CODE -->
        </div>
    </div>

</body>
</html>