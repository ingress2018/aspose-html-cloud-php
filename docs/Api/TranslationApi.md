# Client\Invoker\Api\TranslationApi

All URIs are relative to *https://api.aspose.cloud/v1.1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**GetTranslateDocument**](TranslationApi.md#GetTranslateDocument) | **GET** /html/{name}/translate/{srcLang}/{resLang} | Translate the HTML document specified by the name from default or specified storage.
[**GetTranslateDocumentByUrl**](TranslationApi.md#GetTranslateDocumentByUrl) | **GET** /html/translate/{srcLang}/{resLang} | Translate the HTML document from Web specified by its URL.


# **GetTranslateDocument**
> \SplFileObject GetTranslateDocument($name, $src_lang, $res_lang, $storage, $folder)

Translate the HTML document specified by the name from default or specified storage.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Client\Invoker\Api\HtmlApi();

$name = "name_example"; // string | Document name.
$src_lang = "src_lang_example"; // string | Source language.
$res_lang = "res_lang_example"; // string | Result language.
$storage = "storage_example"; // string | The source document storage.
$folder = "folder_example"; // string | The source document folder.

try {
    $result = $apiInstance->GetTranslateDocument($name, $src_lang, $res_lang, $storage, $folder);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TranslationApi->GetTranslateDocument: ', $e->getMessage(), PHP_EOL;
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

**\SplFileObject**
### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)  [[Back to README]](../../README.md)

# **GetTranslateDocumentByUrl**
> \SplFileObject GetTranslateDocumentByUrl($source_url, $src_lang, $res_lang)

Translate the HTML document from Web specified by its URL.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Client\Invoker\Api\HtmlApi();

$source_url = "source_url_example"; // string | Source document URL.
$src_lang = "src_lang_example"; // string | Source language.
$res_lang = "res_lang_example"; // string | Result language.

try {
    $result = $apiInstance->GetTranslateDocumentByUrl($source_url, $src_lang, $res_lang);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TranslationApi->GetTranslateDocumentByUrl: ', $e->getMessage(), PHP_EOL;
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

**\SplFileObject**
### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

