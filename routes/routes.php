<?php
new Router();
Router::set('/', 'views/index.php', 'IndexController');

Router::set('joke', 'views/joke.php', 'JokeController');

?>