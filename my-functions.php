<?php

/**
 * Function to format the price
 * @param float $price The price to format
 * @return string The formatted price
 */
function formatPrice($price)
{
    $price = number_format($price / 100, 2, ',', ' ');
    return "$price €";
}

/**
 * Function to calculate the discounted price
 * @param float $price The original price
 * @param float $discount The discount percentage
 * @return float The discounted price formatted as a float
 */
function discountedprice($price, $discount)
{
    if ($discount <= 0 && $discount >= 100) {
        return formatPrice($price);
    } else {
        $discountedPrice = $price * (1 - $discount / 100);
        return formatPrice($discountedPrice);
    }
}

/**
 * Function to calculate the price excluding VAT
 * @param float $price The price including VAT
 * @param float $discount The discount percentage
 * @return float The price excluding VAT formatted as a float
 */
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
?>