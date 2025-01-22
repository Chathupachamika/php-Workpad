<?php
include 'connect.php';
session_start();

// Initialize variables
$errors = [];
$formData = [
    'name' => '',
    'email' => '',
    'mobile' => ''
];

if(isset($_POST['submit'])) {
    // Store form data for repopulating the form
    $formData = [
        'name' => $_POST['name'] ?? '',
        'email' => $_POST['email'] ?? '',
        'mobile' => $_POST['mobile'] ?? ''
    ];

    // Validation
    if (empty($_POST['name'])) {
        $errors['name'] = 'Name is required';
    } elseif (strlen($_POST['name']) > 50) {
        $errors['name'] = 'Name must be less than 50 characters';
    }

    if (empty($_POST['email'])) {
        $errors['email'] = 'Email is required';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format';
    }

    if (empty($_POST['mobile'])) {
        $errors['mobile'] = 'Mobile number is required';
    } elseif (!preg_match('/^[0-9]{10,15}$/', $_POST['mobile'])) {
        $errors['mobile'] = 'Invalid mobile number format';
    }

    if (empty($_POST['password'])) {
        $errors['password'] = 'Password is required';
    } elseif (strlen($_POST['password']) < 6) {
        $errors['password'] = 'Password must be at least 6 characters';
    }

    // If no errors, process the form
    if (empty($errors)) {
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $mobile = filter_var($_POST['mobile'], FILTER_SANITIZE_STRING);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        try {
            $stmt = $con->prepare("INSERT INTO crud (name, email, mobile, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $email, $mobile, $password);

            if($stmt->execute()) {
                $_SESSION['success_message'] = "User added successfully!";
                header("Location: display.php");
                exit();
            }
        } catch (Exception $e) {
            $errors['database'] = "Error creating user. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add New User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 40px 0;
        }
        .card {
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            border: none;
            backdrop-filter: blur(5px);
            background: rgba(255, 255, 255, 0.95);
        }
        .form-control {
            border-radius: 10px;
            border: 2px solid #e1e1e1;
            padding: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #4e54c8;
            box-shadow: 0 0 0 0.2rem rgba(78,84,200,0.25);
        }
        .btn-submit {
            background: linear-gradient(45deg, #4e54c8, #8f94fb);
            border: none;
            color: white;
            padding: 12px 35px;
            border-radius: 50px;
            font-size: 16px;
            font-weight: 600;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(78,84,200,0.4);
        }
        .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }
        .error-feedback {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
        }
        .card-title {
            color: #4e54c8;
            font-weight: 700;
            font-size: 2rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .form-group {
            margin-bottom: 25px;
        }
        .icon-container {
            background: linear-gradient(45deg, #4e54c8, #8f94fb);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }
        .icon-container i {
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body p-5">
                        <div class="text-center mb-5">
                            <div class="icon-container mx-auto">
                                <i class="fas fa-user-plus fa-lg"></i>
                            </div>
                            <h2 class="card-title">Create New User</h2>
                        </div>

                        <?php if (!empty($errors['database'])): ?>
                            <div class="alert alert-danger alert-dismissible fade show">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                <?php echo $errors['database']; ?>
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>
                        <?php endif; ?>

                        <form method="post" novalidate>
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-user mr-2"></i>Name
                                </label>
                                <input type="text" 
                                       class="form-control <?php echo isset($errors['name']) ? 'is-invalid' : ''; ?>" 
                                       name="name" 
                                       value="<?php echo htmlspecialchars($formData['name']); ?>"
                                       placeholder="Enter your full name">
                                <?php if (isset($errors['name'])): ?>
                                    <div class="error-feedback"><?php echo $errors['name']; ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-envelope mr-2"></i>Email
                                </label>
                                <input type="email" 
                                       class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : ''; ?>" 
                                       name="email" 
                                       value="<?php echo htmlspecialchars($formData['email']); ?>"
                                       placeholder="Enter your email address">
                                <?php if (isset($errors['email'])): ?>
                                    <div class="error-feedback"><?php echo $errors['email']; ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-mobile-alt mr-2"></i>Mobile
                                </label>
                                <input type="tel" 
                                       class="form-control <?php echo isset($errors['mobile']) ? 'is-invalid' : ''; ?>" 
                                       name="mobile" 
                                       value="<?php echo htmlspecialchars($formData['mobile']); ?>"
                                       placeholder="Enter your mobile number">
                                <?php if (isset($errors['mobile'])): ?>
                                    <div class="error-feedback"><?php echo $errors['mobile']; ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-lock mr-2"></i>Password
                                </label>
                                <input type="password" 
                                       class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : ''; ?>" 
                                       name="password" 
                                       placeholder="Create a strong password">
                                <?php if (isset($errors['password'])): ?>
                                    <div class="error-feedback"><?php echo $errors['password']; ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="text-center mt-4">
                                <a href="display.php" class="btn btn-light mr-2">
                                    <i class="fas fa-arrow-left mr-2"></i>Back
                                </a>
                                <button type="submit" class="btn btn-submit" name="submit">
                                    <i class="fas fa-save mr-2"></i>Create User
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>