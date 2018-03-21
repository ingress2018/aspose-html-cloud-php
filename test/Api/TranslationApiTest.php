<?php
/**
 * TranslationApiTest
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
 * 
 */


namespace Client\Invoker\Api;

/**
 * TranslationApiTest Class Doc Comment
 *
 * @category Class
 * @package  Client\Invoker\Api
 */
class TranslationApiTest extends BaseTest
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
     * Test case for translationGetTranslateDocument
     *
     * Translate the HTML document specified by the name from default or specified storage.
     *
     * @param  string $fileName Document name. (required)
     * @param  string $src_lang Source language. (required)
     * @param  string $res_lang Result language. (required)
     * @param  string $storage The source document storage. (optional)
     * @param  string $folder The source document folder. (optional)
     *
     * @dataProvider providerTranslateDocument
     *
     */
    public function testTranslationGetTranslateDocument($fileName, $src_lang, $res_lang, $storage = null, $folder = null)
    {
        $this->uploadFile($fileName);
        $folder = $folder ?: self::$api->config['remoteFolder'];


        //Request to server Api
        $result = self::$api->translationGetTranslateDocument($fileName, $src_lang, $res_lang, $storage, $folder);

        $this->assertTrue($result->isFile(),"Error result after recognize");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . "TranslateDoc_" . $src_lang . "_" . $res_lang . ".zip");
    }


    public function providerTranslateDocument()
    {
        return [
            ["test_en.html","en","fr"],
	        ["test_en.html","en","de"]
        ];
    }

    /**
     * Test case for translationGetTranslateDocumentByUrl
     *
     * Translate the HTML document specified by its URL.
     *
     * @param  string $source_url Source document URL. (required)
     * @param  string $src_lang Source language. (required)
     * @param  string $res_lang Result language. (required)
     *
     * @dataProvider providerTranslateUrl
     *
     */
    public function testTranslationGetTranslateDocumentByUrl($source_url, $src_lang, $res_lang)
    {
        //Request to server Api
        $result = self::$api->translationGetTranslateDocumentByUrl($source_url, $src_lang, $res_lang);

        $this->assertTrue($result->isFile(),"Error result after recognize");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . "TranslateUrl_" . $src_lang . "_" . $res_lang . ".zip");
    }

    public function providerTranslateUrl()
    {
        return [
    		["https://www.le.ac.uk/oerresources/bdra/html/page_01.htm","en","fr"],
    		["https://www.le.ac.uk/oerresources/bdra/html/page_02.htm","en","de"]
        ];
    }
}
