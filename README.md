Yii2 Error View for PhpStrom
============================
Error view for autoopen phpstorm with file and line

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist vlka/yii2-error-view "*"
```

or add

```
"vlka/yii2-error-view": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \vlka\errorview\AutoloadExample::widget(); ?>```