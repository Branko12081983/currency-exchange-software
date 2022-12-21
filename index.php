<?php
include 'includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include 'controllers/controllers.php';
include 'controllers/db-controllers.php';
include 'controllers/hidden-inputs.php';

if($uc_diference>86400){
include 'controllers/update-rates.php';
}
echo $basic->hidden_inputs();
echo $theme->upper_page();
echo $theme->theme_style('styles/bootstrap.min.css');
echo $theme->theme_style('styles/style.css?id=1234');
echo $theme->middle_page();
include 'pages/home.php';
echo $theme->theme_script('https://code.jquery.com/jquery-3.6.2.min.js');
echo $theme->theme_script('scripts/bootstrap.bundle.min.js');
echo $theme->theme_script('scripts/js.js');
echo $theme->down_page();
