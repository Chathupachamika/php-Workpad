namespace App\Models;

class Note {
    private $conn;
    private $table = 'notes';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $query = "INSERT INTO " . $this->table . " (user_id, title, content) VALUES (:user_id, :title, :content)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($data);
    }

    public function getUserNotes($userId) {
        $query = "SELECT * FROM " . $this->table . " WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        $query = "UPDATE " . $this->table . " SET title = :title, content = :content WHERE id = :id AND user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute(array_merge($data, ['id' => $id]));
    }

    public function delete($id, $userId) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id AND user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute(['id' => $id, 'user_id' => $userId]);
    }
}