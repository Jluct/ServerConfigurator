<?php

namespace Jluct\ConfiguratorServerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\VarDumper\VarDumper;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('JluctConfiguratorServerBundle:Default:index.html.twig');
    }

    public function getDataAction()
    {


//        return $response;
    }

    public function getSettingFileAction($id)
    {
        $em = $this->getDoctrine()->getRepository('JluctConfiguratorServerBundle:FileConf');

        $data = $em->getFileAllData($id);

        VarDumper::dump($data[0]);

        return $this->render('JluctConfiguratorServerBundle:Default:file-config.html.twig', [
                'data' => $data[0]
            ]
        );
    }

    public function DataAction()
    {
        

        VarDumper::dump($file); //отладчик
//		var_dump($file);
        return $this->render('JluctConfiguratorServerBundle:Default:index.html.twig', ['data' => json_encode($file)]);

        //VarDumper::dump($file); //отладчик

//		$encoders = array(new XmlEncoder(), new JsonEncoder());
//		$normalizers = array(new ObjectNormalizer());

//		$serializer = new Serializer($normalizers, $encoders);
//
//		$data = $serializer->serialize($file, 'json');
//
//		return new Response($data);

//		return $this->render('JluctConfiguratorServerBundle:Default:index.html.twig');


//		$doc = $this->getDoctrine()->getManager();
//
//
//		try {
//			$doc->persist($file);
//			$doc->flush();
//
//			return new Response('<div class="bg-success"><h2 class="text-center">Success</h2></div>', 200);
//		} catch (Exception $e) {
//			return new Response('<div class="bg-danger"><h2 class="text-center">' . $e->getMessage() . '</h2></div>', 200);
//		}

    }

}
