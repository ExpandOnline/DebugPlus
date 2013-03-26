DebugPlus
=========

A CakePHP plugin containing additional panels for the DebugKit Toolbar.

Currently, the plugin has just one panel:

* Logfile Panel

More panels might follow later.

Requirements
------------

* CakePHP 2.x
* A working [CakePHP DebugKit](https://github.com/cakephp/debug_kit) installation

Installation
------------

To install the plugin, clone the repository into your `app/Plugin` directory:

```
# cd app/Plugin
# git clone git://github.com/oldskool/DebugPlus.git
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
public $components = array('DebugKit.Toolbar', array(
    'panels' => array('DebugPlus.PanelName')
);
```

Where `PanelName` is the name of the panel you want to load. For example, if you want to use the Logfile panel, you would load it using:

```php
public $components = array('DebugKit.Toolbar', array(
    'panels' => array('DebugPlus.Logfile')
);
```