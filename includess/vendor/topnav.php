<div class="top">
    <div class="row1">
        <?php
            if($page_title == 'Dashboard'){
                echo '<header>Welcome!</header>';
        
                echo '<img class="logo" src="../icons/logo/logo.svg">';
            }
            else if($page_title == 'Profile' || $page_title == 'Store' || $page_title == 'Orders' || $page_title == 'Order History'){
                echo '<img src="../icons/logo/logo.svg">';
                
                echo '<header class="poppins">' . $page_title .'</header>';
            }
            else{
                if($page_title == 'Payment Method'){
                    echo '<a href="carts.php" class="back-btn"><img src="../icons/topnav/arrowleft.svg"></a>';
                }
                else if($page_title == 'Order Info'){
                    echo '<a href="orders.php" class="back-btn"><img src="../icons/topnav/arrowleft.svg"></a>';
                }
                else{
                    echo '<a href="home.php" class="back-btn"><img src="../icons/topnav/arrowleft.svg"></a>';
                }  
        
                echo '<header class="food_name">' . $page_title . '</header>';
            }
        
        ?>

        <!-- Right corner of top navbar -->
        <div class="right">
            <button><img src="../icons/topnav/cart.svg"></button>
            <button class="notif"><img src="../icons/topnav/notification.svg"></button>
        </div>
    </div>  

    <!-- Notification overlay -->
    <span class="overlay"></span>
    
    <!-- Notification container -->
    <div class="modal-box notification">
        <div class="content empty">
            <header>No notification as of now.</header>
        </div>
    </div>
</div>