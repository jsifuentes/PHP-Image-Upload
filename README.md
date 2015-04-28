# PHP Image Uploading

PHP Image Uploading is a library that allows you to easily upload images to third-party services like Imgur and Imageshack.


```php

use ImageUpload\Services\Imgur as Imgur;
use ImageUpload\Services\ImageShack as ImageShack;

// Imgur - uploading with a url, full path, or base64 string
$imgur = new Imgur('API Key');
$imgur->upload('http://website.com/image.png');
$imgur->upload(__DIR__ . '/image.png');
$imgur->upload('SGFoYWhhIHRoaXMgaXMgZHVtbXkgZGF ... 0YSBmb3IgbXkgcmVwb3NpdG9yeQ==');

// Imageshack - uploading an image or video
$imageshack = new ImageShack('API Key');
$imageshack->upload('http://website.com/image.png');
$imageshack->upload(__DIR__ . '/image.png');
$imageshack->uploadVideo(__DIR__ . '/video.mp4');

// Uploading an image or video with an account
$imageshack->withCredentials('username', 'password')->upload(__DIR__ . '/image.png');
$imageshack->withCookie('cookie key')->upload(__DIR__ . '/image.png');


```

This project is available on Packagist.
