# Client\Invoker\DocumentApi

All URIs are relative to *https://api.aspose.cloud/v1.1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**GetDocument**](DocumentApi.md#GetDocument) | **GET** /html/{name} | Return the HTML document by the name from default or specified storage.
[**GetDocumentFragmentByXPath**](DocumentApi.md#GetDocumentFragmentByXPath) | **GET** /html/{name}/fragments/{outFormat} | Return list of HTML fragments matching the specified XPath query.
[**GetDocumentImages**](DocumentApi.md#GetDocumentImages) | **GET** /html/{name}/images/all | Return all HTML document images packaged as a ZIP archive.


# **GetDocument**
> \SplFileObject GetDocument($name, $storage, $folder)

Return the HTML document by the name from default or specified storage.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Client\Invoker\Api\HtmlApi();

$name = "name_example"; // string | The document name.
$storage = "storage_example"; // string | The document folder
$folder = "folder_example"; // string | The document folder.

try {
    $result = $apiInstance->GetDocument($name, $storage, $folder);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentApi->GetDocument: ', $e->getMessage(), PHP_EOL;
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

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data, application/zip

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

# **GetDocumentFragmentByXPath**
> \SplFileObject GetDocumentFragmentByXPath($name, $x_path, $out_format, $storage, $folder)

Return list of HTML fragments matching the specified XPath query.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Client\Invoker\Api\HtmlApi();

$name = "name_example"; // string | The document name.
$x_path = "x_path_example"; // string | XPath query string.
$out_format = "out_format_example"; // string | Output format. Possible values: 'plain' and 'json'.
$storage = "storage_example"; // string | The document storage.
$folder = "folder_example"; // string | The document folder.

try {
    $result = $apiInstance->GetDocumentFragmentByXPath($name, $x_path, $out_format, $storage, $folder);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentApi->GetDocumentFragmentByXPath: ', $e->getMessage(), PHP_EOL;
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

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)  [[Back to README]](../../README.md)

# **GetDocumentImages**
> \SplFileObject GetDocumentImages($name, $folder, $storage)

Return all HTML document images packaged as a ZIP archive.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Client\Invoker\Api\HtmlApi();

$name = "name_example"; // string | The document name.
$folder = "folder_example"; // string | The document folder.
$storage = "storage_example"; // string | The document storage.

try {
    $result = $apiInstance->GetDocumentImages($name, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentApi->GetDocumentImages: ', $e->getMessage(), PHP_EOL;
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

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/zip

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)  [[Back to README]](../../README.md)

