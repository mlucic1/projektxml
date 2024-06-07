<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $xml = simplexml_load_file('products.xml');
    $newProduct = $xml->addChild('product');
    $newProduct->addAttribute('id', (string)(count($xml->product) + 1));
    $newProduct->addChild('name', htmlspecialchars($_POST['name']));
    $newProduct->addChild('price', htmlspecialchars($_POST['price']));
    $newProduct->addChild('description', htmlspecialchars($_POST['description']));
    $xml->asXML('products.xml');
    header('Location: index.php');
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dodaj proizvod</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-4">
      <h1>Dodaj novi proizvod</h1>
      <form action="dodaj.php" method="post">
        <div class="mb-3">
          <label for="name" class="form-label">Naziv</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
          <label for="price" class="form-label">Cijena</label>
          <input type="text" class="form-control" id="price" name="price" required>
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Opis</label>
          <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Dodaj</button>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
