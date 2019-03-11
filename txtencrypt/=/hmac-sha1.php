<?php
echo hash_hmac('sha1', $_POST['txt'], $_POST['key']);