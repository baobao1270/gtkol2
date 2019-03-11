<?php
echo hash_hmac('sha3-384', $_POST['txt'], $_POST['key']);