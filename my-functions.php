<?php
// =======Fonctions prix=======

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
function discountedPrice($price, $discount)
{
    if ($discount <= 0 || $discount >= 100) {
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

// =======FONCTIONS DE GESTION DU PANIER=======
// Démarrage de la session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// initialiser le panier s'il n'existe pas
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();;
}

/**
 * Ajouter un produit au panier
 * @param int $product_id L'ID du produit
 * @param int $quantity La quantité à ajouter (par défaut 1)
 */
function addToCart($product_id, $quantity) {
    if (!isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] = $quantity;
    } else {
        $_SESSION['cart'][$product_id]+= $quantity;
    }
}

/**
 * Retirer un produit du panier
 * @param int $product_id L'ID du produit à retirer
 */
function removeFromCart($product_id) {
    unset($_SESSION['cart'][$product_id]);
}

/**
 * Mettre à jour la quantité d'un produit dans le panier
 * @param int $product_id L'ID du produit
 * @param int $quantity La nouvelle quantité
 */
function updateCart($product_id, $quantity) {
    if ($quantity <= 0) {
        removeFromCart($product_id);
    } else {
        $_SESSION['cart'][$product_id] = $quantity;
    }
}

/**
 * Calculer le total du panier
 * @param array $products Le catalogue des produits
 * @return float Le total du panier
 */
function calculateCartTotal($products) {
    $total = 0;
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $product_id => $quantity) {
            if (isset($products[$product_id])) {
                $product = $products[$product_id];
                $price = $product['prix'];
                
                // Appliquer la remise si elle existe
                if (!empty($product['discount']) && $product['discount'] > 0) {
                    $price = $price * (1 - $product['discount'] / 100);
                }
                
                $total += $price * $quantity;
            }
        }
    }
    return $total;
}

/**
 * Compter le nombre total d'articles dans le panier
 * @return int Le nombre total d'articles
 */
function getCartItemCount() {
    $count = 0;
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $quantity) {
            $count += $quantity;
        }
    }
    return $count;
}

/**
 * Vérifier si le panier est vide
 * @return bool True si le panier est vide
 */
function isCartEmpty() {
    return empty($_SESSION['cart']);
}

/**
 * Vider complètement le panier
 */
function clearCart() {
    $_SESSION['cart'] = array();
}
?>