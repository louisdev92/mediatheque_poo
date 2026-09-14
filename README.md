# Médiathèque Interne - Gestion de Ressources

Application web de gestion de ressources développée en PHP orienté objet (POO) selon une architecture MVC, réalisée dans le cadre du brief PHP.

## Installation et Lancement

**1. Base de données**
Importez le schéma SQL dans votre serveur MySQL :

```bash
mysql -u root -p < database/schema.sql

```

*Adaptez ensuite les identifiants de connexion dans le fichier `config/database.php` si nécessaire.*

**2. Lancement du serveur**
Démarrez le serveur de développement PHP depuis la racine du projet :

```bash
php -S localhost:8000 router.php

```

C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64\php.exe -S localhost:8000 -t public



> **Note :** Le fichier `router.php` à la racine est requis pour aiguiller correctement les requêtes vers le dossier `public/` et éviter les erreurs 404.

**3. Accès à l'application**
Ouvrez votre navigateur à l'adresse : `http://localhost:8000`

---

## Organisation du Projet

```text
├── config/             # Configuration de la base de données
├── Controllers/        # Contrôleurs de l'application
├── database/           # Schémas SQL et migrations
├── public/             # Point d'entrée (index.php) et assets (CSS)
├── src/                # Classes métiers et utilitaires (Router, Repository, Validator, FlashMessage)
└── views/              # Vues et composants (layouts, partials, resources)

```

---

## Vérification des Fonctionnalités

* **Affichage :** Visualisation de la liste complète des ressources avec leurs statuts et types.
* **Création :** Ajout d'une nouvelle ressource via un formulaire sécurisé et validé.
* **Modification :** Édition des informations d'une ressource existante.
* **Suppression :** Retrait d'une ressource avec confirmation.
* **Validation :** Gestion des erreurs de saisie et conservation des anciennes valeurs (old input).