
<html lang="en">
    <head>
        <link rel ="stylesheet" href ="/Assignment9/styles/main.css"/>
        <link rel ="stylesheet" href ="/Assignment9/styles/support.css"/>
        <link rel ="stylesheet" href ="/Assignment9/styles/guitars.css"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
        <title>The Guitar Store</title>  
        
    </head>
    <body>
        <?php include('./view/header.php')?>
        
        <?php include('./view/horizontal_nav_bar.php')?>
        
        
        <main>
            <?php include('./view/aside.php') ?>

            
            <section>
                <h2>Our Guitars</h2>
                <p>Check out our fine selection of premium guitars!</p>
                
                <div class="slider-container">
                    <ul class="bxslider">
                        <li>                          
                            <img src="/Assignment9/images/guitars/Caballero11.png" alt="Caballero 11" title = "Caballero 11">
                        </li>
                        <li>                                              
                            <img src="/Assignment9/images/guitars/FenderStratocaster.png" alt="Fender Stratocaster" title="Fender Stratocaster">
                        </li>
                        <li>
                            <img src="/Assignment9/images/guitars/GibsonLesPaul.png" alt="Gibson Les Paul" title="Gibson Les Paul">
                        </li>
                        <li>
                            <img src="/Assignment9/images/guitars/GibsonSB.png" alt="Gibson SB" title="Gibson SB">
                        </li>
                        <li>
                            <img src="/Assignment9/images/guitars/WashburnD10S.png" alt="Washburn D10S" title="Washburn D10S">
                        </li>                                                
                    
                    </ul>
                </div>
            </section>
            
            
        </main>  
        <?php include('./view/footer.php'); ?>             
        <script src="/Assignment9/scripts/guitars.js"></script>
    </body>
</html>