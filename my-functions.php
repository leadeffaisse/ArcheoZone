<?php
function formatPrice($price)
{
    $price = number_format($price / 100, 2, ',', ' ');
    return "$price €";
}

function discountedprice($price, $discount)
{
    if ($discount == 0) {
        return formatPrice($price);
    } else {
        $discountedPrice = $price * (1 - $discount / 100);
        return formatPrice($discountedPrice);
    }
}

function pricexcludingVAT($price, $discount)
{
    if ($discount == 0) {
        return formatPrice($price / 1.2);
    } else {
        $discountedPrice = $price * (1 - $discount / 100);
        $priceExcludingVAT = $discountedPrice / 1.2;
        return formatPrice($priceExcludingVAT);
    }
}
