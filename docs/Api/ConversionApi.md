# Client\Invoker\ConversionApi

All URIs are relative to *https://api-qa.aspose.cloud/v1.1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**conversionGetConvertDocumentToImage**](ConversionApi.md#conversionGetConvertDocumentToImage) | **GET** /html/{name}/convert/image/{outFormat} | Convert the HTML document from the storage by its name to the specified image format.
[**conversionGetConvertDocumentToImageByUrl**](ConversionApi.md#conversionGetConvertDocumentToImageByUrl) | **GET** /html/convert/image/{outFormat} | Convert the HTML page from the web by its URL to the specified image format.
[**conversionGetConvertDocumentToPdf**](ConversionApi.md#conversionGetConvertDocumentToPdf) | **GET** /html/{name}/convert/pdf | Convert the HTML document from the storage by its name to PDF.
[**conversionGetConvertDocumentToPdfByUrl**](ConversionApi.md#conversionGetConvertDocumentToPdfByUrl) | **GET** /html/convert/pdf | Convert the HTML page from the web by its URL to PDF.
[**conversionGetConvertDocumentToXps**](ConversionApi.md#conversionGetConvertDocumentToXps) | **GET** /html/{name}/convert/xps | Convert the HTML document from the storage by its name to XPS.
[**conversionGetConvertDocumentToXpsByUrl**](ConversionApi.md#conversionGetConvertDocumentToXpsByUrl) | **GET** /html/convert/xps | Convert the HTML page from the web by its URL to XPS.
[**conversionPutConvertDocumentToImage**](ConversionApi.md#conversionPutConvertDocumentToImage) | **PUT** /html/convert/image/{outFormat} | Convert the HTML document to the specified image format. Input document should be passed in the request content.
[**conversionPutConvertDocumentToPdf**](ConversionApi.md#conversionPutConvertDocumentToPdf) | **PUT** /html/convert/pdf | Convert the HTML document to PDF. Input document should be passed in the request content.
[**conversionPutConvertDocumentToXps**](ConversionApi.md#conversionPutConvertDocumentToXps) | **PUT** /html/convert/xps | Convert the HTML document to XPS. Input document should be passed in the request content.


# **conversionGetConvertDocumentToImage**
> \SplFileObject conversionGetConvertDocumentToImage($name, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $x_resolution, $y_resolution, $folder, $storage)

Convert the HTML document from the storage by its name to the specified image format.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Client\Invoker\Api\ConversionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$name = "name_example"; // string | Document name.
$out_format = "out_format_example"; // string | Resulting image format.
$width = 56; // int | Resulting image width.
$height = 56; // int | Resulting image height.
$left_margin = 56; // int | Left resulting image margin.
$right_margin = 56; // int | Right resulting image margin.
$top_margin = 56; // int | Top resulting image margin.
$bottom_margin = 56; // int | Bottom resulting image margin.
$x_resolution = 56; // int | Horizontal resolution of resulting image.
$y_resolution = 56; // int | Vertical resolution of resulting image.
$folder = "folder_example"; // string | The source document folder.
$storage = "storage_example"; // string | The source document storage.

try {
    $result = $apiInstance->conversionGetConvertDocumentToImage($name, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $x_resolution, $y_resolution, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConversionApi->conversionGetConvertDocumentToImage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| Document name. |
 **out_format** | **string**| Resulting image format. |
 **width** | **int**| Resulting image width. | [optional]
 **height** | **int**| Resulting image height. | [optional]
 **left_margin** | **int**| Left resulting image margin. | [optional]
 **right_margin** | **int**| Right resulting image margin. | [optional]
 **top_margin** | **int**| Top resulting image margin. | [optional]
 **bottom_margin** | **int**| Bottom resulting image margin. | [optional]
 **x_resolution** | **int**| Horizontal resolution of resulting image. | [optional]
 **y_resolution** | **int**| Vertical resolution of resulting image. | [optional]
 **folder** | **string**| The source document folder. | [optional]
 **storage** | **string**| The source document storage. | [optional]

### Return type

[**\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **conversionGetConvertDocumentToImageByUrl**
> \SplFileObject conversionGetConvertDocumentToImageByUrl($source_url, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $x_resolution, $y_resolution, $folder, $storage)

Convert the HTML page from the web by its URL to the specified image format.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Client\Invoker\Api\ConversionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$source_url = "source_url_example"; // string | Source page URL.
$out_format = "out_format_example"; // string | Resulting image format.
$width = 56; // int | Resulting image width.
$height = 56; // int | Resulting image height.
$left_margin = 56; // int | Left resulting image margin.
$right_margin = 56; // int | Right resulting image margin.
$top_margin = 56; // int | Top resulting image margin.
$bottom_margin = 56; // int | Bottom resulting image margin.
$x_resolution = 56; // int | Horizontal resolution of resulting image.
$y_resolution = 56; // int | Vertical resolution of resulting image.
$folder = "folder_example"; // string | The document folder.
$storage = "storage_example"; // string | The document storage.

try {
    $result = $apiInstance->conversionGetConvertDocumentToImageByUrl($source_url, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $x_resolution, $y_resolution, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConversionApi->conversionGetConvertDocumentToImageByUrl: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **source_url** | **string**| Source page URL. |
 **out_format** | **string**| Resulting image format. |
 **width** | **int**| Resulting image width. | [optional]
 **height** | **int**| Resulting image height. | [optional]
 **left_margin** | **int**| Left resulting image margin. | [optional]
 **right_margin** | **int**| Right resulting image margin. | [optional]
 **top_margin** | **int**| Top resulting image margin. | [optional]
 **bottom_margin** | **int**| Bottom resulting image margin. | [optional]
 **x_resolution** | **int**| Horizontal resolution of resulting image. | [optional]
 **y_resolution** | **int**| Vertical resolution of resulting image. | [optional]
 **folder** | **string**| The document folder. | [optional]
 **storage** | **string**| The document storage. | [optional]

### Return type

[**\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **conversionGetConvertDocumentToPdf**
> \SplFileObject conversionGetConvertDocumentToPdf($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage)

Convert the HTML document from the storage by its name to PDF.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Client\Invoker\Api\ConversionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$name = "name_example"; // string | Document name.
$width = 56; // int | Resulting image width.
$height = 56; // int | Resulting image height.
$left_margin = 56; // int | Left resulting image margin.
$right_margin = 56; // int | Right resulting image margin.
$top_margin = 56; // int | Top resulting image margin.
$bottom_margin = 56; // int | Bottom resulting image margin.
$folder = "folder_example"; // string | The document folder.
$storage = "storage_example"; // string | The document storage.

try {
    $result = $apiInstance->conversionGetConvertDocumentToPdf($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConversionApi->conversionGetConvertDocumentToPdf: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| Document name. |
 **width** | **int**| Resulting image width. | [optional]
 **height** | **int**| Resulting image height. | [optional]
 **left_margin** | **int**| Left resulting image margin. | [optional]
 **right_margin** | **int**| Right resulting image margin. | [optional]
 **top_margin** | **int**| Top resulting image margin. | [optional]
 **bottom_margin** | **int**| Bottom resulting image margin. | [optional]
 **folder** | **string**| The document folder. | [optional]
 **storage** | **string**| The document storage. | [optional]

### Return type

[**\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **conversionGetConvertDocumentToPdfByUrl**
> \SplFileObject conversionGetConvertDocumentToPdfByUrl($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage)

Convert the HTML page from the web by its URL to PDF.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Client\Invoker\Api\ConversionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$source_url = "source_url_example"; // string | Source page URL.
$width = 56; // int | Resulting image width.
$height = 56; // int | Resulting image height.
$left_margin = 56; // int | Left resulting image margin.
$right_margin = 56; // int | Right resulting image margin.
$top_margin = 56; // int | Top resulting image margin.
$bottom_margin = 56; // int | Bottom resulting image margin.
$folder = "folder_example"; // string | The document folder.
$storage = "storage_example"; // string | The document storage.

try {
    $result = $apiInstance->conversionGetConvertDocumentToPdfByUrl($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConversionApi->conversionGetConvertDocumentToPdfByUrl: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **source_url** | **string**| Source page URL. |
 **width** | **int**| Resulting image width. | [optional]
 **height** | **int**| Resulting image height. | [optional]
 **left_margin** | **int**| Left resulting image margin. | [optional]
 **right_margin** | **int**| Right resulting image margin. | [optional]
 **top_margin** | **int**| Top resulting image margin. | [optional]
 **bottom_margin** | **int**| Bottom resulting image margin. | [optional]
 **folder** | **string**| The document folder. | [optional]
 **storage** | **string**| The document storage. | [optional]

### Return type

[**\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **conversionGetConvertDocumentToXps**
> \SplFileObject conversionGetConvertDocumentToXps($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage)

Convert the HTML document from the storage by its name to XPS.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Client\Invoker\Api\ConversionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$name = "name_example"; // string | Document name.
$width = 56; // int | Resulting image width.
$height = 56; // int | Resulting image height.
$left_margin = 56; // int | Left resulting image margin.
$right_margin = 56; // int | Right resulting image margin.
$top_margin = 56; // int | Top resulting image margin.
$bottom_margin = 56; // int | Bottom resulting image margin.
$folder = "folder_example"; // string | The document folder.
$storage = "storage_example"; // string | The document storage.

try {
    $result = $apiInstance->conversionGetConvertDocumentToXps($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConversionApi->conversionGetConvertDocumentToXps: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| Document name. |
 **width** | **int**| Resulting image width. | [optional]
 **height** | **int**| Resulting image height. | [optional]
 **left_margin** | **int**| Left resulting image margin. | [optional]
 **right_margin** | **int**| Right resulting image margin. | [optional]
 **top_margin** | **int**| Top resulting image margin. | [optional]
 **bottom_margin** | **int**| Bottom resulting image margin. | [optional]
 **folder** | **string**| The document folder. | [optional]
 **storage** | **string**| The document storage. | [optional]

### Return type

[**\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **conversionGetConvertDocumentToXpsByUrl**
> \SplFileObject conversionGetConvertDocumentToXpsByUrl($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage)

Convert the HTML page from the web by its URL to XPS.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Client\Invoker\Api\ConversionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$source_url = "source_url_example"; // string | Source page URL.
$width = 56; // int | Resulting image width.
$height = 56; // int | Resulting image height.
$left_margin = 56; // int | Left resulting image margin.
$right_margin = 56; // int | Right resulting image margin.
$top_margin = 56; // int | Top resulting image margin.
$bottom_margin = 56; // int | Bottom resulting image margin.
$folder = "folder_example"; // string | The document folder.
$storage = "storage_example"; // string | The document storage.

try {
    $result = $apiInstance->conversionGetConvertDocumentToXpsByUrl($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConversionApi->conversionGetConvertDocumentToXpsByUrl: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **source_url** | **string**| Source page URL. |
 **width** | **int**| Resulting image width. | [optional]
 **height** | **int**| Resulting image height. | [optional]
 **left_margin** | **int**| Left resulting image margin. | [optional]
 **right_margin** | **int**| Right resulting image margin. | [optional]
 **top_margin** | **int**| Top resulting image margin. | [optional]
 **bottom_margin** | **int**| Bottom resulting image margin. | [optional]
 **folder** | **string**| The document folder. | [optional]
 **storage** | **string**| The document storage. | [optional]

### Return type

[**\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **conversionPutConvertDocumentToImage**
> \SplFileObject conversionPutConvertDocumentToImage($out_format, $out_path, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $x_resolution, $y_resolution, $storage)

Convert the HTML document to the specified image format. Input document should be passed in the request content.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Client\Invoker\Api\ConversionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$out_format = "out_format_example"; // string | Output image format.
$out_path = "out_path_example"; // string | The path to resulting file.
$width = 56; // int | Resulting image width.
$height = 56; // int | Resulting image height.
$left_margin = 56; // int | Left image margin.
$right_margin = 56; // int | Right image margin.
$top_margin = 56; // int | Top image margin.
$bottom_margin = 56; // int | Bottom image margin.
$x_resolution = 56; // int | Horizontal image resolution; 96 ppi by default.
$y_resolution = 56; // int | Vertical image resolution; 96 ppi by default.
$storage = "storage_example"; // string | The document storage.

try {
    $result = $apiInstance->conversionPutConvertDocumentToImage($out_format, $out_path, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $x_resolution, $y_resolution, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConversionApi->conversionPutConvertDocumentToImage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **out_format** | **string**| Output image format. |
 **out_path** | **string**| The path to resulting file. |
 **width** | **int**| Resulting image width. | [optional]
 **height** | **int**| Resulting image height. | [optional]
 **left_margin** | **int**| Left image margin. | [optional]
 **right_margin** | **int**| Right image margin. | [optional]
 **top_margin** | **int**| Top image margin. | [optional]
 **bottom_margin** | **int**| Bottom image margin. | [optional]
 **x_resolution** | **int**| Horizontal image resolution; 96 ppi by default. | [optional]
 **y_resolution** | **int**| Vertical image resolution; 96 ppi by default. | [optional]
 **storage** | **string**| The document storage. | [optional]

### Return type

[**\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **conversionPutConvertDocumentToPdf**
> \SplFileObject conversionPutConvertDocumentToPdf($out_path, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $storage)

Convert the HTML document to PDF. Input document should be passed in the request content.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Client\Invoker\Api\ConversionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$out_path = "out_path_example"; // string | The path to resulting file.
$width = 56; // int | The page width of the resulting document.
$height = 56; // int | The page height of the resulting document.
$left_margin = 56; // int | The left margin of the resulting document page.
$right_margin = 56; // int | The right margin of the resulting document page.
$top_margin = 56; // int | The top margin of the resulting document page.
$bottom_margin = 56; // int | The bottom margin of the resulting document page.
$storage = "storage_example"; // string | The document storage.

try {
    $result = $apiInstance->conversionPutConvertDocumentToPdf($out_path, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConversionApi->conversionPutConvertDocumentToPdf: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **out_path** | **string**| The path to resulting file. |
 **width** | **int**| The page width of the resulting document. | [optional]
 **height** | **int**| The page height of the resulting document. | [optional]
 **left_margin** | **int**| The left margin of the resulting document page. | [optional]
 **right_margin** | **int**| The right margin of the resulting document page. | [optional]
 **top_margin** | **int**| The top margin of the resulting document page. | [optional]
 **bottom_margin** | **int**| The bottom margin of the resulting document page. | [optional]
 **storage** | **string**| The document storage. | [optional]

### Return type

[**\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **conversionPutConvertDocumentToXps**
> \SplFileObject conversionPutConvertDocumentToXps($out_path, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $storage)

Convert the HTML document to XPS. Input document should be passed in the request content.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Client\Invoker\Api\ConversionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$out_path = "out_path_example"; // string | The path to resulting file.
$width = 56; // int | The page width of the resulting document.
$height = 56; // int | The page height of the resulting document.
$left_margin = 56; // int | The left margin of the resulting document page.
$right_margin = 56; // int | The right margin of the resulting document page.
$top_margin = 56; // int | The top margin of the resulting document page.
$bottom_margin = 56; // int | The bottom margin of the resulting document page.
$storage = "storage_example"; // string | The document storage.

try {
    $result = $apiInstance->conversionPutConvertDocumentToXps($out_path, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConversionApi->conversionPutConvertDocumentToXps: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **out_path** | **string**| The path to resulting file. |
 **width** | **int**| The page width of the resulting document. | [optional]
 **height** | **int**| The page height of the resulting document. | [optional]
 **left_margin** | **int**| The left margin of the resulting document page. | [optional]
 **right_margin** | **int**| The right margin of the resulting document page. | [optional]
 **top_margin** | **int**| The top margin of the resulting document page. | [optional]
 **bottom_margin** | **int**| The bottom margin of the resulting document page. | [optional]
 **storage** | **string**| The document storage. | [optional]

### Return type

[**\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

