<?php
/**
 * ConversionApi
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

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Client\Invoker\ApiException;
use Client\Invoker\Config;
use Client\Invoker\HeaderSelector;
use Client\Invoker\ObjectSerializer;

/**
 * ConversionApi Class Doc Comment
 *
 * @category Class
 * @package  Client\Invoker\Api
 */
class ConversionApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Config
     */
    protected $config;

    /**
     * @param HeaderSelector  $selector
     */
    public function __construct( HeaderSelector $selector = null )
    {
        $this->client = Config::getClient();
        $this->config = Config::getConfig();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }


    /**
     * @return Config
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation conversionGetConvertDocumentToImage
     *
     * Convert the HTML document from the storage by its name to the specified image format.
     *
     * @param  string $name Document name. (required)
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
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function conversionGetConvertDocumentToImage($name, $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $x_resolution = null, $y_resolution = null, $folder = null, $storage = null)
    {
        list($response) = $this->conversionGetConvertDocumentToImageWithHttpInfo($name, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $x_resolution, $y_resolution, $folder, $storage);
        return $response;
    }

    /**
     * Operation conversionGetConvertDocumentToImageWithHttpInfo
     *
     * Convert the HTML document from the storage by its name to the specified image format.
     *
     * @param  string $name Document name. (required)
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
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function conversionGetConvertDocumentToImageWithHttpInfo($name, $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $x_resolution = null, $y_resolution = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->conversionGetConvertDocumentToImageRequest($name, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $x_resolution, $y_resolution, $folder, $storage);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\SplFileObject',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation conversionGetConvertDocumentToImageAsync
     *
     * Convert the HTML document from the storage by its name to the specified image format.
     *
     * @param  string $name Document name. (required)
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
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function conversionGetConvertDocumentToImageAsync($name, $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $x_resolution = null, $y_resolution = null, $folder = null, $storage = null)
    {
        return $this->conversionGetConvertDocumentToImageAsyncWithHttpInfo($name, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $x_resolution, $y_resolution, $folder, $storage)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation conversionGetConvertDocumentToImageAsyncWithHttpInfo
     *
     * Convert the HTML document from the storage by its name to the specified image format.
     *
     * @param  string $name Document name. (required)
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
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function conversionGetConvertDocumentToImageAsyncWithHttpInfo($name, $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $x_resolution = null, $y_resolution = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->conversionGetConvertDocumentToImageRequest($name, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $x_resolution, $y_resolution, $folder, $storage);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'conversionGetConvertDocumentToImage'
     *
     * @param  string $name Document name. (required)
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
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function conversionGetConvertDocumentToImageRequest($name, $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $x_resolution = null, $y_resolution = null, $folder = null, $storage = null)
    {
        // verify the required parameter 'name' is set
        if ($name === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $name when calling conversionGetConvertDocumentToImage'
            );
        }
        // verify the required parameter 'out_format' is set
        if ($out_format === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $out_format when calling conversionGetConvertDocumentToImage'
            );
        }

        $resourcePath = '/html/{name}/convert/image/{outFormat}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($width !== null) {
            $queryParams['width'] = ObjectSerializer::toQueryValue($width);
        }
        // query params
        if ($height !== null) {
            $queryParams['height'] = ObjectSerializer::toQueryValue($height);
        }
        // query params
        if ($left_margin !== null) {
            $queryParams['leftMargin'] = ObjectSerializer::toQueryValue($left_margin);
        }
        // query params
        if ($right_margin !== null) {
            $queryParams['rightMargin'] = ObjectSerializer::toQueryValue($right_margin);
        }
        // query params
        if ($top_margin !== null) {
            $queryParams['topMargin'] = ObjectSerializer::toQueryValue($top_margin);
        }
        // query params
        if ($bottom_margin !== null) {
            $queryParams['bottomMargin'] = ObjectSerializer::toQueryValue($bottom_margin);
        }
        // query params
        if ($x_resolution !== null) {
            $queryParams['xResolution'] = ObjectSerializer::toQueryValue($x_resolution);
        }
        // query params
        if ($y_resolution !== null) {
            $queryParams['yResolution'] = ObjectSerializer::toQueryValue($y_resolution);
        }
        // query params
        if ($folder !== null) {
            $queryParams['folder'] = ObjectSerializer::toQueryValue($folder);
        }
        // query params
        if ($storage !== null) {
            $queryParams['storage'] = ObjectSerializer::toQueryValue($storage);
        }

        // path params
        if ($name !== null) {
            $resourcePath = str_replace(
                '{' . 'name' . '}',
                ObjectSerializer::toPathValue($name),
                $resourcePath
            );
        }
        // path params
        if ($out_format !== null) {
            $resourcePath = str_replace(
                '{' . 'outFormat' . '}',
                ObjectSerializer::toPathValue($out_format),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['multipart/form-data']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['multipart/form-data'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation conversionGetConvertDocumentToImageByUrl
     *
     * Convert the HTML page from the web by its URL to the specified image format.
     *
     * @param  string $source_url Source page URL. (required)
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
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function conversionGetConvertDocumentToImageByUrl($source_url, $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $x_resolution = null, $y_resolution = null, $folder = null, $storage = null)
    {
        list($response) = $this->conversionGetConvertDocumentToImageByUrlWithHttpInfo($source_url, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $x_resolution, $y_resolution, $folder, $storage);
        return $response;
    }

    /**
     * Operation conversionGetConvertDocumentToImageByUrlWithHttpInfo
     *
     * Convert the HTML page from the web by its URL to the specified image format.
     *
     * @param  string $source_url Source page URL. (required)
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
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function conversionGetConvertDocumentToImageByUrlWithHttpInfo($source_url, $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $x_resolution = null, $y_resolution = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->conversionGetConvertDocumentToImageByUrlRequest($source_url, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $x_resolution, $y_resolution, $folder, $storage);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\SplFileObject',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation conversionGetConvertDocumentToImageByUrlAsync
     *
     * Convert the HTML page from the web by its URL to the specified image format.
     *
     * @param  string $source_url Source page URL. (required)
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
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function conversionGetConvertDocumentToImageByUrlAsync($source_url, $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $x_resolution = null, $y_resolution = null, $folder = null, $storage = null)
    {
        return $this->conversionGetConvertDocumentToImageByUrlAsyncWithHttpInfo($source_url, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $x_resolution, $y_resolution, $folder, $storage)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation conversionGetConvertDocumentToImageByUrlAsyncWithHttpInfo
     *
     * Convert the HTML page from the web by its URL to the specified image format.
     *
     * @param  string $source_url Source page URL. (required)
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
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function conversionGetConvertDocumentToImageByUrlAsyncWithHttpInfo($source_url, $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $x_resolution = null, $y_resolution = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->conversionGetConvertDocumentToImageByUrlRequest($source_url, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $x_resolution, $y_resolution, $folder, $storage);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'conversionGetConvertDocumentToImageByUrl'
     *
     * @param  string $source_url Source page URL. (required)
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
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function conversionGetConvertDocumentToImageByUrlRequest($source_url, $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $x_resolution = null, $y_resolution = null, $folder = null, $storage = null)
    {
        // verify the required parameter 'source_url' is set
        if ($source_url === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $source_url when calling conversionGetConvertDocumentToImageByUrl'
            );
        }
        // verify the required parameter 'out_format' is set
        if ($out_format === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $out_format when calling conversionGetConvertDocumentToImageByUrl'
            );
        }

        $resourcePath = '/html/convert/image/{outFormat}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($source_url !== null) {
            $queryParams['sourceUrl'] = ObjectSerializer::toQueryValue($source_url);
        }
        // query params
        if ($width !== null) {
            $queryParams['width'] = ObjectSerializer::toQueryValue($width);
        }
        // query params
        if ($height !== null) {
            $queryParams['height'] = ObjectSerializer::toQueryValue($height);
        }
        // query params
        if ($left_margin !== null) {
            $queryParams['leftMargin'] = ObjectSerializer::toQueryValue($left_margin);
        }
        // query params
        if ($right_margin !== null) {
            $queryParams['rightMargin'] = ObjectSerializer::toQueryValue($right_margin);
        }
        // query params
        if ($top_margin !== null) {
            $queryParams['topMargin'] = ObjectSerializer::toQueryValue($top_margin);
        }
        // query params
        if ($bottom_margin !== null) {
            $queryParams['bottomMargin'] = ObjectSerializer::toQueryValue($bottom_margin);
        }
        // query params
        if ($x_resolution !== null) {
            $queryParams['xResolution'] = ObjectSerializer::toQueryValue($x_resolution);
        }
        // query params
        if ($y_resolution !== null) {
            $queryParams['yResolution'] = ObjectSerializer::toQueryValue($y_resolution);
        }
        // query params
        if ($folder !== null) {
            $queryParams['folder'] = ObjectSerializer::toQueryValue($folder);
        }
        // query params
        if ($storage !== null) {
            $queryParams['storage'] = ObjectSerializer::toQueryValue($storage);
        }

        // path params
        if ($out_format !== null) {
            $resourcePath = str_replace(
                '{' . 'outFormat' . '}',
                ObjectSerializer::toPathValue($out_format),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['multipart/form-data']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['multipart/form-data'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation conversionGetConvertDocumentToPdf
     *
     * Convert the HTML document from the storage by its name to PDF.
     *
     * @param  string $name Document name. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function conversionGetConvertDocumentToPdf($name, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        list($response) = $this->conversionGetConvertDocumentToPdfWithHttpInfo($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);
        return $response;
    }

    /**
     * Operation conversionGetConvertDocumentToPdfWithHttpInfo
     *
     * Convert the HTML document from the storage by its name to PDF.
     *
     * @param  string $name Document name. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function conversionGetConvertDocumentToPdfWithHttpInfo($name, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->conversionGetConvertDocumentToPdfRequest($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\SplFileObject',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation conversionGetConvertDocumentToPdfAsync
     *
     * Convert the HTML document from the storage by its name to PDF.
     *
     * @param  string $name Document name. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function conversionGetConvertDocumentToPdfAsync($name, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        return $this->conversionGetConvertDocumentToPdfAsyncWithHttpInfo($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation conversionGetConvertDocumentToPdfAsyncWithHttpInfo
     *
     * Convert the HTML document from the storage by its name to PDF.
     *
     * @param  string $name Document name. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function conversionGetConvertDocumentToPdfAsyncWithHttpInfo($name, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->conversionGetConvertDocumentToPdfRequest($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'conversionGetConvertDocumentToPdf'
     *
     * @param  string $name Document name. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function conversionGetConvertDocumentToPdfRequest($name, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        // verify the required parameter 'name' is set
        if ($name === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $name when calling conversionGetConvertDocumentToPdf'
            );
        }

        $resourcePath = '/html/{name}/convert/pdf';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($width !== null) {
            $queryParams['width'] = ObjectSerializer::toQueryValue($width);
        }
        // query params
        if ($height !== null) {
            $queryParams['height'] = ObjectSerializer::toQueryValue($height);
        }
        // query params
        if ($left_margin !== null) {
            $queryParams['leftMargin'] = ObjectSerializer::toQueryValue($left_margin);
        }
        // query params
        if ($right_margin !== null) {
            $queryParams['rightMargin'] = ObjectSerializer::toQueryValue($right_margin);
        }
        // query params
        if ($top_margin !== null) {
            $queryParams['topMargin'] = ObjectSerializer::toQueryValue($top_margin);
        }
        // query params
        if ($bottom_margin !== null) {
            $queryParams['bottomMargin'] = ObjectSerializer::toQueryValue($bottom_margin);
        }
        // query params
        if ($folder !== null) {
            $queryParams['folder'] = ObjectSerializer::toQueryValue($folder);
        }
        // query params
        if ($storage !== null) {
            $queryParams['storage'] = ObjectSerializer::toQueryValue($storage);
        }

        // path params
        if ($name !== null) {
            $resourcePath = str_replace(
                '{' . 'name' . '}',
                ObjectSerializer::toPathValue($name),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['multipart/form-data']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['multipart/form-data'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation conversionGetConvertDocumentToPdfByUrl
     *
     * Convert the HTML page from the web by its URL to PDF.
     *
     * @param  string $source_url Source page URL. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function conversionGetConvertDocumentToPdfByUrl($source_url, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        list($response) = $this->conversionGetConvertDocumentToPdfByUrlWithHttpInfo($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);
        return $response;
    }

    /**
     * Operation conversionGetConvertDocumentToPdfByUrlWithHttpInfo
     *
     * Convert the HTML page from the web by its URL to PDF.
     *
     * @param  string $source_url Source page URL. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function conversionGetConvertDocumentToPdfByUrlWithHttpInfo($source_url, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->conversionGetConvertDocumentToPdfByUrlRequest($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\SplFileObject',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation conversionGetConvertDocumentToPdfByUrlAsync
     *
     * Convert the HTML page from the web by its URL to PDF.
     *
     * @param  string $source_url Source page URL. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function conversionGetConvertDocumentToPdfByUrlAsync($source_url, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        return $this->conversionGetConvertDocumentToPdfByUrlAsyncWithHttpInfo($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation conversionGetConvertDocumentToPdfByUrlAsyncWithHttpInfo
     *
     * Convert the HTML page from the web by its URL to PDF.
     *
     * @param  string $source_url Source page URL. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function conversionGetConvertDocumentToPdfByUrlAsyncWithHttpInfo($source_url, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->conversionGetConvertDocumentToPdfByUrlRequest($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'conversionGetConvertDocumentToPdfByUrl'
     *
     * @param  string $source_url Source page URL. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function conversionGetConvertDocumentToPdfByUrlRequest($source_url, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        // verify the required parameter 'source_url' is set
        if ($source_url === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $source_url when calling conversionGetConvertDocumentToPdfByUrl'
            );
        }

        $resourcePath = '/html/convert/pdf';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($source_url !== null) {
            $queryParams['sourceUrl'] = ObjectSerializer::toQueryValue($source_url);
        }
        // query params
        if ($width !== null) {
            $queryParams['width'] = ObjectSerializer::toQueryValue($width);
        }
        // query params
        if ($height !== null) {
            $queryParams['height'] = ObjectSerializer::toQueryValue($height);
        }
        // query params
        if ($left_margin !== null) {
            $queryParams['leftMargin'] = ObjectSerializer::toQueryValue($left_margin);
        }
        // query params
        if ($right_margin !== null) {
            $queryParams['rightMargin'] = ObjectSerializer::toQueryValue($right_margin);
        }
        // query params
        if ($top_margin !== null) {
            $queryParams['topMargin'] = ObjectSerializer::toQueryValue($top_margin);
        }
        // query params
        if ($bottom_margin !== null) {
            $queryParams['bottomMargin'] = ObjectSerializer::toQueryValue($bottom_margin);
        }
        // query params
        if ($folder !== null) {
            $queryParams['folder'] = ObjectSerializer::toQueryValue($folder);
        }
        // query params
        if ($storage !== null) {
            $queryParams['storage'] = ObjectSerializer::toQueryValue($storage);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['multipart/form-data']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['multipart/form-data'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation conversionGetConvertDocumentToXps
     *
     * Convert the HTML document from the storage by its name to XPS.
     *
     * @param  string $name Document name. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function conversionGetConvertDocumentToXps($name, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        list($response) = $this->conversionGetConvertDocumentToXpsWithHttpInfo($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);
        return $response;
    }

    /**
     * Operation conversionGetConvertDocumentToXpsWithHttpInfo
     *
     * Convert the HTML document from the storage by its name to XPS.
     *
     * @param  string $name Document name. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function conversionGetConvertDocumentToXpsWithHttpInfo($name, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->conversionGetConvertDocumentToXpsRequest($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\SplFileObject',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation conversionGetConvertDocumentToXpsAsync
     *
     * Convert the HTML document from the storage by its name to XPS.
     *
     * @param  string $name Document name. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function conversionGetConvertDocumentToXpsAsync($name, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        return $this->conversionGetConvertDocumentToXpsAsyncWithHttpInfo($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation conversionGetConvertDocumentToXpsAsyncWithHttpInfo
     *
     * Convert the HTML document from the storage by its name to XPS.
     *
     * @param  string $name Document name. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function conversionGetConvertDocumentToXpsAsyncWithHttpInfo($name, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->conversionGetConvertDocumentToXpsRequest($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'conversionGetConvertDocumentToXps'
     *
     * @param  string $name Document name. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function conversionGetConvertDocumentToXpsRequest($name, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        // verify the required parameter 'name' is set
        if ($name === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $name when calling conversionGetConvertDocumentToXps'
            );
        }

        $resourcePath = '/html/{name}/convert/xps';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($width !== null) {
            $queryParams['width'] = ObjectSerializer::toQueryValue($width);
        }
        // query params
        if ($height !== null) {
            $queryParams['height'] = ObjectSerializer::toQueryValue($height);
        }
        // query params
        if ($left_margin !== null) {
            $queryParams['leftMargin'] = ObjectSerializer::toQueryValue($left_margin);
        }
        // query params
        if ($right_margin !== null) {
            $queryParams['rightMargin'] = ObjectSerializer::toQueryValue($right_margin);
        }
        // query params
        if ($top_margin !== null) {
            $queryParams['topMargin'] = ObjectSerializer::toQueryValue($top_margin);
        }
        // query params
        if ($bottom_margin !== null) {
            $queryParams['bottomMargin'] = ObjectSerializer::toQueryValue($bottom_margin);
        }
        // query params
        if ($folder !== null) {
            $queryParams['folder'] = ObjectSerializer::toQueryValue($folder);
        }
        // query params
        if ($storage !== null) {
            $queryParams['storage'] = ObjectSerializer::toQueryValue($storage);
        }

        // path params
        if ($name !== null) {
            $resourcePath = str_replace(
                '{' . 'name' . '}',
                ObjectSerializer::toPathValue($name),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['multipart/form-data']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['multipart/form-data'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation conversionGetConvertDocumentToXpsByUrl
     *
     * Convert the HTML page from the web by its URL to XPS.
     *
     * @param  string $source_url Source page URL. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function conversionGetConvertDocumentToXpsByUrl($source_url, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        list($response) = $this->conversionGetConvertDocumentToXpsByUrlWithHttpInfo($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);
        return $response;
    }

    /**
     * Operation conversionGetConvertDocumentToXpsByUrlWithHttpInfo
     *
     * Convert the HTML page from the web by its URL to XPS.
     *
     * @param  string $source_url Source page URL. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function conversionGetConvertDocumentToXpsByUrlWithHttpInfo($source_url, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->conversionGetConvertDocumentToXpsByUrlRequest($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\SplFileObject',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation conversionGetConvertDocumentToXpsByUrlAsync
     *
     * Convert the HTML page from the web by its URL to XPS.
     *
     * @param  string $source_url Source page URL. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function conversionGetConvertDocumentToXpsByUrlAsync($source_url, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        return $this->conversionGetConvertDocumentToXpsByUrlAsyncWithHttpInfo($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation conversionGetConvertDocumentToXpsByUrlAsyncWithHttpInfo
     *
     * Convert the HTML page from the web by its URL to XPS.
     *
     * @param  string $source_url Source page URL. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function conversionGetConvertDocumentToXpsByUrlAsyncWithHttpInfo($source_url, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->conversionGetConvertDocumentToXpsByUrlRequest($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'conversionGetConvertDocumentToXpsByUrl'
     *
     * @param  string $source_url Source page URL. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function conversionGetConvertDocumentToXpsByUrlRequest($source_url, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        // verify the required parameter 'source_url' is set
        if ($source_url === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $source_url when calling conversionGetConvertDocumentToXpsByUrl'
            );
        }

        $resourcePath = '/html/convert/xps';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($source_url !== null) {
            $queryParams['sourceUrl'] = ObjectSerializer::toQueryValue($source_url);
        }
        // query params
        if ($width !== null) {
            $queryParams['width'] = ObjectSerializer::toQueryValue($width);
        }
        // query params
        if ($height !== null) {
            $queryParams['height'] = ObjectSerializer::toQueryValue($height);
        }
        // query params
        if ($left_margin !== null) {
            $queryParams['leftMargin'] = ObjectSerializer::toQueryValue($left_margin);
        }
        // query params
        if ($right_margin !== null) {
            $queryParams['rightMargin'] = ObjectSerializer::toQueryValue($right_margin);
        }
        // query params
        if ($top_margin !== null) {
            $queryParams['topMargin'] = ObjectSerializer::toQueryValue($top_margin);
        }
        // query params
        if ($bottom_margin !== null) {
            $queryParams['bottomMargin'] = ObjectSerializer::toQueryValue($bottom_margin);
        }
        // query params
        if ($folder !== null) {
            $queryParams['folder'] = ObjectSerializer::toQueryValue($folder);
        }
        // query params
        if ($storage !== null) {
            $queryParams['storage'] = ObjectSerializer::toQueryValue($storage);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['multipart/form-data']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['multipart/form-data'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation conversionPutConvertDocumentToImage
     *
     * Convert the HTML document to the specified image format. Input document should be passed in the request content.
     *
     * @param  string $out_format Output image format. (required)
     * @param  string $out_path The path to resulting file. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left image margin. (optional)
     * @param  int $right_margin Right image margin. (optional)
     * @param  int $top_margin Top image margin. (optional)
     * @param  int $bottom_margin Bottom image margin. (optional)
     * @param  int $x_resolution Horizontal image resolution; 96 ppi by default. (optional)
     * @param  int $y_resolution Vertical image resolution; 96 ppi by default. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function conversionPutConvertDocumentToImage($out_format, $out_path, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $x_resolution = null, $y_resolution = null, $storage = null)
    {
        list($response) = $this->conversionPutConvertDocumentToImageWithHttpInfo($out_format, $out_path, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $x_resolution, $y_resolution, $storage);
        return $response;
    }

    /**
     * Operation conversionPutConvertDocumentToImageWithHttpInfo
     *
     * Convert the HTML document to the specified image format. Input document should be passed in the request content.
     *
     * @param  string $out_format Output image format. (required)
     * @param  string $out_path The path to resulting file. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left image margin. (optional)
     * @param  int $right_margin Right image margin. (optional)
     * @param  int $top_margin Top image margin. (optional)
     * @param  int $bottom_margin Bottom image margin. (optional)
     * @param  int $x_resolution Horizontal image resolution; 96 ppi by default. (optional)
     * @param  int $y_resolution Vertical image resolution; 96 ppi by default. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function conversionPutConvertDocumentToImageWithHttpInfo($out_format, $out_path, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $x_resolution = null, $y_resolution = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->conversionPutConvertDocumentToImageRequest($out_format, $out_path, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $x_resolution, $y_resolution, $storage);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\SplFileObject',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation conversionPutConvertDocumentToImageAsync
     *
     * Convert the HTML document to the specified image format. Input document should be passed in the request content.
     *
     * @param  string $out_format Output image format. (required)
     * @param  string $out_path The path to resulting file. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left image margin. (optional)
     * @param  int $right_margin Right image margin. (optional)
     * @param  int $top_margin Top image margin. (optional)
     * @param  int $bottom_margin Bottom image margin. (optional)
     * @param  int $x_resolution Horizontal image resolution; 96 ppi by default. (optional)
     * @param  int $y_resolution Vertical image resolution; 96 ppi by default. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function conversionPutConvertDocumentToImageAsync($out_format, $out_path, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $x_resolution = null, $y_resolution = null, $storage = null)
    {
        return $this->conversionPutConvertDocumentToImageAsyncWithHttpInfo($out_format, $out_path, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $x_resolution, $y_resolution, $storage)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation conversionPutConvertDocumentToImageAsyncWithHttpInfo
     *
     * Convert the HTML document to the specified image format. Input document should be passed in the request content.
     *
     * @param  string $out_format Output image format. (required)
     * @param  string $out_path The path to resulting file. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left image margin. (optional)
     * @param  int $right_margin Right image margin. (optional)
     * @param  int $top_margin Top image margin. (optional)
     * @param  int $bottom_margin Bottom image margin. (optional)
     * @param  int $x_resolution Horizontal image resolution; 96 ppi by default. (optional)
     * @param  int $y_resolution Vertical image resolution; 96 ppi by default. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function conversionPutConvertDocumentToImageAsyncWithHttpInfo($out_format, $out_path, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $x_resolution = null, $y_resolution = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->conversionPutConvertDocumentToImageRequest($out_format, $out_path, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $x_resolution, $y_resolution, $storage);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'conversionPutConvertDocumentToImage'
     *
     * @param  string $out_format Output image format. (required)
     * @param  string $out_path The path to resulting file. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left image margin. (optional)
     * @param  int $right_margin Right image margin. (optional)
     * @param  int $top_margin Top image margin. (optional)
     * @param  int $bottom_margin Bottom image margin. (optional)
     * @param  int $x_resolution Horizontal image resolution; 96 ppi by default. (optional)
     * @param  int $y_resolution Vertical image resolution; 96 ppi by default. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function conversionPutConvertDocumentToImageRequest($out_format, $out_path, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $x_resolution = null, $y_resolution = null, $storage = null)
    {
        // verify the required parameter 'out_format' is set
        if ($out_format === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $out_format when calling conversionPutConvertDocumentToImage'
            );
        }
        // verify the required parameter 'out_path' is set
        if ($out_path === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $out_path when calling conversionPutConvertDocumentToImage'
            );
        }

        $resourcePath = '/html/convert/image/{outFormat}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($out_path !== null) {
            $queryParams['outPath'] = ObjectSerializer::toQueryValue($out_path);
        }
        // query params
        if ($width !== null) {
            $queryParams['width'] = ObjectSerializer::toQueryValue($width);
        }
        // query params
        if ($height !== null) {
            $queryParams['height'] = ObjectSerializer::toQueryValue($height);
        }
        // query params
        if ($left_margin !== null) {
            $queryParams['leftMargin'] = ObjectSerializer::toQueryValue($left_margin);
        }
        // query params
        if ($right_margin !== null) {
            $queryParams['rightMargin'] = ObjectSerializer::toQueryValue($right_margin);
        }
        // query params
        if ($top_margin !== null) {
            $queryParams['topMargin'] = ObjectSerializer::toQueryValue($top_margin);
        }
        // query params
        if ($bottom_margin !== null) {
            $queryParams['bottomMargin'] = ObjectSerializer::toQueryValue($bottom_margin);
        }
        // query params
        if ($x_resolution !== null) {
            $queryParams['xResolution'] = ObjectSerializer::toQueryValue($x_resolution);
        }
        // query params
        if ($y_resolution !== null) {
            $queryParams['yResolution'] = ObjectSerializer::toQueryValue($y_resolution);
        }
        // query params
        if ($storage !== null) {
            $queryParams['storage'] = ObjectSerializer::toQueryValue($storage);
        }

        // path params
        if ($out_format !== null) {
            $resourcePath = str_replace(
                '{' . 'outFormat' . '}',
                ObjectSerializer::toPathValue($out_format),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['multipart/form-data']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'PUT',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation conversionPutConvertDocumentToPdf
     *
     * Convert the HTML document to PDF. Input document should be passed in the request content.
     *
     * @param  string $out_path The path to resulting file. (required)
     * @param  int $width The page width of the resulting document. (optional)
     * @param  int $height The page height of the resulting document. (optional)
     * @param  int $left_margin The left margin of the resulting document page. (optional)
     * @param  int $right_margin The right margin of the resulting document page. (optional)
     * @param  int $top_margin The top margin of the resulting document page. (optional)
     * @param  int $bottom_margin The bottom margin of the resulting document page. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function conversionPutConvertDocumentToPdf($out_path, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $storage = null)
    {
        list($response) = $this->conversionPutConvertDocumentToPdfWithHttpInfo($out_path, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $storage);
        return $response;
    }

    /**
     * Operation conversionPutConvertDocumentToPdfWithHttpInfo
     *
     * Convert the HTML document to PDF. Input document should be passed in the request content.
     *
     * @param  string $out_path The path to resulting file. (required)
     * @param  int $width The page width of the resulting document. (optional)
     * @param  int $height The page height of the resulting document. (optional)
     * @param  int $left_margin The left margin of the resulting document page. (optional)
     * @param  int $right_margin The right margin of the resulting document page. (optional)
     * @param  int $top_margin The top margin of the resulting document page. (optional)
     * @param  int $bottom_margin The bottom margin of the resulting document page. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function conversionPutConvertDocumentToPdfWithHttpInfo($out_path, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->conversionPutConvertDocumentToPdfRequest($out_path, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $storage);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\SplFileObject',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation conversionPutConvertDocumentToPdfAsync
     *
     * Convert the HTML document to PDF. Input document should be passed in the request content.
     *
     * @param  string $out_path The path to resulting file. (required)
     * @param  int $width The page width of the resulting document. (optional)
     * @param  int $height The page height of the resulting document. (optional)
     * @param  int $left_margin The left margin of the resulting document page. (optional)
     * @param  int $right_margin The right margin of the resulting document page. (optional)
     * @param  int $top_margin The top margin of the resulting document page. (optional)
     * @param  int $bottom_margin The bottom margin of the resulting document page. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function conversionPutConvertDocumentToPdfAsync($out_path, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $storage = null)
    {
        return $this->conversionPutConvertDocumentToPdfAsyncWithHttpInfo($out_path, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $storage)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation conversionPutConvertDocumentToPdfAsyncWithHttpInfo
     *
     * Convert the HTML document to PDF. Input document should be passed in the request content.
     *
     * @param  string $out_path The path to resulting file. (required)
     * @param  int $width The page width of the resulting document. (optional)
     * @param  int $height The page height of the resulting document. (optional)
     * @param  int $left_margin The left margin of the resulting document page. (optional)
     * @param  int $right_margin The right margin of the resulting document page. (optional)
     * @param  int $top_margin The top margin of the resulting document page. (optional)
     * @param  int $bottom_margin The bottom margin of the resulting document page. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function conversionPutConvertDocumentToPdfAsyncWithHttpInfo($out_path, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->conversionPutConvertDocumentToPdfRequest($out_path, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $storage);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'conversionPutConvertDocumentToPdf'
     *
     * @param  string $out_path The path to resulting file. (required)
     * @param  int $width The page width of the resulting document. (optional)
     * @param  int $height The page height of the resulting document. (optional)
     * @param  int $left_margin The left margin of the resulting document page. (optional)
     * @param  int $right_margin The right margin of the resulting document page. (optional)
     * @param  int $top_margin The top margin of the resulting document page. (optional)
     * @param  int $bottom_margin The bottom margin of the resulting document page. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function conversionPutConvertDocumentToPdfRequest($out_path, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $storage = null)
    {
        // verify the required parameter 'out_path' is set
        if ($out_path === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $out_path when calling conversionPutConvertDocumentToPdf'
            );
        }

        $resourcePath = '/html/convert/pdf';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($out_path !== null) {
            $queryParams['outPath'] = ObjectSerializer::toQueryValue($out_path);
        }
        // query params
        if ($width !== null) {
            $queryParams['width'] = ObjectSerializer::toQueryValue($width);
        }
        // query params
        if ($height !== null) {
            $queryParams['height'] = ObjectSerializer::toQueryValue($height);
        }
        // query params
        if ($left_margin !== null) {
            $queryParams['leftMargin'] = ObjectSerializer::toQueryValue($left_margin);
        }
        // query params
        if ($right_margin !== null) {
            $queryParams['rightMargin'] = ObjectSerializer::toQueryValue($right_margin);
        }
        // query params
        if ($top_margin !== null) {
            $queryParams['topMargin'] = ObjectSerializer::toQueryValue($top_margin);
        }
        // query params
        if ($bottom_margin !== null) {
            $queryParams['bottomMargin'] = ObjectSerializer::toQueryValue($bottom_margin);
        }
        // query params
        if ($storage !== null) {
            $queryParams['storage'] = ObjectSerializer::toQueryValue($storage);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['multipart/form-data']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'PUT',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation conversionPutConvertDocumentToXps
     *
     * Convert the HTML document to XPS. Input document should be passed in the request content.
     *
     * @param  string $out_path The path to resulting file. (required)
     * @param  int $width The page width of the resulting document. (optional)
     * @param  int $height The page height of the resulting document. (optional)
     * @param  int $left_margin The left margin of the resulting document page. (optional)
     * @param  int $right_margin The right margin of the resulting document page. (optional)
     * @param  int $top_margin The top margin of the resulting document page. (optional)
     * @param  int $bottom_margin The bottom margin of the resulting document page. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function conversionPutConvertDocumentToXps($out_path, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $storage = null)
    {
        list($response) = $this->conversionPutConvertDocumentToXpsWithHttpInfo($out_path, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $storage);
        return $response;
    }

    /**
     * Operation conversionPutConvertDocumentToXpsWithHttpInfo
     *
     * Convert the HTML document to XPS. Input document should be passed in the request content.
     *
     * @param  string $out_path The path to resulting file. (required)
     * @param  int $width The page width of the resulting document. (optional)
     * @param  int $height The page height of the resulting document. (optional)
     * @param  int $left_margin The left margin of the resulting document page. (optional)
     * @param  int $right_margin The right margin of the resulting document page. (optional)
     * @param  int $top_margin The top margin of the resulting document page. (optional)
     * @param  int $bottom_margin The bottom margin of the resulting document page. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function conversionPutConvertDocumentToXpsWithHttpInfo($out_path, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->conversionPutConvertDocumentToXpsRequest($out_path, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $storage);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\SplFileObject',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation conversionPutConvertDocumentToXpsAsync
     *
     * Convert the HTML document to XPS. Input document should be passed in the request content.
     *
     * @param  string $out_path The path to resulting file. (required)
     * @param  int $width The page width of the resulting document. (optional)
     * @param  int $height The page height of the resulting document. (optional)
     * @param  int $left_margin The left margin of the resulting document page. (optional)
     * @param  int $right_margin The right margin of the resulting document page. (optional)
     * @param  int $top_margin The top margin of the resulting document page. (optional)
     * @param  int $bottom_margin The bottom margin of the resulting document page. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function conversionPutConvertDocumentToXpsAsync($out_path, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $storage = null)
    {
        return $this->conversionPutConvertDocumentToXpsAsyncWithHttpInfo($out_path, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $storage)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation conversionPutConvertDocumentToXpsAsyncWithHttpInfo
     *
     * Convert the HTML document to XPS. Input document should be passed in the request content.
     *
     * @param  string $out_path The path to resulting file. (required)
     * @param  int $width The page width of the resulting document. (optional)
     * @param  int $height The page height of the resulting document. (optional)
     * @param  int $left_margin The left margin of the resulting document page. (optional)
     * @param  int $right_margin The right margin of the resulting document page. (optional)
     * @param  int $top_margin The top margin of the resulting document page. (optional)
     * @param  int $bottom_margin The bottom margin of the resulting document page. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function conversionPutConvertDocumentToXpsAsyncWithHttpInfo($out_path, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->conversionPutConvertDocumentToXpsRequest($out_path, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $storage);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'conversionPutConvertDocumentToXps'
     *
     * @param  string $out_path The path to resulting file. (required)
     * @param  int $width The page width of the resulting document. (optional)
     * @param  int $height The page height of the resulting document. (optional)
     * @param  int $left_margin The left margin of the resulting document page. (optional)
     * @param  int $right_margin The right margin of the resulting document page. (optional)
     * @param  int $top_margin The top margin of the resulting document page. (optional)
     * @param  int $bottom_margin The bottom margin of the resulting document page. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function conversionPutConvertDocumentToXpsRequest($out_path, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $storage = null)
    {
        // verify the required parameter 'out_path' is set
        if ($out_path === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $out_path when calling conversionPutConvertDocumentToXps'
            );
        }

        $resourcePath = '/html/convert/xps';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($out_path !== null) {
            $queryParams['outPath'] = ObjectSerializer::toQueryValue($out_path);
        }
        // query params
        if ($width !== null) {
            $queryParams['width'] = ObjectSerializer::toQueryValue($width);
        }
        // query params
        if ($height !== null) {
            $queryParams['height'] = ObjectSerializer::toQueryValue($height);
        }
        // query params
        if ($left_margin !== null) {
            $queryParams['leftMargin'] = ObjectSerializer::toQueryValue($left_margin);
        }
        // query params
        if ($right_margin !== null) {
            $queryParams['rightMargin'] = ObjectSerializer::toQueryValue($right_margin);
        }
        // query params
        if ($top_margin !== null) {
            $queryParams['topMargin'] = ObjectSerializer::toQueryValue($top_margin);
        }
        // query params
        if ($bottom_margin !== null) {
            $queryParams['bottomMargin'] = ObjectSerializer::toQueryValue($bottom_margin);
        }
        // query params
        if ($storage !== null) {
            $queryParams['storage'] = ObjectSerializer::toQueryValue($storage);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['multipart/form-data']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'PUT',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
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
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
