<?php namespace JWebKid\TwitterCards;

class GalleryCard extends TwitterCard{
	private $_site;
	private $_creator;
	private $_title;
	private $_description;
	private $_url;
	private $_gallery;

	public function __construct(){
		parent::__construct("gallery");
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

	public function url($url){
		$this->_url = $url;
		return $this;
	}

	public function gallery(array $gallery){
		$this->_gallery = $gallery;
		return $this;
	}

	public function emptyGallery(){
		$this->_gallery = [];
	}

	public function addGallery(array $gallery){
		array_push($this->_gallery, $gallery);
	}

	public function popGallery(){
		array_pop($this->_gallery);
	}

	public function dequeueGallery(){
		$this->_gallery[count($this->_gallery[]) - 1] = null;
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

	private function viewUrl(){
		if(!is_null($this->_url)){
			$this->meta('url', $this->_url);
		}
	}

	private function viewGallery(){
		if(!is_null($this->_gallery) && count($this->_gallery)){
			foreach($this->_gallery as $key => $image){
				$this->meta('image' . $key, $image);
			}

		}
	}

	public function view(){
		$this->meta('card', $this->_card);
		$this->viewSite();
		$this->viewCreator();
		$this->viewTitle();
		$this->viewDescription();
		$this->viewUrl();
		$this->viewGallery();
	}
}