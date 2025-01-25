<?php

// Include necessary files
require 'functions.php';
require 'Database.php';

// Load database configuration
$config = require('config.php');
$db = new Database($config['database']);

// Get the ID from the query string and ensure it is sanitized
$id = $_GET['id'] ?? null;

if ($id) {
    // Parameterized query to prevent SQL injection
    $query = "SELECT * FROM posts WHERE id = :id";

    // Execute the query with the parameter
    $post = $db->query($query, [':id' => $id])->fetch();

    // Output the result
    dd($post);
} else {
    echo "No ID provided!";
}

?>
