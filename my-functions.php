<?php
function formatPrice($price) { // changer les prix dans catalog.php
    $price = number_format($product['prix'], 2, ',', ' ');
    echo "$price €";
}

function pricexcludingVAT($price) {
    $priceExcludingVAT = $price / 1.2;
    return formatPrice($priceExcludingVAT);
}

function discountedprice($price, $discount) {
    $discountedPrice = $price / 0.9;
    return formatPrice($discountedPrice);
}

?>