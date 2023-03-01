<?php
    session_start();

    include_once '../tools/variables.php';
    include_once '../classes/food.class.php';
    include_once '../classes/cart.class.php';

    $food = new Food;

    if($food->fetch($_GET['id'])){
        $data = $food->fetch($_GET['id']);
    }

    $page_title = $data['name'];
    $css = 'food_details';

    include_once '../includes/header.php';
    include_once '../includes/top2.php';

    if(isset($_POST['submit'])){
        $cart = new Cart;
        $customer_id = $_SESSION['logged_in'];
        $quantity = htmlentities($_POST['quantity']);

        for($i=0; $i<$quantity; $i++){
            if($cart->addToCart($customer_id, $_GET['id'])){
                $_SESSION['addedToCart'] = 'Added to Cart';
            }
        }

        header('location: home.php');
    }
    
?>

<div class="content">
    <div class="img-container">
        <img src="../icons/items/<?= $data['img']; ?>.png">
    </div>

    <div class="desc-container">
        <h3>
            <?= $data['name']; ?>
        </h3>

        <div class="price-cont">
            <span>₱</span>
            <h4 class="price"><?= $data['price']; ?></h4>
        </div>

        <div class="food-description">
            <p>
                <?= $data['description']; ?>
            </p>
        </div>

        <div class="item-rates">
            <div>
                <img src="../icons/items/heart.svg">
                <p>
                    <?= $data['likes']; ?> likes
                </p>
            </div>
            <div>
                <img src="../icons/items/star.svg">
                <p>
                    <?= $data['rates']; ?> rates
                </p>
            </div>
            <div>
                <img src="../icons/items/dollar.svg">
                <p>
                    <?= $data['sold']; ?> sold
                </p>
            </div>
        </div>

        <div class="title-with-line-cont">
            <h1>REVIEWS</h1>
            <hr>
        </div>

        <div class="submit-btn-container">
            <button class="submit-btn" id="add-to-cart">ADD TO CART</button>
        </div>
    </div>

    <form method="post" class="desc-container open">
        <h3>
            <?= $data['name']; ?>
        </h3>
        <div class="price-cont">
            <span>₱</span>
            <h4 class="price" id="food-price"><?= $data['price']; ?></h4>
        </div>

        <div class="food-input-info">
            <div class="title-with-line-cont">
                <h1>OPTION</h1>
                <hr>
            </div>
            <div class="adds-on-container">
                <div class="btn2">with boiled egg</div>
                <div class="btn2">without boiled egg</div>
                <!-- <div class="btn2" style="display: none;">without boiled egg</div>
                <div class="btn2">without boiled egg</div> -->
            </div>

            <div class="quantity-cont">
                <label for="quantity">QUANTITY</label>
                <div class="input-cont">
                    <div class="btn2" id="decrease">-</div>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" max="5">
                    <div class="btn2" id="increase">+</div>
                </div>
            </div>
        </div>

        <div class="sub-total-cont">
            <h6>TOTAL PRICE</h6>
            <div class="price-cont">
                <span>₱</span>
                <h4 class="price" id="sub-total" name="sub-total"><?= $data['price']; ?></h4>
            </div>
        </div>

        <div class="submit-btn-container">
            <input type="submit" name="submit" class="submit-btn" value="ADD TO CART">
        </div>
    </form>
</div>

<?php
    include_once '../includes/footer.php';
?>