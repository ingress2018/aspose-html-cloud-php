<?php
/*
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose" file="TranslationApiTest.php">
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
 * TranslationApiTest Class Doc Comment
 *
 * @category Class
 * @package  Client\Invoker\Api
 */
class TranslationApiTest extends BaseTest
{

    /**
     * Test case for GetTranslateDocument
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
    public function testGetTranslateDocument($fileName, $src_lang, $res_lang, $storage = null, $folder = null)
    {
        $this->uploadFile($fileName);
        $folder = $folder ?: self::$api->config['remoteFolder'];


        //Request to server Api
        $result = self::$api->GetTranslateDocument($fileName, $src_lang, $res_lang, $storage, $folder);

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
     * Test case for GetTranslateDocumentByUrl
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
    public function testGetTranslateDocumentByUrl($source_url, $src_lang, $res_lang)
    {
        //Request to server Api
        $result = self::$api->GetTranslateDocumentByUrl($source_url, $src_lang, $res_lang);

        $this->assertTrue($result->isFile(),"Error result after recognize");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . "TranslateUrl_" . $src_lang . "_" . $res_lang . ".zip");
    }

    public function providerTranslateUrl()
    {
        return [
            ["https://www.le.ac.uk/oerresources/bdra/html/page_02.htm","en","de"],
    		["https://www.le.ac.uk/oerresources/bdra/html/page_01.htm","en","fr"]
        ];
    }
}
