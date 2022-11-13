<?php

require 'lib.php';
require 'markdown/markdown.php';

if (empty($_GET['page'])) {
    $page="toc";
} else {
    $page = safe_string(basename($_GET['page']));
}

// echo "<pre>\n"; print_r($_SERVER['HTTP_REFERER']); echo "</pre>";

if (!empty($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
} else if (!empty($_SERVER['HTTP_REFERER'])) {
    $ref = preg_match("/keyword=([a-z0-9 ]*)/i", $_SERVER['HTTP_REFERER'], $match);
    if (isset($match[1])) {
        $keyword = $match[1];
    }
    //echo "<pre>\n"; print_r($match); echo "</pre>";
}

if (empty($keyword)) {
    $keyword = "Search the PivotX book";
}

list($contents, $sidebar, $title) = fetch_page($page, $keyword);

list($prev, $next) = get_links();


// Configure Smarty.
require 'smarty/Smarty.class.php';
$smarty = new Smarty;
$smarty->template_dir   = './templates';
$smarty->caching = false;
$smarty->force_compile = false;
$smarty->compile_dir    = './templates_c';
$smarty->cache_dir    = './templates_c';
$smarty->left_delimiter = "[[";
$smarty->right_delimiter = "]]";
$smarty->debugging = false;
$smarty->cache_lifetime = 900; // 15 minutes for now.

$smarty->assign('contents', $contents);
$smarty->assign('title', $title);
$smarty->assign('self', $_SERVER['REQUEST_URI']);
$smarty->assign('sidebar', $sidebar);
$smarty->assign('keyword', $keyword);
$smarty->assign('next', $next);
$smarty->assign('prev', $prev);

$smarty->display('base.tpl');

?>
