<?php
/*
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose" file="HtmlApi.php">
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

use GuzzleHttp\ClientInterface;
use GuzzleHttp\RequestOptions;
use Client\Invoker\Config;
use Client\Invoker\HeaderSelector;

require_once('ConversionApi.php');
require_once('DocumentApi.php');
require_once('OcrApi.php');
require_once('TranslationApi.php');

/**
 * HtmlApi Class Doc Comment
 *
 * @category Class
 * @package  Client\Invoker\Api
 */
class HtmlApi
{
    use ConversionApi,DocumentApi,OcrApi,TranslationApi;

    /**
     * @var ClientInterface
     */
    public $client;

    /**
     * @var Config
     */
    public $config;

    /**
     * @param HeaderSelector $selector
     */
    public function __construct(HeaderSelector $selector = null)
    {
        $this->client = Config::getClient();
        $this->config = Config::getConfig();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config['debug']) {
            $options[RequestOptions::DEBUG] = fopen($this->config['debugFile'], 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config['debugFile']);
            }
        }

        return $options;
    }
}