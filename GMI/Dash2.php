
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
  $con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);  }
else {
  header("location:index.php");
}

?>


<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <title>GMI-Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" type="text/css" href="Charts/charts.css">
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
    <link rel="stylesheet" type="text/css" href="css/Tree.css">
<style type="text/css">
  body{
    background:#fff;
}
.confirmNotifi {
    background:rgba(0,0,0,0.7);
    position:fixed;
    top:0;
    bottom:0;
    left:0;
    right:0;
    color:#000;
    font-size:large;
    text-align:center;
    font-family:"Arial Black", Gadget, sans-serif;
    opacity:0;
    visibility:hidden;
    transition:.3s;
    perspective:100vh;
}
.confirmNotifi.show {
    opacity:1;
    visibility:visible;
}
.confirmNotifi .content {
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%) rotateX(-90deg);
    transition:.3s;
    perspective:100vh;
}
.confirmNotifi.show .content {
    transform:translate(-50%,-50%);
    transition:.7s cubic-bezier(.7,.5,0,1.8);
}
.confirmNotifi .title {
    background:hsl(0,0%,90%);
    padding:50px;
    border-radius:10px 10px 0 0;
}
.confirmNotifi .title h2 {
    margin-top:0;
}
.confirmNotifi .yes,
.confirmNotifi .no {
    width:50%;
    float:left;
    padding:20px;
    box-sizing:border-box;
    transform:rotateX(90deg);
    transition:.3s;
    transform-origin:50% 0;
}
.confirmNotifi.show .yes,
.confirmNotifi.show .no {
    transform:rotateX(0);  
}
.confirmNotifi .yes {
    background:hsl(120,100%,60%);
    border-radius:0 0 0 10px;
}
.confirmNotifi.show .yes {
    transition:.7s .2s cubic-bezier(.7,.5,0,1.8);
}
.confirmNotifi.show .no {
    transition:1s .2s cubic-bezier(.7,.5,0,1.8);
}
.confirmNotifi .no {
    background:hsl(0,100%,60%);
    border-radius:0 0 10px;
}
.confirmNotifi.show .yes:hover,
.confirmNotifi.show .no:hover {
    transform:rotateX(-25deg); 
    transition:.3s;
}
.confirmNotifi .content > * {
    box-shadow:4px 4px 16px rgba(0,0,0,0.3);
}

@media (max-width:600px){
    .confirmNotifi .content {
        width:80%;
    }
}

</style>
   
    

</head>

<body class="sidebar-is-reduced" style="background-color: #e1e3e6">
  
  <header class="l-header">
    <div class="l-header__inner clearfix">
      <div class="c-header-icon js-hamburger">
        <div class="hamburger-toggle"><span class="bar-top"></span><span class="bar-mid"></span><span class="bar-bot"></span></div>
      </div>
      <div class="c-search" style="">
       <form class="form form-inline" method="get" action="">
       <span>
        <input class="c-search__input u-input" name="id" placeholder="Rechercher un matériel..." type="text" required />
        <a href="Dash2.php?id=<?php?>"><button type="submit" class="btn btn-default"><i class="fa fa-search lg"></i></button></a>
        </span>
        </form>
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
        <img src="img/Logo.png" style="width:100px; height: 100px;"> 
      </div>
    </div>
    <div class="l-sidebar__content">
      <nav class="c-menu js-menu">
        <ul class="u-list">
          <li class="c-menu__item is-active" data-toggle="tooltip" title="Vue Global">
            <div class="c-menu__item__inner"><i class="fa fa-file-text-o"></i>
              <div class="c-menu-item__title"><span>Vue Global</span></div>
            </div>
          </li>
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
</body>
<main class="l-main">
  
    
<div class="container">
    <div class="panel panel-default" style="">
        <div class="panel-heading">Arborescence Materiel</div>
        <div class="panel-body">
        <?php include('Tree.php') ?>
        </div>
        </div>
</div>
        <center>
  <button class="btn btn-primary hidden-print" onclick="imprime_zone('Fiche technique', 'print');" data-toggle='tooltip' title='Imprimer la fiche technique!'><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Imprimer</button>
</center>
    <?php include('SearchDetails.php') ?>

        
  
  
</main>
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://use.fontawesome.com/2188c74ac9.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script type="text/javascript" src="Javascript/Dash2.js"></script> 
<script type="text/javascript" src="Javascript/Tree.js"></script>
<script type="text/javascript" src="Javascript/Impression.js"></script>
</body>
</html>