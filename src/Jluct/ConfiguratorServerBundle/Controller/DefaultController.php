<?php

namespace Jluct\ConfiguratorServerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('JluctConfiguratorServerBundle:Default:index.html.twig');
    }

    public function templateListAction()
    {
        return $this->render('JluctConfiguratorServerBundle:Default:template-list.html.twig');
    }

}
