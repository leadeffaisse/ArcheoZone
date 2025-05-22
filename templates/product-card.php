<div class="col">
    <div class="card shadow-sm d-flex flex-column h-100">
        <img class="img-fluid" style="height: 400px; object-fit: cover;" src="<?php echo $product['imageURL']; ?>" alt="<?php echo $product['nom']; ?>">
        <div class="card-body d-flex justify-content-between flex-column align-items-center">
            <div class="d-flex flex-column align-items-center">
                <h2><?php echo $product['nom']; ?></h2>
                <p class="card-text"><?php echo $product['description'] ?? "Pas de description disponible"; ?></p>
            </div>
            <div class="d-flex flex-column align-items-center">
                <?php if (!empty($product['discount']) && ($product['discount']) > 0): ?>
                    <div class="btn-group btn-group-sm m-2" role="group" aria-label="Small button group">
                        <button type="button" class="btn btn-primary">-<?php echo $product['discount'] ?? "Pas de promotion"; ?> %</button>
                        <button type="button" class="btn btn-outline-primary"><s><?php echo formatPrice($product['prix'], 2, ',', ' '); ?></s></button>
                    </div>
                <?php endif; ?>
                <div class="d-flex gap-2">
                    <h4><strong><?php echo discountedprice($product['prix'], $product['discount']); ?></strong></h4>
                    <p class="fw-lighter"><?php echo pricexcludingVAT($product['prix'], $product['discount']); ?> HT</p>
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ficheProduit<?php echo $product['id']; ?>">En savoir plus</button>
            </div>
        </div>
    </div>
</div>