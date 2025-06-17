<?php
$module = (isset($_GET['m'])) ? $_GET['m'] : 'home';
switch ($module) {
    case 'home': default:
        include('home.php');
        break;
    case 'kelas':
        include('kelas/index.php');
        break;
    case 'siswa':
        include('siswa/index.php');
        break;
}
