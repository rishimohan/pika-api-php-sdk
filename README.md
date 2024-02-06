# Pika API PHP SDK

View on Packagist: [https://www.npmjs.com/package/pika-sdk](https://packagist.org/packages/rishimohan/pika-sdk)

## Installation

```
composer require rishimohan/pika-sdk
```

## Usage

If you don't have your API key, get one from [pika.style](https://pika.style/pricing). Check the documentation on [how to get your API key](https://docs.pika.style/docs/basics/getting-api-key)

### Generate image

```php
<?php 

require 'vendor/autoload.php';

use PikaSdk\Client;

$client = new Client("sk-he2jdus1cbz1dpt4mktgjyvx");

$modifications = [
    'title' => 'Title from PHP SDK.',
    'description' => 'Description from PHP SDK.'
];

$response = $client->generateImageFromTemplate('open-graph-image-1', $modifications, 'base64');
print_r($response['data']['base64']);
```

## Example

### `Base64` response format

```php
<?php 

require 'vendor/autoload.php';

use PikaSdk\Client;

$client = new Client("sk-he2jdus1cbz1dpt4mktgjyvx");

$modifications = [
    'title' => 'Title from PHP SDK.',
    'description' => 'Description from PHP SDK.'
];

$response = $client->generateImageFromTemplate('open-graph-image-1', $modifications, 'base64');
print_r($response['data']['base64']);
```

Base64 output
```
data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAABLAAAAJ2CAYAAABPQHtcAAAAAXNSR0IArs4c6QAAIABJREFUeJzs3XmYJXdZL/Bvna37dM90FghLCBAQkC1BCBAMShLFBJAgKnofroBeFUUF5LrhiihXcV8BQRYVUUAlIewIGPbFmLCFLWwCYZEtzPR+trp/TM/......
```

### `Binary` response format

```php
<?php 

require 'vendor/autoload.php';

use PikaSdk\Client;

$client = new Client("sk-he2jdus1cbz1dpt4mktgjyvx");

$modifications = [
    'title' => 'Title from PHP SDK.',
    'description' => 'Description from PHP SDK.'
];

$response = $client->generateImageFromTemplate('open-graph-image-1', $modifications, 'binary');
file_put_contents('og.png', $response);
```

This example writes the binary image to the file `og.png`

## generateImageFromTemplate

Use this function to generate an image. It takes in 3 arguments

| argument | required | description |
|----------|----------|-------------|
|`templateId` | Yes | ID of the template (`open-graph-image-1`, `tweet-image-1`, `beautify-screenshot-1`, ...) |
|`modifications` | Yes | Modifications for the selected template. |
|`responseFormat` | No | `base64` or `binary` (Defaults to `base64`). |

For available templates and their modifications refer [image generation api templates](https://pika.style/image-generation-api/templates)
