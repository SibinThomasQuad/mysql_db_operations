<?php
include('config.php');
$init=DB::init();
DB::insert('login',array('name'=>'sibin','pass'=>'123'),$init);
?>
