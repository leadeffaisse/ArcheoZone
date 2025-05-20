<?php
$pageTitle = "Boutique";
$metaDescription = "Description de la boutique";

include('data/catalog.php');
include('templates/header.php');
?>

<main>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-chevron p-3 mb-0 rounded-3">
            </li>
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
    </div>
</main>

<?php include('templates/footer.php'); ?>