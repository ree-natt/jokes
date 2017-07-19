<?php

class Jokes
{
	public static function getJokesIndex()
	{
		$db = Db::getConnection();
		$result = $db->query('SELECT * FROM jokes');
		$row = $result->fetchAll(PDO::FETCH_ASSOC);
		return $row;
	}
	

	public static function getJokesView($id)
	{

	}

	public static function addJokes($title, $description) 
	{
		try {
			$db = Db::getConnection();
			$sql ="INSERT INTO jokes SET title=" . $title . ", description=" . $description;
			$result = $db->prepare($sql);
			$result->execute();
		} catch (PDOException $e) {
			echo $e->getMessage();
		}


	}

}








?>