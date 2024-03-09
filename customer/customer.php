<!DOCTYPE html>

<html lang="en">
    <head>
        <link rel ="stylesheet" href ="/Assignment9/styles/main.css"/>
        <link rel ="stylesheet" href ="/Assignment9/styles/customer.css"/>
        <script src="/Assignment9/scripts/customers.js"></script>

        <title>The Guitar Store</title>  
    </head>
    <body>
        <?php include('./view/header.php'); ?>
        <?php include('./view/horizontal_nav_bar.php'); ?>
        
        <main>
            
            <?php include('./view/aside.php'); ?>
            <section>
                <div>
                    <h3>Customer Information</h3>
                    <form action="/Assignment9/index.php" method="POST" id="customer_form">
                        <input type="hidden" name="action" value="update_customer_info">
                        <input type="hidden" name="customer_id" value="<?php echo $customer['customer_id']?>">
                        <table>
                            <tr><td>First name:</td><td><input name = "first" type="text" id="first" value="<?php echo $customer['first_name']?>"></td></tr>
                            <tr><td>Last name:</td><td><input name = "last" type="text" id="last" value="<?php echo $customer['last_name']?>"></td><td><?php if(isset($message)){ echo '<p>' . $message . '</p>';}?></td></tr>
                            <tr><td>Email:</td><td><input name = "email" type="text" id="email" value="<?php echo $customer['email_address']?>"></td></tr>
                            <tr><td>Password:</td><td><input name = "password" type="password" id="password"></td></tr>
                            <tr><td>Confirm Password:</td><td><input name = "confirm_password" type="password" id="confirm"></td></tr>                        
                        </table>
                        
                        <input type="submit" value="Update Customer Information">
                    </form>         
                </div>



                <div>
                    <h3>Billing Address</h3>
                    <form action="/Assignment9/index.php" method="post" id="billing_form">
                        <input type="hidden" name="action" value="update_billing_address">
                        <input type="hidden" name="customer_id" value="<?php echo $customer['customer_id']?>">
                        <input type="hidden" name="billing_address_id" value="<?php echo $customer['billing_address_id']?>">


                        <table>
                            <tr><td>Address line 1:</td><td><input type="text" name="line1" value="<?php echo $billing_address['line1']?>"></td></tr>
                            <tr><td>Address line 2:</td><td><input type="text" name="line2" value="<?php echo $billing_address['line2']?>"></td></tr>
                            <tr><td>City:</td><td><input type="text" name="city" value="<?php echo $billing_address['city']?>"></td></tr>
                            <tr><td>State:</td><td>
                                    <select name = "state">   
                                        <?php
                                            foreach ($states as $state) {
                                                $selected = ($state['state'] === $billing_address['state']) ? 'selected' : '';
                                                  echo '<option value="' . htmlspecialchars($state['state']) . '" ' . $selected . '>'. htmlspecialchars($state['state']) . '</option>';
                                            }
                                        ?>
                                    </select>

                                </td><td></td></tr>
                            <tr><td>Zip Code:</td><td><input type="text" name="zip" id="b_zip" value="<?php echo $billing_address['zip_code']?>"></td></tr>
                            <tr><td>Phone:</td><td><input type="text" name="phone" id="b_phone" value="<?php echo $billing_address['phone']?>"></td></tr>                     
                        </table>
                        <input type="submit" value="Update Billing Address">
                    </form>         
                </div>


                <div>
                    <h3>Shipping Address</h3>
                    <form action="/Assignment9/index.php" method="post" id="shipping_form">
                        <input type="hidden" name="action" value="update_shipping_address">
                        <input type="hidden" name="customer_id" value="<?php echo $customer['customer_id']?>">
                        <input type="hidden" name="shipping_address_id" value="<?php echo $customer['shipping_address_id']?>">

                        <table>
                            <tr><td>Address line 1:</td><td><input type="text" name="line1" value="<?php echo $shipping_address['line1']?>"></td></tr>
                            <tr><td>Address line 2:</td><td><input type="text" name="line2" value="<?php echo $shipping_address['line2']?>"></td></tr>
                            <tr><td>City:</td><td><input type="text" name="city" value="<?php echo $shipping_address['city']?>"></td></tr>
                            <tr><td>State:</td><td>
                                    <select name = "state">   
                                        <?php
                                            foreach ($states as $state) {
                                                $selected = ($state['state'] === $shipping_address['state']) ? 'selected' : '';
                                                  echo '<option value="' . htmlspecialchars($state['state']) . '" ' . $selected . '>'. htmlspecialchars($state['state']) . '</option>';
                                            }
                                        ?>
                                    </select>

                                </td><td></td></tr>
                            <tr><td>Zip Code:</td><td><input type="text" name="zip" id="s_zip" value="<?php echo $shipping_address['zip_code']?>"></td></tr>
                            <tr><td>Phone:</td><td><input type="text" name="phone" id="s_phone" value="<?php echo $shipping_address['phone']?>"></td></tr>                     
                        </table>

                        <input type="submit" value="Update Shipping Address">

                    </form>         
                </div>

            </section>
        </main>
        
        <?php include('./view/footer.php'); ?>
    </body>
</html>

