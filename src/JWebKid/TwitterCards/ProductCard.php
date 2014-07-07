<?php namespace JWebKid\TwitterCards;

class ProductCard extends TwitterCard{
	private $_site;
	private $_creator;
	private $_domain;
	private $_title;
	private $_image;
	private $_data;
	
	public function __construct(){
		parent::__construct("product");
	}

	public function site($site){
		$this->_site = $site;
		return $this;
	}

	public function creator($creator){
		$this->_creator = $creator;
		return $this;
	}

	public function domain($domain){
		$this->_domain = $domain;
		return $this;
	}

	public function title($title){
		$this->_title = $title;
		return $this;
	}

	public function image($image){
		$this->_image = $image;
		return $this;
	}

	public function data(array $data){
		$this->_data = $data;
		return $this;
	}

	public function emptyData(){
		$this->_data = [];
	}

	public function addData(array $data){
		array_push($this->_data, $data);
	}

	public function popData(){
		array_pop($this->_data);
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

	private function viewDomain(){
		if(!is_null($this->_domain)){
			$this->meta('domain', $this->_domain);
		}
	}

	private function viewTitle(){
		if(!is_null($this->_title)){
			$this->meta('title', $this->_title);
		}
	}

	private function viewImage(){
		if(!is_null($this->_image)){
			$this->meta('image', $this->_image);
		}
	}

	private function viewData(){
		if(!is_null($this->_data) && count($this->_data)){
			$count = 0;
			foreach($this->_data as $key => $value){
				$this->meta('label' . $count, $key);
				$this->meta('data1' . $count, $value);
				$count++;
			}
		}
	}

	public function view(){
		$this->meta('card', $this->_card);
		$this->viewSite();
		$this->viewCreator();
		$this->viewDomain();
		$this->viewTitle();
		$this->viewImage();
		$this->viewData();
	}
}