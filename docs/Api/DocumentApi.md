# Client\Invoker\DocumentApi

All URIs are relative to *https://api-qa.aspose.cloud/v1.1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**documentGetDocument**](DocumentApi.md#documentGetDocument) | **GET** /html/{name} | Return the HTML document by the name from default or specified storage.
[**documentGetDocumentFragmentByXPath**](DocumentApi.md#documentGetDocumentFragmentByXPath) | **GET** /html/{name}/fragments/{outFormat} | Return list of HTML fragments matching the specified XPath query.
[**documentGetDocumentImages**](DocumentApi.md#documentGetDocumentImages) | **GET** /html/{name}/images/all | Return all HTML document images packaged as a ZIP archive.


# **documentGetDocument**
> \SplFileObject documentGetDocument($name, $storage, $folder)

Return the HTML document by the name from default or specified storage.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Client\Invoker\Api\DocumentApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$name = "name_example"; // string | The document name.
$storage = "storage_example"; // string | The document folder
$folder = "folder_example"; // string | The document folder.

try {
    $result = $apiInstance->documentGetDocument($name, $storage, $folder);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentApi->documentGetDocument: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| The document name. |
 **storage** | **string**| The document folder | [optional]
 **folder** | **string**| The document folder. | [optional]

### Return type

[**\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data, application/zip

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **documentGetDocumentFragmentByXPath**
> \SplFileObject documentGetDocumentFragmentByXPath($name, $x_path, $out_format, $storage, $folder)

Return list of HTML fragments matching the specified XPath query.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Client\Invoker\Api\DocumentApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$name = "name_example"; // string | The document name.
$x_path = "x_path_example"; // string | XPath query string.
$out_format = "out_format_example"; // string | Output format. Possible values: 'plain' and 'json'.
$storage = "storage_example"; // string | The document storage.
$folder = "folder_example"; // string | The document folder.

try {
    $result = $apiInstance->documentGetDocumentFragmentByXPath($name, $x_path, $out_format, $storage, $folder);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentApi->documentGetDocumentFragmentByXPath: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| The document name. |
 **x_path** | **string**| XPath query string. |
 **out_format** | **string**| Output format. Possible values: &#39;plain&#39; and &#39;json&#39;. |
 **storage** | **string**| The document storage. | [optional]
 **folder** | **string**| The document folder. | [optional]

### Return type

[**\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **documentGetDocumentImages**
> \SplFileObject documentGetDocumentImages($name, $folder, $storage)

Return all HTML document images packaged as a ZIP archive.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Client\Invoker\Api\DocumentApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$name = "name_example"; // string | The document name.
$folder = "folder_example"; // string | The document folder.
$storage = "storage_example"; // string | The document storage.

try {
    $result = $apiInstance->documentGetDocumentImages($name, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentApi->documentGetDocumentImages: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| The document name. |
 **folder** | **string**| The document folder. | [optional]
 **storage** | **string**| The document storage. | [optional]

### Return type

[**\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/zip

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

