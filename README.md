# Aspose.HTML.PHP.SDK

## Requirements

PHP 5.5 and later

## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```
{
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com/GIT_USER_ID/GIT_REPO_ID.git"
    }
  ],
  "require": {
    "GIT_USER_ID/GIT_REPO_ID": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
    require_once('/path/to/aspose-html-cloud-php/vendor/autoload.php');
```

## Tests

To run the unit tests:

```
composer install
./vendor/bin/phpunit
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Client\Invoker\ConversionApi(
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

## Documentation for API Endpoints

All URIs are relative to *https://api-qa.aspose.cloud/v1.1*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*ConversionApi* | [**conversionGetConvertDocumentToImage**](docs/Api/ConversionApi.md#conversiongetconvertdocumenttoimage) | **GET** /html/{name}/convert/image/{outFormat} | Convert the HTML document from the storage by its name to the specified image format.
*ConversionApi* | [**conversionGetConvertDocumentToImageByUrl**](docs/Api/ConversionApi.md#conversiongetconvertdocumenttoimagebyurl) | **GET** /html/convert/image/{outFormat} | Convert the HTML page from the web by its URL to the specified image format.
*ConversionApi* | [**conversionGetConvertDocumentToPdf**](docs/Api/ConversionApi.md#conversiongetconvertdocumenttopdf) | **GET** /html/{name}/convert/pdf | Convert the HTML document from the storage by its name to PDF.
*ConversionApi* | [**conversionGetConvertDocumentToPdfByUrl**](docs/Api/ConversionApi.md#conversiongetconvertdocumenttopdfbyurl) | **GET** /html/convert/pdf | Convert the HTML page from the web by its URL to PDF.
*ConversionApi* | [**conversionGetConvertDocumentToXps**](docs/Api/ConversionApi.md#conversiongetconvertdocumenttoxps) | **GET** /html/{name}/convert/xps | Convert the HTML document from the storage by its name to XPS.
*ConversionApi* | [**conversionGetConvertDocumentToXpsByUrl**](docs/Api/ConversionApi.md#conversiongetconvertdocumenttoxpsbyurl) | **GET** /html/convert/xps | Convert the HTML page from the web by its URL to XPS.
*ConversionApi* | [**conversionPutConvertDocumentToImage**](docs/Api/ConversionApi.md#conversionputconvertdocumenttoimage) | **PUT** /html/convert/image/{outFormat} | Convert the HTML document to the specified image format. Input document should be passed in the request content.
*ConversionApi* | [**conversionPutConvertDocumentToPdf**](docs/Api/ConversionApi.md#conversionputconvertdocumenttopdf) | **PUT** /html/convert/pdf | Convert the HTML document to PDF. Input document should be passed in the request content.
*ConversionApi* | [**conversionPutConvertDocumentToXps**](docs/Api/ConversionApi.md#conversionputconvertdocumenttoxps) | **PUT** /html/convert/xps | Convert the HTML document to XPS. Input document should be passed in the request content.
*DocumentApi* | [**documentGetDocument**](docs/Api/DocumentApi.md#documentgetdocument) | **GET** /html/{name} | Return the HTML document by the name from default or specified storage.
*DocumentApi* | [**documentGetDocumentFragmentByXPath**](docs/Api/DocumentApi.md#documentgetdocumentfragmentbyxpath) | **GET** /html/{name}/fragments/{outFormat} | Return list of HTML fragments matching the specified XPath query.
*DocumentApi* | [**documentGetDocumentImages**](docs/Api/DocumentApi.md#documentgetdocumentimages) | **GET** /html/{name}/images/all | Return all HTML document images packaged as a ZIP archive.
*OcrApi* | [**ocrGetRecognizeAndImportToHtml**](docs/Api/OcrApi.md#ocrgetrecognizeandimporttohtml) | **GET** /html/{name}/ocr/import | Recognize text from the image file in the storage and import it to HTML format.
*OcrApi* | [**ocrGetRecognizeAndTranslateToHtml**](docs/Api/OcrApi.md#ocrgetrecognizeandtranslatetohtml) | **GET** /html/{name}/ocr/translate/{srcLang}/{resLang} | Recognize text from the image file in the storage, import it to HTML format and translate to specified language.
*TranslationApi* | [**translationGetTranslateDocument**](docs/Api/TranslationApi.md#translationgettranslatedocument) | **GET** /html/{name}/translate/{srcLang}/{resLang} | Translate the HTML document specified by the name from default or specified storage.
*TranslationApi* | [**translationGetTranslateDocumentByUrl**](docs/Api/TranslationApi.md#translationgettranslatedocumentbyurl) | **GET** /html/translate/{srcLang}/{resLang} | Translate the HTML document from Web specified by its URL.
*TranslationApi* | [**translationPutTranslateDocument**](docs/Api/TranslationApi.md#translationputtranslatedocument) | **PUT** /html/{name}/translate/{srcLang}/{resLang} | Translate the HTML document specified by the name from default or specified storage. Result document will be saved into the default or specified storage; result path will be like /{folder}/{name}_{lang_pair}.{extension}.
*TranslationApi* | [**translationPutTranslateDocumentByUrl**](docs/Api/TranslationApi.md#translationputtranslatedocumentbyurl) | **PUT** /html/translate/{srcLang}/{resLang} | Translate the HTML document from Web specified by its URL.  Result document will be saved into the default or specified storage; result path will be like /{folder}/{name}_{lang_pair}.{extension}.


## Documentation For Authorization

## oauth

- **Type**: OAuth
- **Flow**: application
- **Authorization URL**: "https://api.aspose.cloud/oauth2/token"
- **Scopes**: N/A



## Author
Alexander Makogon



