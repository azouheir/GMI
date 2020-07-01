<?php
include'inc/connection.php';
    $req="SELECT * FROM cluster WHERE id_cluster='".$_GET['id']."'";
     $sql=mysqli_query($connection ,$req);
     $row=mysqli_fetch_array($sql);
     $req="UPDATE `node` SET `id_cluster`=NULL WHERE `id_cluster`='".$_GET['id']."'";
    mysqli_query($connection ,$req);
    $req="UPDATE `rack` SET `id_cluster`=NULL WHERE `id_cluster`='".$_GET['id']."'";
    mysqli_query($connection ,$req);
     $req="DELETE FROM rack WHERE `id_cluster`=NULL";
    mysqli_query($connection ,$req);
    $req="DELETE FROM cluster WHERE `id_cluster`='".$_GET['id']."'";
    mysqli_query($connection ,$req);
    header("location:Dash2.php");