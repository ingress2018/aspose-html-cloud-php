<?php
/*
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose" file="Config.php">
*   Copyright (c) 2018 Aspose.HTML for Cloud
* </copyright>
* <summary>
*   Permission is hereby granted, free of charge, to any person obtaining a copy
*  of this software and associated documentation files (the "Software"), to deal
*  in the Software without restriction, including without limitation the rights
*  to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
*  copies of the Software, and to permit persons to whom the Software is
*  furnished to do so, subject to the following conditions:
*
*  The above copyright notice and this permission notice shall be included in all
*  copies or substantial portions of the Software.
*
*  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
*  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
*  FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
*  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
*  LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
*  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
*  SOFTWARE.
* </summary>
* --------------------------------------------------------------------------------------------------------------------
*/

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
