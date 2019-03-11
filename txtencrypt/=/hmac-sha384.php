<?php
echo hash_hmac('sha384', $_POST['txt'], $_POST['key']);