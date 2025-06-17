<?php
$submodule = (isset($_GET['s'])) ? $_GET['s'] : 'view';
switch ($submodule) {
    case 'view': default:
        include('view.php');
        break;
    case 'add':
        include('kelas/add.php');
        break;
    case 'save':
        include('kelas/save.php');
        break;
    case 'edit':
        include('kelas/edit.php');
        break;
    case 'update':
        include('kelas/update.php');
        break;
    case 'delete':
        include('kelas/delete.php');
        break;
}
