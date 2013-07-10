<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\ParameterBag;

use Webmis\Controllers\Dir\DirControllerProvider;
use Webmis\Controllers\Appeal\AppealControllerProvider;



$app->before(function (Request $request) {
    if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
        $data = json_decode($request->getContent(), true);
        $request->request = new ParameterBag(is_array($data) ? $data : array());
    }
});


$app->mount('/api/v1/appeals', new AppealControllerProvider());
$app->mount('/api/v1/dir', new DirControllerProvider());
