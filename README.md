# wpbin.io

[![Build Status](https://travis-ci.org/aMoniker/wpbin.svg?branch=master)](https://travis-ci.org/aMoniker/wpbin)

[http://wpbin.io](http://wpbin.io) is just the coolest Wordpress paste site, you know?


## Development

The project builds on Laravel 7.x

Development and testing can easily be spun up by using SQLite and the built in PHP webserver.

Make sure your `.env` file has `DB_CONNECTION` set to `sqlite`.

Run migrations with `php artisan migrate`, which sets up the database tables for you.

Then start up the artisan server with `php artisan serve`, you now have a functioning local development version.

If you would like to have the WordPress function references included, please use `php artisan scrape:tags` and watch in awe.

Et voila!

### PHP and javaScript

To build the JavaScript and CSS resources start by installing the dependencies with `npm install`.

Once you are done, you can build everything using `npm run build`, you can also start a watcher with `npm run watch`.
