<?php
    include('db.php');
    include('ong.php');

    header("location:getAllOngs.php");
    $db = new db();
    $db->iWant($_POST['ident']);
?>