<?php
    include('database.php');

    //gets the customer information given an id
    function get_customer_info($customer_id){
        global $conn;
        $query = 'SELECT *
                  FROM customers
                  WHERE customer_id = :customer_id';
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':customer_id', $customer_id);
        $stmt->execute();
        
        //fetch the row as associative array
        $customer = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt->closeCursor();
        
        //return the customer
        return $customer;   
    }

    //function to get the information of a customer given their email address
    function get_customer_info_by_email_address($email_address){
        global $conn;
        $query = 'SELECT *
                  FROM customers
                  WHERE email_address = :email_address';  
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':email_address', $email_address);
        $stmt->execute();
        
        //fetch customer as associative array
        $customer = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt->closeCursor();

        return $customer;
    }

    //function to update frist name of a customer
    function update_first_name($customer_id, $first_name){
        global $conn;
        $query = 'UPDATE customers
                  SET first_name = :first_name
                  WHERE customer_id = :customer_id';

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':customer_id', $customer_id);
        $stmt->bindValue(':first_name', $first_name);

        $stmt->execute();

        $stmt->closeCursor();

        return;
    }

    //function to update last name of customer
    function update_last_name($customer_id, $last_name){
        global $conn;
        $query = 'UPDATE customers
                  SET last_name = :last_name
                  WHERE customer_id = :customer_id'; 

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':customer_id', $customer_id);
        $stmt->bindValue(':last_name', $last_name);

        $stmt->execute();

        $stmt->closeCursor();

        return;

    }

    //function to update email address of customer
    function update_email_address($customer_id, $email_address){
        global $conn;
        $query = 'UPDATE customers
                  SET email_address = :email_address
                  WHERE customer_id = :customer_id';
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':customer_id', $customer_id);
        $stmt->bindValue(':email_address', $email_address);

        $stmt->execute();

        $stmt->closeCursor();

        return;
    }

    //Function to update the password of a customer
    function update_password($customer_id, $password){
        global $conn;
        $query = 'UPDATE customers
                  SET password = :password
                  WHERE customer_id = :customer_id';
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':customer_id', $customer_id);
        $stmt->bindValue(':password', $password);

        $stmt->execute();

        $stmt->closeCursor();

        return;
    }