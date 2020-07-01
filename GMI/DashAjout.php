<?php 
session_start();

  if (isset($_SESSION['useremail'])) {
  echo"Bienvenue ".$_SESSION['useremail'];
 
 
  $idk=$_SESSION['useremail'];
  $con = mysqli_connect('localhost', 'root', '','gmi');  }
else {
  header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en" >
<!-- HEAD AVEC SCRIPTS ET LIENS -->
<head>
    <meta charset="UTF-8">
    <title>GMI-Ajouter un matériel</title>
    <style type="text/css">
      .material-icons.md-18 { font-size: 28px; }
    </style>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!-- <script type="text/javascript" href="Javascript/Dash2.js"></script> -->
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'>
    
    <style class="cp-pen-styles">@import url("https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700&subset=latin-ext");
    </style>
    <link rel="stylesheet" type="text/css" href="css/Dash2.css">
    <!-- Tree links -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="Workflow/WK1.css">
    
    <!-- Affichage Ajax du Chip et Module -->
    <script type="text/javascript">
               function showUser(str) {
               if (str == "") {
               document.getElementById("conteneur").innerHTML = "";
               return;
               } else { 
                       if (window.XMLHttpRequest) { 
                       xmlhttp = new XMLHttpRequest();
                       }else {
                          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("conteneur").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","ScriptPhpAjax.php?q="+str,true);
                xmlhttp.send();
              }
              }
              function showNode(str) {
               if (str == "") {
               document.getElementById("nodes").innerHTML = "";
               return;
               } else { 
                       if (window.XMLHttpRequest) { 
                       xmlhttp = new XMLHttpRequest();
                       }else {
                          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("nodes").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","ScriptAjaxNode.php?q="+str,true);
                xmlhttp.send();
              }
              }
              function showExRack(str) {
               if (str == "") {
               document.getElementById("ExRack").innerHTML = "";
               return;
               } else { 
                       if (window.XMLHttpRequest) { 
                       xmlhttp = new XMLHttpRequest();
                       }else {
                          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("ExRack").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","ScriptAjaxExRack.php?q="+str,true);
                xmlhttp.send();
              }
              }
              

</script>

</head>
<!-- FIN HEAD -->
<!-- Alert  -->
<?php
if(isset($_GET['save'])){
  /*Cas d'echec ajout matériel*/
  if ($_GET['save']==0){
    echo "
<div class='container' style='margin-top: 50px; align-self: center;width: 800px'>
  <div class='row'>
  <div class='alert alert-danger alert-dismissable page-alert' role='alert'>
  <button type='button' onclick='this.parentNode.parentNode.removeChild(this.parentNode);' class='close' data-dismiss='alert'><span aria-hidden='true'>×</span><span class='sr-only'>Close</span></button>
  <p style='text-align: center'><strong><i class='fa fa-warning'></i> Erreur :</strong>
  Ajout du matériel échoué, Revérifiez les éléments saisis ! 
  </p>
  </div>
  </div>
</div>";}
/*Cas de Succes*/
if ($_GET['save']==1){
      echo "
<div class='container' style='margin-top: 50px; align-self: center;width: 800px'>
  <div class='row'>
  <div class='alert alert-success alert-dismissable page-alert' role='alert'>
  <button type='button' onclick='this.parentNode.parentNode.removeChild(this.parentNode);' class='close' data-dismiss='alert'><span aria-hidden='true'>×</span><span class='sr-only'>Close</span></button>
  <p style='text-align: center'><strong><i class='fa fa-success'></i> Succés :</strong>
  Nouveau matériel ajouté avec succés ! 
  </p>
  </div>
  </div>
</div>";}}
?>
<!-- FIN Alert -->

<body class="sidebar-is-reduced" style="background-color: #e1e3e6">
  <!-- HEADER -->
  <header class="l-header">
    <div class="l-header__inner clearfix">
      <div class="c-header-icon js-hamburger">
        <div class="hamburger-toggle"><span class="bar-top"></span><span class="bar-mid"></span><span class="bar-bot"></span></div>
      </div>
      <div class="header-icons-group">
        <a href="logout.php">
         <div class="c-header-icon logout">
          <i class="fa fa-power-off"></i>
         </div>
        </a>
      </div>
    </div>
  </header>
  <!-- FIN HEADER FIXE -->
  <!-- SIDEBAR LOGO+LIST -->
  <div class="l-sidebar" style="position: fixed;">
    <!-- LOGO GMI -->
    <div class="logo">
      <div class="logo__txt">
        <img src="img/Logo.png" style="width:100px; height: 100px;"> 
      </div>
    </div>
    <!-- LISTE DES FONCTIONNALITES -->
    <div class="l-sidebar__content">
      <nav class="c-menu js-menu">
        <ul class="u-list">
          
          <a href="Dash2.php" style="text-decoration: none;color: white">
          <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Vue Global">
            <div class="c-menu__item__inner"><i class="fa fa-file-text-o"></i>
              <div class="c-menu-item__title"><span>Vue Global</span></div>
            </div>
          </li></a>
          
          <li class="c-menu__item is-active" data-toggle="tooltip" title="Ajouter un matériel">
            <div class="c-menu__item__inner"><i class="fa fa-plus-circle"></i>
              <div class="c-menu-item__title"><span>Ajouter un matériel</span></div>
            </div>
          </li>
          <a href="maintenance.php" style="text-decoration: none;color: white">
          <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Maintenance">
            <div class="c-menu__item__inner"><i class="fa fa-cogs"></i>
              <div class="c-menu-item__title"><span>Maintenance</span></div>
            </div>
          </li>
          </a>
          <a href="DashHs.php" style="text-decoration: none;color: white">
          <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Compte">
            <div class="c-menu__item__inner"><i class="fa fa-address-book-o"></i>
              <div class="c-menu-item__title"><span>Compte</span></div>
            </div>
          </li>
          </a>
        </ul>
      </nav>
    </div>
  </div>
  <!-- FIN SIDEBAR LOGO+LIST -->
</body>


<main class="l-main">
 <div class="container">
  <!-- LIGNE DES AJOUTS -->
  <div class="row">
    <div class="process">
      <div class="process-row nav nav-tabs">
        <div class="process-step">
              <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu1"><i class='fa fa-building-o fa-12x'></i></button>
              <p><small>Cluster</small></p>
        </div>
        <div class="process-step">
            <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu2"><i class='fa fa-server fa-12x'></i></button>
            <p><small>Serveur</small></p>
        </div>
        <div class="process-step">
            <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu3"><i class='material-icons md-18'>memory</i></button>
            <p><small>Node</small></p>
        </div>
        <div class="process-step">
            <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu6"><i class='fa fa-th fa-12x'></i></button>
            <p><small>Rack</small></p>
        </div>
        <div class="process-step">
            <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu4"><i class="fa fa-hdd-o fa-12x"></i></button>
            <p><small>SSD</small></p>
        </div>
        <div class="process-step">
            <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu5"><i class="fa fa-usb fa-12x"></i></button>
            <p><small>USB</small></p>
        </div>
      </div>
    </div>
    <!-- FIN LIGNE DES AJOUTS -->
  <div class="tab-content">
   <!-- DIV MENU 1 -->
   <!-- Formulaire Cluster -->
  <div id="menu1" class="tab-pane fade">
      <h3></h3>
      <p>
      <form action="./forms/TraitAjoutClus.php" method="post" id="id_form1" >
  
            <div class="panel panel-default">
              <div class="panel-heading"><h4>Cluster </h4></div>
              </div>
              <?php ?>
    
              <div class="form-group col-xs-12 <?php if(isset($_GET['error'])){if($_GET['error']==1){echo "has-error";}} ?> ">
                <label class="col-md-2 control-label"> Libellé Cluster :</label>
                  <div class =" col-md-4 inputGroupContainer">
                    <div class ="input-group">
                    <input name="id-cluster" placeholder="Ex: cluster_X" class="form-control" type="text" required="required" pattern="(cluster_|CLUSTER_)([A-Za-z]{1,})" title="Ex: cluster_X" value="<?php if(isset($_GET['error'])){if($_GET['error']==1 || $_GET['error']==11){echo $_GET['id'];}}?>">
                    </div>
                    <?php  if(isset($_GET['error'])){if($_GET['error']==1){ echo"
                    <div class='form-control-feedback' style='width: 200;position: relative;'>ID Cluster existe déjà !</div>";}}
                    ?> 
                    </div>
              </div>
              <div class="form-group col-xs-12 <?php if(isset($_GET['error'])){if($_GET['error']==11){echo "has-error";}} ?>">
                <label class="col-md-2 control-label"> Code :</label>
                  <div class =" col-md-4 inputGroupContainer">
                    <div class ="input-group">
                    <input name="serie" placeholder=""  class="form-control" type="text" required maxlength="8" minlength="4" value="<?php if(isset($_GET['error'])){if($_GET['error']==1 || $_GET['error']==11){echo $_GET['num'];}}?>">
                    </div>
                    <?php  if(isset($_GET['error'])){if($_GET['error']==11){ echo"
                    <div class='form-control-feedback' style='width: 200;position: relative;'>Code existe déjà !</div>";}}
                    ?> 
                  </div>
              </div>
              <div class="form-group col-xs-12">
                <label class="col-md-2 control-label"> Date Installation:</label>
                  <div class =" col-md-4 inputGroupContainer">
                    <div class ="input-group">
                    <input name="date-inst"  min="2000-12-31" class="form-control" type="date" required >
                    </div>
                  </div>
              </div>

             
                <div class="form-group col-xs-12">
                  <ul class="list-unstyled list-inline pull-right">
                  <li><button type="submit"  class="btn btn-info">Ajouter  <span class="glyphicon glyphicon-save"></span></button></li>
                  <li><a href="Dash2.php" style="text-decoration: none;"><button type="button" class="btn btn-success"><i class="fa fa-check"></i>Done!</button></li></a>
                  </ul>
                </div>
            
          </form>
        </p>
  </div>
   <!-- FIN DIV MENU 1 -->
   <!-- Formulaire Serveur MENU2 -->
  <div id="menu2" class="tab-pane fade">
    <h3></h3>
    <p>
      <form action="./forms/TraitAjoutServ.php" method="post" id="id_form1" >
        <?php 
         if(isset($_GET['error'])){if($_GET['error']==31 || $_GET['error']==32){$vars=explode("//",$_GET['vars']);}}
        ?>
          <div class="panel panel-default">
              <div class="panel-heading"><h4>Serveur</h4></div>
              </div>
              <div class="form-group col-xs-12">
                <label class="col-md-2 control-label"> Cluster:</label>
                  <div class =" col-md-4 inputGroupContainer">
                    <div class ="input-group">
                    <select name="id-clust" required class="form-control" >
                      <?php 
                      $resu=$con->query("SELECT id_cluster FROM cluster;");
                      
                      foreach($resu as $val){
                        $id=$val['id_cluster'];
                        echo "<option>$id</option>";
                        break;
                      }
                    ?>
                    </select>
                    </div>
                  </div>
              </div>
            
            <div class="form-group col-xs-12 <?php if($_GET['error']==31){echo "has-error";} ?>">
              <label class="col-md-2 control-label"> Adresse IP :</label>
                <div class =" col-md-4 inputGroupContainer">
                  <div class ="input-group">
                  <input name="adress-ip" placeholder="0.0.0.0" class="form-control" type="text" required pattern="((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)" title="Adresse IPV4 Invalide !" value="<?php if(isset($_GET['error'])){if($_GET['error']==31 || $_GET['error']==32){echo $vars[0];}}?>">
                  </div>
                  <?php  if(isset($_GET['error'])){if($_GET['error']==31){ echo"
                    <div class='form-control-feedback' style='width: 200;position: relative;'>Adresse IP existe déjà !</div>";}}
                    ?> 
                </div>
            </div>
            <div class="form-group col-xs-12 <?php if($_GET['error']==32){echo "has-error";} ?>">
              <label class="col-md-2 control-label"> Adresse Mac :</label>
                <div class =" col-md-4 inputGroupContainer">
                  <div class ="input-group">
                  <input name="adress-mac"   placeholder="00:00:00:00:00:00" class="form-control" type="text" required pattern="([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})" title="Adresse MAC Invalide !" value="<?php if(isset($_GET['error'])){if($_GET['error']==31 || $_GET['error']==32){echo $vars[1];}}?>">
                  </div>
                  <?php  if(isset($_GET['error'])){if($_GET['error']==32){ echo"
                    <div class='form-control-feedback' style='width: 200;position: relative;'>Adresse MAC existe déjà !</div>";}}
                    ?> 
                </div>
            </div>
            <div class="form-group col-xs-12">
              <label class="col-md-2 control-label">Constructeur :</label>
                <div class =" col-md-4 inputGroupContainer">
                  <div class ="input-group">
                  <input name="const" placeholder="Marque"  class="form-control" type="text" required value="<?php if(isset($_GET['error'])){if($_GET['error']==31 || $_GET['error']==32){echo $vars[2];}}?>">
                  </div>
                </div>
            </div>
            <div class="form-group col-xs-12">
              <label class="col-md-2 control-label">Processeur :</label>
                <div class =" col-md-4 inputGroupContainer">
                  <div class ="input-group">
                  <input name="proces" placeholder="Ex: Intel(R) Xeon(TM)"  class="form-control" type="text" required value="<?php if(isset($_GET['error'])){if($_GET['error']==31 || $_GET['error']==32){echo $vars[3];}}?>">
                  </div>
                </div>
            </div>
            <div class="form-group col-xs-12">
              <label class="col-md-2 control-label"> Nombre coeurs:</label>
                <div class =" col-md-4 inputGroupContainer">
                  <div class ="input-group">
                  <input name="nb-core" placeholder="" class="form-control" type="number" required min="1" max="40" value="<?php if(isset($_GET['error'])){if($_GET['error']==31 || $_GET['error']==32){echo $vars[4];}}?>">
                  </div>
                </div>
            </div>
            <div class="form-group col-xs-12">
              <label class="col-md-2 control-label"> Fréquence(CPU):</label>
                <div class =" col-md-4 inputGroupContainer">
                  <div class ="input-group">
                    <input name="freq-cpu" placeholder="CPU 0.0 en Ghz " class="form-control" type="number" step="0.1" min="0" required value="<?php if(isset($_GET['error'])){if($_GET['error']==31 || $_GET['error']==32){echo $vars[5];}}?>">
                  </div>
                </div>
            </div>
            <div class="form-group col-xs-12">
              <label class="col-md-2 control-label"> Capacité(RAM):</label>
               <div class =" col-md-4 inputGroupContainer">
                 <div class ="input-group">
                 <input name="cap-ram" placeholder="RAM 0.0 en GO" class="form-control" type="number" step="0.1" min="0" required value="<?php if(isset($_GET['error'])){if($_GET['error']==31 || $_GET['error']==32){echo $vars[6];}}?>">
                 </div>
                </div>
              </div>
              <div class="form-group col-xs-12">
              <label class="col-md-2 control-label"> Capacité de stockage:</label>
               <div class =" col-md-4 inputGroupContainer">
                 <div class ="input-group">
                 <input name="cap-stock" placeholder=" 0.0 en Go" class="form-control" type="number" step="0.1" min="0" required value="<?php if(isset($_GET['error'])){if($_GET['error']==31 || $_GET['error']==32){echo $vars[7];}}?>">
                 </div>
                </div>
              </div>
              <div class="form-group col-xs-12">
              <label class="col-md-2 control-label">Système d'exploitation:</label>
                <div class =" col-md-4 inputGroupContainer">
                  <div class ="input-group">
                  <input name="os" placeholder=""  class="form-control" type="text" required value="<?php if(isset($_GET['error'])){if($_GET['error']==31 || $_GET['error']==32){echo $vars[8];}}?>">
                  </div>
                </div>
              </div>
              <div>
              <div class="form-group col-xs-12">
                <label class="col-md-2 control-label"> Date Installation:</label>
                  <div class =" col-md-4 inputGroupContainer">
                    <div class ="input-group">
                    <input name="date-inst"  min="2000-12-31" class="form-control" type="date" required >
                    </div>
                  </div>
              </div>
                <!-- LISTE DES BOUTONS -->
                <ul class="list-unstyled list-inline pull-right">
                <li><button type="submit"  class="btn btn-info">Ajouter  <span class="glyphicon glyphicon-save"></span></button></li>
                <li><a href="Dash2.php" style="text-decoration: none;"><button type="button" class="btn btn-success"><i class="fa fa-check"></i>Done!</button></li></a>
                </ul>
              </div>   
        
      </form>
    </p>
  </div>
    <!-- FIN Formulaire Serveur MENU2 -->
    <!-- Formulaire NODE MENU3 -->
  <div id="menu3" class="tab-pane fade">
    <h3></h3>
    <p>
      <form action="./forms/TraitAjoutNode.php" method="post" id="id_form" >
        <?php 
         if(isset($_GET['error'])){if($_GET['error']==41 || $_GET['error']==42){$vars=explode("//",$_GET['vars']);}}
        ?>
        <div class="panel panel-default">
              <div class="panel-heading"><h4>Node </h4></div>
              </div>
              <div class="form-group col-xs-12">
                <label class="col-md-2 control-label"> Cluster:</label>
                  <div class =" col-md-4 inputGroupContainer">
                    <div class ="input-group">
                    <select name="id-clust" required class="form-control" >
                    <option></option>
                      <?php 
                      $resu=$con->query("SELECT id_cluster FROM cluster;");
                      
                      foreach($resu as $val){
                        $id=$val['id_cluster'];
                        echo "<option>$id</option>";
                      }
                    ?>
                    </select>
                    </div>
                  </div>
              </div>
            <div class="form-group col-xs-12 <?php if($_GET['error']==41){echo "has-error";} ?>">
              <label class="col-md-2 control-label"> Adresse IP :</label>
                <div class =" col-md-4 inputGroupContainer">
                  <div class ="input-group">
                  <input name="adress-ip" placeholder="0.0.0.0" class="form-control" type="text" required="required" pattern="((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)" title="Adresse IPV4 Invalid !" value="<?php if(isset($_GET['error'])){if($_GET['error']==41 || $_GET['error']==42){echo $vars[0];}}?>">
                  </div>
                  <?php  if(isset($_GET['error'])){if($_GET['error']==41){ echo"
                    <div class='form-control-feedback' style='width: 200;position: relative;'>Adresse IP existe déjà !</div>";}}
                    ?> 
                </div>
            </div>
            <div class="form-group col-xs-12 <?php if($_GET['error']==42){echo "has-error";} ?>">
              <label class="col-md-2 control-label"> Adresse Mac :</label>
                <div class =" col-md-4 inputGroupContainer">
                  <div class ="input-group">
                  <input name="adress-mac"   placeholder="00:00:00:00:00:00" class="form-control" type="text" required="required" pattern="([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})" title="Adresse MAC Invalid !" value="<?php if(isset($_GET['error'])){if($_GET['error']==41 || $_GET['error']==42){echo $vars[1];}}?>">
                  </div>
                  <?php  if(isset($_GET['error'])){if($_GET['error']==42){ echo"
                    <div class='form-control-feedback' style='width: 200;position: relative;'>Adresse MAC existe déjà !</div>";}}
                    ?>
                </div>
            </div>
            <div class="form-group col-xs-12">
                <label class="col-md-2 control-label"> Date Installation:</label>
                  <div class =" col-md-4 inputGroupContainer">
                    <div class ="input-group">
                    <input name="date-inst"  min="2000-12-31" class="form-control" type="date" required >
                    </div>
                  </div>
              </div>
         <div class="panel panel-default">
              <div class="panel-heading"><h4>CPU </h4></div>
              </div>
            <div class="form-group col-xs-12">
              <label class="col-md-2 control-label"> Marque(CPU):</label>
                <div class =" col-md-4 inputGroupContainer">
                  <div class ="input-group">
                  <input name="marque-cpu"   placeholder="Ex: INTEL CORE i7"  class="form-control" type="text" required value="<?php if(isset($_GET['error'])){if($_GET['error']==41 || $_GET['error']==42){echo $vars[2];}}?>">
                  </div>
                </div>
            </div>
            <div class="form-group col-xs-12">
              <label class="col-md-2 control-label"> Nombre coeurs:</label>
                <div class =" col-md-4 inputGroupContainer">
                  <div class ="input-group">
                  <input name="nb-core" placeholder="" class="form-control" type="number" required value="<?php if(isset($_GET['error'])){if($_GET['error']==41 || $_GET['error']==42){echo $vars[3];}}?>" min="1" max="32">
                  </div>
                </div>
            </div>
            <div class="form-group col-xs-12">
              <label class="col-md-2 control-label"> Fréquence(CPU):</label>
                <div class =" col-md-4 inputGroupContainer">
                  <div class ="input-group">
                    <input name="freq-cpu" placeholder="CPU 0.0 en Ghz " class="form-control" type="number" step="0.1" min="0" required value="<?php if(isset($_GET['error'])){if($_GET['error']==41 || $_GET['error']==42){echo $vars[4];}}?>">
                  </div>
                </div>
            </div>
          <div class="panel panel-default">
              <div class="panel-heading"><h4>RAM </h4></div>
              </div>
            <div class="form-group col-xs-12">
              <label class="col-md-2 control-label"> Marque(RAM):</label>
                <div class =" col-md-4 inputGroupContainer">
                  <div class ="input-group">
                  <input name="marque-ram" placeholder="Ex: Corsair" class="form-control" type="text" required value="<?php if(isset($_GET['error'])){if($_GET['error']==41 || $_GET['error']==42){echo $vars[5];}}?>">
                  </div>
                </div>
            </div>
            <div class="form-group col-xs-12">
              <label class="col-md-2 control-label"> Type(RAM):</label>
                <div class =" col-md-4 inputGroupContainer">
                  <div class ="input-group">
                  <select name="type-ram" class="form-control" onchange="showUser(this.value);">
                    <option>------</option>
                    <option>SDR</option>
                    <option>DDR</option>
                    <option>DDR2</option>
                    <option>DDR3</option>
                    <option>DDR4</option>
                  </select>
                  </div>
                </div>
            </div>
            <!-- MODULE ET CHIP RAM -->
            <div class="form-group col-xs-12" id="conteneur"> 
            </div>

            <div class="form-group col-xs-12">
              <label class="col-md-2 control-label"> Capacité(RAM):</label>
               <div class =" col-md-4 inputGroupContainer">
                 <div class ="input-group">
                 <input name="cap-ram" placeholder="RAM 0.0 en GO" class="form-control" type="number" step="0.1" min="0" required value="<?php if(isset($_GET['error'])){if($_GET['error']==41 || $_GET['error']==42){echo $vars[6];}}?>">
                 </div>
                </div>
              </div>
            <!-- LISTES DES BOUTONS -->
            <ul class="list-unstyled list-inline pull-right">
              <li><button type="submit"  class="btn btn-info">Ajouter  <span class="glyphicon glyphicon-save"></span></button></li> 
              <li><a href="Dash2.php" style="text-decoration: none;"><button type="button" class="btn btn-success"><i class="fa fa-check"></i>Done!</button></li></a>
            </ul>   
      </form>
    </p>
  </div>
    <!-- FIN Formulaire NODE MENU3 -->
    <!-- Formulaire SSD MENU4 -->
  <div id="menu4" class="tab-pane fade">
    <h3></h3>
    <p>
      <form  action="./forms/TraitAjoutSsd.php" method="post" id="id_form" >
        <div class="panel panel-default">
              <div class="panel-heading"><h4>SSD </h4></div>
              </div>
            <div class="form-group col-xs-12 ">
              <label class="col-md-2 control-label">Fabriquant :</label>
                <div class =" col-md-4 inputGroupContainer">
                  <div class ="input-group">
                  <select name="fabriquant" class="form-control" required> 
                    <option></option>
                    <option>A-Data</option>
                    <option>AMD</option>
                    <option>Corsair</option>
                    <option>Crucial</option>
                    <option>G.Skill</option>
                    <option>Hitachi</option>
                    <option>Innodisk</option>
                    <option>Intel</option>
                    <option>Toshiba</option>
                    <option>KingSpec</option>
                    <option>Kingston</option>
                    <option>OCZ</option>
                    <option>Patriot</option>
                    <option>Plextor</option>
                    <option>Pure Storage (en)</option>
                    <option>PNY</option>
                    <option>Samsung</option>
                    <option>SanDisk</option>
                    <option>Silicon Power</option>
                    <option>KFA2</option>
                    <option>Western Digital</option>
                    <option>Mushkin</option>
                  </select>
                  </div>
                 </div>
            </div>
            <div class="form-group col-xs-12">
              <label class="col-md-2 control-label"> Capacité de stockage :</label>
                <div class =" col-md-4 inputGroupContainer">
                  <div class ="input-group">
                  <input name="cap-stock"   placeholder="0.0 en Go"  class="form-control" type="number" step="0.1" min="0" required="required">
                  </div>
                </div>
            </div>
            <div class="form-group col-xs-12">
                <label class="col-md-2 control-label"> OS :</label>
                  <div class =" col-md-4 inputGroupContainer">
                    <div class ="input-group">
                    <input name="os" placeholder="Ex: WINDOWS 7 - 64bits" class="form-control" type="text" required="required">
                    </div>
                  </div>
            </div>
            <div class="form-group col-xs-12">
                <label class="col-md-2 control-label">Node:</label>
                  <div class =" col-md-4 inputGroupContainer">
                     <div class ="input-group">
                         <select name="id-node" class="form-control" required>
                           <?php 
                             $res=$con->query("SELECT id_cluster,id_node FROM `node` where id_ssd IS NULL;"); 
                             foreach ($res as $v){
                                                 $id=$v['id_node'];
                                                 $cl=$v['id_cluster'];
                                                 echo "<option value='$id'>$cl -> $id</option>";
                                                 }
                           ?> 
                         </select>
                     </div>
                   </div>
                  <ul class="list-unstyled list-inline pull-right">
                    <li><button type="submit"  class="btn btn-info">Ajouter  <span class="glyphicon glyphicon-save"></span></button></li> 
                    <li><a href="Dash2.php" style="text-decoration: none;"><button type="button" class="btn btn-success"><i class="fa fa-check"></i>Done!</button></li></a>
                  </ul>
            </div>
      </form>
    </p>
  </div>
    <!-- FIN Formulaire SSD MENU4 -->
    <!-- Formulaire USB MENU5 -->
   <div id="menu5" class="tab-pane fade">
      <h3></h3>
      <p>
        <form  action="./forms/TraitAjoutUsb.php" method="post" id="id_form" >
          <div class="panel panel-default">
              <div class="panel-heading"><h4>USB </h4></div>
              </div>
              <div class="form-group col-xs-12 ">
                <label class="col-md-2 control-label">Marque :</label>
                  <div class =" col-md-4 inputGroupContainer">
                    <div class ="input-group">
                      <select  name="marque" class="form-control" required>
                        <option></option>
                       <option>SanDisk </option>
                       <option>Mach </option>
                       <option>Transcend </option>
                       <option>Lexar </option>
                       <option>DataTraveler</option>
                       <option>Kingstone</option>
                       <option>Verbatim</option>
                       <option>Integral</option>
                       <option>PNY</option>
                      </select>
                      </div>
                    </div>
              </div>
              <div class="form-group col-xs-12">
                <label class="col-md-2 control-label"> Capacité de stockage :</label>
                  <div class =" col-md-4 inputGroupContainer">
                    <div class ="input-group">
                    <input name="cap-stock"   placeholder="0.0 en GB"  class="form-control" type="number" step="0.1" min="0" required="required">
                    </div>
                  </div>
              </div>
              <div class="form-group col-xs-12">
                <label class="col-md-2 control-label">Node:</label>
                  <div class =" col-md-4 inputGroupContainer">
                    <div class ="input-group">
                      <select name="id-node" class="form-control" required>
                    <?php 
                    $res=$con->query("SELECT id_cluster,id_node,nb_port_usb,COUNT(id_usb) FROM `usb` RIGHT OUTER JOIN node USING(id_node) GROUP BY (id_node) HAVING COUNT(id_usb) < nb_port_usb;");
                    foreach ($res as $v){
                                         $id=$v['id_node'];
                                         $cl=$v['id_cluster'];
                                         echo "<option value='$id'>$cl -> $id</option>";}
                    ?>      
                    </select>
                    </div>
                  </div>
                    <ul class="list-unstyled list-inline pull-right">
                      <li><button type="submit"  class="btn btn-info">Ajouter  <span class="glyphicon glyphicon-save"></span></button></li> 
                      <li><a href="Dash2.php" style="text-decoration: none;"><button type="button" class="btn btn-success"><i class="fa fa-check"></i>Done!</button></li></a>
                    </ul>
              </div>
        </form>
      </p>
   </div>
    <!-- FIN Formulaire USB MENU5 -->
    <!-- Formulaire Rack -->
    <div id="menu6" class="tab-pane fade">
      <h3></h3>
      <p>
        <form  action="./forms/TraitAjoutRack.php" method="post" id="id_form" >
          <div class="panel panel-default">
              <div class="panel-heading"><h4>Creation d'un nouveau Rack </h4></div>
              </div>
              
              <div class="form-group col-xs-12 <?php if(isset($_GET['error'])){if($_GET['error']==8){echo "has-error";}} ?>">
                <label class="col-md-2 control-label"> Libellé Rack:</label>
                  <div class ="col-md-4 inputGroupContainer">
                    <div class ="input-group">
                    <input name="id-rack" placeholder="" class="form-control" type="text" required value="<?php  if(isset($_GET['error'])){if($_GET['error']==8){ echo $_GET['id'];}}?>" pattern="(Rack_|rack_)([A-Za-z0-9]*)" title="Ex: Rack_XX">
                    </div>
                    <?php  if(isset($_GET['error'])){if($_GET['error']==8){ echo"
                    <div class='form-control-feedback' style='width: 200;position: relative;'>Libellé Rack existe déjà !</div>";}}
                    ?>
                  </div>
              </div>
              <div class="form-group col-xs-12">
                <label class="col-md-2 control-label"> Cluster :</label>
                  <div class ="col-md-4 inputGroupContainer">
                    <div class ="input-group">
                    <select name="id-cluster" class="form-control" onchange="showNode(this.value);" required>
                      <option></option>
                      <?php 
                        $resu=$con->query("SELECT id_cluster FROM cluster;");
                        foreach ($resu as $v){
                                         $id=$v['id_cluster'];
                                         echo "<option>$id</option>";}
                      ?>
                    </select>
                    </div>
                  </div>
              </div>
              <div class="form-group col-xs-12" id="nodes"> 
            </div>
              <div class="form-group col-xs-12">
                <label class="col-md-2 control-label">Date d'installation:</label>
                  <div class =" col-md-4 inputGroupContainer">
                    <div class ="input-group">
                    <input name="date-inst"  min="2000-12-31" class="form-control" type="date" required >
                    </div>
                  </div>
                    <ul class="list-unstyled list-inline pull-right">
                      <li><button type="submit"  class="btn btn-info">Ajouter  <span class="glyphicon glyphicon-save"></span></button></li> 
                      <li><a href="Dash2.php" style="text-decoration: none;"><button type="button" class="btn btn-success"><i class="fa fa-check"></i>Done!</button></li></a>
                    </ul>
              </div>
        </form>
        <form  action="./forms/TraitAjoutExRack.php" method="post" id="id_form" >
          <div class="panel panel-default">
              <div class="panel-heading"><h4>Ajouter à un Rack </h4></div>
              </div>
              <div class="form-group col-xs-12">
                <label class="col-md-2 control-label"> Rack :</label>
                  <div class ="col-md-4 inputGroupContainer">
                    <div class ="input-group">
                    <select name="id-rack" class="form-control" onchange="showExRack(this.value);" required>
                      <option></option>
                      <?php 
                        $resu=$con->query("SELECT id_rack FROM rack WHERE id_rack NOT LIKE 'DEFAULT_%';");
                        foreach ($resu as $v){
                                         $id=$v['id_rack'];
                                         echo "<option>$id</option>";}
                      ?>
                    </select>
                    </div>
                  </div>
              </div>
              <div class="form-group col-xs-12" id="ExRack"> 
            </div>
              <div class="form-group col-xs-12">
                    <ul class="list-unstyled list-inline pull-right">
                      <li><button type="submit"  class="btn btn-info">Ajouter  <span class="glyphicon glyphicon-save"></span></button></li> 
                      <li><a href="Dash2.php" style="text-decoration: none;"><button type="button" class="btn btn-success"><i class="fa fa-check"></i>Done!</button></li></a>
                    </ul>
              </div>
        </form>
      </p>
   </div>
  </div>
 </div>
</div>
</main>
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://use.fontawesome.com/2188c74ac9.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script type="text/javascript" src="Javascript/Dash2.js"></script> 
<script type="text/javascript" src="Workflow/WK1.js"></script>


</body>
</html>