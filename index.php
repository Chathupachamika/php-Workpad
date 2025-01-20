<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <title>PHP Basics Tutorial (Episodes 1-11)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
            line-height: 1.5;
            font-size: 16px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .episode {
            margin: 30px 0;
            padding: 20px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
        }

        h1, h2 {
            color: #2c3e50;
            margin-bottom: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin: 10px 0;
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 5px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .separator {
            border-top: 2px solid #dee2e6;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Episode 1: PHP Tags and Echo -->
        <div class="episode">
            <h2>Episode 1: Introduction to PHP</h2>
            <?php
                echo "<p>Welcome to PHP Basics!</p>";
                // Single line comment
                /* Multi-line
                   comment */
            ?>
        </div>

        <!-- Episode 2: Variables and Data Types -->
        <div class="episode">
            <h2>Episode 2: Variables and Data Types</h2>
            <?php
                $integer = 42;
                $float = 3.14;
                $string = "Hello PHP";
                $boolean = true;
                
                echo "<p>Integer: {$integer}</p>";
                echo "<p>Float: {$float}</p>";
                echo "<p>String: {$string}</p>";
                echo "<p>Boolean: " . ($boolean ? 'true' : 'false') . "</p>";
            ?>
        </div>

        <!-- Episode 3: String Operations -->
        <div class="episode">
            <h2>Episode 3: String Operations</h2>
            <?php
                $firstName = "John";
                $lastName = "Doe";
                
                // String concatenation
                echo "<p>Concatenation: " . $firstName . " " . $lastName . "</p>";
                
                // String interpolation
                echo "<p>Interpolation: {$firstName} {$lastName}</p>";
                
                // String functions
                echo "<p>Uppercase: " . strtoupper($firstName) . "</p>";
            ?>
        </div>

        <!-- Episode 4: Basic Operators -->
        <div class="episode">
            <h2>Episode 4: Basic Operators</h2>
            <?php
                $num1 = 10;
                $num2 = 5;
                
                echo "<p>Addition: " . ($num1 + $num2) . "</p>";
                echo "<p>Subtraction: " . ($num1 - $num2) . "</p>";
                echo "<p>Multiplication: " . ($num1 * $num2) . "</p>";
                echo "<p>Division: " . ($num1 / $num2) . "</p>";
            ?>
        </div>

        <!-- Episode 5: Greetings and Conditions -->
        <div class="episode">
            <h2>Episode 5: Greetings and Conditions</h2>
            <?php
                $greeting = "Hello";
                echo "<p>{$greeting}, Good Morning</p>";

                $name = "Chathupa";
                $read = true;
                $message = $read ? "You have read {$name}" : "You have not read {$name}";
                echo "<h5>{$message}</h5>";
            ?>
        </div>

        <!-- Episode 6: Arrays and Loops -->
        <div class="episode">
            <h2>Episode 6: Recommended Books</h2>
            <?php
                $books = [
                    "Do Androids Dream of Electric Sheep",
                    "The Langoliers",
                    "Hail Mary"
                ];
            ?>
            <ul>
                <?php foreach($books as $book): ?>
                    <li><?php echo htmlspecialchars($book); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Episode 7 & 8: Associative Arrays -->
        <div class="episode">
            <h2>Episode 7 & 8: Book Details</h2>
            <?php
                $hooks = [
                    [
                        'name' => 'Do Androids Dream of Electric Sheep',
                        'author' => 'Philip K. Dick',
                        'release_year' => '2010',
                        'purchaseUrl' => 'http://example.com'
                    ],
                    [
                        'name' => 'Project Hail Mary',
                        'author' => 'Andy Weir',
                        'release_year' => '2007',
                        'purchaseUrl' => 'http://example.com'
                    ]
                ];

                function filterByAuthor($books, $author) {
                    return array_filter($books, function($book) use ($author) {
                        return $book['author'] === $author;
                    });
                }
            ?>
            <ul>
                <?php foreach ($hooks as $book): ?>
                    <li>
                        <a href="<?php echo htmlspecialchars($book['purchaseUrl']); ?>">
                            <?php echo htmlspecialchars($book['name']); ?>
                        </a>
                        (<?php echo htmlspecialchars($book['release_year']); ?>) -
                        By <?php echo htmlspecialchars($book['author']); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Episode 9: Functions -->
        <div class="episode">
            <h2>Episode 9: Functions</h2>
            <?php
                function calculateTotal($prices, $discount = 0) {
                    $total = array_sum($prices);
                    return $total - ($total * $discount);
                }

                $prices = [10, 20, 30];
                echo "<p>Total without discount: $" . calculateTotal($prices) . "</p>";
                echo "<p>Total with 10% discount: $" . calculateTotal($prices, 0.1) . "</p>";
            ?>
        </div>

        <!-- Episode 10: Form Handling -->
        <div class="episode">
            <h2>Episode 10: Form Handling</h2>
            <form method="POST" action="">
                <input type="text" name="username" placeholder="Enter username">
                <button type="submit">Submit</button>
            </form>
            <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'])) {
                    $username = htmlspecialchars($_POST['username']);
                    echo "<p>Welcome, {$username}!</p>";
                }
            ?>
        </div>

        <!-- Episode 11: Business Info -->
        <div class="episode">
            <h2>Episode 11: Business Info</h2>
            <?php 
                $business = [
                    'name' => 'Laracast',
                    'cost' => 15,
                    'categories' => ["Testing", "PHP"]
                ];
            ?>
            <h1><?php echo htmlspecialchars($business['name']); ?></h1>
            <ul>
                <?php foreach ($business['categories'] as $category): ?>
                    <li><?php echo htmlspecialchars($category); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</body>
</html>