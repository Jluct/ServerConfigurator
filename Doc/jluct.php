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
	public $value;
}

class Pattern
{
	public $id;
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
$type1->value = 'basic';

$conf_foo = new ParamConf();
$conf_foo->name = "foo_conf";
$conf_foo->isClonable = false;
$conf_foo->patterns = [];



