<?php
/**
 * OcrApiTest
 * PHP version 5
 *
 * @category Class
 * @package  Client\Invoker\Api
 */

/**
 * Aspose.HTML for Cloud API Reference
 *
 * OpenAPI spec version: 1.1
 * 
 */


namespace Client\Invoker\Api;

/**
 * OcrApiTest Class Doc Comment
 *
 * @category Class
 * @package  Client\Invoker\Api
 */
class OcrApiTest extends BaseTest
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
     * Test case for ocrGetRecognizeAndImportToHtml
     *
     * @dataProvider providerOcrGetRecognizeAndImportToHtml
     *
     * Recognize text from the image file in the storage and import it to HTML format..
     *
     */
    public function testOcrGetRecognizeAndImportToHtml($fileName, $ocr_engine_lang = 'en', $folder = null, $storage = null)
    {
        $this->uploadFile($fileName);
        $folder = $folder ?: self::$api->config['remoteFolder'];


        //Request to server Api
        $result = self::$api->ocrGetRecognizeAndImportToHtml($fileName, $ocr_engine_lang , $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after recognize");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $fileName . "_" . $ocr_engine_lang .".html");
    }

    public function providerOcrGetRecognizeAndImportToHtml()
    {
        return [
            ["test_ocr.png","en"],
            ["test_ocr.jpg","en"]
        ];
    }


    /**
     * Test case for ocrGetRecognizeAndTranslateToHtml
     *
     * @dataProvider providerOcrGetRecognizeAndTranslateToHtml
     *
     * Recognize text from the image file in the storage, import it to HTML format and translate to specified language..
     *
     */
    public function testOcrGetRecognizeAndTranslateToHtml($fileName, $src_lang, $res_lang, $folder = null, $storage = null)
    {
        $this->uploadFile($fileName);
        $folder = $folder ?: self::$api->config['remoteFolder'];


        //Request to server Api
        $result = self::$api->ocrGetRecognizeAndTranslateToHtml($fileName, $src_lang, $res_lang, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after recognize");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $fileName . "_" . $src_lang . "_". $res_lang . ".html");
    }

    public function providerOcrGetRecognizeAndTranslateToHtml()
    {
        return [
            ["test_ocr.png","en","fr"],
            ["test_ocr.jpg","en","de"]
        ];
    }
}
