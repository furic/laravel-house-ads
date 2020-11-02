# laravel-house-ads

[![Packagist](https://img.shields.io/packagist/v/furic/house-ads)](https://packagist.org/packages/furic/house-ads)
[![Packagist](https://img.shields.io/packagist/dt/furic/house-ads)](https://packagist.org/packages/furic/house-ads)
[![License](https://img.shields.io/github/license/furic/laravel-house-ads)](https://packagist.org/packages/furic/house-ads)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/furic/laravel-house-ads/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/furic/laravel-house-ads/?branch=main)
[![Build Status](https://scrutinizer-ci.com/g/furic/laravel-house-ads/badges/build.png?b=main)](https://scrutinizer-ci.com/g/furic/laravel-house-ads/build-status/main)

> House Ads validator for [Laravel 5.*](https://laravel.com/). I developed this package while working for a house ads solution in [Sweaty Chair Studio](https://www.sweatychair.com) serving house ads for players. This contains API for redeem code validation and a `(coming soon) simple web console to create and edit the house ads`. This package is aimed to be a plug-n-play solution, to serve your own house ads within your apps, cross-promo another apps, or even showing a running events. 

> Only one house ad shown on each time client app launch, if there are more than one to show, show the highest priority one. A clicked house ad (successfully redirected) will not shown again:
![No Humanity house ad showing in app launch](https://www.richardfu.net/wp-content/uploads/nohumanity_house_ad_portrait.jpg)

> The web console is in the TODO list. Meanwhile, you will need to add the house ads into the database mannually.

## Table of Contents
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
    - [Web Console](#web-console)
    - [Redeem Code Parameters](#redeem-code-parameters)
    - [Redeem Validator API](#redeem-validator-api)
    - [Unity Client Repo](#unity-client-repo)
- [TODO](#todo)
- [License](#license)

## Installation

Install this package via Composer:
```bash
$ composer require furic/house-ads
```

> If you are using Laravel 5.5 or later, then installation is done. Otherwise follow the next steps.

#### Open `config/app.php` and follow steps below:

Find the `providers` array and add our service provider.

```php
'providers' => [
    // ...
    Furic\HouseAds\HouseAdsServiceProvider::class
],
```

## Configuration

Publish config & migration file using Artisan command:
```bash
$ php artisan vendor:publish
```

To create table for redeem codes in database run:
```bash
$ php artisan migrate
```

## Usage

### Redeem Code Parameters

A house ad has following parameters:
```
            $table->integer('game_id')->unsigned();
            $table->string('image_portrait', 128);
            $table->string('image_landscape', 128);
            $table->boolean('open_url', 128)->default(true);
            $table->string('url_ios', 256);
            $table->string('url_android', 256);
            $table->tinyInteger('repeat_count')->unsigned();
            $table->tinyInteger('priority')->unsigned();
            $table->date('start_at');
            $table->date('end_at');
            $table->mediumInteger('clicked_count')->unsigned();
            $table->mediumInteger('cancelled_count')->unsigned();
```
- Game ID: Which game/app this house ad redirect to. This is used in client app to distingish and not showing its own house ad.
- Portrait Iamge: The portrait image filename. The image should be uploaded and stored in `<server root>/images` folder. You can also use video and implement the playing function in client app.
- Landscape Image: The landscape image filename.
- Open URL: Should the house ad open and URL, otherwise the client should simply show an image. This is mostly used for showing an event image.
- iOS URL: The URL to open in iOS devices.
- Android URL: THe URL to open in Android devices.
- Repeat Count: How many app launches to wait to show this ad again.
- Priority: The highest priority ad get shown in one app launch.
- Start At: The date that this house ad start, used this to schedule future house ads.
- End At: The date that this house ad end, used this to end promotion with a given period.
- Clicked Count: The clicked count (successful redirect), used for analytics only.
- Cancelled Count: The cancelled count (failed redirect), used for analytics only.

### House Ads API

GET `<server url>/house-ads`
Returns a JSON array containing all valid house ads.

GET `<server url>/house-ads/{id}`
Returns a JSON data continain the house ads with given ID, for debug purpose only.

POST `<server url>/house-ads/{id}`
Posts the updated data of a given ID, used for updating the clicked and cancelled count.

### Unity Client Repo
You can simply import this repo in Unity to communicate with your Laravel server with this package:
`<to be added>`

## TODO

- Create the web console to add/edit house ads and upload images.
- Add admin login for web console.
- Add tests.

## License

laravel-redeem-codes is licensed under a [MIT License](https://github.com/furic/laravel-house-ads/blob/main/LICENSE).
