<?php require_once BASE_PATH . '/views/partials/header.php'; ?>

<h1>Modifier la ressource</h1>

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

<form action="/resources/update" method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($resource['id']) ?>">
    <div>
        <label for="title">Titre :</label>
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($resource['title']) ?>">
    </div>
    <div>
        <label for="type">Type :</label>
        <input type="text" id="type" name="type" value="<?= htmlspecialchars($resource['type'] ?? '') ?>">
    </div>
    <div>
        <label for="status">Statut :</label>
        <input type="text" id="status" name="status" value="<?= htmlspecialchars($resource['status'] ?? '') ?>">
    </div>
    <div>
        <label for="borrower">Emprunteur :</label>
        <input type="text" id="borrower" name="borrower" value="<?= htmlspecialchars($resource['borrower'] ?? '') ?>">
    </div>
    <button type="submit">Mettre à jour</button>
</form>

<p><a href="/resources">Retour à la liste</a></p>

<?php require_once BASE_PATH . '/views/partials/footer.php'; ?>