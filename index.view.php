<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        <?=$bussiness['name']  ?>
    </h1>
    <ul>
        <?php
        foreach($bussiness['categories'] as $category) :  ?>
        <li><?= $category; ?></li>
        <?php endforeach;?>
    </ul>
</body>
</html>