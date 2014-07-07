<?php namespace JWebKid\TwitterCards;

class AppCard extends TwitterCard{
	private $_description;
	private $_appIdIphone;
	private $_appIdIpad;
	private $_appIdGoogleplay;
	private $_appUrlIphone;
	private $_appUrlIpad;
	private $_appUrlGoogleplay;
	private $_appNameIphone;
	private $_appNameIpad;
	private $_appNameGoogleplay;
	private $_appCountry;

	public function __construct(){
		parent::__construct("app");
		$this->_description = null;
		$this->_appIdIphone = null;
		$this->_appIdIpad = null;
		$this->_appIdGoogleplay = null;
		$this->_appUrlIphone = null;
		$this->_appUrlIpad = null;
		$this->_appUrlGoogleplay = null;
		$this->_appNameIphone = null;
		$this->_appNameIpad = null;
		$this->_appNameGoogleplay = null;
		$this->_appCountry = null;
	}

	public function description($description){
		$this->_description = $description;
		return $this;
	}

	public function appIdIphone($appIdIphone){
		$this->_appIdIphone = $appIdIphone;
		return $this;
	}

	public function appIdIpad($appIdIpad){
		$this->_appIdIpad = $appIdIpad;
		return $this;
	}

	public function _appIdGoogleplay($_appIdGoogleplay){
		$this->__appIdGoogleplay = $_appIdGoogleplay;
		return $this;
	}

	public function appUrlIphone($appUrlIphone){
		$this->_appUrlIphone = $appUrlIphone;
		return $this;
	}

	public function appUrlIpad($appUrlIpad){
		$this->_appUrlIpad = $appUrlIpad;
		return $this;
	}

	public function appUrlGoogleplay($appUrlGoogleplay){
		$this->_appUrlGoogleplay = $appUrlGoogleplay;
		return $this;
	}

	public function appCountry($appCountry){
		$this->_appCountry = $appCountry;
		return $this;
	}

	public function appNameIphone($appNameIphone){
		$this->_appNameIphone = $appNameIphone;
		return $this;
	}

	public function appNameIpad($appNameIpad){
		$this->_appNameIpad = $appNameIpad;
		return $this;
	}

	public function appNameGoogleplay($appNameGoogleplay){
		$this->_appNameGoogleplay = $appNameGoogleplay;
		return $this;
	}

	private function viewDescription(){
		if(!is_null($this->_description)){
			$this->meta('description', $this->_description);
		}
	}
	
	private function viewAppIdIphone(){
		if(!is_null($this->_appIdIphone)){
			$this->meta('app:id:iphone', $this->_description);
		}
	}
	
	private function viewAppIdIpad(){
		if(!is_null($this->_appIdIpad)){
			$this->meta('app:id:ipad', $this->_description);
		}
	}
	
	private function viewAppIdGoogleplay(){
		if(!is_null($this->_appIdGoogleplay)){
			$this->meta('app:id:googleplay', $this->_description);
		}
	}
	
	private function viewAppUrlIphone(){
		if(!is_null($this->_appUrlIphone)){
			$this->meta('app:url:iphone', $this->_description);
		}
	}
	
	private function viewAppUrlIpad(){
		if(!is_null($this->_appUrlIpad)){
			$this->meta('app:url:ipad', $this->_description);
		}
	}
	
	private function viewAppUrlGoogleplay(){
		if(!is_null($this->_appUrlGoogleplay)){
			$this->meta('app:url:googleplay', $this->_description);
		}
	}
	
	private function viewAppNameIphone(){
		if(!is_null($this->_appNameIphone)){
			$this->meta('app:name:iphone', $this->_description);
		}
	}
	
	private function viewAppNameIpad(){
		if(!is_null($this->_appNameIpad)){
			$this->meta('app:name:ipad', $this->_description);
		}
	}
	
	private function viewAppNameGoogleplay(){
		if(!is_null($this->_appNameGoogleplay)){
			$this->meta('app:name:googleplay', $this->_description);
		}
	}
	
	private function viewAppCountry(){
		if(!is_null($this->_appCountry)){
			$this->meta('app:country', $this->_description);
		}
	}
	

	public function view(){
		$this->meta('card', $this->_card);
		$this->viewDescription();
		$this->viewAppIdIphone();
		$this->viewAppIdIpad();
		$this->viewAppIdGoogleplay();
		$this->viewAppUrlIphone();
		$this->viewAppUrlIpad();
		$this->viewAppUrlGoogleplay();
		$this->viewAppNameIphone();
		$this->viewAppNameIpad();
		$this->viewAppNameGoogleplay();
		$this->viewAppCountry();
	}
}