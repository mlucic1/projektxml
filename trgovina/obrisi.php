<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $xml = simplexml_load_file('products.xml');
    $index = 0;
    foreach ($xml->product as $product) {
        if ((string)$product['id'] === $id) {
            unset($xml->product[$index]);
            break;
        }
        $index++;
    }
    $xml->asXML('products.xml');
}
header('Location: index.php');
exit();
?>
