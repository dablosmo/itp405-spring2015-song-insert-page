<?php

require_once __DIR__ . "/Database.php";

class ArtistQuery extends Database {

	public function getAll() {
		$sql = "
			SELECT *
			FROM artists
			ORDER BY artist_name
		";
		$statement = static::$pdo->prepare($sql);
		$statement->execute();
		
		return $statement->fetchAll(PDO::FETCH_OBJ);
	}
}