<html>
    <head>
        <title>Codeigniter cart class</title>
        
        <script type="text/javascript">
            // To conform clear all data in cart.
            function clear_cart() {
                var result = confirm('Are you sure want to clear all bookings?');

                if (result) {
                    window.location = "<?php echo base_url(); ?>index.php/shopping/remove/all";
                } else {
                    return false; // cancel button
                }
            }
        </script>
    </head>
    <body>
    <div align="right">
        <input type="button"  style="color:blue;" value="LogIn" onclick="window.location = 'login/welcome_message' "">
    </div>
      <div id='content'>
                <div id='tag'>
                   <!-- Formget Fugo logo image -->
                   
                </div>
        <div id="cart" >
            <div id = "heading">
                <h2 style="color:green;font-family:calibri;" align="center">Products on Your Shopping Cart</h2>
            </div>
            
                <div id="text"> 
            <?php  $cart_check = $this->cart->contents();
            
            // If cart is empty, this will show below message.
             if(empty($cart_check)) {
             echo '<h4 style="color:blue;text-align:center;font-family:calibri;">'.'To add products to your shopping cart click on "Add to Cart" Button'.'</h4>'; 
             }  ?> </div>
            
                <table id="table" border="0" cellpadding="5px" cellspacing="1px">
                  <?php
                  // All values of cart store in "$cart". 
                  if ($cart = $this->cart->contents()): ?>
                    <tr id= "main_heading">
                        <td>Serial</td>
                        <td>Name</td>
                        <td>Price</td>
                        <td>Qty</td>
                        <td>Amount</td>
                        <td style="color:red;font-family:calibri;">Cancel Product</td>
                    </tr>
                    <?php
                     // Create form and send all values in "shopping/update_cart" function.
                    echo form_open('shopping/update_cart');
                    $grand_total = 0;
                    $i = 1;

                    foreach ($cart as $item):
                        //   echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                        //  Will produce the following output.
                        // <input type="hidden" name="cart[1][id]" value="1" />
                        
                        echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                        echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                        echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                        echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                        echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
                        ?>
                        <tr>
                            <td>
                       <?php echo $i++; ?>
                            </td>
                            <td>
                      <?php echo $item['name']; ?>
                            </td>
                            <td>
                                $ <?php echo number_format($item['price'], 2); ?>
                            </td>
                            <td>
                            <?php echo form_input('cart[' . $item['id'] . '][qty]', $item['qty'], 'maxlength="3" size="1" style="text-align: right"'); ?>
                            </td>
                        <?php $grand_total = $grand_total + $item['subtotal']; ?>
                            <td>
                                $ <?php echo number_format($item['subtotal'], 2) ?>
                            </td>
                            <td>
                              
                            <?php 
                            // cancle image.
                            $path = "<img src='http://localhost/ATP3/cart/images/delete.png' width='50px' height='40px'>";
                            echo anchor('shopping/remove/' . $item['rowid'], $path); ?>
                            </td>
                     <?php endforeach; ?>
                    </tr>
                    <tr>
                        <td><b style="color:red;font-family:sans-serif;">Order Total: $<?php 
                        
                        //Grand Total.
                        echo number_format($grand_total, 2); ?></b></td>
                        
                        <?php // "clear cart" button call javascript confirmation message ?>
                        <td colspan="5" align="right"><input type="button" class ='fg-button teal' value="Clear Cart" onclick="clear_cart()">
                            
                            <?php //submit button. ?>
                            <input type="submit" class ='fg-button teal' value="Update Cart">
                            <?php echo form_close(); ?>
                            
                            <!-- "Place order button" on click send "billing" controller  -->
                            <input type="button" class ='fg-button teal' value="Place Order" onclick="window.location = 'shopping/billing_view'"></td>
                    </tr>
<?php endif; ?>
            </table>
        </div>


        <div id="products_e" align="center">

            <h2 id="head" align="center" style="font-family:calibri;color:green">Products</h2>
            <?php
            
            // "$products" send from "shopping" controller,its stores all product which available in database. 
            foreach ($products as $product) {
                $id = $product['serial'];
                $name = $product['name'];
                $description = $product['description'];
                $price = $product['price'];
                ?>

                <div id='product_div'>  
                    <div id='image_div'>
                        <img src="<?php echo base_url() . $product['picture'] ?>"/>
                    </div>
                    <div id='info_product'>
                        <div id='name'><?php echo $name; ?></div>
                        <div id='desc'>  <?php echo $description; ?></div>
                        <div id='rs'><bstyle="font-family:calibri;>Price</b>:<big style="color:green">
                            $<?php echo $price; ?></big></div>
                        <?php
                        
                        // Create form and send values in 'shopping/add' function.
                        echo form_open('shopping/add');
                        echo form_hidden('id', $id);
                        echo form_hidden('name', $name);
                        echo form_hidden('price', $price);
                        ?> </div> 
                    <div id='add_button'>
                        <?php
                        $btn = array(
                            'class' => 'fg-button teal',
                            'value' => 'Add to Cart',
                            'name' => 'action'
                        );
                        
                        // Submit Button.
                        echo form_submit($btn);
                        echo form_close();
                        ?>
                    </div>
                </div>

<?php } ?>

        </div>
      </div>
    </body>
</html>
