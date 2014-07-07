<?php namespace JWebKid;

class MetaHelper{
	private $_card;
	private $_og;

	private $_title;
	private $_description;
	private $_next;
	private $_prev;
	private $_canonical;
	private $_charset;

	public function __construct(){
		$this->_card = null;
		$this->_og = null;
		$this->_title = null;
		$this->_description = null;
		$this->_next = null;
		$this->_prev = null;
		$this->_canonical = null;
		$this->_charset = "UTF-8";
	}

	public function og($config){
		$this->_og = new OpenGraph\OpenGraph($config);
		return $this;
	}

	public function card($card, array $config = array()){
		switch($card){
			case 'SummeryCard':
				$this->_card = new TwitterCards\SummeryCard();
				break;
			case 'SummeryImageCard':
				$this->_card = new TwitterCards\SummeryImageCard();
				break;
			case 'GalleryCard':
				$this->_card = new TwitterCards\GalleryCard();
				break;
			case 'ProductCard':
				$this->_card = new TwitterCards\ProductCard();
				break;
			case 'PhotoCard':
				$this->_card = new TwitterCards\PhotoCard();
				break;
			case 'AppCard':
				$this->_card = new TwitterCards\AppCard();
				break;
			case 'PlayerCard':
				$this->_card = new TwitterCards\PlayerCard();
				break;
		}

		foreach($config as $key => $value){
			if(method_exists($this->_card, $key))
				$this->_card->{$key}($value);
		}
		return $this;
	}

	public function setCard(){
		return $this->_card;
	}

	public function charset($charset = "UTF-8"){
		$this->_charset = $charset;
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

	public function next($next){
		$this->_next = $next;
		return $this;
	}

	public function prev($prev){
		$this->_prev = $prev;
		return $this;
	}

	public function canonical($canonical){
		$this->_canonical = $canonical;
		return $this;
	}

	private function viewCharset(){
		if(!is_null($this->_charset))
			echo '<meta charset="' . $this->_charset . '"/>';
	}

	private function viewTitle(){
		if(!is_null($this->_title))
			echo '<title>' . $this->_title . '</title>';
	}

	private function viewDescription(){
		if(!is_null($this->_description))
			echo '<meta name="description" content="' . $this->_description . '" />';
	}

	private function viewNext(){
		if(!is_null($this->_next))
			echo '<link rel="next" href="' . $this->_next . '" />';
	}

	private function viewPrev(){
		if(!is_null($this->_prev))
			echo '<link rel="prev" href="' . $this->_next . '" />';
	}

	private function viewCanonical(){
		if(!is_null($this->_canonical))
			echo '<link rel="canonical" href="' . $this->_canonical . '" />';
	}

	private function viewCard(){
		if(!is_null($this->_card))
			$this->_card->view();
	}

	private function viewOG(){
		if(!is_null($this->_og))
			$this->_og->view();
	}

	public function view(){
		$this->viewCharset();
		$this->viewTitle();
		$this->viewDescription();
		$this->viewNext();
		$this->viewPrev();
		$this->viewCanonical();

		$this->viewCard();
		$this->viewOG();
	}
}