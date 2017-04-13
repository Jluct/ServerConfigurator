<?php
/**
 * Created by PhpStorm.
 * User: Inkognito
 * Date: 13.04.2017
 * Time: 21:49
 */

namespace Jluct\ConfiguratorServerBundle\Controller;


use Jluct\ConfiguratorServerBundle\Entity\BlockConf;
use Jluct\ConfiguratorServerBundle\Form\BlockConfType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function AddBlockAction()
    {
        $block = new BlockConf();

        $form = $this->createForm(BlockConfType::class, $block);

        return $this->render("JluctConfiguratorServerBundle:admin:block.html.twig", ['form' => $form->createView()]);
    }
}