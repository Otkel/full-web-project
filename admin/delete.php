<?php
$id = $_GET["item_delete_id"];
$conn = mysqli_connect("127.0.0.1","root","","web_project");
$sql = 'DELETE FROM `items` WHERE `items`.`id` = '.$id;
$result = mysqli_query($conn,$sql);
$url='panel.php';
echo '<META HTTP-EQUIV=REFRESH CONTENT="0.01; '.$url.'">';