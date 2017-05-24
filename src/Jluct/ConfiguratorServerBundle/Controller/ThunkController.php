<?

class Primitive
{
	public function __construct($name, $rules)
	{
		$this->name = $name;
		$this->rules = $rules;
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

$pattern = new Pattern();
$pattern1->setComposition([$type1, $type2, $type3]);
$type1->addValue($param->id, $value);
//value =[1=> value ]


/**
 * IF...THEN
 * AND, OR, NOT, IS
 *
 * IF {{$TYPE1->VALUE}} IS 'PARAM' AND {{$TYPE2->VALUE}} IS '-L'
 *      THEN {{$TYPE2->VALUE}} NOT IS NULL
 *
 */


['IF' => [
	'CONDITION' => ['AND', [
		['IS', '{{0.VALUE}}', 'PARAM'],
		['IS', '{{1.VALUE}}', '-L']
	],
	],
	'THEN' => [
		['NOT', '{{2.VALUE}}', 'NULL']
	]
], 'ELSE IF' => [

]
];


$pattern->setRules(
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
	]
);
