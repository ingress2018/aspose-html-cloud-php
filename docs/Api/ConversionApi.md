# Client\Invoker\ConversionApi

All URIs are relative to *https://api.aspose.cloud/v1.1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**GetConvertDocumentToImage**](ConversionApi.md#GetConvertDocumentToImage) | **GET** /html/{name}/convert/image/{outFormat} | Convert the HTML document from the storage by its name to the specified image format.
[**GetConvertDocumentToImageByUrl**](ConversionApi.md#GetConvertDocumentToImageByUrl) | **GET** /html/convert/image/{outFormat} | Convert the HTML page from the web by its URL to the specified image format.
[**GetConvertDocumentToPdf**](ConversionApi.md#GetConvertDocumentToPdf) | **GET** /html/{name}/convert/pdf | Convert the HTML document from the storage by its name to PDF.
[**GetConvertDocumentToPdfByUrl**](ConversionApi.md#GetConvertDocumentToPdfByUrl) | **GET** /html/convert/pdf | Convert the HTML page from the web by its URL to PDF.
[**GetConvertDocumentToXps**](ConversionApi.md#GetConvertDocumentToXps) | **GET** /html/{name}/convert/xps | Convert the HTML document from the storage by its name to XPS.
[**GetConvertDocumentToXpsByUrl**](ConversionApi.md#GetConvertDocumentToXpsByUrl) | **GET** /html/convert/xps | Convert the HTML page from the web by its URL to XPS.


# **GetConvertDocumentToImage**
> \SplFileObject GetConvertDocumentToImage($name, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $x_resolution, $y_resolution, $folder, $storage)

Convert the HTML document from the storage by its name to the specified image format.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Client\Invoker\Api\HtmlApi();

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
    $result = $apiInstance->GetConvertDocumentToImage($name, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $x_resolution, $y_resolution, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConversionApi->GetConvertDocumentToImage: ', $e->getMessage(), PHP_EOL;
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

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)  [[Back to README]](../../README.md)

# **GetConvertDocumentToImageByUrl**
> \SplFileObject GetConvertDocumentToImageByUrl($source_url, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $x_resolution, $y_resolution, $folder, $storage)

Convert the HTML page from the web by its URL to the specified image format.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Client\Invoker\Api\HtmlApi();

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
    $result = $apiInstance->GetConvertDocumentToImageByUrl($source_url, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $x_resolution, $y_resolution, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConversionApi->GetConvertDocumentToImageByUrl: ', $e->getMessage(), PHP_EOL;
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

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)  [[Back to README]](../../README.md)

# **GetConvertDocumentToPdf**
> \SplFileObject GetConvertDocumentToPdf($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage)

Convert the HTML document from the storage by its name to PDF.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Client\Invoker\Api\HtmlApi();

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
    $result = $apiInstance->GetConvertDocumentToPdf($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConversionApi->GetConvertDocumentToPdf: ', $e->getMessage(), PHP_EOL;
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

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)  [[Back to README]](../../README.md)

# **GetConvertDocumentToPdfByUrl**
> \SplFileObject GetConvertDocumentToPdfByUrl($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage)

Convert the HTML page from the web by its URL to PDF.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Client\Invoker\Api\HtmlApi();

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
    $result = $apiInstance->GetConvertDocumentToPdfByUrl($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConversionApi->GetConvertDocumentToPdfByUrl: ', $e->getMessage(), PHP_EOL;
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

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)  [[Back to README]](../../README.md)

# **GetConvertDocumentToXps**
> \SplFileObject GetConvertDocumentToXps($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage)

Convert the HTML document from the storage by its name to XPS.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Client\Invoker\Api\HtmlApi();

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
    $result = $apiInstance->GetConvertDocumentToXps($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConversionApi->GetConvertDocumentToXps: ', $e->getMessage(), PHP_EOL;
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

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)  [[Back to README]](../../README.md)

# **GetConvertDocumentToXpsByUrl**
> \SplFileObject GetConvertDocumentToXpsByUrl($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage)

Convert the HTML page from the web by its URL to XPS.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Client\Invoker\Api\HtmlApi();

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
    $result = $apiInstance->GetConvertDocumentToXpsByUrl($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConversionApi->GetConvertDocumentToXpsByUrl: ', $e->getMessage(), PHP_EOL;
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

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)  [[Back to README]](../../README.md)
