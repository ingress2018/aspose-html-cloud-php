<?php
/**
 * HtmlApi
 * PHP version 5
 *
 * @category Class
 * @package  Client\Invoker\Api
 */

/**
 * Aspose.HTML for Cloud API Reference
 *
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