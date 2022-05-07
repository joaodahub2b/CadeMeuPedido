<?php

class HomeController{
	public function index(){
		try{
			$loader = new \Twig\loader\FilesystemLoader('App/View');
			$twig = new \Twig\Environment($loader);
			$template = $twig->load('PesquisaPedido.html');
			echo $template->render();
		}catch(Exception $e){
			echo $e->getMessage();
		}
	}
}