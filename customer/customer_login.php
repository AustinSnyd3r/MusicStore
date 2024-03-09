<!DOCTYPE html>

<html lang="en">
    <head>
        <link rel ="stylesheet" href ="/Assignment9/styles/main.css"/>
        <link rel="stylesheet" href="/Assignment9/styles/customer_login.css"/>
        <title>The Guitar Store</title>  
    </head>
    <body>
        <?php include('./view/header.php'); ?>
        <?php include('./view/horizontal_nav_bar.php'); ?>
        
        <main>
            <?php include('./view/aside.php'); ?>
            
            <section>
                <h2>Customer Login</h2>
                <form action="/Assignment9/index.php" method="post">
                    <input type="hidden" name="action" value="customer_page">
                    <table>
                        <!--When they click submit form will be sent with action customer_page, if click cancel, send dummy action home to reroute to home page-->
                        <tr><td>Email Address:</td><td><input type="text" id= "email" name="email" <?php if(isset($email)){echo 'value="' . $email . '"';} ?>></td></tr>
                        <tr><td><input type="submit" value="Login"></td><td></td><td></td><td><input type="button" value="Cancel" onclick="window.location.href='/Assignment9/index.php?home'"></td></tr>    
                    </table>
                </form>                       
            </section>
        </main>
        
        <?php include('./view/footer.php'); ?>
        <script>
                    /*This is the embedded script allowed for alerting if they entered a email not in db.
                    the control function returns to the page if email not found, but will also have email that was last tried defined.*/

                    //when this window loads, 
                    window.onload = function() {
                        
                        //we get the email input box text
                        const emailInput = document.getElementById('email').value;
                        
                        //checks if it is empty or not.
                        if (emailInput.trim() !== '') {
                            alert("Customer not found, please enter valid credentials.");
                        }
                    };
                </script>
    </body>
</html>