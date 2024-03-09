<?php

    function get_products_by_category($category_id){
        global $conn;
        
        // Fetch products based on the selected category
        $sqlProducts = 'SELECT *
                        FROM products
                        WHERE products.category_id = :category_id
                        ORDER BY product_id';

        $stmtProducts = $conn->prepare($sqlProducts);
        
        //bind variable to query 
        $stmtProducts->bindValue(':category_id', $category_id);
        
        //execute and extract the values
        $stmtProducts->execute();
        $results = $stmtProducts->fetchAll();
        
        //close connection
        $stmtProducts->closeCursor();
        
        //return the products
        return $results;
    }
    