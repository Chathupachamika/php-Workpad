<?php
include 'connect.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            padding: 2rem;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .table {
            background-color: white;
            border-radius: 10px;
        }
        .btn-add-user {
            background: linear-gradient(to right, #4e54c8, #8f94fb);
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 50px;
            transition: transform 0.3s;
        }
        .btn-add-user:hover {
            transform: translateY(-2px);
        }
        .alert {
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-primary">User Management</h2>
            <a href="user.php" class="btn btn-add-user">
                <i class="fas fa-user-plus mr-2"></i>Add New User
            </a>
        </div>

        <?php if(isset($_GET['msg'])): ?>
            <div class="alert alert-<?php echo $_GET['msg'] === 'delete_success' ? 'success' : 'danger'; ?> alert-dismissible fade show">
                <?php 
                    if($_GET['msg'] === 'delete_success') echo "User deleted successfully!";
                    if($_GET['msg'] === 'delete_error') echo "Error deleting user!";
                ?>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT id, name, email, mobile FROM crud";
                    $result = $con->query($sql);

                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<tr>
                                    <td>'.$row["id"].'</td>
                                    <td>'.$row["name"].'</td>
                                    <td>'.$row["email"].'</td>
                                    <td>'.$row["mobile"].'</td>
                                    <td>
                                        <a href="update.php?id='.$row["id"].'" class="btn btn-warning btn-sm mr-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="delete.php?deleteid='.$row["id"].'" class="btn btn-danger btn-sm"
                                           onclick="return confirm(\'Are you sure you want to delete this user?\')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>';
                        }
                    } else {
                        echo '<tr><td colspan="5" class="text-center">No users found</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>