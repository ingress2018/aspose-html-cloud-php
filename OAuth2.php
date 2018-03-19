<?php

include __DIR__.'./vendor/autoload.php';

use kamermans\OAuth2\GrantType\ClientCredentials;
use kamermans\OAuth2\OAuth2Middleware;
use GuzzleHttp\HandlerStack;

// Authorization client - this is used to request OAuth access tokens
$reauth_client = new GuzzleHttp\Client([
    // URL for access_token request
    'base_uri' => 'https://api-qa.aspose.cloud/oauth2/token',
]);
$reauth_config = [
    "client_id" => "80e32ca5-a828-46a4-9d54-7199dfd3764a",
    "client_secret" => "60487a72d6325241191177e37ae52146"
];
$grant_type = new ClientCredentials($reauth_client, $reauth_config);
$oauth = new OAuth2Middleware($grant_type);

$stack = HandlerStack::create();
$stack->push($oauth);

// This is the normal Guzzle client that you use in your application
$client = new GuzzleHttp\Client([
    'handler' => $stack,
    'auth'    => 'oauth',
]);

$response = $client->get('https://api-qa.aspose.cloud/v1.1');

echo "Status: ".$response->getStatusCode()."\n";
echo "Body: ".$response->getBody() ."\n";
