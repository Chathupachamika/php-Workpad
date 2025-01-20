<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Workpad</title>
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
        <!-- Episode 5: Basic PHP Variables and Conditions -->
        <div class="episode">
            <h2>Episode 5: Greetings and Conditions</h2>
            <?php
                $greeting = "Hello";
                echo "<p>{$greeting}, Good Morning</p>";

                $name = "Chathupa";
                $read = true;
                $message = $read ? "You have read {$name}" : "You have not read {$name}";
            ?>
            <h5><?php echo $message; ?></h5>
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

        <!-- Episode 11 -->
        <div class="episode">
            <h2>Episode 11: Business Info</h2>
            <?php 
            $bussiness = [
                'name' => 'Laracast',
                'cost' => 15,
                'categories' => ["Testing", "php"]
            ];
            ?>
            <h1><?php echo $bussiness['name']; ?></h1>
            <ul>
                <?php foreach ($bussiness['categories'] as $category): ?>
                    <li><?php echo htmlspecialchars($category); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</body>
</html>
