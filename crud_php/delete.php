<?php 
include 'connect.php';

if(isset($_GET['deleteid'])) {
    $id = filter_var($_GET['deleteid'], FILTER_SANITIZE_NUMBER_INT);
    
    if($id) {
        $sql = "DELETE FROM crud WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $id);
        
        if($stmt->execute()) {
            header('Location: display.php?msg=delete_success');
            exit();
        } else {
            header('Location: display.php?msg=delete_error');
            exit();
        }
    }
}
header('Location: display.php');
?>