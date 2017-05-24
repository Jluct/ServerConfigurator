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
use Symfony\Component\HttpFoundation\JsonResponse;
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

		$primitive7 = new Primitive();
		$primitive7->setName('port');
		$primitive7->setRules('\d{1,5}');

		//TYPE
		$type1 = new Type($primitive1);
		$type1->setName('type auth');
		$type1->setRequired(true);
		$type1->setRules(['basic', 'OR', 'advance']); //будем хранить в отдельной таблице БД?

		$type2 = new Type($primitive2);
		$type2->setName('logging');
		$type2->setRequired(false);
		$type2->setRules(['-l']); //будем хранить в отдельной таблице БД?

		$type3 = new Type($primitive3);
		$type2->setName('path to log file');
		$type3->setRequired(false);
		$type3->setRules(['FILE_EXIST']);

		//PATTERN
		$pattern1 = new Pattern();
		$pattern1->setName('basic');
		$pattern1->setComposition([$type1, $type2, $type3]);
		$pattern1->setRules(
			['IF' => [
				'CONDITION' => [
					['OR',
						['NOT', '{{2.VALUE}}', 'NULL'],
						['NOT', '{{1.VALUE}}', 'NULL']
					]
				]
			], 'THEN' => [
				['IS', '2.VALUE', '-l'],
				['NOT', '{{2.VALUE}}', 'NULL']
			]
			]);

		$paramConf1 = new ParamConf();
		$paramConf1->setName('conf_auth_type');
		$paramConf1->addPattern($pattern1); //паттерн
		$paramConf1->setIsRepeated(false);

		$param1 = new Param();
		$param1->setName('conf_auth_type');
		$param1->addParamConf($paramConf1);
		// конкретное зачение

		/**
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
		 * conf_auth_session type
		 * [{file_path}]
		 * [ db_type [host [{port}] login password db_name]
		 * [/path/to/db] ]
		 *
		 * conf_auth_session type [{file_path}]                            [db_type     host       login    password   [db_name]]
		 * ------------------------------------------------------------------------------------------------------------------------
		 * conf_auth_session file /path/to/file || conf_auth_session db      mysql    127.0.0.1     root    Hn8dfmF8     foo_db    || conf_auth_session ram
		 */

		$conf_auth_session_type_name = new Type($primitive1);
		$conf_auth_session_type_name->setName("type use session");
		$conf_auth_session_type_name->setRules("TYPO_RULES)");
		$conf_auth_session_type_name->setRequired(true);

		$conf_auth_session_type_file_path = new Type($primitive3);
		$conf_auth_session_type_file_path->setName('PATH');
		$conf_auth_session_type_file_path->setRules('TYPO_RULES)');
		$conf_auth_session_type_file_path->setRequired(false);

		$conf_auth_session_type_db_type = new Type($primitive1);
		$conf_auth_session_type_db_type->setName('db type');
		$conf_auth_session_type_db_type->setRules('TYPO_RULES)');
		$conf_auth_session_type_db_type->setRequired(true);

		$conf_auth_session_type_db_login = new Type($primitive1);
		$conf_auth_session_type_db_login->setName('db login');
		$conf_auth_session_type_db_login->setRules('TYPO_RULES)');
		$conf_auth_session_type_db_login->setRequired(true);

		$conf_auth_session_type_db_password = new Type($primitive1);
		$conf_auth_session_type_db_password->setName('db password');
		$conf_auth_session_type_db_password->setRules('TYPO_RULES)');
		$conf_auth_session_type_db_password->setRequired(true);

		$conf_auth_session_type_db_name = new Type($primitive1);
		$conf_auth_session_type_db_name->setName('db name');
		$conf_auth_session_type_db_name->setRules('TYPO_RULES)');
		$conf_auth_session_type_db_name->setRequired(true);

		$conf_auth_session_type_db_port = new Type($primitive7);
		$conf_auth_session_type_db_port->setName('db port');
		$conf_auth_session_type_db_port->setRules('TYPO_RULES)');
		$conf_auth_session_type_db_port->setRequired(true);


		//PATTERN
		$conf_auth_session_pattern_file = new Pattern();
		$conf_auth_session_pattern_file->setName('session file pattern');
		$conf_auth_session_pattern_file->setComposition([$conf_auth_session_type_file_path]);
		$conf_auth_session_pattern_file->setRules(
			['IF' => [
				'CONDITION' => [
					['EXISTS', 'FILE', '{{0.value}}']
				],
			]]);


		$conf_auth_session_pattern_db = new Pattern();
		$conf_auth_session_pattern_db->setName('session db pattern');
		$conf_auth_session_pattern_db->setComposition([
			$conf_auth_session_type_db_type,
			$conf_auth_session_type_db_login,
			$conf_auth_session_type_db_password,
			$conf_auth_session_type_db_name,
			$conf_auth_session_type_db_port
		]);
		$conf_auth_session_pattern_db->setRules(
			['IF' => [
				'CONDITION' => [
					['IS', '{{0.value}}', 'mssql']
				],
				'THEN' => [
					['NOT', '{{4.value}}', 'NULL']
				]
			]]);

		$conf_auth_session_pattern = new Pattern();
		$conf_auth_session_pattern->setName("Паттерн хранения сессии");
		$conf_auth_session_pattern->setComposition([$conf_auth_session_type_name, $conf_auth_session_pattern_file, $conf_auth_session_pattern_db]);

		$paramConf2 = new ParamConf();
		$paramConf2->setName('conf_session_type');
		$paramConf2->addPattern($conf_auth_session_pattern); //паттерн
		$paramConf2->setIsRepeated(false);

		$param2 = new Param();
		$param2->setName('conf_auth_type');
		$param2->addParamConf($paramConf1);

		$group1 = new GroupConf();
		$group1->setName('foo_auth');
		$group1->addParam($paramConf1);
		$group1->addParam($paramConf2);

		$file = new FileConf();
		$file->setName('Foo');
		$file->addGroupsConfig($group1);


		VarDumper::dump($file); //отладчик
//		var_dump($file);
		return $this->render('JluctConfiguratorServerBundle:Default:index.html.twig');

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
