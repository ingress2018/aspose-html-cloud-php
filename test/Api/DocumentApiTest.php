<?php
/*
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose" file="DocumentApiTest.php">
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


/**
 * DocumentApiTest Class Doc Comment
 *
 * @category Class
 * @package  Client\Invoker\Api
 */
class DocumentApiTest extends BaseTest
{

    /**
     * Test case for GetDocument
     *
     * Return the HTML document by the name from default or specified storage.
     * @param  string $fileName The document name. (required)
     *
     * @dataProvider providerGetDocument
     */
    public function testGetDocument($fileName)
    {
        $this->uploadFile($fileName);
        $result = self::$api->GetDocument($fileName,null,self::$api->config['remoteFolder']);

        $this->assertTrue($result->isFile(),"Error result after recognize");
        $this->assertTrue($result->getSize() > 0,"Size of file is zero");

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . "GetDoc_" . $fileName);
    }

    public function providerGetDocument()
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
     * Test case for GetDocumentFragmentByXPath
     *
     * Return list of HTML fragments matching the specified XPath query..
     * @param  string $fileName The document name. (required)
     * @param  string $xPath XPath query string. (required)
     * @param  string $outFormat Output format. Possible values: &#39;plain&#39; and &#39;json&#39;. (required)
     *
     * @dataProvider providerGetDocumentFragmentByXPath
     *
     */
    public function testGetDocumentFragmentByXPath($fileName, $xPath, $outFormat)
    {
        $this->uploadFile($fileName);
        $result = self::$api->GetDocumentFragmentByXPath($fileName, $xPath, $outFormat, null, self::$api->config['remoteFolder']);

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

    public function providerGetDocumentFragmentByXPath()
    {
        return [
    		["test2.html.zip",".//p", "plain"],
    		["test3.html.zip",".//p", "plain"],
    		["test4.html.zip",".//p", "plain"],
    		["test2.html",".//ol/li", "json"]
    	];
    }


    /**
     * Test case for GetDocumentImages
     *
     * Return all HTML document images packaged as a ZIP archive..
     * @param  string $fileName The document name. (required)
     *
     * @dataProvider providerGetDocumentImages
     */
    public function testGetDocumentImages($fileName)
    {
        $this->uploadFile($fileName);
        $result = self::$api->GetDocumentImages($fileName,self::$api->config['remoteFolder'],null);
        print_r($result);

        $this->assertTrue($result->isFile(),"Error result after recognize");
        $this->assertTrue($result->getSize() > 0,"Size of file is zero");

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $fileName);
    }

    public function providerGetDocumentImages()
    {
        return [
            ["test1.html.zip"],
            ["test2.html.zip"],
            ["test3.html.zip"],
            ["test4.html.zip"]
        ];
    }
}
