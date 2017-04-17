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

        $form = $this->createForm(BlockConfType::class, $block);

        $form->handleRequest($request);
        VarDumper::dump($form);

        if ($form->isSubmitted() && $form->isValid()) {
            $block->getDate();

            $em->persist($block);
            $em->flush();

            $this->addFlash('success', 'Block created!');

            return $this->redirectToRoute('jluct_configurator_server_admin_edit_block', ['block_id' => $block->getId()]);
        }

        return $this->render("JluctConfiguratorServerBundle:admin:block.html.twig", [
            'form' => $form->createView(),
            'file_id' => $file_id
        ]);
    }

    public function EditBlockAction($block_id, Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');
//        $em = $this->getDoctrine();

        $block = $em->getRepository('JluctConfiguratorServerBundle:BlockConf')->findOneBy(['id' => $block_id]);

        $form = $this->createForm(BlockConfType::class, $block, [
            'entity_manager' => $em
        ]);

        $form->handleRequest($request);
        VarDumper::dump($form);

        if ($form->isSubmitted() && $form->isValid()) {
            $block->getDate();

            $em->persist($block);
            $em->flush();

            VarDumper::dump($block);

            $this->addFlash('success', 'Block updated!');

        }

        return $this->render("JluctConfiguratorServerBundle:admin:block.html.twig", [
            'form' => $form->createView(),
            'file_id' => $block->getFileConfig()->getId()
        ]);
    }
    
    public function AddStringAction()
    {
        
    }

}