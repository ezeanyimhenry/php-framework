<?php
namespace App\Controllers;

use Framework\Template\TemplateEngine;

class TestController extends BaseController
{
    public function renderTemplate()
    {
        $template = new TemplateEngine();


        $contentPage = 'template.php';
        // $template->assign('activity', 'test');
        $data = [
            'activity' => 'activities',
            'userDetails' => $_SESSION['userDetails'],
            'users' => [
                ['name' => 'User 1'],
                ['name' => 'User 2'],
                ['name' => 'User 3'],
            ],
            'test' => [
                'test1' => [
                    'name' => 'Test 1',
                ]
            ],

        ];
        $template->render('template', $data);
    }


}