<?php

class ErrorController
{

    public function notFound() {
        require_once('../view/error-404.php');
    }

}