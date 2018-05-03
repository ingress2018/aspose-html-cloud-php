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