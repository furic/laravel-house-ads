# laravel-house-ads

[![Packagist](https://img.shields.io/packagist/v/furic/house-ads)](https://packagist.org/packages/furic/house-ads)
[![Packagist](https://img.shields.io/packagist/dt/furic/house-ads)](https://packagist.org/packages/furic/house-ads)
[![License](https://img.shields.io/github/license/furic/laravel-house-ads)](https://packagist.org/packages/furic/house-ads)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/furic/laravel-house-ads/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/furic/laravel-house-ads/?branch=main)
[![Build Status](https://scrutinizer-ci.com/g/furic/laravel-house-ads/badges/build.png?b=main)](https://scrutinizer-ci.com/g/furic/laravel-house-ads/build-status/main)

> A simple house ads / cross-promo API package for [Laravel 5.*](https://laravel.com/).  
> Developed from the internal house ads system at [Sweaty Chair Studio](https://www.sweatychair.com), this package serves interstitial images or videos to users, enabling cross-promotion or event ads within apps.

> This package includes an API to fetch ads, and a (coming soon) web console to create and manage them. The system is designed for plug-and-play use — whether you're showing ads on app launch or embedding them into your UI.

> Ads are served to the client, which can decide how and when to show them — e.g., show one ad on each launch or all sequentially. Click tracking and analytics support included.

![Interstitial popup example - Sweaty Chair](https://i0.wp.com/www.richardfu.net/wp-content/uploads/in-house-ad-in-interstitial-popup-sweatychair.jpg)
![UI box video ad example - Voodoo](https://i2.wp.com/www.richardfu.net/wp-content/uploads/in-house-ad-in-ui-box-voodoo.jpg)

> Currently, ads must be added manually to the database.  
> A full walkthrough is available [here](https://www.richardfu.net/develop-house-ads-api-with-laravel-for-mobile-app-game).

---

## Table of Contents

- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
  - [House Ads Table](#house-ads-table)
  - [API URLs](#api-urls)
  - [Unity Client Repo](#unity-client-repo)
- [TODO](#todo)
- [License](#license)

---

## Installation

Install via Composer:

```bash
composer require furic/house-ads
```

If you're using Laravel 5.5 or later, that's all.  
Otherwise, manually register the provider in `config/app.php`:

```php
'providers' => [
    // ...
    Furic\HouseAds\HouseAdsServiceProvider::class,
],
```

---

## Configuration

Run migrations to create the necessary database table:

```bash
php artisan migrate
```

---

## Usage

### House Ads Table

| Column Name      | Type      | Required | Description                                  |
|------------------|-----------|----------|----------------------------------------------|
| id               | integer   | ✓        | Auto-incremented ID                          |
| game_id          | integer   | ✓        | Game ID the ad promotes                      |
| media_portrait   | varchar   |          | Portrait image/video filename                |
| media_landscape  | varchar   |          | Landscape image/video filename               |
| open_url         | tinyint   | ✓        | Whether the ad opens a URL                   |
| url_ios          | varchar   |          | iOS redirect URL                             |
| url_android      | varchar   |          | Android redirect URL                         |
| repeat_count     | tinyint   | ✓        | How many launches to wait before repeat      |
| priority         | tinyint   | ✓        | Priority value for sorting                   |
| start_at         | date      | ✓        | Ad start date                                |
| end_at           | date      | ✓        | Ad end date                                  |
| confirmed_count  | mediumint | ✓        | Clicked count                                |
| cancelled_count  | mediumint | ✓        | Cancelled (failed) attempts                  |
| created_at       | datetime  |          | Timestamp                                    |
| updated_at       | datetime  |          | Timestamp                                    |

> Media files should be stored in the `/media` folder under your Laravel root.

### API URLs

- **GET** `/api/house-ads`  
  Returns all currently valid house ads as a JSON array.

- **GET** `/api/house-ads/{id}`  
  Returns a specific house ad entry (for debugging).

- **PUT** `/api/house-ads/{id}`  
  Updates a house ad's view/click/cancel count.

Postman API documentation: [View here](https://documenter.getpostman.com/view/2560814/TVmV6tm8#01c3056b-47d9-44d2-ac7e-e0b84a1799c0)

### Unity Client Repo

> A Unity integration repo is coming soon. Stay tuned!

---

## TODO

- Build web console to create/edit ads and upload media
- Add admin authentication for the web console
- Add test coverage and factories

---

## License

This package is open-sourced under the [MIT License](https://github.com/furic/laravel-house-ads/blob/main/LICENSE).
