<?php

namespace App\Controllers;

use Framework\Helpers\Utility;
use Framework\Template\TemplateEngine;

class TestController extends BaseController
{
    function display()
    {
        echo Utility::generateRandomToken(2);
    }

}