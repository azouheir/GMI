
			<ul class="treeview">
                <li>
                <!-- Titre -->
       
                <a href='Dash2.php?id=zone' data-toggle='tooltip' title='Cliquez pour plus d`info !' >Zone Materiels</a>
                <button><i class='glyphicon glyphicon-chevron-down'></i></button>
             
                   <!-- Fin Titre -->
                     <!-- Recuperer cluster --> 
                     <?php 
                     $res1=$con->query("SELECT id_cluster FROM cluster");
                     while ($row=$res1->fetch_row()) {
                     $recup=$row[0];
                     ?> 
                     <ul>
                      <?php
                       echo "<li><i style='color:black' class='fa fa-building-o'></i>  <a href='Dash2.php?id=$row[0]'>$row[0]</a> "; 
                        ?>
                        <ul>
                        <!-- Recuperer serveur --> 
                        <?php 
                        $res2=$con->query("SELECT id_serveur FROM serveur WHERE id_cluster='$recup'");
                        while ($row1=$res2->fetch_row()) {
                        ?>
                        
                          <?php echo "<li><i style='color:black;' class='fa fa-server'></i>  <a href='Dash2.php?id=$row1[0]'>$row1[0]</a>   </li>";}
                          ?> 
                          <!-- Fin Serveeuur -->
                          <!-- Recuperer Node Sans Rack -->
                
                          	<?php 
                          	$res2=$con->query("SELECT id_node FROM node WHERE id_cluster='$recup' and id_rack IS NULL ");
                
                        while ($row1=$res2->fetch_row()) {?>	
                        	
                        	<li>
                        	<?php
                        	echo "<i style='color:black' class='material-icons md-18'>memory</i>  <a href='Dash2.php?id=$row1[0]'>$row1[0]</a>";
                          	?>
                          	<?php
                          	$res22=$con->query("SELECT id_ssd FROM ssd WHERE id_node='$row1[0]'");
                          	while ($row11=$res22->fetch_row()) { ?>
                          		<ul>
                          		<li>
                          			<?php
                        	echo "<i style='color:black;' class='fa fa-hdd-o'></i>  <a href='Dash2.php?id=$row11[0]'>$row11[0]</a>";
                          	?>	
                          		</li>
                          		</ul>
                          	<?php } ?>
                          	<?php
                          	$res23=$con->query("SELECT id_usb FROM usb WHERE id_node='$row1[0]'");
                          	while ($row12=$res23->fetch_row()) { ?>
                          		<ul>
                          		<li>
                          			<?php
                        	echo "<i style='color:black;' class='fa fa-usb'></i>  <a href='Dash2.php?id=$row12[0]'>$row12[0]</a>";
                          	?>	
                          		</li>
                          		</ul>
                          	<?php } ?>
                          	</li>
                          	
                          <!-- Fin Node Sans Rack-->
                          <?php } ?>
                          <!-- Recuperer rack -->
                          <?php 
                          $res3=$con->query("SELECT id_rack FROM rack WHERE id_cluster='$recup'");
                          while ($row2=$res3->fetch_row()) {
                          $recup1=$row2[0];
                          ?>
                            
                              <li>
                              <?php echo "<i style='color:black;' class='fa fa-th'></i>  <a href='Dash2.php?id=$row2[0]'>$row2[0]</a>";
                              ?>
                              <!-- recuperer Node -->
                              <?php 
                              $res4=$con->query("SELECT id_node FROM node  WHERE id_rack='$recup1' and id_cluster='$recup'");
                              while ($row3=$res4->fetch_row()) {
                              $recup33=$row3[0];
                              ?>
                                <ul>
                                <li>
                                <?php echo "<i style='color:black;' class='material-icons md-18'>memory</i>  <a href='Dash2.php?id=$row3[0]'>$row3[0]</a>";
                                ?>
                                <?php 
                              $res5=$con->query("SELECT id_ssd FROM ssd WHERE id_node='$recup33'");
                              while ($row4=$res5->fetch_row()) {
                              ?>
                                <ul>
                                <li>
                                <?php echo "<i style='color:black;' class='fa fa-hdd-o fa-10x'></i>  <a href='Dash2.php?id=$row4[0]'>$row4[0]</a>";
                                ?>
                                
                                <!-- fin usb ssd -->
                                </li>
                                </ul>
                              <?php } ?>
                              <?php 
                              $res6=$con->query("SELECT id_usb FROM usb WHERE id_node='$recup33'");
                              while ($row5=$res6->fetch_row()) {
                              ?>
                                <ul>
                                <li>
                                <?php echo "<i style='color:black;' class='fa fa-usb'></i>  <a href='Dash2.php?id=$row5[0]'>$row5[0]</a>";
                                ?>
                                
                                <!-- fin usb ssd -->
                                </li>
                                </ul>
                              <?php } ?>
                                <!-- fin node -->
                                </li>
                                </ul>
                              <?php } ?>
                              </li>
                          <?php } ?>
                          <!-- fin rack -->
                        </ul>
                    </ul>
                    <?php } ?>
                 <!-- Fin cluster -->
              </li>
            </ul>
            <!-- TREEVIEW CODE -->