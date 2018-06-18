<?php
/*
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose" file="BaseTest.php">
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


namespace Client\Invoker\Api;

use Aspose\Storage\Api\StorageApi;
use Aspose\Storage\Model\Requests;

abstract class BaseTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Api object
     */
    protected static $api;

    /**
     * Storage Api
     */
    protected static $storage;

    /**
     * Folder with test samples
     */
    protected static $testFolder;

    /**
     * Folder for storage result
     */
    protected static $testResult;

    /**
     * Setup before running any test cases
     */
    public static function setUpBeforeClass()
    {

// Configuration - pass by constructor
//        $configuration = array(
//            "basePath" => "https://api.aspose.cloud/v1.1",
//            "authPath" => "https://api.aspose.cloud/oauth2/token",
//            "apiKey" => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
//            "appSID" => "XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX",
//            "testResult" => "\\testresult\\",
//            "testData" => "\\testdata\\",
//            "remoteFolder" => "HtmlTestDoc",
//            "defaultUserAgent" => "Webkit",
//            "debugFile" => "php://output",
//            "debug" => false
//        );

        if (isset($configuration)){
            self::$api = new HtmlApi($configuration);
            $storage_cfg = new \Aspose\Storage\Configuration();
            $storage_cfg->setAppKey($configuration['apiKey'])->
                setAppSid($configuration['appSID'])->
                setHost("http://sikorsky-js3.dynabic.com:9083/");

            self::$storage = new StorageApi($storage_cfg);

            self::$testFolder = realpath(__DIR__ . '/../..') . $configuration['testData'];
            self::$testResult = realpath(__DIR__ . '/../..') . $configuration['testResult'];

        }else{
            self::$api = new HtmlApi();

            $storage_cfg = new \Aspose\Storage\Configuration();
            $storage_cfg->setAppKey(self::$api->config['apiKey'])->
                setAppSid(self::$api->config['appSID'])->
                setHost("http://sikorsky-js3.dynabic.com:9083/");

            self::$storage = new StorageApi($storage_cfg);

            self::$testFolder = realpath(__DIR__ . '/../..') . self::$api->config['testData'];
            self::$testResult = realpath(__DIR__ . '/../..') . self::$api->config['testResult'];
        }
    }

    public function uploadFile($filename, $uploadFolder = null)
    {
        $folder = $uploadFolder ?: self::$api->config['remoteFolder'];
        $path = $folder . "/" . $filename;
        $versionId = null;
        $storage = null;
        $file = self::$testFolder . $filename;
        $request = new Requests\PutCreateRequest($path, $file, $versionId, $storage);

        // Upload file to storage
        $result = self::$storage->putCreate($request);
        $this->assertEquals(200, $result->getCode());


        //Assert - file exist
        $request = new Requests\GetIsExistRequest($path, $versionId, $storage);

        $result = self::$storage->getIsExist($request);
        $this->assertEquals(200, $result->getCode());
        $this->assertTrue($result->getFileExist()["isExist"]);
   }
}