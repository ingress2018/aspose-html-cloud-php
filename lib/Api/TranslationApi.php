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

trait TranslationApi
{
    /**
     * Operation translationGetTranslateDocument
     *
     * Translate the HTML document specified by the name from default or specified storage.
     *
     * @param  string $name Document name. (required)
     * @param  string $src_lang Source language. (required)
     * @param  string $res_lang Result language. (required)
     * @param  string $storage The source document storage. (optional)
     * @param  string $folder The source document folder. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function translationGetTranslateDocument($name, $src_lang, $res_lang, $storage = null, $folder = null)
    {
        list($response) = $this->translationGetTranslateDocumentWithHttpInfo($name, $src_lang, $res_lang, $storage, $folder);
        return $response;
    }

    /**
     * Operation translationGetTranslateDocumentWithHttpInfo
     *
     * Translate the HTML document specified by the name from default or specified storage.
     *
     * @param  string $name Document name. (required)
     * @param  string $src_lang Source language. (required)
     * @param  string $res_lang Result language. (required)
     * @param  string $storage The source document storage. (optional)
     * @param  string $folder The source document folder. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function translationGetTranslateDocumentWithHttpInfo($name, $src_lang, $res_lang, $storage = null, $folder = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->translationGetTranslateDocumentRequest($name, $src_lang, $res_lang, $storage, $folder);

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
     * Operation translationGetTranslateDocumentAsync
     *
     * Translate the HTML document specified by the name from default or specified storage.
     *
     * @param  string $name Document name. (required)
     * @param  string $src_lang Source language. (required)
     * @param  string $res_lang Result language. (required)
     * @param  string $storage The source document storage. (optional)
     * @param  string $folder The source document folder. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function translationGetTranslateDocumentAsync($name, $src_lang, $res_lang, $storage = null, $folder = null)
    {
        return $this->translationGetTranslateDocumentAsyncWithHttpInfo($name, $src_lang, $res_lang, $storage, $folder)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation translationGetTranslateDocumentAsyncWithHttpInfo
     *
     * Translate the HTML document specified by the name from default or specified storage.
     *
     * @param  string $name Document name. (required)
     * @param  string $src_lang Source language. (required)
     * @param  string $res_lang Result language. (required)
     * @param  string $storage The source document storage. (optional)
     * @param  string $folder The source document folder. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function translationGetTranslateDocumentAsyncWithHttpInfo($name, $src_lang, $res_lang, $storage = null, $folder = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->translationGetTranslateDocumentRequest($name, $src_lang, $res_lang, $storage, $folder);

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
     * Create request for operation 'translationGetTranslateDocument'
     *
     * @param  string $name Document name. (required)
     * @param  string $src_lang Source language. (required)
     * @param  string $res_lang Result language. (required)
     * @param  string $storage The source document storage. (optional)
     * @param  string $folder The source document folder. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function translationGetTranslateDocumentRequest($name, $src_lang, $res_lang, $storage = null, $folder = null)
    {
        // verify the required parameter 'name' is set
        if ($name === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $name when calling translationGetTranslateDocument'
            );
        }
        // verify the required parameter 'src_lang' is set
        if ($src_lang === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $src_lang when calling translationGetTranslateDocument'
            );
        }
        // verify the required parameter 'res_lang' is set
        if ($res_lang === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $res_lang when calling translationGetTranslateDocument'
            );
        }

        $resourcePath = '/html/{name}/translate/{srcLang}/{resLang}';
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
        // path params
        if ($src_lang !== null) {
            $resourcePath = str_replace(
                '{' . 'srcLang' . '}',
                ObjectSerializer::toPathValue($src_lang),
                $resourcePath
            );
        }
        // path params
        if ($res_lang !== null) {
            $resourcePath = str_replace(
                '{' . 'resLang' . '}',
                ObjectSerializer::toPathValue($res_lang),
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
     * Operation translationGetTranslateDocumentByUrl
     *
     * Translate the HTML document from Web specified by its URL.
     *
     * @param  string $source_url Source document URL. (required)
     * @param  string $src_lang Source language. (required)
     * @param  string $res_lang Result language. (required)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function translationGetTranslateDocumentByUrl($source_url, $src_lang, $res_lang)
    {
        list($response) = $this->translationGetTranslateDocumentByUrlWithHttpInfo($source_url, $src_lang, $res_lang);
        return $response;
    }

    /**
     * Operation translationGetTranslateDocumentByUrlWithHttpInfo
     *
     * Translate the HTML document from Web specified by its URL.
     *
     * @param  string $source_url Source document URL. (required)
     * @param  string $src_lang Source language. (required)
     * @param  string $res_lang Result language. (required)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function translationGetTranslateDocumentByUrlWithHttpInfo($source_url, $src_lang, $res_lang)
    {
        $returnType = '\SplFileObject';
        $request = $this->translationGetTranslateDocumentByUrlRequest($source_url, $src_lang, $res_lang);

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
     * Operation translationGetTranslateDocumentByUrlAsync
     *
     * Translate the HTML document from Web specified by its URL.
     *
     * @param  string $source_url Source document URL. (required)
     * @param  string $src_lang Source language. (required)
     * @param  string $res_lang Result language. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function translationGetTranslateDocumentByUrlAsync($source_url, $src_lang, $res_lang)
    {
        return $this->translationGetTranslateDocumentByUrlAsyncWithHttpInfo($source_url, $src_lang, $res_lang)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation translationGetTranslateDocumentByUrlAsyncWithHttpInfo
     *
     * Translate the HTML document from Web specified by its URL.
     *
     * @param  string $source_url Source document URL. (required)
     * @param  string $src_lang Source language. (required)
     * @param  string $res_lang Result language. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function translationGetTranslateDocumentByUrlAsyncWithHttpInfo($source_url, $src_lang, $res_lang)
    {
        $returnType = '\SplFileObject';
        $request = $this->translationGetTranslateDocumentByUrlRequest($source_url, $src_lang, $res_lang);

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
     * Create request for operation 'translationGetTranslateDocumentByUrl'
     *
     * @param  string $source_url Source document URL. (required)
     * @param  string $src_lang Source language. (required)
     * @param  string $res_lang Result language. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function translationGetTranslateDocumentByUrlRequest($source_url, $src_lang, $res_lang)
    {
        // verify the required parameter 'source_url' is set
        if ($source_url === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $source_url when calling translationGetTranslateDocumentByUrl'
            );
        }
        // verify the required parameter 'src_lang' is set
        if ($src_lang === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $src_lang when calling translationGetTranslateDocumentByUrl'
            );
        }
        // verify the required parameter 'res_lang' is set
        if ($res_lang === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $res_lang when calling translationGetTranslateDocumentByUrl'
            );
        }

        $resourcePath = '/html/translate/{srcLang}/{resLang}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($source_url !== null) {
            $queryParams['sourceUrl'] = ObjectSerializer::toQueryValue($source_url);
        }

        // path params
        if ($src_lang !== null) {
            $resourcePath = str_replace(
                '{' . 'srcLang' . '}',
                ObjectSerializer::toPathValue($src_lang),
                $resourcePath
            );
        }
        // path params
        if ($res_lang !== null) {
            $resourcePath = str_replace(
                '{' . 'resLang' . '}',
                ObjectSerializer::toPathValue($res_lang),
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
     * Operation translationPutTranslateDocument
     *
     * Translate the HTML document specified by the name from default or specified storage. Result document will be saved into the default or specified storage; result path will be like /{folder}/{name}_{lang_pair}.{extension}.
     *
     * @param  string $name Document name. (required)
     * @param  string $src_lang Source language. (required)
     * @param  string $res_lang Result language. (required)
     * @param  string $folder The source &amp; result document folder. (optional)
     * @param  string $storage The source &amp; result document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function translationPutTranslateDocument($name, $src_lang, $res_lang, $folder = null, $storage = null)
    {
        list($response) = $this->translationPutTranslateDocumentWithHttpInfo($name, $src_lang, $res_lang, $folder, $storage);
        return $response;
    }

    /**
     * Operation translationPutTranslateDocumentWithHttpInfo
     *
     * Translate the HTML document specified by the name from default or specified storage. Result document will be saved into the default or specified storage; result path will be like /{folder}/{name}_{lang_pair}.{extension}.
     *
     * @param  string $name Document name. (required)
     * @param  string $src_lang Source language. (required)
     * @param  string $res_lang Result language. (required)
     * @param  string $folder The source &amp; result document folder. (optional)
     * @param  string $storage The source &amp; result document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function translationPutTranslateDocumentWithHttpInfo($name, $src_lang, $res_lang, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->translationPutTranslateDocumentRequest($name, $src_lang, $res_lang, $folder, $storage);

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
     * Operation translationPutTranslateDocumentAsync
     *
     * Translate the HTML document specified by the name from default or specified storage. Result document will be saved into the default or specified storage; result path will be like /{folder}/{name}_{lang_pair}.{extension}.
     *
     * @param  string $name Document name. (required)
     * @param  string $src_lang Source language. (required)
     * @param  string $res_lang Result language. (required)
     * @param  string $folder The source &amp; result document folder. (optional)
     * @param  string $storage The source &amp; result document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function translationPutTranslateDocumentAsync($name, $src_lang, $res_lang, $folder = null, $storage = null)
    {
        return $this->translationPutTranslateDocumentAsyncWithHttpInfo($name, $src_lang, $res_lang, $folder, $storage)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation translationPutTranslateDocumentAsyncWithHttpInfo
     *
     * Translate the HTML document specified by the name from default or specified storage. Result document will be saved into the default or specified storage; result path will be like /{folder}/{name}_{lang_pair}.{extension}.
     *
     * @param  string $name Document name. (required)
     * @param  string $src_lang Source language. (required)
     * @param  string $res_lang Result language. (required)
     * @param  string $folder The source &amp; result document folder. (optional)
     * @param  string $storage The source &amp; result document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function translationPutTranslateDocumentAsyncWithHttpInfo($name, $src_lang, $res_lang, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->translationPutTranslateDocumentRequest($name, $src_lang, $res_lang, $folder, $storage);

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
     * Create request for operation 'translationPutTranslateDocument'
     *
     * @param  string $name Document name. (required)
     * @param  string $src_lang Source language. (required)
     * @param  string $res_lang Result language. (required)
     * @param  string $folder The source &amp; result document folder. (optional)
     * @param  string $storage The source &amp; result document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function translationPutTranslateDocumentRequest($name, $src_lang, $res_lang, $folder = null, $storage = null)
    {
        // verify the required parameter 'name' is set
        if ($name === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $name when calling translationPutTranslateDocument'
            );
        }
        // verify the required parameter 'src_lang' is set
        if ($src_lang === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $src_lang when calling translationPutTranslateDocument'
            );
        }
        // verify the required parameter 'res_lang' is set
        if ($res_lang === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $res_lang when calling translationPutTranslateDocument'
            );
        }

        $resourcePath = '/html/{name}/translate/{srcLang}/{resLang}';
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
        // path params
        if ($src_lang !== null) {
            $resourcePath = str_replace(
                '{' . 'srcLang' . '}',
                ObjectSerializer::toPathValue($src_lang),
                $resourcePath
            );
        }
        // path params
        if ($res_lang !== null) {
            $resourcePath = str_replace(
                '{' . 'resLang' . '}',
                ObjectSerializer::toPathValue($res_lang),
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
            'PUT',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation translationPutTranslateDocumentByUrl
     *
     * Translate the HTML document from Web specified by its URL.  Result document will be saved into the default or specified storage; result path will be like /{folder}/{name}_{lang_pair}.{extension}.
     *
     * @param  string $source_url Source document URL. (required)
     * @param  string $src_lang Source language. (required)
     * @param  string $res_lang Result language. (required)
     * @param  string $folder The result document folder (optional)
     * @param  string $storage The result document storage (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function translationPutTranslateDocumentByUrl($source_url, $src_lang, $res_lang, $folder = null, $storage = null)
    {
        list($response) = $this->translationPutTranslateDocumentByUrlWithHttpInfo($source_url, $src_lang, $res_lang, $folder, $storage);
        return $response;
    }

    /**
     * Operation translationPutTranslateDocumentByUrlWithHttpInfo
     *
     * Translate the HTML document from Web specified by its URL.  Result document will be saved into the default or specified storage; result path will be like /{folder}/{name}_{lang_pair}.{extension}.
     *
     * @param  string $source_url Source document URL. (required)
     * @param  string $src_lang Source language. (required)
     * @param  string $res_lang Result language. (required)
     * @param  string $folder The result document folder (optional)
     * @param  string $storage The result document storage (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function translationPutTranslateDocumentByUrlWithHttpInfo($source_url, $src_lang, $res_lang, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->translationPutTranslateDocumentByUrlRequest($source_url, $src_lang, $res_lang, $folder, $storage);

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
     * Operation translationPutTranslateDocumentByUrlAsync
     *
     * Translate the HTML document from Web specified by its URL.  Result document will be saved into the default or specified storage; result path will be like /{folder}/{name}_{lang_pair}.{extension}.
     *
     * @param  string $source_url Source document URL. (required)
     * @param  string $src_lang Source language. (required)
     * @param  string $res_lang Result language. (required)
     * @param  string $folder The result document folder (optional)
     * @param  string $storage The result document storage (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function translationPutTranslateDocumentByUrlAsync($source_url, $src_lang, $res_lang, $folder = null, $storage = null)
    {
        return $this->translationPutTranslateDocumentByUrlAsyncWithHttpInfo($source_url, $src_lang, $res_lang, $folder, $storage)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation translationPutTranslateDocumentByUrlAsyncWithHttpInfo
     *
     * Translate the HTML document from Web specified by its URL.  Result document will be saved into the default or specified storage; result path will be like /{folder}/{name}_{lang_pair}.{extension}.
     *
     * @param  string $source_url Source document URL. (required)
     * @param  string $src_lang Source language. (required)
     * @param  string $res_lang Result language. (required)
     * @param  string $folder The result document folder (optional)
     * @param  string $storage The result document storage (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function translationPutTranslateDocumentByUrlAsyncWithHttpInfo($source_url, $src_lang, $res_lang, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->translationPutTranslateDocumentByUrlRequest($source_url, $src_lang, $res_lang, $folder, $storage);

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
     * Create request for operation 'translationPutTranslateDocumentByUrl'
     *
     * @param  string $source_url Source document URL. (required)
     * @param  string $src_lang Source language. (required)
     * @param  string $res_lang Result language. (required)
     * @param  string $folder The result document folder (optional)
     * @param  string $storage The result document storage (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function translationPutTranslateDocumentByUrlRequest($source_url, $src_lang, $res_lang, $folder = null, $storage = null)
    {
        // verify the required parameter 'source_url' is set
        if ($source_url === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $source_url when calling translationPutTranslateDocumentByUrl'
            );
        }
        // verify the required parameter 'src_lang' is set
        if ($src_lang === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $src_lang when calling translationPutTranslateDocumentByUrl'
            );
        }
        // verify the required parameter 'res_lang' is set
        if ($res_lang === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $res_lang when calling translationPutTranslateDocumentByUrl'
            );
        }

        $resourcePath = '/html/translate/{srcLang}/{resLang}';
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
        if ($folder !== null) {
            $queryParams['folder'] = ObjectSerializer::toQueryValue($folder);
        }
        // query params
        if ($storage !== null) {
            $queryParams['storage'] = ObjectSerializer::toQueryValue($storage);
        }

        // path params
        if ($src_lang !== null) {
            $resourcePath = str_replace(
                '{' . 'srcLang' . '}',
                ObjectSerializer::toPathValue($src_lang),
                $resourcePath
            );
        }
        // path params
        if ($res_lang !== null) {
            $resourcePath = str_replace(
                '{' . 'resLang' . '}',
                ObjectSerializer::toPathValue($res_lang),
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
            'PUT',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }
}
