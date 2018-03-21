<?php

namespace Client\Invoker\Api;

use Aspose\Storage\StorageApi;


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
        self::$api = new HtmlApi();
        self::$storage = new StorageApi();
        self::$storage->apiClient->apiKey = self::$api->config['apiKey'];
        self::$storage->apiClient->appSid = self::$api->config['appSID'];
        self::$storage->apiClient->apiServer = self::$api->config['basePath'];
        self::$testFolder = realpath(__DIR__ . '/../..') . self::$api->config['testData'];
        self::$testResult = realpath(__DIR__ . '/../..') . self::$api->config['testResult'];
    }

    public function uploadFile($filename, $uploadFolder = null)
    {
        $folder = $uploadFolder ?: self::$api->config['remoteFolder'];

        // Upload file to storage
        self::$storage->PutCreate($folder . "/" . $filename, null, null, self::$testFolder . $filename);

        //Assert - file exist
        $res = self::$storage->GetIsExist($folder . "/" . $filename, null, null);
        $this->assertEquals(200,$res->Code,"Error occured while uploading document");
        $this->assertTrue($res->FileExist->IsExist,"Error occured while uploading document");
    }
}