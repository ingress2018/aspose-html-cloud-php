<?php
/*
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose" file="ConversionApi.php">
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


trait ConversionApi
{
    /**
     * Operation GetConvertDocumentToImage
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
    public function GetConvertDocumentToImage($name, $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $x_resolution = null, $y_resolution = null, $folder = null, $storage = null)
    {
        list($response) = $this->GetConvertDocumentToImageWithHttpInfo($name, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $x_resolution, $y_resolution, $folder, $storage);
        return $response;
    }

    /**
     * Operation GetConvertDocumentToImageWithHttpInfo
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
    public function GetConvertDocumentToImageWithHttpInfo($name, $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $x_resolution = null, $y_resolution = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->GetConvertDocumentToImageRequest($name, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $x_resolution, $y_resolution, $folder, $storage);

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
     * Operation GetConvertDocumentToImageAsync
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
    public function GetConvertDocumentToImageAsync($name, $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $x_resolution = null, $y_resolution = null, $folder = null, $storage = null)
    {
        return $this->GetConvertDocumentToImageAsyncWithHttpInfo($name, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $x_resolution, $y_resolution, $folder, $storage)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation GetConvertDocumentToImageAsyncWithHttpInfo
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
    public function GetConvertDocumentToImageAsyncWithHttpInfo($name, $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $x_resolution = null, $y_resolution = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->GetConvertDocumentToImageRequest($name, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $x_resolution, $y_resolution, $folder, $storage);

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
     * Create request for operation 'GetConvertDocumentToImage'
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
    protected function GetConvertDocumentToImageRequest($name, $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $x_resolution = null, $y_resolution = null, $folder = null, $storage = null)
    {
        // verify the required parameter 'name' is set
        if ($name === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $name when calling GetConvertDocumentToImage'
            );
        }
        // verify the required parameter 'out_format' is set
        if ($out_format === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $out_format when calling GetConvertDocumentToImage'
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
        if ($this->config['defaultUserAgent']) {
            $defaultHeaders['User-Agent'] = $this->config['defaultUserAgent'];
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation GetConvertDocumentToImageByUrl
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
    public function GetConvertDocumentToImageByUrl($source_url, $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $x_resolution = null, $y_resolution = null, $folder = null, $storage = null)
    {
        list($response) = $this->GetConvertDocumentToImageByUrlWithHttpInfo($source_url, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $x_resolution, $y_resolution, $folder, $storage);
        return $response;
    }

    /**
     * Operation GetConvertDocumentToImageByUrlWithHttpInfo
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
    public function GetConvertDocumentToImageByUrlWithHttpInfo($source_url, $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $x_resolution = null, $y_resolution = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->GetConvertDocumentToImageByUrlRequest($source_url, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $x_resolution, $y_resolution, $folder, $storage);

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
     * Operation GetConvertDocumentToImageByUrlAsync
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
    public function GetConvertDocumentToImageByUrlAsync($source_url, $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $x_resolution = null, $y_resolution = null, $folder = null, $storage = null)
    {
        return $this->GetConvertDocumentToImageByUrlAsyncWithHttpInfo($source_url, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $x_resolution, $y_resolution, $folder, $storage)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation GetConvertDocumentToImageByUrlAsyncWithHttpInfo
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
    public function GetConvertDocumentToImageByUrlAsyncWithHttpInfo($source_url, $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $x_resolution = null, $y_resolution = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->GetConvertDocumentToImageByUrlRequest($source_url, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $x_resolution, $y_resolution, $folder, $storage);

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
     * Create request for operation 'GetConvertDocumentToImageByUrl'
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
    protected function GetConvertDocumentToImageByUrlRequest($source_url, $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $x_resolution = null, $y_resolution = null, $folder = null, $storage = null)
    {
        // verify the required parameter 'source_url' is set
        if ($source_url === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $source_url when calling GetConvertDocumentToImageByUrl'
            );
        }
        // verify the required parameter 'out_format' is set
        if ($out_format === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $out_format when calling GetConvertDocumentToImageByUrl'
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
        if ($this->config['defaultUserAgent']) {
            $defaultHeaders['User-Agent'] = $this->config['defaultUserAgent'];
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation GetConvertDocumentToPdf
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
    public function GetConvertDocumentToPdf($name, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        list($response) = $this->GetConvertDocumentToPdfWithHttpInfo($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);
        return $response;
    }

    /**
     * Operation GetConvertDocumentToPdfWithHttpInfo
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
    public function GetConvertDocumentToPdfWithHttpInfo($name, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->GetConvertDocumentToPdfRequest($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

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
     * Operation GetConvertDocumentToPdfAsync
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
    public function GetConvertDocumentToPdfAsync($name, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        return $this->GetConvertDocumentToPdfAsyncWithHttpInfo($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation GetConvertDocumentToPdfAsyncWithHttpInfo
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
    public function GetConvertDocumentToPdfAsyncWithHttpInfo($name, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->GetConvertDocumentToPdfRequest($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

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
     * Create request for operation 'GetConvertDocumentToPdf'
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
    protected function GetConvertDocumentToPdfRequest($name, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        // verify the required parameter 'name' is set
        if ($name === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $name when calling GetConvertDocumentToPdf'
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
        if ($this->config['defaultUserAgent']) {
            $defaultHeaders['User-Agent'] = $this->config['defaultUserAgent'];
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation GetConvertDocumentToPdfByUrl
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
    public function GetConvertDocumentToPdfByUrl($source_url, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        list($response) = $this->GetConvertDocumentToPdfByUrlWithHttpInfo($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);
        return $response;
    }

    /**
     * Operation GetConvertDocumentToPdfByUrlWithHttpInfo
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
    public function GetConvertDocumentToPdfByUrlWithHttpInfo($source_url, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->GetConvertDocumentToPdfByUrlRequest($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

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
     * Operation GetConvertDocumentToPdfByUrlAsync
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
    public function GetConvertDocumentToPdfByUrlAsync($source_url, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        return $this->GetConvertDocumentToPdfByUrlAsyncWithHttpInfo($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation GetConvertDocumentToPdfByUrlAsyncWithHttpInfo
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
    public function GetConvertDocumentToPdfByUrlAsyncWithHttpInfo($source_url, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->GetConvertDocumentToPdfByUrlRequest($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

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
     * Create request for operation 'GetConvertDocumentToPdfByUrl'
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
    protected function GetConvertDocumentToPdfByUrlRequest($source_url, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        // verify the required parameter 'source_url' is set
        if ($source_url === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $source_url when calling GetConvertDocumentToPdfByUrl'
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
        if ($this->config['defaultUserAgent']) {
            $defaultHeaders['User-Agent'] = $this->config['defaultUserAgent'];
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation GetConvertDocumentToXps
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
    public function GetConvertDocumentToXps($name, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        list($response) = $this->GetConvertDocumentToXpsWithHttpInfo($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);
        return $response;
    }

    /**
     * Operation GetConvertDocumentToXpsWithHttpInfo
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
    public function GetConvertDocumentToXpsWithHttpInfo($name, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->GetConvertDocumentToXpsRequest($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

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
     * Operation GetConvertDocumentToXpsAsync
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
    public function GetConvertDocumentToXpsAsync($name, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        return $this->GetConvertDocumentToXpsAsyncWithHttpInfo($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation GetConvertDocumentToXpsAsyncWithHttpInfo
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
    public function GetConvertDocumentToXpsAsyncWithHttpInfo($name, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->GetConvertDocumentToXpsRequest($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

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
     * Create request for operation 'GetConvertDocumentToXps'
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
    protected function GetConvertDocumentToXpsRequest($name, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        // verify the required parameter 'name' is set
        if ($name === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $name when calling GetConvertDocumentToXps'
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
        if ($this->config['defaultUserAgent']) {
            $defaultHeaders['User-Agent'] = $this->config['defaultUserAgent'];
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation GetConvertDocumentToXpsByUrl
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
    public function GetConvertDocumentToXpsByUrl($source_url, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        list($response) = $this->GetConvertDocumentToXpsByUrlWithHttpInfo($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);
        return $response;
    }

    /**
     * Operation GetConvertDocumentToXpsByUrlWithHttpInfo
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
    public function GetConvertDocumentToXpsByUrlWithHttpInfo($source_url, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->GetConvertDocumentToXpsByUrlRequest($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

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
     * Operation GetConvertDocumentToXpsByUrlAsync
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
    public function GetConvertDocumentToXpsByUrlAsync($source_url, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        return $this->GetConvertDocumentToXpsByUrlAsyncWithHttpInfo($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation GetConvertDocumentToXpsByUrlAsyncWithHttpInfo
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
    public function GetConvertDocumentToXpsByUrlAsyncWithHttpInfo($source_url, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->GetConvertDocumentToXpsByUrlRequest($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

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
     * Create request for operation 'GetConvertDocumentToXpsByUrl'
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
    protected function GetConvertDocumentToXpsByUrlRequest($source_url, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        // verify the required parameter 'source_url' is set
        if ($source_url === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $source_url when calling GetConvertDocumentToXpsByUrl'
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
        if ($this->config['defaultUserAgent']) {
            $defaultHeaders['User-Agent'] = $this->config['defaultUserAgent'];
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }
}
