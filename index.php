<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
require __DIR__.'/vendor/autoload.php';

use ApiReddit\Searcher;

//Executes a new search
$search = new Searcher();
$json = $search->execSearch( 'Big_Tits_Big_Nips_HQ', '', 'new', 99);
$data = json_decode($json);

$loader = new Twig_Loader_Filesystem(__DIR__.'/templates');
$twig = new Twig_Environment($loader, array());

echo $twig->render('index.twig', array(
    'results' => $data->data->children,
));
