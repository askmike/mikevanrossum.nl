<?php 

class ProjectModel extends DBmodel {
	
	function __construct() { parent::__construct(); }
	
	function __destruct() { parent::__destruct(); }

	function getProjects() {
		return $this->query('SELECT * FROM project');
	}
	
	public function getProject($url) {
		
		$statement = $this->connection->prepare('SELECT * FROM project WHERE url = ?');
		
		# Koppel de variabele $tekst aan het SQL toevoegen statement
		$statement->bind_param('s', $url);

		# Voer het SQL statement uit
		$statement->execute();
		
		$statement->bind_result($id, $date, $titel, $bodyMd, $bodyHtml, $excerpt, $modifyDate, $url);
		
		while ($statement->fetch()) {
			$array =  array(
				'id' => $id, 
				'titel' => $titel, 
				'bodyHtml' => $bodyHtml, 
				'bodyMd' => $bodyMd,
				'meta' => $meta,
				'date' => $date, 
				'url' => $url, 
				'excerpt' => $excerpt
				);
		}
		
		return $array;
	}
}

?>