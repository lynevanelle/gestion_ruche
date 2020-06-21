<?php

class Manager
{
    protected function dbConnect()
    {
        try {
            $db = new PDO('mysql:host=localhost;dbname=gestion_ruches;charset=utf8', 'root', '');
            return $db;

        } catch (Exception $e) { // S'il y a eu une erreur, alors...
            echo 'Erreur : ' . $e->getMessage();
            // $errorMessage = $e->getMessage();
            // require('view/errorView.php');
        }

    }
}