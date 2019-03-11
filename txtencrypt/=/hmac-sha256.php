<?php
echo hash_hmac('sha256', $_POST['txt'], $_POST['key']);