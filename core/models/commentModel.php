<?php 

class CommentModel extends DBmodel {
	function __construct() { parent::__construct(); }
	
	function __destruct() { parent::__destruct(); }

	function getNofComments() {
		return $this->query(
		'SELECT postid, COUNT(postid) as times 
		FROM comment 
		WHERE approved = 1
		GROUP BY postid 
		ORDER BY times DESC'
		);
	}
	
	function getCommentsForPost($postid) {
		return $this->query('SELECT * FROM comment WHERE approved = 1 AND postid = ' . $postid);
	}
	
	function addUser($input) {
		extract($input);
		$followup = 1;
		
		$statement = $this->connection->prepare('INSERT INTO user (email, followup, firstcomment) VALUES (?, ?, ?)');
		
		# Koppel de variabele $tekst aan het SQL toevoegen statement
		$statement->bind_param('sii', $email, $followup, $date);
		
		# Voer het SQL statement uit
		$statement->execute();
		
	}
	
	function getUser($email) {
		
		$statement = $this->connection->prepare('SELECT id FROM user WHERE email = ?');
		
		# Koppel de variabele $tekst aan het SQL toevoegen statement
		$statement->bind_param('s', $email);

		# Voer het SQL statement uit
		$statement->execute();
		
		$statement->bind_result($id);
		
		while ($statement->fetch()) {
			return $id;
		}
	}

	function addComment($input) {
		extract($input);
		
		$statement = $this->connection->prepare('INSERT INTO comment (userid, postid, email, name, website, comment, ip, date, session, approved) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
		
		# Koppel de variabele $tekst aan het SQL toevoegen statement
		$statement->bind_param('sisssssisi', $userid, $postid, $email, $name, $website, $comment, $ip, $date, $session, $approved);
		
		// print_R($input);
		
		# Voer het SQL statement uit
		$statement->execute();
	}
}

?>