<?php

//create shopping cart
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
//add cart
function cart_add($productId, $number)
{
    if (isset($_SESSION['cart'][$productId])) {
       //If there is already a product in the cart, add $number
        $_SESSION['cart'][$productId]['number'] += $number;
    } else {
        //retrieve product information from database and save to cart
        $product = getRecord('products', $productId);

        $_SESSION['cart'][$productId] = [
            'id' => $productId,
            'name' => $product['product_name'],
            'image' => $product['img1'],
            'number' => $number,
            'typeid' => $product['product_typeid'],
            'percent_off' => $product['percentoff'],
            'price' => $product['product_price'],
            'saleoff' => $product['saleoff'],
        ];
    }
}
//update cart to user and from user to session cart
function updateCartSession()
{
    global $userNav, $linkConnectDB;
    if (isset($userNav)) {
        $option = [
            'order_by' => 'id asc',
            'where' => 'user_id=' . $userNav,
        ];
        $product_of_user = getAll('cart_user', $option);
        if (!empty($product_of_user)) {
            foreach ($product_of_user as $product) {
                if (isset($_SESSION['cart'][$product['product_id']]) && mysqli_num_rows(mysqli_query($linkConnectDB, "SELECT product_id FROM cart_user WHERE product_id=" . $product['product_id']  . "")) == 1) {
                    //If there is already a product in the cart, add $number
                    $_SESSION['cart'][$product['product_id']]['number'] += $product['number'];
                } else {
                    //retrieve product information from database and save to cart
                    $info_product = getRecord('products', $product['product_id']);
                    $_SESSION['cart'][$product['product_id']] = [
                        'id' => $product['product_id'],
                        'name' => $info_product['product_name'],
                        'image' => $info_product['img1'],
                        'number' => $product['number'],
                        'typeid' => $info_product['product_typeid'],
                        'percent_off' => $info_product['percentoff'],
                        'price' => $info_product['product_price'],
                        'saleoff' => $info_product['saleoff'],
                    ];
                }
            }
        }
        //used in the login.php file
    }
}
//Synchronize products between session and database when users add to cart
function mergeCartSessionWithDB()
{
    global $userNav, $linkConnectDB;
    //get products in session cart
    $cart = cart_list();

    //If row > 0, it means the user already has a product in the database
    if (mysqli_num_rows(mysqli_query($linkConnectDB, "SELECT * FROM cart_user WHERE user_id=" . $userNav . "")) > 0) {
        foreach ($cart as $product_cart) {
            $option_cart_user = [
                'order_by' => 'id',
                'where' => 'user_id=' . $userNav,
            ];
            //browse the cart_user array with the user who is currently logged in
            $cart_users = getAll('cart_user', $option_cart_user);
            foreach ($cart_users as $cart_user) {
                if ($cart_user['product_id'] == $product_cart['id']) {
                    $status = 1;

                    break;
                } else {
                    $status = 0;
                }
            }

            if ($status == 1) { //If the products in this cart are already on Facebook -> edit
                $cart_user = [
                    'id' => $cart_user['id'],
                    'product_id' => $product_cart['id'],
                    'number' => $product_cart['number'],
                ];
                save('cart_user', $cart_user);
            } elseif ($status == 0) { //If the product in this cart is not on Facebook yet -> add
                $cart_user = [
                    'id' => 0,
                    'user_id' => $userNav,
                    'product_id' => $product_cart['id'],
                    'number' => $product_cart['number'],
                ];
                save('cart_user', $cart_user);
            }
        }
    } else {
        foreach ($cart as $product_cart) {
            $up_cart_user = [
                'id' => 0,
                'user_id' => $userNav,
                'product_id' => $product_cart['id'],
                'number' => $product_cart['number'],
            ];
            save('cart_user', $up_cart_user);
        }
    }
    /*
   Analyzing and synchronizing the number of products in the cart to the database:
     First, we will check the current user on the database
     There are 2 cases: 1 is that the user currently has no products on the database, 2 is that there are already some products on it.
     TH1:
         check if the current user has any sp on the db
         If not, we will upload the product with id = 0 as default (add sp)
     Case 2: (already has some products on it)
         2.0) check if the current user has any sp on the db
         2.1) If the product in the cart does not exist in the database, add product with id = 0
         2.2) If some products in the cart are already in the database -> proceed to change the quantity with id = product id in the cart (Must check to see if it is the correct one for the logged in user)
     */
}
//Delete product sync between session and database when the user has placed an order
function detroy_cart_user_db()
{
    global $userNav, $linkConnectDB;
    $sql = "DELETE FROM cart_user WHERE user_id=" . $userNav;
    mysqli_query($linkConnectDB, $sql) or die(mysqli_error($linkConnectDB));
}
//delete automatically depending on the product removed from the cart
function delete_cart_user_db($productId)
{
    global $userNav, $linkConnectDB;
    $sql = "DELETE FROM cart_user WHERE user_id=" . $userNav . " and product_id=" . $productId;
    mysqli_query($linkConnectDB, $sql) or die(mysqli_error($linkConnectDB));
}
//Update product quantity
function cart_update($productId, $number)
{
    if ($number == 0) {
        //remove product from cart
        unset($_SESSION['cart'][$productId]);
    } else {
        $_SESSION['cart'][$productId]['number'] = $number;
    }
}
//Remove product from cart
function cart_delete($productId)
{
    unset($_SESSION['cart'][$productId]);
}
//Total cart value
function cart_total()
{
    $total = 0;
    foreach ($_SESSION['cart'] as $product) {
        if ($product["typeid"] == 3) {
            $total += (($product['price']) - ($product['price']) * ($product['percent_off']) / 100) * $product['number'];
        } else {
            $total += $product['price'] * $product['number'];
        }
    }

    return $total;
}
//Number of products in the cart
function cart_number()
{
    $number = 0;
    foreach ($_SESSION['cart'] as $product) {
        $number += $product['number'];
    }

    return $number;
}
//List of products in the shopping cart
function cart_list()
{
    return $_SESSION['cart'];
}
// Delete cart
function cartDestroy()
{
    $_SESSION['cart'] = [];
}
