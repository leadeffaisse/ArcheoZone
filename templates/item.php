<?php
$nom = "truelle";
$prix = 9.99;
$imageURL= "images/truelle.jpg";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Article</h1>
    </header>

    <main>
        <section class="article">
            <h1><?php echo $nom; ?></h1>
            <img src="<?php echo $imageURL; ?>" alt="<?php echo $nom; ?>">
            <p>Prix : <?php echo number_format($prix, 2, ',', ' '); ?> €</p>
            <button type="button">Ajouter au panier</button>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Mon Site Web</p>
    </footer>
</body>
</html>