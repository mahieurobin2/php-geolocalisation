<form action="" method="POST" class="form-example">
    <label for="name">Entrer une adresse a chercher :</label>
    <input type="text" name="adresse" id="adresse" required> 
    <input type="submit" value="Trouver adresse">


<?php
require __DIR__ . '/vendor/autoload.php';

$adresse = $_POST['adresse'];

if (isset($_POST['adresse'])){
    $client = new GuzzleHttp\Client();
    $res = $client->request('GET', 'https://api-adresse.data.gouv.fr/search/?q='.$adresse, [
        'auth' => ['user', 'pass']
    ]);
    $resultat = json_decode($res->getBody(), true);
    var_dump($resultat);
}
?>