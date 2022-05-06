<?php

class HomeController{
	public function index(){
		try{
			$loader = new \Twig\loader\FilesystemLoader('App/view');
			$twig = new \Twig\Environment($loader);
			$template = $twig->load('index.html');
		}
	}
}