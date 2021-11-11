<?php
require 'access.php';
require 'vendor/autoload.php';

use GuzzleHttp\Client;

$token = 'null';
$base_uri = 'https://entreprise.pole-emploi.fr';
$store_uri = "https://api.emploi-store.fr";

if ($token === 'null') {
    // Récupération du token d'accès
    $client = new Client(['base_uri' => $base_uri]);
    $response = $client->request('POST', '/connexion/oauth2/access_token?realm=/partenaire', [
        'headers' => ['Content-type' => 'application/x-www-form-urlencoded'],
        'form_params' => [
            'grant_type' => 'client_credentials',
            'client_id' => $CLIENT_ID,
            'client_secret' => $PRIVATE_KEY,
            'scope' => 'api_romev1 nomenclatureRome api_matchviasoftskillsv1 application_PAR_appapprentissage_3892ea311fee58cfa9e100f909d27dd892ea4d5fdd295d3081c387d55aa2c9cd',
        ],
    ]);
    
    $data = json_decode($response->getBody()->getContents(), true);
    
    foreach($data as $key => $value) {
        ($key == 'access_token') ? $token = $value : 'null';
    }

    echo 'Your access token is ' . $token;
}
?>

<form action="#" method="POST">
    <label for="job">Libellé du métier</label>
    <input type="text" name="job" placeholder="ex : Développeur">
    <input type="submit" value="valider">
</form>

<?php 
    if(isset($_POST['job'])) {
        $job = $_POST['job'];
        
        // Trouver le code ROME
        $client = new Client(['base_uri' => $store_uri]);
        $response = $client->request('GET', '/partenaire/rome/v1/appellation/?q='.$job, [
            'headers' => ['Authorization' => 'Bearer ' . $token],
        ]);

        $data = json_decode($response->getBody()->getContents(), true);
        
        foreach($data as $key => $value) {
            echo $value['libelleCourt'] . ' ' . '<a href="./?code=' . $value["code"] . '">' . $value['code'] . '</a><br>';
        }
    }

    if(isset($_GET['code'])) {
        $code = $_GET['code'];

        // Trouver les compétences du métier
        $client = new Client(['base_uri' => $store_uri]);
        $response = $client->request('POST', '/partenaire/matchviasoftskills/v1/professions/job_skills', [
            'headers' => ['Authorization' => 'Bearer ' . $token],
            'form_params' => [
                'code' => $code,
            ],
        ]);

        $data = json_decode($response->getBody()->getContents(), true);
        
        echo '<h3>Compétences</h3>';
        foreach($data['skills'] as $key => $skills) {
            echo '- <b>' . $skills['summary'] . '</b> : ' . $skills['details'] . '<br>';
        }
    }

?>   