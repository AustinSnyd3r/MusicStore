<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="./styles/main.css"/>
    <link rel="stylesheet" href="./styles/products.css"/>
</head>
<body>
    <?php include('./view/header.php'); ?>

    <?php include('./view/horizontal_nav_bar.php'); ?>

    <main>
        <?php include('./view/aside.php'); ?>

        <section>
            <h3>Product List</h3>
            <form id="categoryForm" method="get" action="/Assignment9/index.php">
                <input type="hidden" name='action' value='products'>
                <select id="dropdown" name="category">
                    <?php foreach ($categories as $category) : ?>
                        <?php $selected = ($category['category_name'] == $category_name) ? "selected" : "";?>
                       <option value="<?php echo $category['category_id']; ?>"<?php echo $selected ?> ><?php echo $category['category_name']; ?></option> 
                    <?php endforeach; ?>   
                </select>
                <label for="dropdown"><==</label>
                <input type="submit" value="Choose">             
            </form>    
            
            
            <h2>Guitars</h2>
            <table>
                <tr><th>Product ID</th><th>Name</th><th class="price">Price</th><th></th><th></th></tr>
                <?php
                    foreach ($results as $result) {
                        echo '<tr>';
                        echo '<td>' . $result['product_id'] . '</td>';
                        echo '<td>' . $result['product_name'] . '</td>';
                        echo '<td class="price">' . $result['list_price'] . '</td>';
                        //make edit button, link it to controller/pass product id in get array
                        echo '<td>
                                <form action="/Assignment9/index.php" method="get">
                                    <input type="hidden" name="product_id" value="' . $result['product_id'] . '">
                                    <input type="submit" value="Edit">
                                </form>
                            </td>';
                        //make delete button, link it to controller/pass product id in get array
                        echo '<td>
                                <form action="/Assignment9/index.php" method="get">
                                    <input type="hidden" name="product_id" value="' . $result['product_id'] . '">
                                    <input type="submit" value="Delete">
                                </form>
                            </td>';
                        echo '</tr>';
                    }
                ?>
            </table>
            
            <!Give add product a action and route it to the control file>
            <h3><a href="/Assignment9/index.php?action=add_product">Add Product</a></h3>
        </section>
    </main>
    
    
    <?php include('./view/footer.php'); ?>
   </body>
</html>