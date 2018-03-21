<?php

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


trait DocumentApi
{
    /**
     * Operation documentGetDocument
     *
     * Return the HTML document by the name from default or specified storage.
     *
     * @param  string $name The document name. (required)
     * @param  string $storage The document folder (optional)
     * @param  string $folder The document folder. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function documentGetDocument($name, $storage = null, $folder = null)
    {
        list($response) = $this->documentGetDocumentWithHttpInfo($name, $storage, $folder);
        return $response;
    }

    /**
     * Operation documentGetDocumentWithHttpInfo
     *
     * Return the HTML document by the name from default or specified storage.
     *
     * @param  string $name The document name. (required)
     * @param  string $storage The document folder (optional)
     * @param  string $folder The document folder. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function documentGetDocumentWithHttpInfo($name, $storage = null, $folder = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->documentGetDocumentRequest($name, $storage, $folder);

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
     * Operation documentGetDocumentAsync
     *
     * Return the HTML document by the name from default or specified storage.
     *
     * @param  string $name The document name. (required)
     * @param  string $storage The document folder (optional)
     * @param  string $folder The document folder. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function documentGetDocumentAsync($name, $storage = null, $folder = null)
    {
        return $this->documentGetDocumentAsyncWithHttpInfo($name, $storage, $folder)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation documentGetDocumentAsyncWithHttpInfo
     *
     * Return the HTML document by the name from default or specified storage.
     *
     * @param  string $name The document name. (required)
     * @param  string $storage The document folder (optional)
     * @param  string $folder The document folder. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function documentGetDocumentAsyncWithHttpInfo($name, $storage = null, $folder = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->documentGetDocumentRequest($name, $storage, $folder);

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
     * Create request for operation 'documentGetDocument'
     *
     * @param  string $name The document name. (required)
     * @param  string $storage The document folder (optional)
     * @param  string $folder The document folder. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function documentGetDocumentRequest($name, $storage = null, $folder = null)
    {
        // verify the required parameter 'name' is set
        if ($name === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $name when calling documentGetDocument'
            );
        }

        $resourcePath = '/html/{name}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($storage !== null) {
            $queryParams['storage'] = ObjectSerializer::toQueryValue($storage);
        }
        // query params
        if ($folder !== null) {
            $queryParams['folder'] = ObjectSerializer::toQueryValue($folder);
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
                ['multipart/form-data', 'application/zip']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['multipart/form-data', 'application/zip'],
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
     * Operation documentGetDocumentFragmentByXPath
     *
     * Return list of HTML fragments matching the specified XPath query.
     *
     * @param  string $name The document name. (required)
     * @param  string $x_path XPath query string. (required)
     * @param  string $out_format Output format. Possible values: &#39;plain&#39; and &#39;json&#39;. (required)
     * @param  string $storage The document storage. (optional)
     * @param  string $folder The document folder. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function documentGetDocumentFragmentByXPath($name, $x_path, $out_format, $storage = null, $folder = null)
    {
        list($response) = $this->documentGetDocumentFragmentByXPathWithHttpInfo($name, $x_path, $out_format, $storage, $folder);
        return $response;
    }

    /**
     * Operation documentGetDocumentFragmentByXPathWithHttpInfo
     *
     * Return list of HTML fragments matching the specified XPath query.
     *
     * @param  string $name The document name. (required)
     * @param  string $x_path XPath query string. (required)
     * @param  string $out_format Output format. Possible values: &#39;plain&#39; and &#39;json&#39;. (required)
     * @param  string $storage The document storage. (optional)
     * @param  string $folder The document folder. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function documentGetDocumentFragmentByXPathWithHttpInfo($name, $x_path, $out_format, $storage = null, $folder = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->documentGetDocumentFragmentByXPathRequest($name, $x_path, $out_format, $storage, $folder);

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
     * Operation documentGetDocumentFragmentByXPathAsync
     *
     * Return list of HTML fragments matching the specified XPath query.
     *
     * @param  string $name The document name. (required)
     * @param  string $x_path XPath query string. (required)
     * @param  string $out_format Output format. Possible values: &#39;plain&#39; and &#39;json&#39;. (required)
     * @param  string $storage The document storage. (optional)
     * @param  string $folder The document folder. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function documentGetDocumentFragmentByXPathAsync($name, $x_path, $out_format, $storage = null, $folder = null)
    {
        return $this->documentGetDocumentFragmentByXPathAsyncWithHttpInfo($name, $x_path, $out_format, $storage, $folder)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation documentGetDocumentFragmentByXPathAsyncWithHttpInfo
     *
     * Return list of HTML fragments matching the specified XPath query.
     *
     * @param  string $name The document name. (required)
     * @param  string $x_path XPath query string. (required)
     * @param  string $out_format Output format. Possible values: &#39;plain&#39; and &#39;json&#39;. (required)
     * @param  string $storage The document storage. (optional)
     * @param  string $folder The document folder. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function documentGetDocumentFragmentByXPathAsyncWithHttpInfo($name, $x_path, $out_format, $storage = null, $folder = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->documentGetDocumentFragmentByXPathRequest($name, $x_path, $out_format, $storage, $folder);

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
     * Create request for operation 'documentGetDocumentFragmentByXPath'
     *
     * @param  string $name The document name. (required)
     * @param  string $x_path XPath query string. (required)
     * @param  string $out_format Output format. Possible values: &#39;plain&#39; and &#39;json&#39;. (required)
     * @param  string $storage The document storage. (optional)
     * @param  string $folder The document folder. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function documentGetDocumentFragmentByXPathRequest($name, $x_path, $out_format, $storage = null, $folder = null)
    {
        // verify the required parameter 'name' is set
        if ($name === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $name when calling documentGetDocumentFragmentByXPath'
            );
        }
        // verify the required parameter 'x_path' is set
        if ($x_path === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $x_path when calling documentGetDocumentFragmentByXPath'
            );
        }
        // verify the required parameter 'out_format' is set
        if ($out_format === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $out_format when calling documentGetDocumentFragmentByXPath'
            );
        }

        $resourcePath = '/html/{name}/fragments/{outFormat}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($x_path !== null) {
            $queryParams['xPath'] = ObjectSerializer::toQueryValue($x_path);
        }
        // query params
        if ($storage !== null) {
            $queryParams['storage'] = ObjectSerializer::toQueryValue($storage);
        }
        // query params
        if ($folder !== null) {
            $queryParams['folder'] = ObjectSerializer::toQueryValue($folder);
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
     * Operation documentGetDocumentImages
     *
     * Return all HTML document images packaged as a ZIP archive.
     *
     * @param  string $name The document name. (required)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function documentGetDocumentImages($name, $folder = null, $storage = null)
    {
        list($response) = $this->documentGetDocumentImagesWithHttpInfo($name, $folder, $storage);
        return $response;
    }

    /**
     * Operation documentGetDocumentImagesWithHttpInfo
     *
     * Return all HTML document images packaged as a ZIP archive.
     *
     * @param  string $name The document name. (required)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function documentGetDocumentImagesWithHttpInfo($name, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->documentGetDocumentImagesRequest($name, $folder, $storage);

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
     * Operation documentGetDocumentImagesAsync
     *
     * Return all HTML document images packaged as a ZIP archive.
     *
     * @param  string $name The document name. (required)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function documentGetDocumentImagesAsync($name, $folder = null, $storage = null)
    {
        return $this->documentGetDocumentImagesAsyncWithHttpInfo($name, $folder, $storage)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation documentGetDocumentImagesAsyncWithHttpInfo
     *
     * Return all HTML document images packaged as a ZIP archive.
     *
     * @param  string $name The document name. (required)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function documentGetDocumentImagesAsyncWithHttpInfo($name, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->documentGetDocumentImagesRequest($name, $folder, $storage);

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
     * Create request for operation 'documentGetDocumentImages'
     *
     * @param  string $name The document name. (required)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function documentGetDocumentImagesRequest($name, $folder = null, $storage = null)
    {
        // verify the required parameter 'name' is set
        if ($name === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $name when calling documentGetDocumentImages'
            );
        }

        $resourcePath = '/html/{name}/images/all';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

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
                ['application/zip']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/zip'],
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
