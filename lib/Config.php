<?php

namespace Client\Invoker;

include __DIR__ . '/../vendor/autoload.php';

use kamermans\OAuth2\GrantType\ClientCredentials;
use kamermans\OAuth2\OAuth2Middleware;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;

class Config
{
    private static $client = null;
    private static $config = null;
    /**
     * return Singleton - HttpClient
     */

    public static function getClient()
    {
        if (null === static::$client) {
            //For feel static fields
            new Config();
        }
        return static::$client;
    }

    /**
     * return Config
     */
    public static function getConfig()
    {
        if (null === static::$config) {
            static::$config = json_decode(file_get_contents(realpath(__DIR__ . '/../setting/config.json')), true);
            static::$config += ['tempFolderPath' => sys_get_temp_dir()];
        }

        return static::$config;
    }

    private function __clone()
    {
    }

    private function __construct()
    {
        $cfg = static::getConfig();

        // Authorization client - this is used to request OAuth access tokens
        $reauth_client = new Client([

        // URL for access_token request
            'base_uri' => $cfg['authPath'],
        ]);
        $reauth_config = [
            "client_id" => $cfg['appSID'],
            "client_secret" => $cfg['apiKey']
        ];
        $grant_type = new ClientCredentials($reauth_client, $reauth_config);
        $oauth = new OAuth2Middleware($grant_type);

        $stack = HandlerStack::create();
        $stack->push($oauth);

        // This is the normal Guzzle client that you use in your application
        static::$client = new Client([
            'handler' => $stack,
            'auth'    => 'oauth',
        ]);
    }
}

//test
$response = Config::getClient()->get('https://api-qa.aspose.cloud/v1.1');
echo "Status: ".$response->getStatusCode()."\n";
//echo "Body: ".$response->getBody() ."\n";
print_r(Config::getConfig());
var_dump(Config::getConfig()['debug']);