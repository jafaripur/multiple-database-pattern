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
		$mongoUser = Models::getUsers(Models::MONGO); // DB configuration can be string like an mysql or sqlserver
		$mongoUser2 = Models::getUsers(); // Default database configuration is MongoDB
		$mysqlUser = Models::getUsers(Models::MYSQL); // DB configuration can be string like an mysql or sqlserver
		$fields = [
			'name' => 'Araz2',
			'family' => 'Jafaripur2',
		];
		echo '<p>MongoDB: ' . $mongoUser->addNewUser($fields) . '</p>';
		echo '<p>MySQL: ' . $mysqlUser->addNewUser($fields) . '</p>';
		?>
    </body>
</html>
