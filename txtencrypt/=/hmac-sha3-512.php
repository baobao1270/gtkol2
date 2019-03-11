<?php
echo hash_hmac('sha3-512', $_POST['txt'], $_POST['key']);