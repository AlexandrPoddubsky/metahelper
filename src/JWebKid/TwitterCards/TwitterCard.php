<?php namespace JWebKid\TwitterCards;

abstract class TwitterCard{
	protected $_card;

	protected function __construct($card){
		$this->_card = $card;
	}

	abstract function view();

	protected function meta($property, $content){
		echo '<meta name="twitter:' . $property . '" content="' . $content . '" />';
	}
}