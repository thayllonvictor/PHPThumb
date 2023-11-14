# PHPThumb

A simple class that uses the gd lib to cut and create thumbnails from images.

## Installation

```bash
require_once 'PHPThumb.php';
```

## Usage

```php

// Create class PHPThumb
$phpThumb = new PHPThumb();

// Set file imagem: upload file or path file
$phpThumb->loadImage('example.jpg');

// Set width your thumbnail
$phpThumb->thumbWidth('100');

// Set height yout thumbnail
$phpThumb->thumbHeight('100');

// Set name image with a extension 
$phpThumb->setFileName('new-thumnail.png');

// Set dir save
$phpThumb->savePath('thumbs/');

// Generate thumbnail
$phpThumb->generateThumb();

```
