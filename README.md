# Integrate Google Recaptcha v3 to your CakePHP3 project

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require giginc/cakephp3-recaptcha
```

followed by the command:

```
composer update
```

## Load plugin

From command line:
```
bin/cake plugin load Recaptcha
```

## Load Component and Configure

Override default configure from loadComponent:
```
Recaptcha version2
$this->loadComponent('Recaptcha.Recaptcha', [
    'enable' => true,     // true/false
    'version' => 2,
    'sitekey' => 'your_site_key', //if you don't have, get one: https://www.google.com/recaptcha/intro/index.html
    'secret' => 'your_secret',
    'type' => 'image',  // image/audio
    'theme' => 'light', // light/dark
    'lang' => 'vi',      // default en
    'size' => 'normal'  // normal/compact
]);

Recaptcha version3
$this->loadComponent('Recaptcha.Recaptcha', [
    'enable' => true,     // true/false
    'version' => 3,
    'sitekey' => 'your_site_key', //if you don't have, get one: https://www.google.com/recaptcha/intro/index.html
    'secret' => 'your_secret',
    'scoreThreshold' => 0.5, // score threshold (default 0.5)
]);
```

Override default configure from app config file:
```
file: config/app.php
Recaptcha version2
    /**
     * Recaptcha configuration.
     *
     */
    'Recaptcha' => [
        'enable' => true,
        'version' => 2,
        'sitekey' => 'your_site_key',
        'secret' => 'your_secret',
        'type' => 'image',
        'theme' => 'light',
        'lang' => 'es',
        'size' => 'normal'
    ]

Recaptcha version3
    /**
     * Recaptcha configuration.
     *
     */
    'Recaptcha' => [
        'enable' => true,
        'version' => 3,
        'sitekey' => 'your_site_key',
        'secret' => 'your_secret',
    ]
```

Override default configure from recaptcha config file:
```
file: config/recaptcha.php
<?php
return [
    /**
     * Recaptcha configuration.
     *
     */
    'Recaptcha' => [
        'enable' => true,
        'version' => 3,
        'sitekey' => 'your_site_key',
        'secret' => 'your_secret',
    ]
];
```

Load recaptcha config file:
```
file: config/bootstrap.php
    Configure::load('recaptcha', 'default', true);
```

Config preference:
1. loadComponent config options
2. recaptcha config file
3. app config file

## Usage

Display recaptcha in your view:
```
    <?= $this->Form->create() ?>
    <?= $this->Form->control('email') ?>
    <?= $this->Recaptcha->display() ?>  // Display recaptcha box in your view, if configure has enable = false, nothing will be displayed
    <?= $this->Form->button() ?>
    <?= $this->Form->end() ?>
```

Verify in your controller function
```
    public function forgotPassword()
    {
        if ($this->request->is('post')) {
            if ($this->Recaptcha->verify()) { // if configure enable = false, it will always return true
                //do something here
            }
            $this->Flash->error(__('Please pass Google Recaptcha first'));
        }
    }
```

## LICENSE

[The MIT License (MIT) Copyright (c) 2013](http://opensource.org/licenses/MIT)
