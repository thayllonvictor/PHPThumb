<?php

require 'PHPThumb.php';

$phpThumb = new PHPThumb();

$phpThumb->loadImage('example.jpg');
$phpThumb->thumbWidth('100');
$phpThumb->thumbHeight('100');
$phpThumb->setFileName('new_thumb.png');
$phpThumb->savePath('thumbs/');
$phpThumb->generateThumb();
