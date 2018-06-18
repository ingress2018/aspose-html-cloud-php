# Aspose HTML Cloud SDK 

This repository contains Aspose.HTML Cloud SDK source code. This SDK allows you to work with Aspose.HTML Cloud REST APIs in your applications quickly and easily.

See [API Reference](https://apireference.aspose.cloud/html/) for full API specification.

## How to use the SDK?
The complete source code is available in this repository folder, you can either directly use it in your project.

## Requirements

PHP 5.5 and later

### Prerequisites

To use Aspose HTML for Cloud SDK you need to register an account with [Aspose Cloud](https://www.aspose.cloud/) and lookup/create App Key and SID at [Cloud Dashboard](https://dashboard.aspose.cloud/#/apps). There is free quota available. For more details, see [Aspose Cloud Pricing](https://purchase.aspose.cloud/pricing).


## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```
{
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com/aspose-html-cloud/aspose-html-cloud-php.git"
    }
  ],
  "require": {
    "aspose-html-cloud/aspose-html-cloud-php.git": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
    require_once('/path/to/aspose-html-cloud-php/vendor/autoload.php');
```

## Getting Started

Before fill all fields in /setting/config.json   

Example:   
```json
{
    "basePath":"https://api.aspose.cloud/v1.1",
    "authPath":"https://api.aspose.cloud/oauth2/token",
    "apiKey":"XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
    "appSID":"XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX",
    "testResult":"\\testresult\\",
    "testData":"\\testdata\\",
	"remoteFolder":"HtmlTestDoc",
	"defaultUserAgent":"Webkit",
	"debugFile":"php://output",
	"debug":false
}
```

or pass configuration to constructor (see in tests - BaseTest.php) 

```php
        $configuration = array(
            "basePath" => "https://api-qa.aspose.cloud/v1.1",
            "authPath" => "https://api-qa.aspose.cloud/oauth2/token",
            "apiKey" => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
            "appSID" => "XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX",
            "testResult" => "\\testresult\\",
            "testData" => "\\testdata\\",
            "remoteFolder" => "HtmlTestDoc",
            "defaultUserAgent" => "Webkit",
            "debugFile" => "php://output",
            "debug" => false
        };
            
            self::$api = new HtmlApi($configuration);

// Storage api for upload data to remove storage (see tests)           
            $storage_cfg = new \Aspose\Storage\Configuration();
            $storage_cfg->setAppKey($configuration['apiKey'])->
                setAppSid($configuration['appSID'])->
                setHost("https://api-qa.aspose.cloud/");

            self::$storage = new StorageApi($storage_cfg);

// optional for test
            self::$testFolder = realpath(__DIR__ . '/../..') . $configuration['testData'];
            self::$testResult = realpath(__DIR__ . '/../..') . $configuration['testResult'];
```

## Tests

To run the unit tests:

```
composer install
./vendor/bin/phpunit
```


Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Client\Invoker\Api\HtmlApi();

$name = "name_example"; // string | Document name.
$out_format = "png"; // string | Resulting image format.
$width = 800; // int | Resulting image width.
$height = 1000; // int | Resulting image height.
$left_margin = 10; // int | Left resulting image margin.
$right_margin = 10; // int | Right resulting image margin.
$top_margin = 10; // int | Top resulting image margin.
$bottom_margin = 10; // int | Bottom resulting image margin.
$x_resolution = 300; // int | Horizontal resolution of resulting image.
$y_resolution = 300; // int | Vertical resolution of resulting image.
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
*SummarizationApi* | [**GetDetectHtmlKeywords**](docs/Api/SummarizationApi.md#getdetecthtmlkeywords) | **GET** /html/{name}/summ/keywords | Get the HTML document keywords using the keyword detection service.
*SummarizationApi* | [**GetDetectHtmlKeywordsByUrl**](docs/Api/SummarizationApi.md#getdetecthtmlkeywordsbyurl) | **GET** /html/summ/keywords | Get the keywords from HTML document from Web specified by its URL using the keyword detection service



## Documentation For Authorization

## oauth

- **Type**: OAuth
- **Flow**: application
- **Authorization URL**: "https://api.aspose.cloud/oauth2/token"
- **Scopes**: N/A

### Examples
Test uses [StorageApi](https://github.com/aspose-storage-cloud/aspose-storage-cloud-php) for upload file to remote storage. 

[Tests](./test/Api/) contain various examples of using the Aspose.HTML SDK.


## Author
Alexander Makogon
