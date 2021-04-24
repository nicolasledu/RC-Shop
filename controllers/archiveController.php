<?php
require_once './models/Archive.php';
$archives = getAllArchives();
include './views/archive.php';