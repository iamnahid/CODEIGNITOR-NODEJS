<!DOCTYPE html>

<head></head>
<body>

	<?php
	foreach ($customers as $cus) {
                $id = $cus['serial'];
                $name = $product['name'];
                $email = $product['email'];
                $add = $product['address'];
                $pho = $product['phone'];
    ?>

    <div id='customer_div'>  
    <div id='image_div'>
    
    </div>
    <div id='infor_cus'>
    <div id='name'><?php echo $name; ?></div>
    <div id='id'>  <?php echo $serial; ?></div>
    <div id='em'>  <?php echo $email; ?></div>
    <div id='add'>  <?php echo $address; ?></div>
    <div id='pho'>  <?php echo $pho; ?></div>





</body>