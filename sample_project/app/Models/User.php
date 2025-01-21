namespace App\Models;

class User {
    private $conn;
    private $table = 'users';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $query = "INSERT INTO " . $this->table . " (name, email, password) VALUES (:name, :email, :password)";
        $stmt = $this->conn->prepare($query);
        
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        
        return $stmt->execute($data);
    }

    public function validate($email, $password) {
        $query = "SELECT * FROM " . $this->table . " WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['email' => $email]);
        
        if($user = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            return password_verify($password, $user['password']) ? $user : false;
        }
        return false;
    }
}
