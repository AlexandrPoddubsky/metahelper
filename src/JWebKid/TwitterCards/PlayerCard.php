<?php namespace JWebKid\TwitterCards;

class PlayerCard extends TwitterCard{
	private $_title;
	private $_description;
	private $_player;
	private $_playerWidth;
	private $_playerHeight;
	private $_image;
	private $_playerStream;
	private $_playerStreamContentType;

	public function __construct(){
		parent::__construct("player");
	}

	public function title($title){
		$this->_title = $title;
		return $this;
	}

	public function description($description){
		$this->_description = $description;
		return $this;
	}

	public function player($player){
		$this->_player = $player;
		return $this;
	}

	public function playerWidth($playerWidth){
		$this->_playerWidth = $playerWidth;
		return $this;
	}

	public function playerHeight($playerHeight){
		$this->_playerHeight = $playerHeight;
		return $this;
	}

	public function image($image){
		$this->_image = $image;
		return $this;
	}

	public function playerStream($playerStream){
		$this->_playerStream = $playerStream;
		return $this;
	}

	public function playerStreamContentType($playerStreamContentType){
		$this->_playerStreamContentType = $playerStreamContentType;
		return $this;
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

	private function viewPlayer(){
		if(!is_null($this->_player)){
			$this->meta('player', $this->_player);
		}
	}

	private function viewPlayerWidth(){
		if(!is_null($this->_playerWidth)){
			$this->meta('playerWidth', $this->_playerWidth);
		}
	}

	private function viewPlayerHeight(){
		if(!is_null($this->_playerHeight)){
			$this->meta('playerHeight', $this->_playerHeight);
		}
	}

	private function viewImage(){
		if(!is_null($this->_image)){
			$this->meta('image', $this->_image);
		}
	}

	private function viewPlayerStream(){
		if(!is_null($this->_playerStream)){
			$this->meta('playerStream', $this->_playerStream);
		}
	}

	private function viewPlayerStreamContentType(){
		if(!is_null($this->_playerStreamContentType)){
			$this->meta('playerStreamContentType', $this->_playerStreamContentType);
		}
	}


	public function view(){
		$this->meta('card', $this->_card);
		$this->viewTitle();
		$this->viewDescription();
		$this->viewPlayer();
		$this->viewPlayerWidth();
		$this->viewPlayerHeight();
		$this->viewImage();
		$this->viewPlayerStream();
		$this->viewPlayerStreamContentType();
	}
}