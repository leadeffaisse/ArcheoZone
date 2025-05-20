<div class="col">
    <div class="card shadow-sm d-flex flex-column h-100">
        <img class="img-fluid" style="height: 400px; object-fit: cover;" src="<?php echo $product['imageURL']; ?>" alt="<?php echo $product['nom']; ?>">
        <div class="card-body d-flex justify-content-between flex-column align-items-center">
            <h2><?php echo $product['nom']; ?></h2>
            <p class="card-text">Description du produit : <?php echo $product['description'] ?? "Pas de description disponible"; ?></p>
            <div class="d-flex flex-column align-items-center">
                <p><strong>Prix : <?php echo number_format($product['prix'], 2, ',', ' '); ?> €</strong></p>
                <button class="btn btn-primary" type="button">Ajouter au panier</button>
            </div>
        </div>
    </div>
</div>