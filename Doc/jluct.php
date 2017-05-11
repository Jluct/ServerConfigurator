<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 10.05.2017
 * Time: 10:27
 */

// conf_foo basic -l
// conf_foo advanced 172.0.0.1 -a -l /etc/lib/foo

class ParamConf
{
	public $id;
	public $name = "conf_foo";
	public $isClonable = false;
	public $isUse; //по большому счёту можно обойтись и без него
	public $required = true;
	public $patterns = [];
}

class Param
{
	public $id;
	public $paramConf;
	public $usePattern;
}

class Pattern
{
	public $id;
	public $name;
	public $composition = [];
	public $rules = [];
	public $paramConf;
}

class Primitive
{
	public $id;
	public $name;
	public $rules;
}

class Type
{
	public $id;
	public $name;
	public $composition;
	public $rules; //?
	public $require;
	public $value;
}

$primitive1 = new Primitive();
$primitive1->name = 'string';
$primitive1->rules = 'a-zA-Z';

$primitive2 = new Primitive();
$primitive2->name = 'property';
$primitive2->rules = '^(\-){1}+[a-zA-Z]{1}';

$primitive3 = new Primitive();
$primitive3->name = 'ip';

$primitive4 = new Primitive();
$primitive4->name = 'path';

$type1 = new Type();
$type1->name = "foo-conf type";
$type1->require = true;
$type1->composition = [$primitive1];
$type1->value = 'basic'; //advanced || шо угодно

$type2 = new Type();
$type2->name = "foo-conf property";
$type2->require = true;
$type2->composition = [$primitive2];
$type2->value = '-l';

//value, required и прочую метаинфу далее не заполняю
$type3 = new Type();
$type3->name = "foo-conf ip";
$type3->composition = [$primitive3];

$type4 = new Type();
$type4->name = "foo-conf path";
$type4->composition = [$primitive4];

$pattern1 = new Pattern();
$pattern1->name = 'basic';
$pattern1->composition = [$type1, $type2];
$pattern1->rules = [$type1, 'IS', '-l']; //$type === '-l'

$pattern2 = new Pattern();
$pattern2->name = 'advanced';
$pattern2->composition = [$type1, $type3, $type2, $type2, $type4];

$conf_foo = new ParamConf();
$conf_foo->name = "foo_conf";
$conf_foo->isClonable = false;
$conf_foo->patterns = [$pattern1, $pattern2];

$conf = new Param();
$conf->paramConf = $conf_foo;
$conf->usePattern = $pattern1;

echo "<pre>";
print_r($conf);
echo "</pre>";

echo "<pre>";
	echo json_encode($conf);
echo "</pre>";


/**
 * Логика
 * Выбираем параметр, который хотим конфигурировать (ParamConf).
 * Смотрим по каким паттернам он заполняется ($conf_foo->patterns = [$pattern1, $pattern2];).
 * Выбираем паттерн и пр привязываем его к объекту значения параметра ($conf->usePattern = $pattern1;).
 * Смотрим из каких типов (Type) состоит паттерн ($pattern1->composition = [$type1, $type2];).
 * Тип является расширением для примитива (Primitive) и хранит в себе значение, метаинфу и прочее.
 * Тип можете состоять из нескольких примитивов, другого типа или нескольких типов.
 * Примитив отвечает за валидацию типа (path, ip, property, etc)
 * По именам примитивов осуществляется построение полей формы
 * поле для ip = ____.____.____.____
 * path = /____/_____/____/
 * const = -_
 *
 */
