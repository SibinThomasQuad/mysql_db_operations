<?php
DB::insert('login',array('name'=>'sibin','pass'=>'123'),DB::init());
?>
<select>
<?php DB::FillDropdown('pass','name','login',DB::init()); ?>
</select>
