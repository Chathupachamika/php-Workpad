namespace App\Controllers;

class NotesController {
    private $db;
    private $note;

    public function __construct($db) {
        $this->db = $db;
        $this->note = new \App\Models\Note($db);
    }

    public function index($userId) {
        return $this->note->getUserNotes($userId);
    }

    public function store($data) {
        $errors = $this->validateNote($data);
        if (empty($errors)) {
            $this->note->create($data);
            return ['success' => true];
        }
        return ['success' => false, 'errors' => $errors];
    }

    private function validateNote($data) {
        $errors = [];
        if (empty($data['title'])) $errors['title'] = "Title is required";
        if (empty($data['content'])) $errors['content'] = "Content is required";
        return $errors;
    }
}