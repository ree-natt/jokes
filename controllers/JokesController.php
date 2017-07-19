<?php
require_once(ROOT . '/models/Jokes.php');

class JokesController
{
	public function actionIndex()
	{

		$jokesList = Jokes::getJokesIndex();
		require_once(ROOT . '/views/jokes/index.php');
		return true;
	}

	public function actionView() 
	{
		echo 'Привет красавчик actionView';
		return true;
	}

	public function actionAdd()
	{
		require_once(ROOT . '/views/jokes/addForm.php');

		try {
			if (isset($_POST['title']) && isset($_POST['description'])) {
			$addJokes = Jokes::addJokes($_POST['title'], $_POST['description']);
			print_r($_POST);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}

		
	
		return true;
	}
}






?>