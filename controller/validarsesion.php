<<?php
//archivo que permite validar la sesion

if(!isset($_SESSION['usuario'])  || !isset($_SESSION['tipo_use']))
{
    header("location:../../index.html");
    exit;
}
