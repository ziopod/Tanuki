# Tanuki
A ready to use MVVM Flatfile CMS.

Tanuki use : 

 - Kohana, a pretty simple PHP framework
 - Tanuki-core, provide a pre-build MVVM design pattern : routes, controller, View models and Flatfiles models for basic editorial usages.
 - Kostache, a Mustache module for Kohana
 - Flatfile, a Flatfile ORM system.

## Installation
For dependencies, please use [Composer](https://getcomposer.org/).

### Install with git 

 1. Setup your local directory  
	`$ mkdir my-project`  
	`$ cd my-project`  
	`$ git init`  
 2. Grab a copy of Tanuki  
 	`$ git pull https://github.com/ziopod/Tanuki.git`
 3. Install dependencies with Composer  
	`$ composer install` 
 
### Install by downloading zip archive file

 1. Download a copy of [last Tanuki release](https://github.com/ziopod/Tanuki/releases)
 2. Unzip file into your project directory  
 3. Installl dependencies with Composer  
	`$ cd my-project`  
	`$ composer install`

## Customization

### I want change defaults data and add somes stuff like a stylesheet for example

Tanuki is based on MVVM design, so you can just add you own method or property to the class view and call it by the template file.  
For example, if you want to auto-load a stylesheet, you can proceed like that :  

1. First add your custom view method to master file `application/classes/View/Master.php` 

	
	/** Stylesheets **/
	public function styles()
	{
		return 	array(
			array(
				'src'	=> 'assets/css/main.css',
				'media'	=> 'screen',
			),
		);
	}

2. Then add a grabber to the default layout file `application/templates/layout/default.mustache`

		{{#styles}}<link rel="stylesheet" href="{{src}}" media="{{media}}" />{{/styles}}
