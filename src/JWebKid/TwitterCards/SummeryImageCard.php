<?php namespace JWebKid\TwitterCards;

class SummeryImageCard extends TwitterCard{
	private $_site;
	private $_creator;
	private $_title;
	private $_description;
	private $_image;

	public function __construct(){
		parent::__construct("summary_large_image");
	}

	public function site($site){
		$this->_site = $site;
		return $this;
	}

	public function creator($creator){
		$this->_creator = $creator;
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

	private function viewSite(){
		if(!is_null($this->_site)){
			$this->meta('site', $this->_site);
		}
	}

	private function viewCreator(){
		if(!is_null($this->_creator)){
			$this->meta('creator', $this->_creator);
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

	public function view(){
		$this->meta('card', $this->_card);
		$this->viewSite();
		$this->viewCreator();
		$this->viewTitle();
		$this->viewDescription();
		$this->viewImage();
	}
}