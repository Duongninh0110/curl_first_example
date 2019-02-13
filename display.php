<?php 
$con = mysqli_connect('localhost', 'root', 'mau0954010058', 'crawler_test');

$select_new = "select * from news where id = 1";
$a = mysqli_query($con, $select_new);

$news = mysqli_fetch_array($a);

print_r($news['content']);



 ?>