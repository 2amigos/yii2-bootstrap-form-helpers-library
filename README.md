Bootstrap Form Helpers Library for Yii2
=======================================

Bootstrap Form Helpers Widget library allows you to use the amazing collection of jQuery plugins created by
[Vincent Lamanna](http://bootstrapformhelpers.com/) and help you build better looking forms.

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require "2amigos/yii2-bootstrap-form-helpers-library" "*"
```
or add

```json
"2amigos/yii2-bootstrap-form-helpers-library" : "*"
```

to the require section of your application's `composer.json` file.

Usage
-----

The library comes with the following widgets:

- ColorPicker
- CountryPicker
- CurrencyPicker
- DatePicker
- FontPicker
- FontSizePicker
- GoogleFontPicker
- LanguagePicker
- NumberInput
- PhoneInput
- Select
- Slider
- StatePicker
- TimePicker
- TimeZonePicker

Pickers are `Select` are DropDownLists that have pretty much work the same in terms of usage. So, the following examples
shows how to use an input and a DropDownList. I am sure you will figure out how to make use of the others until we have
written the proper documentation site for all our extensions.

```php
// using Select Widget, the custom select HTML element of the library

dosamigos\formhelpers\Select::widget([
    'model' => $model,
    'attribute' => 'attributeName',
    'items' => [
        '1' => 'One option',
        '2' => 'Another option'
    ],
    // for all possible client options, please see
    // http://bootstrapformhelpers.com/select/#jquery-plugins
    'clientOptions' => [
        'filter' => 'true' // boolean must be as a string
    ]
]);

// using the NumberInput
dosamigos\formhelpers\NumberInput::widget([
    'model' => $model,
    'attribute' => 'updated_at',
    // not required if we use it with yii\bootstrap\ActiveForm
    'options' => ['class' => 'form-control'],
    // for all possible client options, please see
    // http://bootstrapformhelpers.com/number/#jquery-plugins
    'clientOptions' => [
        'min' => 20,
        'max' => 40
    ]
]);
// (remember that you can also use the following format)
use dosamigos\formhelpers\NumberInput;

$form->input($model, 'attribute')->widget(NumberInput::className(),['clientOptions' => ['min' => 20, 'max' => 40]]);

// using the DatePicker with a selected language
dosamigos\formhelpers\DatePicker::widget([
    'model' => $model,
    'attribute' => 'updated_at',
    'language' => 'es_ES',
    'clientOptions' => [
        'format' => 'm/d/y',
    ]
]);

// using the CurrencyPicker with flags
dosamigos\formhelpers\CurrencyPicker::widget([
    'model' => $model,
    'attribute' => 'updated_at',
    // important! if we don't use the custom select HTML we won't see the flags
    'selectBox' => true,
    'clientOptions' => [
        'flags' => 'true',
    ]
])

```

Further Information
-------------------

For further information regarding the multiple options for the different plugins please visit
[its website](http://bootstrapformhelpers.com/)


> [![2amigOS!](http://www.gravatar.com/avatar/55363394d72945ff7ed312556ec041e0.png)](http://www.2amigos.us)

<i>Web development has never been so fun!</i>
[www.2amigos.us](http://www.2amigos.us)