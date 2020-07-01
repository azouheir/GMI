<?php 
session_start();
error_reporting(0);
include 'inc/connection.php';

  if (isset($_SESSION['useremail'])) {
  echo"Bienvenue ".$_SESSION['useremail'];
 
  $db_host        = 'localhost';
  $db_user        = 'root';
  $db_pass        = '';
  $db_database    = 'gmi';   
  $idk=$_SESSION['useremail'];
  $con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);  }
else {
  header("location:index.php");
}

?>


<!DOCTYPE html>
<html lang="fr" >

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>GMI - Maintenance</title>
   <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" type="text/css" href="Charts/charts.css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
         <script type="text/javascript" href="Javascript/Dash2.js"></script> 
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'>
    
    <style class="cp-pen-styles">@import url("https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700&subset=latin-ext");
    </style>
    <link rel="stylesheet" type="text/css" href="css/Dash2.css">
    <!-- Tree links -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/Tree.css">
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
    .table{
      background-color: white;
    }
  </style>  
  

</head>

<body class="sidebar-is-reduced"  style="background-color: #e1e3e6">
  
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
          </li>
          </a>
          <a href="DashAjout.php" style="text-decoration: none;color: white">
          <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Ajouter un matériel">
            <div class="c-menu__item__inner"><i class="fa fa-plus-circle"></i>
              <div class="c-menu-item__title"><span>Ajouter un matériel</span></div>
            </div>
          </li>
          </a>
          <li class="c-menu__item is-active" data-toggle="tooltip" title="Maintenance">
            <div class="c-menu__item__inner"><i class="fa fa-cogs"></i>
              <div class="c-menu-item__title"><span>Maintenance</span></div>
            </div>
          </li>
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

<main class="l-main">
<div class="container">
    <div class="panel panel-default" style="">
        <div class="panel-heading">Maintenance</div>
        <div class="panel-body">
        <select class=form-control onchange="myfunction()" id="myselect">
        <option disabled="" selected=""> --- Choisissez un CLUSTER ---</option>
     
        
        	<?php $sql=mysqli_query($connection ,'SELECT * FROM cluster');
        	while($row  = mysqli_fetch_array($sql)){?>
        	<option ><?php echo $row['id_cluster'];?> </option>
        	
        <?php }?>
        </select>
      
        </div>
        </div>
        
     	<div id="div-usb" style="padding-top: 40px;">
     	
     	</div>   
     	
     	



        <!-- Modal -->
    <div id="myModal" class="modal modal-danger fade" role="dialog">
      <div class="modal-dialog" style="left :auto !important">

        <!-- Modal content-->
        <div class="modal-content" id="modal-content">
     

      </div>
    </div>
    </div>
    
     
     
</div>
</main>
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://use.fontawesome.com/2188c74ac9.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
 
</body>
<script>
	function myfunction(){
		var x = $("#myselect").val();
		 
		$("#div-usb").load("serveur.php?id_c="+x);
		}


	$(document).ready(function(){

	    //  append values in input fields
	      $(document).on('click','a[data-role=update-node]',function(){
	            var id_node  = $(this).attr('id');
	         //   alert(id_USB);
	            $("#modal-content").load("update-node.php?id_node="+id_node);
	            $('#myModal').modal('toggle');
	      })

        $(document).on('click','a[data-role=delete-rack-node]',function(){
              var id_node  = $(this).attr('id');
              $("#modal-content").load("delete-rack-node.php?id_node="+id_node);
              $('#myModal').modal('toggle');
        })

	      
	      $(document).on('click','a[data-role=update-serveur]',function(){
	            var id_serveur  = $(this).attr('id');
	         //   alert(id_USB);
	            $("#modal-content").load("update-serveur.php?id_serveur="+id_serveur);
	            $('#myModal').modal('toggle');
	      })
	      
	      
	     

	    //  append values in input fields
	      $(document).on('click','a[data-role=delete-serveur]',function(){
	            var id_serveur  = $(this).attr('id');
	           //alert(id_serveur);
	            $("#modal-content").load("delete-serveur.php?id_serveur="+id_serveur);
	            $('#myModal').modal('toggle');
	      })
	      
	     
	

	    //  append values in input fields
	      $(document).on('click','a[data-role=update-ssd]',function(){
	            var id_ssd  = $(this).attr('id');
	           //alert(id_ssd);
	            $("#modal-content").load("update-ssd.php?id_ssd="+id_ssd);
	            $('#myModal').modal('toggle');
	      })
	

	    //  append values in input fields
	      $(document).on('click','a[data-role=update-usb]',function(){
	            var id_usb  = $(this).attr('id');
	           //alert(id_USB);
	            $("#modal-content").load("update-usb.php?id_usb="+id_usb);
	            $('#myModal').modal('toggle');
	      })
	

	    //  append values in input fields
	      $(document).on('click','a[data-role=delete-node]',function(){
	            var id_node  = $(this).attr('id');
	           //alert(id_USB);
	            $("#modal-content").load("delete-node.php?id_node="+id_node);
	            $('#myModal').modal('toggle');
	      })

	      $(document).on('click','a[data-role=delete-usb]',function(){
	            var id_usb  = $(this).attr('id');
	           //alert(id_USB);
	            $("#modal-content").load("delete-usb.php?id_usb="+id_usb);
	            $('#myModal').modal('toggle');
	      })
	})
</script>
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://use.fontawesome.com/2188c74ac9.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script type="text/javascript" src="Javascript/Dash2.js"></script> 
<script type="text/javascript" src="Javascript/Tree.js"></script>




</main>
</html>












