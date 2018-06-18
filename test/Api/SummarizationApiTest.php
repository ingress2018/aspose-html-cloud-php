<?php
/*
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose" file="SummarizationApiTest.php">
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
 * SummarizationApiTest Class Doc Comment
 *
 * @category Class
 * @package  Client\Invoker\Api
 */
class SummarizationApiTest extends BaseTest
{


    /**
     * Test case for GetDetectHtmlKeywords
     *
     * Get the HTML document keywords using the keyword detection service..
     *
     * @dataProvider providerGetDetectHtmlKeywords
     *
     */
    public function testGetDetectHtmlKeywords($fileName)
    {
        $this->uploadFile($fileName);
        $folder = self::$api->config['remoteFolder'];
        $storage = null;


        //Request to server Api
        $result = self::$api->GetDetectHtmlKeywords($fileName, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after recognize");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . "Keyword_" . $fileName . ".json");
    }


    public function providerGetDetectHtmlKeywords()
    {
        return [
            ["test_en.html"],
            ["testpage3.html"]
        ];
    }


    /**
     * Test case for GetDetectHtmlKeywordsByUrl
     *
     * Get the keywords from HTML document from Web specified by its URL using the keyword detection service.
     *
     * @dataProvider providerGetDetectHtmlKeywordsByUrl
     *
     */
    public function testGetDetectHtmlKeywordsByUrl($source_url, $num_test)
    {
        //Request to server Api
        $result = self::$api->GetDetectHtmlKeywordsByUrl($source_url);

        $this->assertTrue($result->isFile(),"Error result after recognize");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . "KeywordUrl_" . $num_test  . ".json");
    }

    public function providerGetDetectHtmlKeywordsByUrl()
    {
        return [
            ["https://www.le.ac.uk/oerresources/bdra/html/page_01.htm", 1],
            ["https://www.le.ac.uk/oerresources/bdra/html/page_02.htm", 2],
            ["https://www.le.ac.uk/oerresources/bdra/html/page_03.htm", 3]
        ];
    }

}
