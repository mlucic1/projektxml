<?php
function readXML($xmlFile) {
    if (!file_exists($xmlFile)) {
        return [];
    }

    $xml = simplexml_load_file($xmlFile);
    if ($xml === false) {
        return [];
    }

    $json = json_encode($xml);
    $array = json_decode($json, TRUE);
    return $array['product'] ?? [];
}

$products = readXML('products.xml');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dućan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-4">
      <h1>Popis proizvoda</h1>
      <a href="dodaj.php" class="btn btn-primary mb-3">Dodaj novi proizvod</a>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Naziv</th>
            <th>Cijena</th>
            <th>Opis</th>
            <th>Akcije</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($products as $product): ?>
          <tr>
            <td><?php echo $product['@attributes']['id']; ?></td>
            <td><?php echo $product['name']; ?></td>
            <td><?php echo $product['price']; ?></td>
            <td><?php echo $product['description']; ?></td>
            <td>
              <a href="uredi.php?id=<?php echo $product['@attributes']['id']; ?>" class="btn btn-warning btn-sm">Uredi</a>
              <a href="obrisi.php?id=<?php echo $product['@attributes']['id']; ?>" class="btn btn-danger btn-sm">Obriši</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
