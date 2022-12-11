<?php


$pdo = new PDO('mysql:host=localhost;port=3306;dbname=image_crud','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare('SELECT * FROM products');
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);
//echo '<pre>';
//var_dump($products);
//echo '</pre>';

//?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
    <title>Bootstrap demo</title>
</head>
<body>
<p>
    <a href="dashbord.php" class="btn btn-secondary">Go back to manage</a>
</p>
<br>

<div class="h4 pb-2 mb-4 text-primary border-bottom border-info">
 <h1>Gallery</h1>
</div>
        <div class="gallery">
        <?php 
        foreach ($products as $image): ?>
            
            <img style="padding:10px;" src="<?php echo $image['image']?>" class="thir">
            
        <?php endforeach; ?>
        </div>
</body>
</html>


