<?php

namespace Jluct\ConfiguratorServerBundle\Controller;

use Jluct\ConfiguratorServerBundle\Entity\BlockConf;
use Jluct\ConfiguratorServerBundle\Entity\FileConf;
use Jluct\ConfiguratorServerBundle\Entity\Meanings;
use Jluct\ConfiguratorServerBundle\Entity\StringConf;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\VarDumper\VarDumper;

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

    public function getSettingFileAction($id)
    {
        $em = $this->getDoctrine()->getRepository('JluctConfiguratorServerBundle:FileConf');

        $data = $em->getFileAllData($id);

        VarDumper::dump($data);

        return $this->render('JluctConfiguratorServerBundle:Default:file-config.html.twig', [
                'data' => $data[0]]
        );
    }

    public function addDataAction()
    {
        $file = new FileConf();
        $file->setName('Squid');
        $file->setDate(new \DateTime());
        $file->setVersion('3.1.9');
        $file->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id quam vel mi commodo varius. Sed dapibus quam magna, cursus ultrices lacus elementum non. Proin ac egestas libero. Integer posuere enim ac nibh lacinia mollis. Ut congue porta condimentum. In aliquet maximus ante, non aliquet mauris aliquet eu. Integer bibendum, libero eget varius tincidunt, nisi nibh molestie diam, a vulputate sem mauris et ipsum. Maecenas ornare tempor elit, maximus varius erat iaculis in.");

        $block1 = new BlockConf();
        $block1->setName('AUTHENTICATION');
        $block1->setRequired(true);
        $block1->setDate(new \DateTime());

        $block2 = new BlockConf();
        $block2->setName('ACCESS');
        $block2->setRequired(true);
        $block2->setDate(new \DateTime());

        $block3 = new BlockConf();
        $block3->setName('NETWORK');
        $block3->setRequired(true);
        $block3->setDate(new \DateTime());

        $meanings1 = new Meanings();
        $meanings1->setName("'none'");

        $meanings2 = new Meanings();
        $meanings2->setName("'base'");

        //$block1
        $str1 = new StringConf();
        $str1->setName('auth_param');
        $str1->setType('string');
        $str1->setByDefault('none');
        $str1->setRequired(true);
        $str1->setOrders(1);


        $str2 = new StringConf();
        $str2->setName('authenticate_cache_garbage_interval');
        $str2->setType('time');
        $str2->setByDefault('1 hour');
        $str2->setRequired(true);
        $str2->setOrders(2);

        $str3 = new StringConf();
        $str3->setName('authenticate_ttl');
        $str3->setType('time');
        $str3->setByDefault('1 hour');
        $str3->setRequired(true);
        $str3->setOrders(3);

        $str4 = new StringConf();
        $str4->setName('authenticate_ip_ttl');
        $str4->setType('time');
        $str4->setByDefault('1 second');
        $str4->setRequired(true);
        $str4->setOrders(4);

        //$block2
        $str5 = new StringConf();
        $str5->setName('external_acl_type');
        $str5->setType('string');
        $str5->setByDefault('none');
        $str5->setRequired(true);
        $str5->setOrders(1);

        $str6 = new StringConf();
        $str6->setName('acl');
        $str6->setType('rule');
        $str6->setByDefault('');
        $str6->setRequired(true);
        $str6->setOrders(2);

        $str7 = new StringConf();
        $str7->setName('follow_x_forwarded_for');
        $str7->setType('rule');
        $str7->setByDefault('');
        $str7->setRequired(true);
        $str7->setOrders(3);

        $str8 = new StringConf();
        $str8->setName('acl_uses_indirect_client');
        $str8->setType('radio');
        $str8->setByDefault('on');
        $str8->setRequired(true);
        $str8->setOrders(4);

        $doc = $this->getDoctrine()->getManager();
        $doc->persist($file);
        $doc->flush();
        //file
        $file->addBlockConfig($block1);
        $file->addBlockConfig($block2);
        $file->addBlockConfig($block3);

        $doc->persist($file);
        $doc->flush();

        $block1->addStringConfig($str1);
        $block1->addStringConfig($str2);
        $block1->addStringConfig($str3);
        $block1->addStringConfig($str4);

        $block2->addStringConfig($str5);
        $block2->addStringConfig($str6);
        $block2->addStringConfig($str7);
        $block2->addStringConfig($str8);

        $doc->persist($file);
        $doc->flush();

        $str1->addMeaning($meanings1);
        $str1->addMeaning($meanings2);

        $doc->persist($file);
        $doc->flush();


//        $doc->persist($block1);


        try {
            return new Response('<div class="bg-success"><h2 class="text-center">Success</h2></div>', 200);
        } catch (Exception $e) {
            return new Response('<div class="bg-danger"><h2 class="text-center">' . $e->getMessage() . '</h2></div>', 200);
        }

    }

}
