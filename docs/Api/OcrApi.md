# Client\Invoker\OcrApi

All URIs are relative to *https://api-qa.aspose.cloud/v1.1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**ocrGetRecognizeAndImportToHtml**](OcrApi.md#ocrGetRecognizeAndImportToHtml) | **GET** /html/{name}/ocr/import | Recognize text from the image file in the storage and import it to HTML format.
[**ocrGetRecognizeAndTranslateToHtml**](OcrApi.md#ocrGetRecognizeAndTranslateToHtml) | **GET** /html/{name}/ocr/translate/{srcLang}/{resLang} | Recognize text from the image file in the storage, import it to HTML format and translate to specified language.


# **ocrGetRecognizeAndImportToHtml**
> \SplFileObject ocrGetRecognizeAndImportToHtml($name, $ocr_engine_lang, $folder, $storage)

Recognize text from the image file in the storage and import it to HTML format.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Client\Invoker\Api\OcrApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$name = "name_example"; // string | The image file name.
$ocr_engine_lang = "en"; // string | OCR engine language - language
$folder = "folder_example"; // string | The source image folder.
$storage = "storage_example"; // string | The source image storage.

try {
    $result = $apiInstance->ocrGetRecognizeAndImportToHtml($name, $ocr_engine_lang, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OcrApi->ocrGetRecognizeAndImportToHtml: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| The image file name. |
 **ocr_engine_lang** | **string**| OCR engine language - language | [optional] [default to en]
 **folder** | **string**| The source image folder. | [optional]
 **storage** | **string**| The source image storage. | [optional]

### Return type

[**\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ocrGetRecognizeAndTranslateToHtml**
> \SplFileObject ocrGetRecognizeAndTranslateToHtml($name, $src_lang, $res_lang, $folder, $storage)

Recognize text from the image file in the storage, import it to HTML format and translate to specified language.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Client\Invoker\Api\OcrApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$name = "name_example"; // string | The image file name.
$src_lang = "src_lang_example"; // string | Source language - also supposed as the OCR engine language.
$res_lang = "res_lang_example"; // string | Result language.
$folder = "folder_example"; // string | The source image folder.
$storage = "storage_example"; // string | The source image storage.

try {
    $result = $apiInstance->ocrGetRecognizeAndTranslateToHtml($name, $src_lang, $res_lang, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OcrApi->ocrGetRecognizeAndTranslateToHtml: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| The image file name. |
 **src_lang** | **string**| Source language - also supposed as the OCR engine language. |
 **res_lang** | **string**| Result language. |
 **folder** | **string**| The source image folder. | [optional]
 **storage** | **string**| The source image storage. | [optional]

### Return type

[**\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

