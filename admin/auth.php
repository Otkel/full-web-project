<?php
$message="";
if(count($_POST)>0) {
    $conn = mysqli_connect("127.0.0.1","root","","web_project");
    $result = mysqli_query($conn,"SELECT * FROM admins WHERE login='" . $_POST["userName"] . "' and password = '". md5($_POST["password"])."'");
    $count  = mysqli_num_rows($result);
    if($count==0) {
        $url='index.php';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="0.01; '.$url.'">';
    }
    else {
        $url='panel.php';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="0.01; '.$url.'">';
    }
}
echo $message;
?>