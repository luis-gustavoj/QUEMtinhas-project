<?php
    echo("
    <head>
        <link rel='stylesheet' href='../css/global.css' />
        <link rel='stylesheet' href='../css/iwant.css' />
    </head>
    ");

    include('db.php');
    include('ong.php');

    $db = new db();
    $db->getAllOngs();
?>