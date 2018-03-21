<?php
/**
 * ConversionApiTest
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
 * ConversionApiTest Class Doc Comment
 *
 * @category Class
 * @package  Client\Invoker\Api
 */
class ConversionApiTest extends BaseTest
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
     * Test case for conversionGetConvertDocumentToImage
     *
     * Convert the HTML document from the storage by its name to the specified image format..
     * @param  string $out_format Resulting image format. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  int $x_resolution Horizontal resolution of resulting image. (optional)
     * @param  int $y_resolution Vertical resolution of resulting image. (optional)
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source document storage. (optional)
     *
     * @dataProvider providerConversionToImage
     *
     */
    public function testConversionGetConvertDocumentToImage
    ( $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
      $bottom_margin = null, $x_resolution = null, $y_resolution = null, $folder = null, $storage = null )
    {
        $fileName = "test1.html";
        $folder = $folder ?: self::$api->config['remoteFolder'];

        $this->uploadFile($fileName);

        //Request to server Api
        $result = self::$api->ConversionGetConvertDocumentToImage
        ( $fileName, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin,
          $x_resolution, $y_resolution, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after recognize");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        $resultFile = "HtmlToImg_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($x_resolution) && isset($y_resolution) ? $x_resolution . "x" . $y_resolution . "_" : "-x-_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . '.' . $out_format);
    }

    public function providerConversionToImage()
    {
        return [
    		["jpeg"],
    		["jpeg", 500, 500],
    		["jpeg", 600, 600],
    		["jpeg", 700, 700, 50, 100, 150, 200, 100, 100],
    		["jpeg", 800, 800, 200, 150, 100, 50, 150, 150],
    		["jpeg", 800, 1000, 50, 50, 50, 50, 200, 200],
    		["jpeg", 800, 1200, 100, 100, 100, 100, 50, 50],
    		["jpeg", 800, 1400, 150, 150, 150, 150, 50, 50],
    		["jpeg", 800, 1600, 200, 200, 200, 200, 50, 50],

    		["png"],
    		["png", 500, 500],
    		["png", 600, 600],
    		["png", 700, 700, 50, 100, 150, 200, 100, 100],
    		["png", 800, 800, 200, 150, 100, 50, 150, 150],
    		["png", 800, 1000, 50, 50, 50, 50, 200, 200],
    		["png", 800, 1200, 100, 100, 100, 100, 50, 50],
    		["png", 800, 1400, 150, 150, 150, 150, 50, 50],
    		["png", 800, 1600, 200, 200, 200, 200, 50, 50],

    		["bmp"],
    		["bmp", 500, 500],
    		["bmp", 600, 600],
    		["bmp", 700, 700, 200, 150, 10, 50, 100, 100],
    		["bmp", 800, 800, 50, 100, 150, 200, 150, 150],
    		["bmp", 800, 1000, 50, 50, 50, 50, 200, 200],
    		["bmp", 800, 1200, 100, 100, 100, 100, 50, 50],
    		["bmp", 800, 1400, 300, 200, 100, 0, 50, 50],
    		["bmp", 800, 1600, 150, 150, 150, 150, 50, 50],

    		["tiff"],
    		["tiff", 500, 500],
    		["tiff", 600, 600],
    		["tiff", 700, 700, 200, 150, 100, 50, 100, 100],
    		["tiff", 800, 800, 50, 100, 150, 200, 150, 150],
    		["tiff", 800, 1000, 50, 50, 50, 50, 200, 200],
    		["tiff", 800, 1200, 100, 100, 100, 100, 50, 50],
    		["tiff", 800, 1400, 150, 150, 150, 150, 50, 50],
    		["tiff", 800, 1600, 200, 200, 200, 200, 50, 50]
        ];
    }


    /**
     * Test case for conversionGetConvertDocumentToImageByUrl
     *
     * Convert the HTML page from the web by its URL to the specified image format..
     * @param  string $out_format Resulting image format. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  int $x_resolution Horizontal resolution of resulting image. (optional)
     * @param  int $y_resolution Vertical resolution of resulting image. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     *
     * @dataProvider providerConversionToImage
     *
     */
    public function testConversionGetConvertDocumentToImageByUrl
    ($out_format, $width = null, $height = null, $left_margin = null, $right_margin = null,
     $top_margin = null, $bottom_margin = null, $x_resolution = null, $y_resolution = null, $folder = null, $storage = null)
    {
        $source_url = "https://stallman.org/articles/anonymous-payments-thru-phones.html";
        $folder = $folder ?: self::$api->config['remoteFolder'];

        //Request to server Api
        $result = self::$api->conversionGetConvertDocumentToImageByUrl
        ( $source_url, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin,
          $x_resolution, $y_resolution, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after recognize");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        $resultFile = "UrlToImg_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($x_resolution) && isset($y_resolution) ? $x_resolution . "x" . $y_resolution . "_" : "-x-_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . '.' . $out_format);
    }


    /**
     * Test case for conversionGetConvertDocumentToPdf
     *
     * Convert the HTML document from the storage by its name to PDF.
     *
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @dataProvider providerConversionToPdfOrXps
     *
     */
    public function testConversionGetConvertDocumentToPdf
    ($width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null, $folder = null, $storage = null)
    {
        $fileName = "test1.html";
        $folder = $folder ?: self::$api->config['remoteFolder'];

        $this->uploadFile($fileName);

        //Request to server Api
        $result = self::$api->conversionGetConvertDocumentToPdf($fileName, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after recognize");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        $resultFile = "HtmlToPdf_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . '.pdf');
    }


    public function providerConversionToPdfOrXps()
    {
        return [
      		// Test width, height
    		[null, null, null, null, null, null],
    		[200,  500,  null, null, null, null],
    		[300,  600,  null, null, null, null],
    		[400,  700,  null, null, null, null],
    		[500,  800,  null, null, null, null],
    		[600,  900,  null, null, null, null],
    		[700,  1000, null, null, null, null],
    		[800,  1100, null, null, null, null],

      		[null, null, 0, 0, 0, 0],

      		// Test margin left, right
    		[null, null, 40,  0,   0, 0],
    		[null, null, 80,  0,   0, 0],
    		[null, null, 120, 0,   0, 0],
    		[null, null, 160, 0,   0, 0],
    		[null, null, 0,   40,  0, 0],
    		[null, null, 0,   80,  0, 0],
    		[null, null, 0,   120, 0, 0],
    		[null, null, 0,   160, 0, 0],

    		// Test margin top, bottom
      		[null, null, 0, 0, 40,  0  ],
    		[null, null, 0, 0, 80,  0  ],
    		[null, null, 0, 0, 120, 0  ],
    		[null, null, 0, 0, 160, 0  ],
    		[null, null, 0, 0, 0,   40 ],
    		[null, null, 0, 0, 0,   80 ],
    		[null, null, 0, 0, 0,   120],
    		[null, null, 0, 0, 0,   160]
        ];
    }

    /**
     * Test case for conversionGetConvertDocumentToPdfByUrl
     *
     * Convert the HTML page from the web by its URL to PDF.
     *
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @dataProvider providerConversionToPdfOrXps
     *
     */
    public function testConversionGetConvertDocumentToPdfByUrl
    ($width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null, $folder = null, $storage = null)
    {
        $source_url = "https://stallman.org/articles/anonymous-payments-thru-phones.html";
        $folder = $folder ?: self::$api->config['remoteFolder'];

        //Request to server Api
        $result = self::$api->conversionGetConvertDocumentToPdfByUrl($source_url, $width, $height, $left_margin,
            $right_margin, $top_margin, $bottom_margin, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after recognize");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        $resultFile = "UrlToPdf_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . '.pdf');
    }

    /**
     * Test case for conversionGetConvertDocumentToXps
     *
     * Convert the HTML document from the storage by its name to XPS..
     *
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @dataProvider providerConversionToPdfOrXps
     *
     */
    public function testConversionGetConvertDocumentToXps
    ($width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null, $folder = null, $storage = null)
    {
        $fileName = "test1.html";
        $folder = $folder ?: self::$api->config['remoteFolder'];

        $this->uploadFile($fileName);

        //Request to server Api
        $result = self::$api->conversionGetConvertDocumentToXps($fileName, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after recognize");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        $resultFile = "HtmlToXps_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . '.xps');
    }

    /**
     * Test case for conversionGetConvertDocumentToXpsByUrl
     *
     * Convert the HTML page from the web by its URL to XPS.
     *
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     *
     * @dataProvider providerConversionToPdfOrXps
     *
     */
    public function testConversionGetConvertDocumentToXpsByUrl
    ($width = null, $height = null,  $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null, $folder = null, $storage = null)
    {
        $source_url = "https://stallman.org/articles/anonymous-payments-thru-phones.html";
        $folder = $folder ?: self::$api->config['remoteFolder'];

        //Request to server Api
        $result = self::$api->conversionGetConvertDocumentToXpsByUrl($source_url, $width, $height, $left_margin,
            $right_margin, $top_margin, $bottom_margin, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after recognize");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        $resultFile = "UrlToXps_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . '.xps');
    }
}
