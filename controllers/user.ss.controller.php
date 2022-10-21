<?php

//SS hace referenia a SERVERSIDE
require_once '../models/Serverside.php';

$serverSide->get('vista_user_details_full', 'user_id', array('user_id', 'username', 'first_name', 'last_name', 'gender'));

?>