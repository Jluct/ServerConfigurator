<?php

namespace Jluct\ConfiguratorServerBundle\Controller;

use Jluct\ConfiguratorServerBundle\Entity\BlockConf;
use Jluct\ConfiguratorServerBundle\Entity\FileConf;
use Jluct\ConfiguratorServerBundle\Entity\GroupConf;
use Jluct\ConfiguratorServerBundle\Entity\Meanings;
use Jluct\ConfiguratorServerBundle\Entity\Param;
use Jluct\ConfiguratorServerBundle\Entity\ParamConf;
use Jluct\ConfiguratorServerBundle\Entity\Pattern;
use Jluct\ConfiguratorServerBundle\Entity\Primitive;
use Jluct\ConfiguratorServerBundle\Entity\StringConf;
use Jluct\ConfiguratorServerBundle\Entity\Type;
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

		VarDumper::dump($data[0]);

		return $this->render('JluctConfiguratorServerBundle:Default:file-config.html.twig', [
				'data' => $data[0]
			]
		);
	}

	public function addDataAction()
	{

		/**
		 * For example:
		 * Конфигурация программы FOO
		 *
		 * Блок foo_auth
		 *
		 * basic - тип авторизации (basic, advance)
		 * -l - вести лог. Не обязательный параметр.
		 * /var/foo/log.txt - путь к файлу логов. Не обязательный параметр.
		 * Указывается только если указать флаг "-l" (далее зависим).
		 * Возможно не указывать путь и в этом случае он берётся из дефолтных настроект программы
		 *
		 * Дополнительные параметры
		 *
		 * 127.0.0.1 - адрес. Не обязательный параметр. Указывается только при типе advance
		 * -a - запретить не авторизацию вне указанного адреса. Не обязательный
		 *
		 * param_name         type auth   logging     path to log file
		 * ---------------------------------------------------------
		 *  conf_auth_type      basic       -l        /path/to/logs.txt    || conf_foo advance 127.0.0.1 -a -l
		 *
		 *
		 * type - тип хранения сессии (file, db, RAM)
		 * {file_path} - Путь к файлу с сессией. Не обязательный параметр.
		 * Зависим от типа хранения сессии
		 * db_type - название БД (mysql, mssql, sqlite)
		 * (1,2)
		 *      host - адрес расположения БД
		 *      {port} - номер порта. Необязательный параметр для mysql, но обязательный для mssql (ну просто для примера)
		 *      login - логин
		 *      password - пароль
		 *      db_name - имя БД
		 * (3)
		 *      /path/to/db - путь к базе данных.
		 *
		 * Дополнительные параметры
		 *
		 * 127.0.0.1 - адрес. Не обязательный параметр
		 *
		 * conf_auth_session type [{file_path}] [ db_type [host [{port}] login password db_name] [/path/to/db] ]
		 *
		 * conf_auth_session type [{file_path}]                            [db_type     host       login    password   [db_name]]
		 * --------------------------------------------------------------------------------------------------------------------
		 * conf_auth_session file /path/to/file || conf_auth_session db      mysql    127.0.0.1     root    Hn8dfmF8   foo_db || conf_auth_session ram
		 *
		 * Блок foo_proxy
		 * conf_baz 172.16.82.7 3200s
		 * **работаю над этим** *
		 */

		//PRIMITIVE

		$primitive1 = new Primitive();
		$primitive1->setName('string');
		$primitive1->setRules('a-zA-Z');

		$primitive2 = new Primitive();
		$primitive2->setName('property');
		$primitive2->setRules('^(\-){1}+[a-zA-Z]{1}');

		$primitive3 = new Primitive();
		$primitive3->setName('path');
		$primitive3->setRules('a-zA-Z+\\/');

		$primitive4 = new Primitive();
		$primitive4->setName('ip');
		$primitive4->setRules('[0-9]+\.{3}');

		$primitive5 = new Primitive();
		$primitive5->setName('time');
		$primitive5->setRules('[0-9]+s{1}');

		$primitive6 = new Primitive();
		$primitive6->setName('date');
		$primitive6->setRules('тут подумать нужно');

		//TYPE

		$type1 = new Type();
		$type1->setRequired(true);
		$type1->setPattern([$primitive1]);
		$type1->setRules(['basic', 'OR', 'advance']); //будем хранить в отдельной таблице БД?

		$type2 = new Type();
		$type2->setRequired(false);
		$type2->setPattern([$primitive2]);
		$type2->setRules(['-l']); //будем хранить в отдельной таблице БД?

		$type3 = new Type();
		$type3->setRequired(false);
		$type3->setPattern([$primitive3]);
		$type3->setRules(['FILE_EXIST']);


		//PATTERN
		$pattern1 = new Pattern();
		$pattern1->setName('basic');
		$pattern1->setComposition([$type1, $type2, $type3]);
		$pattern1->setRules([['{{type_2}}', 'IS', '-l'], 'AND', ['IF', '{{type_3}}', '{{type_2}}', 'IS', 'NOT', 'NULL']]);

		$file = new FileConf();
		$file->setName('Foo');
		$file->setDate(new \DateTime());
		$file->setDescription('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.');
		$file->setVersion('1.2.3 stable');

		$group1 = new GroupConf();
		$group1->setName('foo_auth');
		$group1->setDescription('Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.');
		$group1->setDate(new \DateTime());
		$group1->setActivity(true);
		$group1->setOrders(1);
		$group1->setRequired(false);

		$paramConf1 = new ParamConf();
		$paramConf1->setName('conf_auth_type');
		$paramConf1->addPattern($pattern1);
		$paramConf1->setIsRepeated(false);

		$param1 = new Param();
		$param1->setName('conf_auth_type');
		$param1->setRequired(true);
		$param1->setOrders(1);
		$param1->setActivity(true);
		$param1->setDate(new \DateTime());
		$param1->setDescription("Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.");
		$param1->addParamConf($paramConf1);
		$param1->setUsePattern($pattern1);
		$param1->addParamConf($paramConf1);


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
