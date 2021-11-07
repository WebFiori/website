<?php
namespace docGenerator\webfiori\database\mssql;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class MSSQLConnectionView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents a connection to MSSQL server.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class MSSQLConnection');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'MSSQLConnection', '\webfiori\database\mssql', 'A class that represents a connection to MSSQL server. The main aim of this class is to manage the process of connecting to   MSSQL server and executing SQL queries.'));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$connInfo' => [
                        'type' => 'ConnectionInfo',
                        'description' => 'An object that contains database connection       information.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => '__destruct',
                'access-modifier' => 'public function',
                'summary' => 'Close database connection.',
                'description' => 'Close database connection. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'connect',
                'access-modifier' => 'public function',
                'summary' => 'Connect to MSSQL database.',
                'description' => 'Connect to MSSQL database. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the connection was established, the method will return       true. If the attempt to connect fails, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getSQLState',
                'access-modifier' => 'public function',
                'summary' => 'Returns SQL state in case of warnings or errors.',
                'description' => 'Returns SQL state in case of warnings or errors. ',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        'null
',
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'prepare',
                'access-modifier' => 'public function',
                'summary' => 'Prepares SQL statement for execution.',
                'description' => 'Prepares SQL statement for execution. ',
                'params' => [
                    '$params' => [
                        'type' => 'array',
                        'description' => 'An array that holds query parameters. The parameters       can have similar structure to the ones which are used by the       function \'sqlsrv_prepare\'.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the statement is prepared, the method will return       a resource that can be used to run the query. If it fails, the       method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                        new Anchor('http://php.net/manual/en/language.types.resource.php', 'resource'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'runQuery',
                'access-modifier' => 'public function',
                'summary' => 'Execute MSSQL query.',
                'description' => 'Execute MSSQL query. ',
                'params' => [
                    '$query' => [
                        'type' => 'AbstractQuery',
                        'description' => 'A query builder that has the generated MSSQL       query.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the query successfully executed, the method will return       true. Other than that, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
        ];
        $this->insert($this->getTheme()->createAttrsSummaryBlock($classAttrsArr));
        $this->insert($this->getTheme()->createMethodsSummaryBlock($classMethodsArr));
        $this->insert($this->getTheme()->createAttrsDetailsBlock($classAttrsArr));
        $this->insert($this->getTheme()->createMethodsDetailsBlock($classMethodsArr));
    }
}
return __NAMESPACE__;