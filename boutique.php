<?php
$pageTitle = "Boutique";
$metaDescription = "Description de la boutique";

include('data/catalog.php');
include('my-functions.php');
include('templates/header.php');

// Traitement de l'ajout au panier
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $product_id = (int)$_POST['product_id'];
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
    
    // Validation
    if ($quantity > 0 && $quantity <= 10 && isset($products[$product_id])) {
        addToCart($product_id, $quantity);
        $message = "Produit ajouté au panier avec succès !";
    } else {
        $error = "Erreur lors de l'ajout au panier.";
    }
}

$cartItemCount = getCartItemCount();
?>

<main>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-chevron p-3 mb-0 rounded-3">
            <li class="breadcrumb-item">
                <a class="link-body-emphasis fw-semibold text-decoration-none" href="accueil.html">Accueil</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $pageTitle; ?></li>
        </ol>
    </nav>
    <div class="container">
        <h1 class="d-flex justify-content-center">Nos articles</h1>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach ($products as $product):
                include('templates/product-card.php');
            endforeach;
            ?>
        </div>

        <?php foreach ($products as $product): ?>
            <div class="modal fade" id="ficheProduit<?php echo $product['id']; ?>" tabindex="-1" aria-labelledby="ficheProduitLabel<?php echo $product['id']; ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ficheProduitLabel<?php echo $product['id']; ?>"><?php echo $product['nom']; ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-5 col-md-5">
                                    <img class="img-fluid" style="height: 300px; object-fit: cover;" src="<?php echo $product['imageURL']; ?>" alt="Image de l'article <?php echo $product['nom']; ?>">
                                </div>
                                <div class="col-xs-12 col-sm-7 col-md-7">
                                    <h1><?php echo $product['nom']; ?></h1>
                                    <?php if (!empty($product['discount']) && ($product['discount']) > 0): ?>
                                        <div class="btn-group btn-group-sm m-2" role="group" aria-label="Small button group">
                                            <button type="button" class="btn btn-primary">-<?php echo $product['discount'] ?? "Pas de promotion"; ?> %</button>
                                            <button type="button" class="btn btn-outline-primary"><s><?php echo formatPrice($product['prix'], 2, ',', ' '); ?></s></button>
                                        </div>
                                    <?php endif; ?>
                                    <h2><strong><?php echo discountedprice($product['prix'], $product['discount']); ?></strong></h2>
                                    <p class="card-text"><?php echo $product['description'] ?? "Pas de description disponible"; ?></p>
                                    <form action="boutique.php" method="post">
                                        <div class="mb-3">
                                            <label for="quantity<?php echo $product['id']; ?>">Quantité :</label>
                                            <input type="number" id="quantity<?php echo $product['id']; ?>" name="quantity" min="1" max="99" value="1">
                                        </div>
                                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                        <button type="submit" class="btn btn-primary">Ajouter au panier</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animation pour l'ajout au panier
    const addToCartForms = document.querySelectorAll('form[method="post"]');
    
    addToCartForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const button = this.querySelector('button[type="submit"]');
            const originalText = button.textContent;
            
            button.textContent = 'Ajout...';
            button.disabled = true;
            
            // Réactiver après soumission
            setTimeout(() => {
                button.textContent = originalText;
                button.disabled = false;
            }, 1000);
        });
    });
    
    // Validation des quantités
    const quantityInputs = document.querySelectorAll('input[name="quantity"]');
    
    quantityInputs.forEach(input => {
        input.addEventListener('input', function() {
            const value = parseInt(this.value);
            if (value < 1) {
                this.value = 1;
            } else if (value > 10) {
                this.value = 10;
            }
        });
    });
});
</script>

<?php include('templates/footer.php'); ?>