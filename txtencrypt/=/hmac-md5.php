<?php
echo hash_hmac('md5', $_POST['txt'], $_POST['key']);