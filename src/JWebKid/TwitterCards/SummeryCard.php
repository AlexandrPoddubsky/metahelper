<?php namespace JWebKid\TwitterCards;

class SummeryCard extends TwitterCard{
	private $_site;
	private $_title;
	private $_description;
	private $_image;
	private $_url;

	public function __construct(){
		parent::__construct("summary");
	}

	public function site($site){
		$this->_site = $site;
		return $this;
	}

	public function title($title){
		$this->_title = $title;
		return $this;
	}

	public function description($description){
		$this->_description = $description;
		return $this;
	}

	public function image($image){
		$this->_image = $image;
		return $this;
	}

	public function url($url){
		$this->_url = $url;
		return $this;
	}

	private function viewSite(){
		if(!is_null($this->_site)){
			$this->meta('site', $this->_site);
		}
	}

	private function viewTitle(){
		if(!is_null($this->_title)){
			$this->meta('title', $this->_title);
		}
	}

	private function viewDescription(){
		if(!is_null($this->_description)){
			$this->meta('description', $this->_description);
		}
	}

	private function viewImage(){
		if(!is_null($this->_image)){
			$this->meta('image', $this->_image);
		}
	}

	private function viewUrl(){
		if(!is_null($this->_url)){
			$this->meta('url', $this->_url);
		}
	}

	public function view(){
		$this->meta('card', $this->_card);
		$this->viewSite();
		$this->viewTitle();
		$this->viewDescription();
		$this->viewImage();
		$this->viewUrl();
	}
}