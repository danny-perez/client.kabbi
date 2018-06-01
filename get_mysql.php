<?php
$link = mysqli_connect("localhost", "root2", "E200847") or die('Connect error');
mysqli_query($link,"SET NAMES 'utf8'"); 
mysqli_query($link,"SET CHARACTER SET 'utf8'");
mysqli_query($link,"SET SESSION collation_connection = 'utf8_general_ci'");
$sel_db=mysqli_select_db($link, 'k_taxinew') or die('Cannot choose base');

$query="SELECT MAX(`id`) FROM `coords`";
$result = mysqli_query($link, $query) or die('SQL error');
$row = mysqli_fetch_row($result);
$max = $row[0]-12;

$rndid = round(rand(1,$max));

$query="SELECT * FROM `coords` WHERE `id`>'$rndid'";
$result = mysqli_query($link, $query) or die('SQL error');
while($row = mysqli_fetch_assoc($result)){
                                        $kk[] = $row;
                                        }
$request = json_encode($kk);
echo $request;
?>
