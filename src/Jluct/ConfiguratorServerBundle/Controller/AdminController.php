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
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\VarDumper\VarDumper;

class AdminController extends Controller
{
    public function AddBlockAction($file_id, Request $request)
    {
        $block = new BlockConf();

        $em = $this->get('doctrine.orm.entity_manager');

        $block->setFileConfig($em->getRepository('JluctConfiguratorServerBundle:FileConf')->findOneBy(['id' => $file_id]));

        //$this->getDoctrine()->getRepository('JluctConfiguratorServerBundle:BlockConf')->findBy(['fileConfig' => $file_id])

        $form = $this->createForm(BlockConfType::class, $block, [
            'entity_manager' => $em
        ]);

        $form->handleRequest($request);
//        VarDumper::dump($form);


        if ($form->isSubmitted() && $form->isValid()) {
            $block->getDate();

            if ($block->getDependencies()) {
                $em->transactional(function ($em) use (&$block) {

                    foreach ($block->getDependencies() as $item) {
                        $item->addDependent($block);
                        $em->persist($item);
                        $em->flush();
                    }

                    VarDumper::dump($block);
                    $em->persist($block);
                    $em->flush();
                });

            }


            $this->addFlash('success', 'post.created_successfully');

            VarDumper::dump($block);
        }


        return $this->render("JluctConfiguratorServerBundle:admin:block.html.twig", ['form' => $form->createView()]);
    }
}