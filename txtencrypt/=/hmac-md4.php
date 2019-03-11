<?php
echo hash_hmac('md4', $_POST['txt'], $_POST['key']);