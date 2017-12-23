<?php
$link = mysqli_connect("127.0.0.1", "root", "", "web_project");
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
$sql="SELECT * FROM items limit 3 offset 9";
$result=mysqli_query($link,$sql);
// Numeric array
$items=mysqli_fetch_all($result,MYSQLI_ASSOC);

echo json_encode($items);

mysqli_close($link);
?>