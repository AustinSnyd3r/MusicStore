
<?php       
    $dsn = 'mysql:host=localhost;dbname=my_guitar_shop';
    $username = 'CS351user';

    //try connecting to the database. redirect to error page if fails to connect
    try{
        $conn = new PDO($dsn, $username);
    } catch (PDOException $e) {
        $e_message = $e->getMessage();
        header("refresh:0;url=/Assignment9/view/database_error.php");           
        exit;
    }

