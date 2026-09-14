<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'Médiathèque interne') ?></title>
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
    <header class="navbar">
        
        <nav class="nav-links">
            <a href="/resources">Liste des ressources</a>
            <a href="/resources/create">Ajouter une ressource</a>
        </nav>
    </header>

    <main class="container">
        <?php if (class_exists('FlashMessage') && ($flash = FlashMessage::get())): ?>
            <div class="flash success">
                <?= htmlspecialchars(is_array($flash) ? ($flash['message'] ?? '') : $flash) ?>
            </div>
        <?php endif; ?>