<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Connection Test</title>
</head>
<body>
    <?php 

    $config = require('config.php');
    try {
        // Database configuration
        $host = 'localhost';
        $dbname = 'demo';
        $username = 'root';
        $password = '1234';
        $charset = 'utf8mb4';
        
        // DSN (Data Source Name) with explicit port
        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
        
        // PDO options for better error handling and performance
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        
        // Create PDO instance
        $pdo = new PDO($dsn, $username, $password, $options);
        
        // Prepare and execute query
        $statement = $pdo->query("SELECT * FROM user");
        $posts = $statement->fetchAll();
        
        // Display results in a more readable format
        echo "<h3>Query Results:</h3>";
        if (empty($posts)) {
            echo "No records found.";
        } else {
            echo "<pre>";
            print_r($posts);
            echo "</pre>";
        }
        
    } catch (PDOException $e) {
        // Detailed error message
        echo "<div style='color: red; padding: 10px; border: 1px solid red;'>";
        echo "<strong>Connection Failed:</strong><br>";
        echo "Error Message: " . $e->getMessage() . "<br>";
        echo "Error Code: " . $e->getCode();
        echo "</div>";
        
        // Common troubleshooting tips
        echo "<h4>Troubleshooting Steps:</h4>";
        echo "<ul>";
        echo "<li>Verify MySQL service is running</li>";
        echo "<li>Check if database 'demo' exists</li>";
        echo "<li>Confirm username and password are correct</li>";
        echo "<li>Ensure table 'untitled_table_1' exists in the database</li>";
        echo "<li>Check if MySQL is running on default port (3306)</li>";
        echo "</ul>";
    }
    ?>
</body>
</html>