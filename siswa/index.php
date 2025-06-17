<?php
$submodule = (isset($_GET['s'])) ? $_GET['s'] : 'view';
switch ($submodule){
    case 'view':
        include('siswa/view.php');
        break;

    case 'detail':
        include('siswa/detail.php');
        break;

    case 'add':
        include('siswa/add.php');
        break;

    case 'save':
        include('siswa/save.php');
        break;

    case 'edit':
        include('siswa/edit.php');
        break;

    case 'update':
        include('siswa/update.php');
        break;

    case 'delete':
        include('siswa/delete.php');
        break;

    default:
        include('takada.php');
        break;       
}
