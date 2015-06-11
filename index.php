<?php
include __DIR__ . DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';
use Jafaripur\Models\ModelsFactory;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
		<?php
		$mongoUser = ModelsFactory::getUsers(ModelsFactory::MONGO);
		$mongoUser2 = ModelsFactory::getUsers(); // Default database mode is over MongoDB
		$mysqlUser = ModelsFactory::getUsers(ModelsFactory::MYSQL);
		$fields = [
			'name' => 'Araz2',
			'family' => 'Jafaripur2',
		];
		echo '<p>MongoDB: ' . $mongoUser->addNewUser($fields) . '</p>';
		echo '<p>MySQL: ' . $mysqlUser->addNewUser($fields) . '</p>';
		?>
    </body>
</html>
