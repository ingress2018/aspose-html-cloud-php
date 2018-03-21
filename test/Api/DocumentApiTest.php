<?php
/**
 * DocumentApiTest
 * PHP version 5
 *
 * @category Class
 * @package  Client\Invoker
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Aspose.Html for Cloud API Reference
 *
 * OpenAPI spec version: 1.1
 */

namespace Client\Invoker\Api;


/**
 * DocumentApiTest Class Doc Comment
 *
 * @category Class
 * @package  Client\Invoker\Api
 */
class DocumentApiTest extends BaseTest
{

    /**
     * Setup before running each test case
     */
    public function setUp()
    {
    }

    /**
     * Clean up after running each test case
     */
    public function tearDown()
    {
    }

    /**
     * Clean up after running all test cases
     */
    public static function tearDownAfterClass()
    {
    }

    /**
     * Test case for documentGetDocument
     *
     * Return the HTML document by the name from default or specified storage.
     * @param  string $fileName The document name. (required)
     *
     * @dataProvider providerDocumentGetDocument
     */
    public function testDocumentGetDocument($fileName)
    {
        $this->uploadFile($fileName);
        $result = self::$api->documentGetDocument($fileName,null,self::$api->config['remoteFolder']);

        $this->assertTrue($result->isFile(),"Error result after recognize");
        $this->assertTrue($result->getSize() > 0,"Size of file is zero");

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . "GetDoc_" . $fileName);
    }

    public function providerDocumentGetDocument()
    {
        return [
            ["test1.html.zip"],
            ["test2.html.zip"],
            ["test3.html.zip"],
            ["test4.html.zip"],
            ["test.txt"]
        ];
    }

    /**
     * Test case for documentGetDocumentFragmentByXPath
     *
     * Return list of HTML fragments matching the specified XPath query..
     * @param  string $fileName The document name. (required)
     * @param  string $xPath XPath query string. (required)
     * @param  string $outFormat Output format. Possible values: &#39;plain&#39; and &#39;json&#39;. (required)
     *
     * @dataProvider providerDocumentGetDocumentFragmentByXPath
     *
     */
    public function testDocumentGetDocumentFragmentByXPath($fileName, $xPath, $outFormat)
    {
        $this->uploadFile($fileName);
        $result = self::$api->documentGetDocumentFragmentByXPath($fileName, $xPath, $outFormat, null, self::$api->config['remoteFolder']);

        $this->assertTrue($result->isFile(),"Error result after recognize");
        $this->assertTrue($result->getSize() > 0,"Size of file is zero");

        $ext = "";
        if($outFormat == "plain") {
            $ext = ".html";
        }else if($outFormat == "json") {
            $ext = ".json";
        }

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . "GetDocXPath_" . $fileName . $ext);
    }

    public function providerDocumentGetDocumentFragmentByXPath()
    {
        return [
    		["test2.html.zip",".//p", "plain"],
    		["test3.html.zip",".//p", "plain"],
    		["test4.html.zip",".//p", "plain"],
    		["test2.html",".//ol/li", "json"]
    	];
    }


    /**
     * Test case for documentGetDocumentImages
     *
     * Return all HTML document images packaged as a ZIP archive..
     * @param  string $fileName The document name. (required)
     *
     * @dataProvider providerDocumentGetDocumentImages
     */
    public function testDocumentGetDocumentImages($fileName)
    {
        $this->uploadFile($fileName);
        $result = self::$api->documentGetDocumentImages($fileName,self::$api->config['remoteFolder'],null);
        print_r($result);

        $this->assertTrue($result->isFile(),"Error result after recognize");
        $this->assertTrue($result->getSize() > 0,"Size of file is zero");

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $fileName);
    }

    public function providerDocumentGetDocumentImages()
    {
        return [
            ["test1.html.zip"],
            ["test2.html.zip"],
            ["test3.html.zip"],
            ["test4.html.zip"]
        ];
    }
}
