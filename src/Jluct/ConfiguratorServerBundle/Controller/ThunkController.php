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

/**
 * IF...THEN
 * AND, OR, NOT, IS
 *
 * IF {{$TYPE1->VALUE}} IS 'PARAM' AND {{$TYPE2->VALUE}} IS '-L'
 *      THEN {{$TYPE2->VALUE}} NOT IS NULL
 * []
 *
 */
['IF' => [
    'CONDITION' => [
        [
            'AND' => [
                ['IS' => ['{{$TYPE1->VALUE}}', 'PARAM'], ['{{$TYPE2->VALUE}}', '-L']],

            ],
            'NOT' => [

            ]
        ],
    ],
    'THEN' => [
        ['NOT' => ['{{$TYPE2->VALUE}}', 'NULL']]
    ],
]];

['IF' => [
    'CONDITION' => [
        ['AND', [
            ['IS', '{{$TYPE1->VALUE}}', 'PARAM'],
            ['IS', '{{$TYPE2->VALUE}}', '-L']
        ],

        ],
    ],
    'THEN' => [
        ['NOT' => ['{{$TYPE2->VALUE}}', 'NULL']]
    ],
]];
