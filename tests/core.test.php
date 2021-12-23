<?php

use Leaf\Router;

test('static call', function () {
	expect(Router::routes())->toBeArray();
});

test('set 404', function () {
	$r0 = new Router;
	$r0->set404(function () {
		echo '404';
	});

	ob_start();
	$r0->run();

	expect(ob_get_contents())->toBe('404');
	ob_end_clean();
});

test('set down', function () {
	$router = new Router;
	$router->configure(['app.down' => true]);

	$router->setDown(function () {
		echo 'down';
	});

	ob_start();
	$router->run();

	expect(ob_get_contents())->toBe('down');
	ob_end_clean();

	// clean up
	$router->configure(['app.down' => false]);
});
