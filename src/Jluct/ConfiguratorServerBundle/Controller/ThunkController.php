<?
class ThunkController
{
	public function thunkAction()
	{
		// Primitives
		// _construct(name, rules)
		$str = new Primitive('string', 'a-zA-Z');
		$prop = new Primitive('property', '^(\-){1}+[a-zA-Z]{1}');
		$path = new Primitive('path', 'a-zA-Z+\\/');
		$ip = new Primitive('ip', '[0-9]+\.{3}');
		$time = new Primitive('time', '[0-9]+s{1}');
		$data = new Primitive('date', 'тут подумать нужно');
		$port = new Primitive('port', '\d{1,5}');
		
		// Types
		// _construct(name, composition, rules)
		$authType = new Type('type auth', [$str], ['basic', 'OR', 'advance']);
		$loggingType = new Type('logging', [$prop], ['-l']);
		$logType = new Type('path to log file', [$path], ['FILE_EXIST']);
		
		// Patterns
		// _construct(name, composition, rules)
		$pattern1 = new Pattern(
			'basic',
			[$authType, $loggingType, $logType],
			[['{{type_2}}', 'IS', '-l'], 'AND', ['IF', '{{type_3}}', '{{type_2}}', 'NOT', 'NULL']]
		);
		
		$paramConf1 = new ParamConf('conf_auth_type');
		$paramConf1->addPattern($pattern1);
		
		$param1 = new Param('conf_auth_type');
		$param1->addParamConf($paramConf1);
		$param1->setUsePattern($pattern1);
		
		// ... все не переносил
		// выпилил description, required и т.д.
	}
}
