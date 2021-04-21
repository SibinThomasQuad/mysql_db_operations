<?php
DB::FormMigrate('user_info',$_POST,DB::init());
DB::insert('user_info',$_POST,DB::init());
?>
