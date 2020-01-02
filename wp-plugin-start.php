<?php
/**
* Plugin Name: Sitemino Fields [macao]
* Plugin URI: https://www.nazzilla.com/
* Description: Sistema integrazione campi x sistemino macao
* Version: 1.0
* Author: Nazzilla 🦖
* Author URI: http://nazzilla.com/
**/

if(!class_exists('WP_PLUGIN')){
    class WP_PLUGIN{

        public $plugin_domain;
        public $plugin_dir;
        public $plugin_url;

		public function __construct( ) {
			$this->plugin_domain = 'WP_PLUGIN';
			$this->plugin_dir    =  trailingslashit( dirname( __FILE__ ) );
			$this->plugin_url    =  plugin_dir_url(__FILE__);
			$this->version       = '1.0';

			add_action( 'admin_menu',   array( $this, 'admin_menu' ) );
			add_action( 'admin_init',  array( $this, 'admin_init' )  );
			add_action( 'admin_bar_menu', array( $this, 'customize_admin_bar' ) , 999 );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		}
		
		public function admin_init(){
		}

		public function admin_menu() { 
			add_management_page( 
				$this->plugin_domain, 
				$this->plugin_domain, 
				'manage_options', 
				$this->plugin_domain.'_plugin', 
				array( $this,  'render' )
			);
		}

		public function enqueue_scripts() {

			
			global  $post;

			$rmd = time();
			$file_js   = 		$this->plugin_dir . 'assets/js/plugin.js';
			$file_css  = 		$this->plugin_dir . 'assets/style.'.$this->plugin_domain.'.css';

			wp_enqueue_style(  $this->plugin_domain.'-style', $file_css );

			wp_enqueue_script( $this->plugin_domain.'-js', $file_js , array(), $rmd, true );
		
			$javascriptVars = array(
				'plugin_dir' => $this->plugin_dir,
				'ajaxurl' 	=> admin_url( 'admin-ajax.php' )
			);
		
			wp_localize_script( $this->plugin_domain.'-js', 'openmediareplace_vars', $javascriptVars);


		}

		public function render(){


		}
		
	}
}





if(class_exists('WP_PLUGIN')){
    $WP_PLUGIN = new WP_PLUGIN();	

}


