<?php
echo hash_hmac('sha3-256', $_POST['txt'], $_POST['key']);