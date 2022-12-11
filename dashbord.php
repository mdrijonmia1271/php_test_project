<?php


$pdo = new PDO('mysql:host=localhost;port=3306;dbname=image_crud','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC ');
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="app.css">

    <!-- Jquery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    
    <title>Image Crud Operation</title>
</head>
<body>
<h1>Image CRUD Operation!</h1>
    <p>
        <a href="create.php" class="btn btn-success">Upload New Image</a>
    </p>
    <p style="text-align:right;">
        <a href="gallery.php" class="btn btn-info">Click to gallery</a>
    </p>
<table class="table" id="example">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Image</th>
        <th scope="col">Title</th>
        <th scope="col">Create Date</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($products as $i => $product): ?>
        <tr>
            <th scope="row"><?php echo $i+1 ?></th>
            <td>
                <img src="<?php echo $product['image'] ?>" class="thumb-image">
            </td>
            <td id="example"><?php echo $product ['title'] ?></td>
            <td><?php echo $product ['create_date'] ?></td>
            <td>
                <a href="update.php?id=<?php echo $product['id'] ?>" type="button" class="btn btn-sm btn-outline-primary">Edit</a>
               <form style="display: inline-block" method="post" action="delete.php" >
                   <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                   <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
               </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
<!-- <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.colVis.min.js"></script> -->

<script>
    $(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [
            {
                extend: 'csv',
                split: [ 'pdf', 'excel', 'print'],
            },
            // 'colvis'
        ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );
</script>

<footer>
    <h6 style="text-align:right; margin-top:49px">Do you want?<a href="login.php"> Logout</a></h6>
</footer>
</html>