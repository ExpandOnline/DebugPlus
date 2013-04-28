DebugPlus
=========

A CakePHP plugin containing additional panels for the DebugKit Toolbar.

Currently, the plugin has two panels:

1. Logfile Panel - Retrieve the last few lines of all the files under `app/tmp/logs`, similar to a `tail`.
2. Modelview Panel - Allows you to view the Model associated with the current Controller and it's associations

More panels might follow later.

Requirements
------------

* CakePHP 2.x
* A working [CakePHP DebugKit](https://github.com/cakephp/debug_kit) installation

Installation
------------

**Using Composer**

The easiest way to install the Plugin is by using [Composer](https://getcomposer.org/).
The Plugin is available through the Packagist website. To install using composer, simply run:

```
php composer.phar require oldskool/debug-plus:dev-master
```

**Manual**

To manually install the plugin, clone the repository into your `app/Plugin` directory:

```
# cd app/Plugin
# git clone git://github.com/oldskool/DebugPlus.git
```

Finally, load the plugin from your `app/Config/bootstrap.php`, by adding the following line:

```php
CakePlugin::load('DebugPlus');
```

Usage
-----

Once you installed the plugin, you will still need to tell the DebugKit which of the additional panels (if any) you want to use.
Open the file where you initiate the DebugKit.Toolbar plugin (usually `app/Controller/AppController.php`) and replace:

```php
public $components = array('DebugKit.Toolbar');
```

With:

```php
public $components = array('DebugKit.Toolbar' => array(
    'panels' => array('DebugPlus.PanelName')
));
```

Where `PanelName` is the name of the panel you want to load. For example, if you want to use the Logfile panel, you would load it using:

```php
public $components = array('DebugKit.Toolbar' => array(
    'panels' => array('DebugPlus.Logfile')
));
```

You can also use multiple panels at once. Just extend the array with as many panels you want to activate.
