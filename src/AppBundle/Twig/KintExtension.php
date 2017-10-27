<?php

namespace AppBundle\Twig;

// see http://stackoverflow.com/questions/33788496/use-kint-from-within-twig-template
class KintExtension extends \Twig_Extension {

	public function getFunctions(){
		return [
				new \Twig_SimpleFunction('kint', array($this, "kint")),
		];
	}

	public function getName(){
		return "kint_extension";
	}

	public function kint($var){
		\Kint::dump($var);
	}
}