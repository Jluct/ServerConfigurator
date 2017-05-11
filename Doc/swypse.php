// conf_foo basic -l
// conf_foo advanced 172.0.0.1 -a -l /etc/lib/foo
<?
	// типа без групп пока
	class Config { public $params; }
	
	class Type { 
		public $struct; 
		public function __construct($struct) {
			$this->struct = $struct;
		}
	}
	
	class Const extends Type {
		public function __construct($value) {
			$this->value = $value;
		}
	}
	
	class IP extends Type { }
	
	class Path extends Type { }
	
	$ConfFooBasic = new Type([
		new Const('basic'),
		new Const('-l'),
	]);
	
	$ConfFooAdvanced = new Type([
		new Const('advanced'),
		new IP(),
		new Const('-a'),
		new Const('-l'),
		new Path()
	]);
	
	$ConfFoo = new Type([
		$ConfFooBasic,
		'OR', // для примера
		$ConfFooAdvanced
	]);
	
	$config = new Config();
	$config->params = [$ConfFoo];
?>
<script>
ConfFoo = {
	struct: [
		{type: 'Const', value: 'conf_foo'},
		[
			// selected — грубый пример.
			// например, в момент работы с конфигом путь выбирается так.
			{type: 'ConfFooBasic', selected: true},
			'OR',
			{type: 'ConfFooAdvanced'}
		]
	]
};
// Если не нравится введение типа ConfFooBasic,
// можно и на месте в массиве определить:
//  struct: [
//      {type: 'Const', value: 'conf_foo'},
//      [
//          {type: 'Const', value: 'basic'},
//          {type: 'Const', value: '-l'}
//      ],
//      'OR',
//      {type: 'ConfFooAdvanced'}
//  }

ConfFooBasic = {
	struct: [
		{type: 'Const', value: 'basic'},
		{type: 'Const', value: '-l'}
	]
};

ConfFooAdvanced = {
	struct: [
		{type: 'Const', value: 'advanced'},
		{type: 'IP'},
		{type: 'Const', value: '-a'},
		{type: 'Const', value: '-l'},
		{type: 'Path'}
	]
};

IP = {
	// возможно, пустой даже
	// по типу тогда просто регулярка нужная будет выбрана валидатором.
};

Path = {
	// возможно, пустой даже
	// по типу тогда просто регулярка нужная будет выбрана валидатором.
};

// Пример примерной структуры конфига
Config = {
	groups: [
		{
			params: [
				// Первая строка (параметр) первой группы типа  ConfFoo.
				// Структура типа показывает, как вести себя строка может.
				{
					type: 'ConfFoo',
					// прочая любая инфа о параметре
					isInUse: true, required: true, isCloneable: true
				}
			]
		}
	]
};

// Логика парсера:
/*
 Перебираем группы конфига.
 Перебираем строки группы.
 Берем тип строки.
 --Перебираем struct типа
 --Берем тип элемента массива struct
 --Если не массив:
 ----Берем тип элемента (Const, например)
 ----Делаем что-то с типом (проверяем, выводим форму, подсказку, ...)
 */

// Возможно, понядобятся дополнительный флаги/мета инфа, хз.
// Возможно, проще работать будет с примитивами или флагом типа:
// { type: 'Const', isPrimitive: true }
// хз, тут во время работы будет ясно
</script>
