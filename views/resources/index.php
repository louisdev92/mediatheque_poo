<?php require_once BASE_PATH . '/views/partials/header.php'; ?>

<div class="page-header">
    <h1>Liste des ressources</h1>
    <a href="/resources/create" class="btn">Ajouter une ressource</a>
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Type</th>
            <th>Statut</th>
            <th>Emprunteur</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($resources as $resource): ?>
            <tr>
                <td><?= htmlspecialchars($resource['id']) ?></td>
                <td><?= htmlspecialchars($resource['title']) ?></td>
                <td><?= htmlspecialchars($resource['type'] ?? '') ?></td>
                <td><?= htmlspecialchars($resource['status'] ?? '') ?></td>
                <td><?= htmlspecialchars($resource['borrower'] ?? 'Aucun') ?></td>
                <td>
                    <a href="/resources/edit?id=<?= $resource['id'] ?>">Modifier</a>
                    <form action="/resources/delete" method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $resource['id'] ?>">
                        <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette ressource ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once BASE_PATH . '/views/partials/footer.php'; ?>