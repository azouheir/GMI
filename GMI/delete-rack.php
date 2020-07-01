<?php 
    include'inc/connection.php';
    $req="SELECT * FROM rack WHERE id_rack='".$_GET['id']."'";
     $sql=mysqli_query($connection ,$req);
     $row=mysqli_fetch_array($sql);
     $def='DEFAULT_'.substr($row[2],8);
    $req="UPDATE `node` SET `id_rack`='$def' WHERE `id_rack`='".$_GET['id']."'";
    mysqli_query($connection ,$req);
    $req="DELETE FROM `rack` WHERE `rack`.`id_rack` ='".$_GET['id']."'";
    mysqli_query($connection ,$req);
    header('location:Dash2.php?sup=1&idrck=$_GET[\'id\']');
?>
