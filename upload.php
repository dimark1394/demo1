<?php
if (isset($_FILES['uploadingfile'])){
    $msg = array("msg" => "file ok");

    exit(json_encode($msg));
}
