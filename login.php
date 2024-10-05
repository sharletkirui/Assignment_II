<?php
    require_once "load.php";
    $ObjLayouts->heading();
    $ObjMenus->main_menu();
    $Objforms->login_form($ObjGlob);
    $ObjAuth->login($conn, $ObjGlob);