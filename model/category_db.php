<?php
    include('database.php');
    
    function get_categories(){
        global $conn;
        
        //Fetch categories from the database
        $sqlCategories = 'SELECT * FROM categories ORDER BY category_id';
        $stmtCategories = $conn->prepare($sqlCategories);
        $stmtCategories->execute();
        $categories = $stmtCategories->fetchAll();
        
        //close connection
        $stmtCategories->closeCursor();
        
        //return the categories
        return $categories;
    }
    
    function get_category_name($category_id){
        global $conn;
        
        //Select the category_name with id given in params
        $query = 'SELECT category_name FROM categories WHERE category_id = :category_id';
        $statement = $conn->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        
        $statement->execute();           
        $category = $statement->fetch();
        
        //close connection
        $statement->closeCursor();
        $category_name = $category['category_name'];
        
        //return the name of category with id: $category_id
        return $category_name;
    }