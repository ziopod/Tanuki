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
		return array_merge(
			parent::styles(),
			array(
				array(
					'src'	=> 'assets/css/main.css',
					'media'	=> 'screen',
				)
			)
		);
	}

	// Push to Tanuki-core
	/**
	* Somes defaults global data for all views
	*
	* @return	array	Global informations
	**/
	public function tanuki()
	{
		return  Kohana::$config->load('tanuki');
	}

	/**
	* Set HTML metas list
	*
	* Try to grab metas from Flatfile, even load metas from configuration file
	*
	* @return	array
	**/
	public function metas()
	{
		// Load metas from config file, remplaced by values set in Flatfile
		$model_name = $this->model_name;
		$default_metas = Kohana::$config->load('tanuki.metas');
		$metas = array();

		if ($default_metas)
		{
			foreach ($default_metas as $name => $content)
			{
				$metas[] = array(
					'name' => $name,
					'content' => $this->$model_name->$name ? $this->$model_name->$name : $content,
				);
			}			
		}

		return $metas;
	}

	/**
	* Set HTML title tag
	*
	* @return	string
	**/
	public function title()
	{
		// Try to load title from model
		$model_name = $this->model_name;

		if (isset($this->$model_name->title))
		{
			return $this->$model_name->title;
		}

		// Instead use global config
		return Kohana::$config->load('tanuki.title');
	}	

}