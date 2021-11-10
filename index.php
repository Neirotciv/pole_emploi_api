<?php
require 'access.php';
require 'vendor/autoload.php';
// https://entreprise.pole-emploi.fr/connexion/oauth2/access_token
$base_uri = 'https://entreprise.pole-emploi.fr/';

use GuzzleHttp\Client;

// Récupération du token d'accès
$client = new Client(['base_uri' => $base_uri]);
$response = $client->request('POST', 'connexion/oauth2/access_token?realm=/partenaire', [
    'headers' => ['Content-type' => 'application/x-www-form-urlencoded'],
    'form_params' => [
        'grant_type' => 'client_credentials',
        'client_id' => $CLIENT_ID,
        'client_secret' => $PRIVATE_KEY,
        'scope' => 'api_romev1 nomenclatureRome application_PAR_appapprentissage_3892ea311fee58cfa9e100f909d27dd892ea4d5fdd295d3081c387d55aa2c9cd',
    ],
]);

$data = json_decode($response->getBody()->getContents(), true);

foreach($data as $key => $value) {
    echo $key . ' : ' . $value . '<br>';
}
