<?php namespace JWebKid\OpenGraph;

class OpenGraph{
	/**
	* Open Graph configuration.
	*
	* @var array
	*/
	private $_config;

	/**
	 * Create a new Open Graph Object
	 * 
	 * @param array $config
	 * @return void
	 */
	public function __construct($config){
		$this->_config = $config;
	}
	
	/**
	 * Display Open Graph Tags
	 * 
	 * @return string 
	 */
	public function view(){
		$this->traverse($this->_config);
	}

	/**
	 * Parse and build the Open Graph Meta Tags
	 * 
	 * @param array $config
	 * @param string $path
	 */
	private function traverse($config, $path = "og"){
		if(count($config)){
			foreach($config as $key => $value){
				$temPath = $path;
				$temPath .= ":" . $key;
				if(is_array($value)){
					$this->traverse($value, $temPath);
				}else{
					echo '<meta property="' . $temPath . '" content="' . $value . '" />';
				}
			}
		}
	}
}
