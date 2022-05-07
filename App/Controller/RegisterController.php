<?php

class RegisterController{
	public function index(){
		try{
			$loader = new \Twig\loader\FilesystemLoader('App/View');
			$twig = new \Twig\Environment($loader);
			$template = $twig->load('CadastraUsuario.html');
			echo $template->render();
		}catch(Exception $e){
			echo $e->getMessage();
		}
	}

	public function Insert(){
		Order::Insert($_POST);
	}

	public function SelectById(){
		$Order = Order::SelectById($_GET);
	}

	public function Display($Order){
		try{
			$loader = new \Twig\Loader\FilesystemLoader('App/View');
			$twig = new \Twig\Environment($loader);
			$template = $twig->load('single.html');

			
			$parametros = array();
			$parametros['id'] = $postagens->id;
			$parametros['titulo'] = $postagens->titulo;
			$parametros['conteudo'] = $postagens->conteudo;
			$parametros['comentarios'] = $postagens->comentarios;

			$conteudo = $template->render($parametros);
			echo $conteudo;

		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
}