<?

class Primitive
{
	public function __construct($name, $rules)
	{
		$this->name = $name;
		$this->rules = $rules;
	}
}

class StringPrimitive extends Primitive
{
	public function __construct()
	{
		parent::__construct('string', 'a-zA-Z');
	}
}

class Type
{
	public function __construct($name, $primitive, $rules)
	{
		$this->name = $name;
		$this->primitive = $primitive;
		$this->rules = $rules;
	}
}

$str = new StringPrimitive();

$authType = new Type('AuthType', $str, [
	'$or' => ['basic', 'advance'],
]);

// Возможная система описания Rules:
$rules = [
	'$and' => [
		'auth',
		'$or' => [
			'basic',
			'advanced',
		],
	],
];
// Можно читать как:
// auth $and (basic $or advanced)
