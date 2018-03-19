# Client\Invoker\TranslationApi

All URIs are relative to *https://api-qa.aspose.cloud/v1.1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**translationGetTranslateDocument**](TranslationApi.md#translationGetTranslateDocument) | **GET** /html/{name}/translate/{srcLang}/{resLang} | Translate the HTML document specified by the name from default or specified storage.
[**translationGetTranslateDocumentByUrl**](TranslationApi.md#translationGetTranslateDocumentByUrl) | **GET** /html/translate/{srcLang}/{resLang} | Translate the HTML document from Web specified by its URL.
[**translationPutTranslateDocument**](TranslationApi.md#translationPutTranslateDocument) | **PUT** /html/{name}/translate/{srcLang}/{resLang} | Translate the HTML document specified by the name from default or specified storage. Result document will be saved into the default or specified storage; result path will be like /{folder}/{name}_{lang_pair}.{extension}.
[**translationPutTranslateDocumentByUrl**](TranslationApi.md#translationPutTranslateDocumentByUrl) | **PUT** /html/translate/{srcLang}/{resLang} | Translate the HTML document from Web specified by its URL.  Result document will be saved into the default or specified storage; result path will be like /{folder}/{name}_{lang_pair}.{extension}.


# **translationGetTranslateDocument**
> \SplFileObject translationGetTranslateDocument($name, $src_lang, $res_lang, $storage, $folder)

Translate the HTML document specified by the name from default or specified storage.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Client\Invoker\Api\TranslationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$name = "name_example"; // string | Document name.
$src_lang = "src_lang_example"; // string | Source language.
$res_lang = "res_lang_example"; // string | Result language.
$storage = "storage_example"; // string | The source document storage.
$folder = "folder_example"; // string | The source document folder.

try {
    $result = $apiInstance->translationGetTranslateDocument($name, $src_lang, $res_lang, $storage, $folder);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TranslationApi->translationGetTranslateDocument: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| Document name. |
 **src_lang** | **string**| Source language. |
 **res_lang** | **string**| Result language. |
 **storage** | **string**| The source document storage. | [optional]
 **folder** | **string**| The source document folder. | [optional]

### Return type

[**\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **translationGetTranslateDocumentByUrl**
> \SplFileObject translationGetTranslateDocumentByUrl($source_url, $src_lang, $res_lang)

Translate the HTML document from Web specified by its URL.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Client\Invoker\Api\TranslationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$source_url = "source_url_example"; // string | Source document URL.
$src_lang = "src_lang_example"; // string | Source language.
$res_lang = "res_lang_example"; // string | Result language.

try {
    $result = $apiInstance->translationGetTranslateDocumentByUrl($source_url, $src_lang, $res_lang);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TranslationApi->translationGetTranslateDocumentByUrl: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **source_url** | **string**| Source document URL. |
 **src_lang** | **string**| Source language. |
 **res_lang** | **string**| Result language. |

### Return type

[**\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **translationPutTranslateDocument**
> \SplFileObject translationPutTranslateDocument($name, $src_lang, $res_lang, $folder, $storage)

Translate the HTML document specified by the name from default or specified storage. Result document will be saved into the default or specified storage; result path will be like /{folder}/{name}_{lang_pair}.{extension}.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Client\Invoker\Api\TranslationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$name = "name_example"; // string | Document name.
$src_lang = "src_lang_example"; // string | Source language.
$res_lang = "res_lang_example"; // string | Result language.
$folder = "folder_example"; // string | The source & result document folder.
$storage = "storage_example"; // string | The source & result document storage.

try {
    $result = $apiInstance->translationPutTranslateDocument($name, $src_lang, $res_lang, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TranslationApi->translationPutTranslateDocument: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| Document name. |
 **src_lang** | **string**| Source language. |
 **res_lang** | **string**| Result language. |
 **folder** | **string**| The source &amp; result document folder. | [optional]
 **storage** | **string**| The source &amp; result document storage. | [optional]

### Return type

[**\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **translationPutTranslateDocumentByUrl**
> \SplFileObject translationPutTranslateDocumentByUrl($source_url, $src_lang, $res_lang, $folder, $storage)

Translate the HTML document from Web specified by its URL.  Result document will be saved into the default or specified storage; result path will be like /{folder}/{name}_{lang_pair}.{extension}.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Client\Invoker\Api\TranslationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$source_url = "source_url_example"; // string | Source document URL.
$src_lang = "src_lang_example"; // string | Source language.
$res_lang = "res_lang_example"; // string | Result language.
$folder = "folder_example"; // string | The result document folder
$storage = "storage_example"; // string | The result document storage

try {
    $result = $apiInstance->translationPutTranslateDocumentByUrl($source_url, $src_lang, $res_lang, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TranslationApi->translationPutTranslateDocumentByUrl: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **source_url** | **string**| Source document URL. |
 **src_lang** | **string**| Source language. |
 **res_lang** | **string**| Result language. |
 **folder** | **string**| The result document folder | [optional]
 **storage** | **string**| The result document storage | [optional]

### Return type

[**\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

