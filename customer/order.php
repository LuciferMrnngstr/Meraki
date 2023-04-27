<?php
    session_start();

    include_once '../tools/variables.php';
    $page_title = 'Order';
    $css = 'cart';

    include_once '../includes/header.php';
    include_once '../includes/top2.php';
    include_once '../classes/order.class.php';

    $orders = new Order;
        
    if(isset($_SESSION['user_id'])){
        $customer_id = $_SESSION['user_id'];
    }
    else{
        $customer_id = 'NULL';
    }

?>

<div class="content customer">
<?php
    if($orders->countCustOrder($customer_id)[0] > 0){ //count all orders
        foreach($orders->renderStatus() as $status){
?>
        <?php
            foreach($orders->custDetail($customer_id, $status['status'], 'customer') as $order){
        ?>
                <a href="order_status.php?order_id=<?= $order['order_id']; ?>&status=<?= $order['status']; ?>" class="order-items <?= $order['status']; ?>">
                    <div class="cont1">
                        <p class="customer"><?= strtoupper($order['status']); ?></p>
                    </div>
                    <div class="cont2">
                        <!-- Displays number of order -->
                        <p><?= $order['quantity']; if($order['quantity'] == 1) echo ' order'; else echo ' orders'; ?></p>
                        <p><?= $order['date']; ?></p>
                    </div>
                    <div class="price-cont">
                        <span>₱</span>
                        <h4 class="price"><?= $order['grand_total']; ?></h4>
                    </div>
                </a>
<?php
            }
            echo '<br>';
        }
    }
    else{
        echo 'no active order for today';
    }
?>
</div>
  
<?php
    include_once '../includes/footer.php';
?>