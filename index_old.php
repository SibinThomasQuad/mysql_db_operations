<?php
DB::insert('login',array('name'=>'sibin','pass'=>'123'),DB::init());
?>
this is the function to fill the dropdown
<select>
<?php DB::FillDropdown('pass','name','login',DB::init()); ?>
</select>
