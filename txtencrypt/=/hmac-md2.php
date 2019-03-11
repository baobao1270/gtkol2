<?php
echo hash_hmac('md2', $_POST['txt'], $_POST['key']);