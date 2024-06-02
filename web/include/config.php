<?php 
define ('SERVER','localhost');
define ('USER','root');
define ('PASS','');
define ('DB','women_legal');
$db = new PDO("mysql:host=".SERVER.";dbname=".DB,USER,PASS);
if($db){
    // echo "succesfully";
}
?>