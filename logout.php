<?php
session_start();
unset($_SESSION["usuario"]);//exclui da sessao
header("location: index.php");

