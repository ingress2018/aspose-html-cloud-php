# Aspose.HTML.Cloud SDK

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
    echo 'Exception when calling HtmlApi->GetConvertDocumentToImage: ', $e->getMessage(), PHP_EOL;
}

?>
```

## Documentation for API Endpoints

All URIs are relative to *https://api.aspose.cloud/v1.1*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*ConversionApi* | [**GetConvertDocumentToImage**](docs/Api/ConversionApi.md#Getconvertdocumenttoimage) | **GET** /html/{name}/convert/image/{outFormat} | Convert the HTML document from the storage by its name to the specified image format.
*ConversionApi* | [**GetConvertDocumentToImageByUrl**](docs/Api/ConversionApi.md#Getconvertdocumenttoimagebyurl) | **GET** /html/convert/image/{outFormat} | Convert the HTML page from the web by its URL to the specified image format.
*ConversionApi* | [**GetConvertDocumentToPdf**](docs/Api/ConversionApi.md#Getconvertdocumenttopdf) | **GET** /html/{name}/convert/pdf | Convert the HTML document from the storage by its name to PDF.
*ConversionApi* | [**GetConvertDocumentToPdfByUrl**](docs/Api/ConversionApi.md#Getconvertdocumenttopdfbyurl) | **GET** /html/convert/pdf | Convert the HTML page from the web by its URL to PDF.
*ConversionApi* | [**GetConvertDocumentToXps**](docs/Api/ConversionApi.md#Getconvertdocumenttoxps) | **GET** /html/{name}/convert/xps | Convert the HTML document from the storage by its name to XPS.
*ConversionApi* | [**GetConvertDocumentToXpsByUrl**](docs/Api/ConversionApi.md#Getconvertdocumenttoxpsbyurl) | **GET** /html/convert/xps | Convert the HTML page from the web by its URL to XPS.
*DocumentApi* | [**GetDocument**](docs/Api/DocumentApi.md#Getdocument) | **GET** /html/{name} | Return the HTML document by the name from default or specified storage.
*DocumentApi* | [**GetDocumentFragmentByXPath**](docs/Api/DocumentApi.md#Getdocumentfragmentbyxpath) | **GET** /html/{name}/fragments/{outFormat} | Return list of HTML fragments matching the specified XPath query.
*DocumentApi* | [**GetDocumentImages**](docs/Api/DocumentApi.md#Getdocumentimages) | **GET** /html/{name}/images/all | Return all HTML document images packaged as a ZIP archive.
*OcrApi* | [**GetRecognizeAndImportToHtml**](docs/Api/OcrApi.md#Getrecognizeandimporttohtml) | **GET** /html/{name}/ocr/import | Recognize text from the image file in the storage and import it to HTML format.
*OcrApi* | [**GetRecognizeAndTranslateToHtml**](docs/Api/OcrApi.md#Getrecognizeandtranslatetohtml) | **GET** /html/{name}/ocr/translate/{srcLang}/{resLang} | Recognize text from the image file in the storage, import it to HTML format and translate to specified language.
*TranslationApi* | [**GetTranslateDocument**](docs/Api/TranslationApi.md#Gettranslatedocument) | **GET** /html/{name}/translate/{srcLang}/{resLang} | Translate the HTML document specified by the name from default or specified storage.
*TranslationApi* | [**GetTranslateDocumentByUrl**](docs/Api/TranslationApi.md#Gettranslatedocumentbyurl) | **GET** /html/translate/{srcLang}/{resLang} | Translate the HTML document from Web specified by its URL.


## Documentation For Authorization

## oauth

- **Type**: OAuth
- **Flow**: application
- **Authorization URL**: "https://api.aspose.cloud/oauth2/token"
- **Scopes**: N/A

### Examples

[Tests](./test/Api/) contain various examples of using the Aspose.HTML SDK.

## Author
Alexander Makogon



