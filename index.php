<?php
include "FunctionHandler.php";

FunctionHandler::addFunction('lower', function ($x) {
    return mb_strtolower($x);
});

FunctionHandler::addFunction('trim_spaces', function ($x) {
    return trim($x);
});

FunctionHandler::addContainer('tag', array('lower', 'trim_spaces'));

$data = '    Tag1     ';
$data = FunctionHandler::handle($data, 'tag');

echo $data;