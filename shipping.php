<!DOCTYPE html>


<html lang="en">
    <head>
        <link rel ="stylesheet" href ="./styles/main.css"/>
        <link rel ="stylesheet" href="./styles/shipping.css"/>        
        <title>The Guitar Store</title>  
    </head>
    <body>
        
         <?php include('view/header.php'); ?>
         <?php include('view/horizontal_nav_bar.php'); ?>     
        
        <main>
             <?php include('view/aside.php'); ?>
            
            <section>
                <h2>Shipping Costs</h2>
                <div>
                    <label>Enter cost of the product:</label>
                    <input type="text" id="cost">
                    <input type="button" id="submit" value="Calculate">
                </div>
                
                <div>
                    <label>Total cost including shipping.</label>
                    <input type="text" id="result" readonly>
                        
                </div>
                
            </section>
            
            
        </main>
        <?php include('view/footer.php'); ?>
        
        <script src="/Assignment9/scripts/shipping.js"></script>
    </body>
</html>