[![Latest Version](https://img.shields.io/github/tag/promo-pr/minimal.svg?style=flat-square&label=release)](https://github.com/promo-pr/minimal/releases)
[![Total Downloads](https://img.shields.io/packagist/dt/promo-pr/minimal.svg?style=flat-square)](https://packagist.org/packages/promo-pr/minimal)


Installation
------

Create a project:

~~~
composer global require "fxp/composer-asset-plugin:^1.2.0"
composer create-project --prefer-dist promo-pr/fse project
~~~

Fill your DB connection information in `environments/**/common-local.php` and init an environment:

~~~
php init
~~~

Execute migrations:

~~~
php yii migrate
~~~
