<?php
include 'connect.php';

if(isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $stmt = $con->prepare("SELECT name, email, mobile FROM crud WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
}

if(isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $mobile = filter_var($_POST['mobile'], FILTER_SANITIZE_STRING);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $con->prepare("UPDATE crud SET name=?, email=?, mobile=?, password=? WHERE id=?");
    $stmt->bind_param("ssssi", $name, $email, $mobile, $password, $id);

    if($stmt->execute()) {
        header("Location: display.php?msg=update_success");
        exit();
    } else {
        $error = "Error updating record: " . $con->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .form-control {
            border-radius: 10px;
            border: 1px solid #ced4da;
        }
        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(78,84,200,0.25);
        }
        .btn-update {
            background: linear-gradient(to right, #4e54c8, #8f94fb);
            border: none;
            color: white;
            padding: 10px 30px;
            border-radius: 50px;
            transition: transform 0.3s;
        }
        .btn-update:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <div class="card">
            <div class="card-body p-5">
                <h2 class="text-center mb-4 text-primary">Update User</h2>
                
                <?php if(isset($error)): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>

                <form method="post" class="needs-validation" novalidate>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    
                    <div class="form-group">
                        <label><i class="fas fa-user mr-2"></i>Name</label>
                        <input type="text" class="form-control" name="name" 
                               value="<?php echo $user['name'] ?? ''; ?>" required>
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-envelope mr-2"></i>Email</label>
                        <input type="email" class="form-control" name="email" 
                               value="<?php echo $user['email'] ?? ''; ?>" required>
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-mobile-alt mr-2"></i>Mobile</label>
                        <input type="text" class="form-control" name="mobile" 
                               value="<?php echo $user['mobile'] ?? ''; ?>" required>
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-key mr-2"></i>New Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-update" name="submit">
                            <i class="fas fa-save mr-2"></i>Update User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>