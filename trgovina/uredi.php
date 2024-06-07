<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $xml = simplexml_load_file('products.xml');

    foreach ($xml->product as $product) {
        if ((string)$product['id'] === $id) {
            $currentProduct = $product;
            break;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $currentProduct->name = htmlspecialchars($_POST['name']);
        $currentProduct->price = htmlspecialchars($_POST['price']);
        $currentProduct->description = htmlspecialchars($_POST['description']);
        $xml->asXML('products.xml');
        header('Location: index.php');
    }
} else {
    header('Location: index.php');
    exit();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uredi proizvod</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-4">
      <h1>Uredi proizvod</h1>
      <form action="uredi.php?id=<?php echo $id; ?>" method="post">
        <div class="mb-3">
          <label for="name" class="form-label">Naziv</label>
          <input type="text" class="form-control" id="name" name="name" value="<?php echo $currentProduct->name; ?>" required>
        </div>
        <div class="mb-3">
          <label for="price" class="form-label">Cijena</label>
          <input type="text" class="form-control" id="price" name="price" value="<?php echo $currentProduct->price; ?>" required>
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Opis</label>
          <textarea class="form-control" id="description" name="description" rows="3" required><?php echo $currentProduct->description; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Spremi</button>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
