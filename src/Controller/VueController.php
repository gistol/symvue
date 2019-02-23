<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("", name="vue")
 */
class VueController extends MyController
{
    /**
     * @Route("", name="_render_root")
     * @Route("{catch_all}", name="_render_all")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function renderVue()
    {
        $to_vue = ['app_name' => getenv('APP_NAME'),
                'welcome' => $this->welcome,
                'json_onload' => file_get_contents($this->getParameter('app.storage_dir').'json/example.json'),
        ];

        return $this->render('root.twig', $to_vue);
    }
}
