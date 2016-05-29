<?php
/**
* # Master view model
*
* Please copy this file on your project and add your custom View Model POO properties and method.
*
* @package		Tanuki
* @category		View Model
* @author		Ziopod <ziopod@gmail.com>
* @copyright	(c) 2013-2014 Ziopod
* @license		http://opensource.org/licenses/MIT
**/

class View_Master extends View_Tanuki {

	/**
	* Somes defaults globales data for all views
	*
	* @return	array	Global informations
	**/
	public function tanuki()
	{
		return array(
			'title' 		=> "Tanuki Get it simple!",
			'description'	=> "Just a simple web publishing design pattern",
			'author'		=> array(
				'name'		=> "Ziopod",
				'email'		=> "hello@ziopod.com",
				'url'		=> "http://ziopod.com",
			),
			'license'		=> array(
				'name'		=> 'MIT',
				'url'		=> 'http://opensource.org/licenses/mit-license.php',
			),
			'metas'			=> array(
				array(
					'name'		=> 'generator',
					'content'	=> 'Tanuki',
				),
			),
		);
	}

	/**
	* Define main navigation
	*
	* @return 	array
	**/
	public function navigation()
	{
		return array(
			array(
				'url'		=> $this->base_url(),
				'name'		=> __('Home'),
				'title'		=> __('Go to Home'),
				'current'	=> Request::initial()->controller() === 'Pages' AND Request::initial()->action() === 'home',
			),
			array(
				'url'		=> $this->base_url() . 'about',
				'name'		=> __('About'),
				'title'		=> __('Go to example page'),
				'current'	=> Request::initial()->controller() === 'Pages' AND Request::initial()->param('slug') === 'about',
			),
			array(
				'url'		=> $this->base_url() . 'vanilla-html',
				'name'		=> __('Vanilla HTML'),
				'title'		=> __('Go ot Vanilla HTML'),
				'current'	=> Request::initial()->controller() === 'Pages' AND Request::initial()->param('slug') === 'vanilla-html',
			)
		);
	}

	/**
	* Stylesheet definition
	*
	* @return array
	**/
	public function styles()
	{
		return array(
			array(
				'src'	=> 'assets/css/main.css',
				'media'	=> 'screen',
			)
		);
	}

}