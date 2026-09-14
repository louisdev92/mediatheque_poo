<?php require_once BASE_PATH . '/views/partials/header.php'; ?>

<h1>Ajouter une ressource</h1>

<?php if (!empty($_SESSION['errors'])): ?>
    <div class="alert error">
        <ul>
            <?php foreach ($_SESSION['errors'] as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php unset($_SESSION['errors']); ?>
<?php endif; ?>

<form action="/resources/store" method="POST">
    <div>
        <label for="title">Titre :</label>
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($_SESSION['old']['title'] ?? '') ?>">
    </div>
    <div>
        <label for="type">Type :</label>
        <input type="text" id="type" name="type" value="<?= htmlspecialchars($_SESSION['old']['type'] ?? '') ?>">
    </div>
    <div>
        <label for="status">Statut :</label>
        <input type="text" id="status" name="status" value="<?= htmlspecialchars($_SESSION['old']['status'] ?? '') ?>">
    </div>
    <div>
        <label for="borrower">Emprunteur :</label>
        <input type="text" id="borrower" name="borrower" value="<?= htmlspecialchars($_SESSION['old']['borrower'] ?? '') ?>">
    </div>
    <button type="submit">Enregistrer</button>
</form>
<?php unset($_SESSION['old']); ?>

<p><a href="/resources">Retour à la liste</a></p>

<?php require_once BASE_PATH . '/views/partials/footer.php'; ?>