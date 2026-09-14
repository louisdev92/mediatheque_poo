<?php require_once BASE_PATH . '/views/partials/header.php'; ?>

<?php 
if (isset($view) && file_exists(BASE_PATH . '/views/' . $view . '.php')) {
    require_once BASE_PATH . '/views/' . $view . '.php';
} else {
    echo '<p>Erreur : Vue introuvable.</p>';
}
?>

<?php require_once BASE_PATH . '/views/partials/footer.php'; ?>