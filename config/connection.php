<?php
	class Connection {
		public static function getConnection() {
			//$connection = mysqli_connect('omobosoftwareinterface.com', 'ebiomo7_aida', 'LOVEebi@1', 'ebiomo7_aida') or die(mysqli_error());
						$connection = mysqli_connect('localhost', 'ebiomo7_aida', 'LOVEebi@1', 'ebiomo7_aida') or die(mysqli_error());
			return $connection;
		}
	}
?>