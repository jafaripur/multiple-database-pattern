<?php
include __DIR__ . DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';
use Jafaripur\Models\Factory\Models;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
		<?php
		$mongoUser = Models::getUsers(Models::MONGO, Models::MONGO); // DB configuration can be string like an MongoDB
		$mongoUser2 = Models::getUsers(); // Default database mode is over MongoDB and default db configuration
		$mysqlUser = Models::getUsers(Models::MYSQL, Models::MYSQL); // DB configuration can be string like an MySQL
		$fields = [
			'name' => 'Araz2',
			'family' => 'Jafaripur2',
		];
		echo '<p>MongoDB: ' . $mongoUser->addNewUser($fields) . '</p>';
		echo '<p>MySQL: ' . $mysqlUser->addNewUser($fields) . '</p>';
		?>
    </body>
</html>
