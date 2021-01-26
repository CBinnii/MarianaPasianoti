<?php
global $s, $wp_query;

$wp_query->set('nopaging', 1);
require_once("page-search.php");