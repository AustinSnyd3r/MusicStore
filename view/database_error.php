
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Products</title>
        <link rel="stylesheet" href="../styles/main.css"/>
        <link rel="stylesheet" href="../styles/products.css"/>
    </head>
    <body>
        <?php include('header.php'); ?>

        <?php include('horizontal_nav_bar.php'); ?>

        <main>
            
            <aside>
                <nav>
                    <ul>
                        <li><a href="/Assignment9/index.php?action=guitars">Guitars</a></li>
                        <li><a href="/Assignment9/index.php?action=basses">Basses</a></li>
                        <li><a href="/Assignment9/index.php?action=drums">Drums</a></li>
                        <li><a href="/Assignment9/index.php?action=keyboards">Keyboards</a></li>
                    </ul>
                </nav>
            </aside>
            
            <section>
                <h2>Database Error</h2>
                <p>Sorry, there was an error connecting to the database. Please try again later.</p>
            </section>
        </main>

        <?php include('footer.php'); ?>
    </body>
</html>