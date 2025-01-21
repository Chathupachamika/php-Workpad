namespace App\Controllers;

class AuthController {
    private $db;
    private $user;

    public function __construct($db) {
        $this->db = $db;
        $this->user = new \App\Models\User($db);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->validateRegistration($_POST);
            if (empty($data['errors'])) {
                $this->user->create($data);
                header('Location: /login.php');
                exit;
            }
            return $data['errors'];
        }
    }

    private function validateRegistration($data) {
        $errors = [];
        if (empty($data['name'])) $errors['name'] = "Name is required";
        if (empty($data['email'])) $errors['email'] = "Email is required";
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) $errors['email'] = "Invalid email format";
        if (empty($data['password'])) $errors['password'] = "Password is required";
        
        return ['errors' => $errors] + $data;
    }
}
