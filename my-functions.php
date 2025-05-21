<?php
function formatPrice($price)
{
    $price = number_format($price / 100, 2, ',', ' ');
    return "$price €";
}

function discountedprice($price, $discount)
{
    $discountedPrice = $price * (1 - $discount / 100);
    return formatPrice($discountedPrice);
}

function pricexcludingVAT($price, $discount)
{
    $discountedPrice = $price * (1 - $discount / 100);
    $priceExcludingVAT = $discountedPrice / 1.2;
    return formatPrice($priceExcludingVAT);
}