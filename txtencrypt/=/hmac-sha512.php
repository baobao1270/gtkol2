<?php
echo hash_hmac('sha512', $_POST['txt'], $_POST['key']);