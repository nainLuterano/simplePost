<?php

require_once('../../index.php');


$Postagem->destroy($_GET['id']);

header("Location: /pages/listar/postagem.php");