<?php
    include('db.php');
    include('ong.php');

    $db = new db();

    $newOng = new ong($_POST['name'], $_POST['description'], $_POST['place'],$_POST['dailyCapacity']);
    $db->insertOng($newOng);
?>