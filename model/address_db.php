<?php
include('database.php');

function get_address($address_id){
    global $conn;
    $query = 'SELECT * FROM addresses WHERE address_id = :address_id';
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':address_id', $address_id);  
    $stmt->execute();  
    $address = $stmt->fetch();
    
    return $address;
}

function update_address($address_id, $line1, $line2, $city, $state, $zip_code, $phone){
    global $conn;
    $query = 'UPDATE addresses
              SET line1 = :line1,
              line2 = :line2,
              city = :city,
              state = :state,
              zip_code = :zip_code,
              phone = :phone
              WHERE address_id = :address_id';
     
    $stmt = $conn->prepare($query);
    
    $stmt->bindValue(':address_id', $address_id);  
    $stmt->bindValue(':line1', $line1);   
    $stmt->bindValue(':line2', $line2);
    $stmt->bindValue(':city', $city);
    $stmt->bindValue(':state', $state);
    $stmt->bindValue(':zip_code', $zip_code);
    $stmt->bindValue(':phone', $phone);
    
    $stmt->execute();  
    $stmt->closeCursor();
    
    return;


}

function get_states(){
    global $conn;
    $query = 'SELECT state FROM state_tax_rates ORDER BY state';
    $stmt = $conn->prepare($query);
    $stmt->execute();
    
    $states = $stmt->fetchAll();
    
    return $states;
}
