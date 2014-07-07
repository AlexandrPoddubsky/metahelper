<?php namespace JWebKid\OpenGraph;

class OpenGraph{
	private $_config;

	public function __construct($config){
		$this->_config = $config;
	}

	public function view(){
		$this->traverse($this->_config);
	}

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