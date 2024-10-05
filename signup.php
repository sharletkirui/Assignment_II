<?php
    require_once "load.php";
    $ObjLayouts->heading();
    $ObjMenus->main_menu();
    $Objforms->sign_up_form($ObjGlob);
    $ObjAuth->signup($conn, $ObjGlob, $ObjSendMail, $lang, $conf);
