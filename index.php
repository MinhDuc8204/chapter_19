<?php
require('util/main.php');

require('model/database.php');
require('model/product_db.php');

/*********************************************
 * Select some products
 **********************************************/

// Sample data
$cat_id = 1;
get_product($cat_id);
// Get the products
$products = get_products_by_category($cat_id);

/***************************************
 * Delete a product
 ****************************************/

// Sample data
$product_name = 'Fender Telecaster';
$product=get_products_by_name($product_name);
if($product){
    $product_id = $product['productID'];
    $row=delete_product($product_id);
    if($row>0){
        $delete_message = $row." rows were deleted.";        
    }else{
        $delete_message = "No rows were deleted.";
    }
}
// Delete the product and display an appropriate messge
$delete_message = "No rows were deleted.";

/***************************************
 * Insert a product
 ****************************************/

// Sample data
$category_id = 1;
$code = 'tele';
$name = 'Fender Telecaster';
$description = 'NA';
$price = '949.99';

// Insert the data
$product_id=add_product($category_id, $code, $name, $description, $price, 0);
// Display an appropriate message
if($product_id>0){
    $insert_message = "1 rows were inserted .id: ".$product_id;
}else $insert_message = "No rows were inserted.";


include 'home.php';
?>