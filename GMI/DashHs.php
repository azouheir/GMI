
<!------ Include the above in your HEAD tag ---------->
<?php 
session_start();
 if (isset($_SESSION['useremail'])) {
echo"Bienvenue ".$_SESSION['useremail'];
 
$db_host        = 'localhost';
$db_user        = 'root';
$db_pass        = '';
$db_database    = 'GMI';   
$idk=$_SESSION['useremail'];
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
}else {
  header("location:index.php");
}
$query="SELECT * FROM administrateur ;";
$sql=$con->query($query);
$row=$sql->fetch_row();

?>


<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <title>GMI-Profil</title>
    <style type="text/css">
                    input.hidden {
    position: absolute;
    left: -9999px;
}

#profile-image1 {
    cursor: pointer;
  
     width: 100px;
    height: 100px;
  border:2px solid #03b1ce ;}
  .tital{ font-size:16px; font-weight:500;}
   .bot-border{ border-bottom:1px #f8f8f8 solid;  margin:5px 0  5px 0}  
    </style>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!-- <script type="text/javascript" href="Javascript/Dash2.js"></script> -->
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'>
    
    <style class="cp-pen-styles">@import url("https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700&subset=latin-ext");
    </style>
    <link rel="stylesheet" type="text/css" href="css/Dash2.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    


</head>

<body class="sidebar-is-reduced" style="background-color: #e1e3e6">
  
  <header class="l-header">
    <div class="l-header__inner clearfix">
      <div class="c-header-icon js-hamburger">
        <div class="hamburger-toggle"><span class="bar-top"></span><span class="bar-mid"></span><span class="bar-bot"></span></div>
      </div>
<!--       Deconnexion -->
      <div class="header-icons-group">
        <a href="logout.php">
        <div class="c-header-icon logout">
        <i class="fa fa-power-off"></i>
        </div>
        </a>
      </div>
    </div>
  </header>

  
    <div class="l-sidebar" style="position: fixed;">
    <div class="logo">
      <div class="logo__txt">
        <img src="img/logo.png" style="width:100px; height: 100px;"> 
      </div>
    </div>
    <div class="l-sidebar__content">
      <nav class="c-menu js-menu">
        <ul class="u-list">
          
          <a href="Dash2.php" style="text-decoration: none;color: white">
          <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Vue Global">
            <div class="c-menu__item__inner"><i class="fa fa-file-text-o"></i>
              <div class="c-menu-item__title"><span>Vue Global</span></div>
            </div>
          </li></a>
          <a href="DashAjout.php" style="text-decoration: none;color: white">
          <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Ajouter un matériel">
            <div class="c-menu__item__inner"><i class="fa fa-plus-circle"></i>
              <div class="c-menu-item__title"><span>Ajouter un matériel</span></div>
            </div>
          </li>
          </a>
          <a href="maintenance.php" style="text-decoration: none;color: white">
          <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Maintenance">
            <div class="c-menu__item__inner"><i class="fa fa-cogs"></i>
              <div class="c-menu-item__title"><span>Maintenance</span></div>
            </div>
          </li>
          </a>
          <li class="c-menu__item is-active" data-toggle="tooltip" title="Compte">
            <div class="c-menu__item__inner"><i class="fa fa-address-book-o"></i>
              <div class="c-menu-item__title"><span>Compte</span></div>
            </div>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</body>
<main class="l-main">
<center>
<div class="container" style="margin-left:28%">
  <div class="row">
        
       <div class="col-md-7 ">

<div class="panel panel-default">
  <div class="panel-heading">  <h4 >Profil Administrateur</h4></div>
   <div class="panel-body">
       
    <div class="box box-info">
        
            <div class="box-body">
                     <div class="col-sm-6">
                     <div  align="center"> <img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive">                  
                     </div>
              
              <br>
    
              <!-- /input-group -->
            </div>
            <div class="col-sm-6">
            <h4 style="color:#00b1b1;"><?php echo "$row[1] $row[2]"?></h4></span>
              <span><p>Administrateur</p></span>            
            </div>
            <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">
    
              
<div class="col-sm-5 col-xs-6 tital " >Nom:</div><div class="col-sm-7 col-xs-6 "><?php echo "$row[1]"?></div>
     <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Prenom:</div><div class="col-sm-7"> <?php echo "$row[2]"?></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >E-mail:</div><div class="col-sm-7"><?php echo "$row[3]"?></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Login:</div><div class="col-sm-7"><?php echo "$row[0]"?></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Mot de passe:</div><div class="col-sm-7"><?php echo "$row[5]"?></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Ville:</div><div class="col-sm-7"><?php echo "$row[6]"?></div>

 <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Pays:</div><div class="col-sm-7"><?php echo "$row[7]"?></div>

 <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Telephone:</div><div class="col-sm-7"><?php echo "$row[4]"?></div>


            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
       
            
    </div> 
    </div>
</div>         
   </div>
</div>
<?php $sql->data_seek(0);
      $row=$sql->fetch_row(); 
?>
<div class="container"  style="padding-left: 120px;">
    <br />
    <a class="btn btn-success" href="#suc" data-toggle="modal"><h4><i class="fa fa-edit"></i> Modifier</h4></a>
    <!-- Modal -->
    <div class="modal modal-danger fade" id="suc" role="dialog">
        <div class="modal-dialog" style="left :auto !important">
            <div class="modal-content">
                <div class="modal-header modal-header-success">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h1><i class="fa fa-list-alt"></i> Modifier vos coordonnées</h1>
                </div>
                <div class="modal-body">
                <table>
                <form action="AdminForm.php" method="post">
                <tr>
                  <td><label>Nom &nbsp &nbsp</label></td>
                  <td><input type="text" name="nom" class="form-control" required value="<?php echo"$row[1]"; ?>"></td>
                </tr>
                <tr>
                  <td><label>Prenom &nbsp &nbsp</label></td>
                  <td><input type="text" name="prenom" class="form-control" required value="<?php  echo"$row[2]";?>"></td>
                </tr>
                <tr>
                  <td><label>E-mail &nbsp &nbsp</label></td>
                  <td><input type="email" name="mail" class="form-control" required value="<?php echo"$row[3]"; ?>"></td>
                </tr>
                <tr>
                  <td><label>Login &nbsp &nbsp</label></td>
                  <td><input type="text" name="lg" class="form-control" required value="<?php echo"$row[0]"; ?>"></td>
                </tr>
                <tr>
                  <td><label>Mot de passe &nbsp &nbsp</label></td>
                  <td><input type="text" name="mdp" class="form-control" required value="<?php echo"$row[5]"; ?>"></td>
                </tr>
                <tr>
                  <td><label>Ville &nbsp &nbsp</label></td>
                  <td><input type="text" name="ville" class="form-control" required value="<?php echo"$row[6]"; ?>"></td>
                </tr>
                <tr>
                  <td><label>Pays &nbsp &nbsp</label></td>
                  <td><input type="text" name="pays" class="form-control" required value="<?php echo"$row[7]"; ?>"></td>
                </tr>
                <tr>
                  <td><label>Telephone &nbsp &nbsp</label></td>
                  <td><input type="text" name="tel" class="form-control" required pattern="(06)[0-9]{8}" title="Numero Telephone : 06--------" value="<?php echo"$row[4]"; ?>"></td>
                </tr>
                
                </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i> Sauvegarder</button>
                    </form>
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Fermer</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  </div>
</center>



</main>
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://use.fontawesome.com/2188c74ac9.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script type="text/javascript" src="Javascript/Dash2.js"></script> 
</body>
</html>