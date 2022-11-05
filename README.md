<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Study Case

PT. Konsen Medisia Alkestron is a company that provides various kinds of medical devices such as masks, thermal thermometers, and others. In addition, the company also provides several tools used to test COVID-19. Currently the only marketing process available is direct sales to consumers who come to the store and this is quite difficult for consumers who are out of town or far from the store location to buy or find out information about the products available in the store.

## Technology

- Laravel 
- Livewire
- MySQL
- Payment Gateway (Midtrans)
- RajaOngkir API

## Features

- Product Management
    <br>
    including product, brand and stock management.
- Scheduled Discount
    <br>
    created using the CRON scheduler.
- Automatic Payment.
    <br>
    integrates the midtrans API to make payments.
- Shipping Cost Calculation.
    <br>
    integrates the Raja Ongkir API to calculate postage to be paid.

## Setup

rename .env.example to .env then change some code : 

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME= your email 
MAIL_PASSWORD= your gmail apllication password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=
MAIL_FROM_NAME="${APP_NAME}"

MIDTRANS_SERVER_KEY = "your server key"
MIDTRANS_CLIENT_KEY = "your client key"
MIDTRANS_IS_PRODUCTION = false
MIDTRANS_IS_SANITIZED = true
MIDTRANS_IS_3DS = true

```
## Run Project

```
php artisan serve
php artisan schedule:work
```

## Screenshoot 

<img src="https://www.dropbox.com/s/ipmzu9165sh0ctm/produk.png?dl=0" />

## Front End


