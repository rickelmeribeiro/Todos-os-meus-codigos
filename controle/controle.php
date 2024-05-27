<?php
$controle = filter_input(INPUT_POST, 'controle', FILTER_SANITIZE_STRING);
if (!empty($controle) && isset($controle)) {

    if ($controle == 'listarAdm') {
        include_once 'listarAdm.php';
    } else if ($controle == 'addAdm') {
        include_once 'addAdm.php';
    } else if ($controle == 'editAdm') {
        include_once 'editAdm.php';
    } else if ($controle == 'excAdm') {
        include_once 'excAdm.php';
    } else if ($controle == 'listarProduto') {
        include_once 'listarProduto.php';
    } else if ($controle == 'addProduto') {
        include_once 'addProduto.php';
    } else if ($controle == 'editProduto') {
        include_once 'editProduto.php';
    } else if ($controle == 'excProduto') {
        include_once 'excProduto.php';
    } else if ($controle == 'listarContato') {
        include_once 'listarContato.php';
    } else if ($controle == 'addContato') {
        include_once 'addContato.php';
    } else if ($controle == 'editContato') {
        include_once 'editContato.php';
    } else if ($controle == 'excContato') {
        include_once 'excContato.php';
    } else if ($controle == 'addContatoMenu') {
        include_once 'addContatoMenu.php';
    } else if ($controle == 'editBanner') {
        include_once 'editBanner.php';
    } else if ($controle == 'listarBanner') {
        include_once 'listarBanner.php';
    }
}