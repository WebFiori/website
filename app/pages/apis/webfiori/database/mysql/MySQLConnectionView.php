<?php
namespace docGenerator\webfiori\database\mysql;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class MySQLConnectionView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('A class that represents a connection to MySQL server.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('class MySQLConnection');
        $this->insert($this->getTheme()->createClassDescriptionNode('class', 'MySQLConnection', '\webfiori\database\mysql', 'A class that represents a connection to MySQL server. The main aim of this class is to manage the process of connecting to   MySQL server and executing SQL queries.'));
        $classAttrsArr = [
        ];
        $classMethodsArr = [
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
                'name' => 'bind',
                'access-modifier' => 'public function',
                'summary' => 'Bind parameters to MySQL query.',
                'description' => 'Bind parameters to MySQL query. ',
                'params' => [
                    '$params' => [
                        'type' => 'array',
                        'description' => 'An array that holds sub associative arrays that holds       values. Each sub array must have two indices:      <ul>      <li><b>value</b>: The value to bind.</li>      <li><b>type</b>: The type of the value as a character. can be one of 4 values:       <ul>      <li>i: corresponding variable has type integer</li>      <li>d: corresponding variable has type double</li>      <li>s: corresponding variable has type string</li>      <li>b: corresponding variable is a blob and will be sent in packets</li>      </ul>      </li>      <ul>',
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
                'name' => 'connect',
                'access-modifier' => 'public function',
                'summary' => 'Connect to MySQL database.',
                'description' => 'Connect to MySQL database. ',
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
                'name' => 'getMysqli',
                'access-modifier' => 'public function',
                'summary' => 'Returns the instance at which the connection uses to execute       database queries.',
                'description' => 'Returns the instance at which the connection uses to execute       database queries. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The object which is used to connect to the database.',
                    'return-types' => [
                        'mysqli',
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'prepare',
                'access-modifier' => 'public function',
                'summary' => 'Prepare SQL statement.',
                'description' => 'Prepare SQL statement. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the statement was successfully prepared, the method       will return true. If an error happens, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'runQuery',
                'access-modifier' => 'public function',
                'summary' => 'Execute MySQL query.',
                'description' => 'Execute MySQL query. ',
                'params' => [
                    '$query' => [
                        'type' => 'AbstractQuery',
                        'description' => 'A query builder that has the generated MySQL       query.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the query successfully executed, the method will return       true. Other than that, the method will return true.',
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