<?php
    //NOTE: Jquery files are not included in file structure because using link version.
    //
    //      Looked for FenderPrecision.png, HofnerIcon.png, and TamaDrumSet.png on canvas
    //      but could not find them.


    //Ensure we have all the model files
    require('./model/database.php');
    require('./model/category_db.php');
    require('./model/product_db.php');
    require('./model/customer_db.php');
    require('./model/address_db.php');
    
    //get the action that was passed when directing to index.php
    $action = filter_input(INPUT_POST, 'action');
    
    //if it wasnt on the post array, try the get array
    if($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');   
    }

    //action for product_page
    if($action == 'products') {
        //get the selected category
        $category_id = filter_input(INPUT_GET, 'category', FILTER_VALIDATE_INT);    
        
        if($category_id == NULL || $category_id == FALSE) {
            //Set it to default to guitars
            $category_id = 1;
        }     
        
        //prepare categories, category_name, and products for product_list.
        $categories = get_categories();       
        $category_name = get_category_name($category_id);
        $results = get_products_by_category($category_id);
        
        //show product_list page
        include('products/product_list.php');    
 
    } else if ($action == 'support') {
        //show the support page, w/aside
        $categories = get_categories();
        include('support.php');
    } else if($action == 'shipping'){
        //show the shipping page w/aside
        $categories = get_categories();
        include('shipping.php');
    } else if($action == 'guitars'){
        //show the guitars page w/aside
        $categories = get_categories();
        include('products/guitars.php');
    } else if($action == 'customer_login'){
        //display the customer login page
        $categories = get_categories();
        include('customer/customer_login.php');
        
    } else if($action == 'customer_page'){
        $email = filter_input(INPUT_POST, 'email');
        $customer = get_customer_info_by_email_address($email);
        
        $categories = get_categories();
        if(is_array($customer)){
           $shipping_address = get_address($customer['shipping_address_id']);
           $billing_address = get_address($customer['billing_address_id']); 
        }
        
        $states = get_states();

        //if database couldnt find customer with email given, go back to login
        if(empty($customer)){          
            include('customer/customer_login.php');
        }
        else{               
           //if the database found it go to the edit page
           include('customer/customer.php');
        }
        
    }else if($action === 'update_customer_info'){
        
        //get customer id from hidden input and use it to prepare $customer
        $customer_id = filter_input(INPUT_POST, 'customer_id');
        $customer = get_customer_info($customer_id);
        
        //get the information from customer info form.
        $first = filter_input(INPUT_POST, 'first');
        $last = filter_input(INPUT_POST, 'last');
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST,'password');
        $confirm_password = filter_input(INPUT_POST, 'confirm_password');
        
        //if the firstname is changed, update it
        if($first !== $customer['first_name']){
            update_first_name($customer_id, $first);
        }
        
        //if lastname is changed, update it
        if($last !== $customer['last_name']){
            update_last_name($customer_id, $last);
        }
        
        //if email is changed, update it
        if($email !== $customer['email_address']){
            update_email_address($customer_id, $email);
        }
        
        //hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        //update the password, check again that they match first
        if($password === $confirm_password){
            update_password($customer_id, $hashed_password);
        }
        
        
        //overwrite hashed/unhashed password so it isnt in the frontend. Seems more secure. 
        $hashed_password = "";
        $password = "";
                
        //prepare variables for the customer.php page inclusion
        $shipping_address = get_address($customer['shipping_address_id']);
        $billing_address = get_address($customer['billing_address_id']);
        $shipping_address_id = $customer['shipping_address_id'];
        $billing_address_id = $customer['billing_address_id'];
        $states = get_states();
        
        //prepare categories for the aside
        $categories = get_categories();      
        $message = 'Customer information updated';
        //show the customer page
        include('customer/customer.php');

    }else if($action  === 'update_billing_address'){
        
        $customer_id = filter_input(INPUT_POST, 'customer_id');
        $billing_address_id = filter_input(INPUT_POST, 'billing_address_id');
        
        //get billing info from the form
        $line1 = filter_input(INPUT_POST, 'line1'); 
        $line2 = filter_input(INPUT_POST, 'line2');
        $city = filter_input(INPUT_POST, 'city');  
        $state = filter_input(INPUT_POST, 'state'); 
        $zip = filter_input(INPUT_POST, 'zip'); 
        $phone = filter_input(INPUT_POST, 'phone'); 
        
        //update the address
        update_address($billing_address_id, $line1, $line2, $city, $state, $zip, $phone);
        
        //prepare the customer info for page customer.php to be shown
        $customer = get_customer_info($customer_id);   
        $shipping_address = get_address($customer['shipping_address_id']);
        $billing_address = get_address($customer['billing_address_id']);
        $shipping_address_id = $customer['shipping_address_id'];
         
        //prepare categories for the aside
        $categories = get_categories();
        $states = get_states();
        
        $message = 'Billing address updated';

        //include the customer page
        include('customer/customer.php');
        
        
    }else if($action === 'update_shipping_address'){
        
        //customer id and address id from hidden input fields.
        $customer_id = filter_input(INPUT_POST, 'customer_id');
        $shipping_address_id = filter_input(INPUT_POST, 'shipping_address_id');
        
        // Get all of the information from the form. Using POST array
        $line1 = filter_input(INPUT_POST, 'line1'); 
        $line2 = filter_input(INPUT_POST, 'line2');
        $city = filter_input(INPUT_POST, 'city');  
        $state = filter_input(INPUT_POST, 'state'); 
        $zip = filter_input(INPUT_POST, 'zip'); 
        $phone = filter_input(INPUT_POST, 'phone'); 
        
        //Update the address
        update_address($shipping_address_id, $line1, $line2, $city, $state, $zip, $phone);
        
        //get the customer so the page can fill in the boxes with the current info in db
        $customer = get_customer_info($customer_id);
        
        //get shipping, billing, and billing id so page is filled from db
        $shipping_address = get_address($customer['shipping_address_id']);
        $billing_address = get_address($customer['billing_address_id']);
        $billing_address_id = $customer['billing_address_id'];
        
        //prepare the list of states for shipping/billing forms
        $states = get_states();

        $message = 'Shipping address updated';

        //prepare categories for the aside
        $categories = get_categories();
        include('customer/customer.php');
        
        
    }
    else{
        //All the unbuilt functions will default to here.
        //Also works for the home button. 
        
        //include categories for aside and show homepage.
        $categories = get_categories();
        include('home.php');
    }
    
    
        
            