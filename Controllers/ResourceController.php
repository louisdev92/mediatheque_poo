<?php

class ResourceController {
    private $repository;

    public function __construct() {
        $this->repository = new ResourceRepository();
    }

    public function index() {
        $resources = $this->repository->all();
        require_once BASE_PATH . '/views/resources/index.php';
    }

    public function create() {
        require_once BASE_PATH . '/views/resources/create.php';
    }

    public function store() {
        $validator = new Validator($_POST);
        $validator->validate([
            'title' => ['required', 'min:3'],
            'type' => ['required'],
            'status' => ['required']
        ]);

        if ($validator->fails()) {
            $_SESSION['errors'] = $validator->errors();
            $_SESSION['old'] = $_POST;
            header('Location: /resources/create');
            exit;
        }

        $this->repository->create($_POST);
        FlashMessage::set('Ressource créée avec succès !');
        header('Location: /resources');
        exit;
    }

    public function edit() {
        $id = $_GET['id'] ?? null;
        $resource = $this->repository->find($id);

        if (!$resource) {
            http_response_code(404);
            echo "Ressource non trouvée";
            return;
        }

        require_once BASE_PATH . '/views/resources/edit.php';
    }

    public function update() {
        $id = $_POST['id'] ?? $_GET['id'] ?? null;
        
        $validator = new Validator($_POST);
        $validator->validate([
            'title' => ['required', 'min:3'],
            'type' => ['required'],
            'status' => ['required']
        ]);

        if ($validator->fails()) {
            $_SESSION['errors'] = $validator->errors();
            header('Location: /resources/edit?id=' . $id);
            exit;
        }

        $this->repository->update($id, $_POST);
        FlashMessage::set('Ressource mise à jour avec succès !');
        header('Location: /resources');
        exit;
    }

    public function delete() {
        $id = $_POST['id'] ?? $_GET['id'] ?? null;
        if ($id) {
            $this->repository->delete($id);
            FlashMessage::set('Ressource supprimée avec succès !');
        }
        header('Location: /resources');
        exit;
    }
}