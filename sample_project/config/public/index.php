session_start();
require_once '../vendor/autoload.php';

$db = (new \Config\Database())->connect();
$auth = new \App\Controllers\AuthController($db);
$notes = new \App\Controllers\NotesController($db);
