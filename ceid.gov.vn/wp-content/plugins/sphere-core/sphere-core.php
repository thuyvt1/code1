<?php
/**
 * Plugin Name: Sphere Core
 * Plugin URI: http://theme-sphere.com
 * Description: Core plugin for ThemeSphere themes.
 * Version: 1.0.4
 * Author: ThemeSphere
 * Author URI: http://theme-sphere.com
 * License: GPL2
 */

// Note: This class name will NOT change due to dependencies
class Sphere_Plugin_Core
{
	/**
	 * @since 1.0.2
	 */
	const VERSION = '1.0.4';
	
	public $components;
	public $registry;
	
	protected static $instance;
	
	public function __construct() 
	{
		add_action('bunyad_core_pre_init', array($this, 'setup'));
		
		/**
		 * Directory path to components
		 */
		define('SPHERE_COMPONENTS', plugin_dir_path(__FILE__) . 'components/');
		define('SPHERE_LIBS_VENDOR', plugin_dir_path(__FILE__) . 'components/vendor/');
		
	}
	
	/**
	 * Initialize and include the components
	 * 
	 * Note: Setup is called before after_setup_theme and Bunyad::options()->init() 
	 * at the hook bunyad_core_pre_init.
	 */
	public function setup()
	{
		
		/**
		 * Registered components can be filtered with a hook at bunyad_core_pre_init or in the 
		 * Bunyad::core()->init() bootstrap function via the key sphere_components.
		 */
		$this->components = apply_filters('sphere_plugin_components', array(
			'social-share', 'likes', 'social-follow'
		));
		
		foreach ($this->components as $component) {
			
			$name = sanitize_file_name($component);
			$base = SPHERE_COMPONENTS . $name;
			$file = $base . '.php';
			
			if (!file_exists($file)) {
				
				// Component directory?
				$subdir_file = $base . "/{$name}.php"; 
				
				if (is_dir($base) && file_exists($subdir_file)) {
					$file = $subdir_file;
				}
				else {
					// No file or directory found
					continue;
				}
				
			}

			require_once $file;
			
			$class = 'Sphere_Plugin_' . implode('', array_map('ucfirst', explode('-', $component)));
			if (class_exists($class)) {
				$this->registry[$component] = new $class;
			}
		}
	}
	
	/**
	 * Static shortcut to retrieve component object from registry
	 * 
	 * @param  string $component
	 * @return object|boolean 
	 */
	public static function get($component)
	{
		$object = self::instance();
		if (isset($object->registry[$component])) {
			return $object->registry[$component];
		}
		
		return false;
	}
	
	/**
	 * Get singleton object
	 * 
	 * @return Sphere_Plugin_Core
	 */
	public static function instance()
	{
		if (!isset(self::$instance)) {
			self::$instance = new self;
		}
		
		return self::$instance;
	}
}

Sphere_Plugin_Core::instance();