<!DOCTYPE html>
<!-- This is the aside -->

<aside>
    <nav>
        <ul>
            <!-- Go through categories, make a new "button" that has action (all lower case) and text same as category name -->
            <?php foreach ($categories as $category): ?>
            
             <!-- Reroute to controller, pass action with get array -->
             <li><a href="/Assignment9/index.php?action=<?php echo strtolower($category['category_name']); ?>"><?php echo $category['category_name']; ?></a></li>
            
            <?php endforeach; ?>
       </ul>
    </nav>
</aside>

