<?php

include_once './pageClass.php';
$oPage = new Page();
$oPage::$nowPage = isset($_GET['nowPage']) ? $_GET['nowPage'] : $oPage::$nowPage;
$oPage->pageList();
?>
