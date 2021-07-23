<?php
namespace docGenerator\webfiori\framework\cli;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\ui\HTMLNode;
use webfiori\apiParser\FunctionDef;
use webfiori\apiParser\AttributeDef;
use webfiori\apiParser\MethodParameter;
use webfiori\ui\Anchor;
use webfiori\apiParser\ParameterType;

class CLICommandView extends P {
    public function __construct(){
        parent::__construct();
        $this->setTheme('webfiori\theme\NewFioriAPI');
        $this->getTheme()->setBaseURL('https://webfiori.com/docs');
        $this->setDescription('An abstract class that can be used to create new CLI command.');
        $this->setWebsiteName('WebFiori API Docs');
        $this->setTitle('abstract class CLICommand');
        $this->insert($this->getTheme()->createClassDescriptionNode('abstract class', 'CLICommand', '\webfiori\framework\cli', 'An abstract class that can be used to create new CLI command. The developer can extend this class and use it to create a custom CLI   command. The class can be used to display output to terminal and also read   user input. In addition, the output can be formatted using ANSI escape sequences.'));
        $classAttrsArr = [
            new AttributeDef(
            'const',
            '',
            'COLORS',
            'An associative array that contains color codes and names.',
            'An associative array that contains color codes and names. ',
            ),
        ];
        $classMethodsArr = [
            new FunctionDef([
                'name' => '__construct',
                'access-modifier' => 'public function',
                'summary' => 'Creates new instance of the class.',
                'description' => 'Creates new instance of the class. ',
                'params' => [
                    '$commandName' => [
                        'type' => 'string',
                        'description' => 'A string that represents the name of the       command such as \'-v\' or \'help\'. If not provided, the       value \'new-command\' is used.',
                        'optional' => false,
                    ],
                    '$args' => [
                        'type' => 'array',
                        'description' => 'An associative array of sub-associative arrays of arguments (or options) which can       be supplied to the command when running it. The       key of each sub array is argument name. Each       sub-array can have the following indices as argument options:      <ul>      <li><b>optional</b>: A boolean. if set to true, it means that the argument       is optional and can be ignored when running the command.</li>      <li><b>default</b>: An optional default value for the argument       to use if it is not provided and is optional.</li>      <li><b>description</b>: A description of the argument which       will be shown if the command \'help\' is executed.</li>      <li><b>values</b>: A set of values that the argument can have. If provided,       only the values on the list will be allowed. Note that if null or empty string       is in the array, it will be ignored. Also, if boolean values are       provided, true will be converted to the string \'y\' and false will       be converted to the string \'n\'.</li>      </ul>',
                        'optional' => false,
                    ],
                    '$description' => [
                        'type' => 'string',
                        'description' => 'A string that describes what does the job       do. The description will appear when the command \'help\' is executed.',
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
                'name' => 'addArg',
                'access-modifier' => 'public function',
                'summary' => 'Add command argument.',
                'description' => 'Add command argument. An argument is a string that comes after the name of the command. The value       of an argument can be set using equal sign. For example, if command name       is \'do-it\' and one argument has the name \'what-to-do\', then the full       CLI command would be "do-it what-to-do=say-hi". An argument can be       also treated as an option.',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the argument. It must be non-empty string       and does not contain spaces. Note that if the argument is already added and       the developer is trying to add it again, the new options array will override       the existing options array.',
                        'optional' => false,
                    ],
                    '$options' => [
                        'type' => 'array',
                        'description' => 'An optional array of options. Available options are:      <ul>      <li><b>optional</b>: A boolean. if set to true, it means that the argument       is optional and can be ignored when running the command.</li>      <li><b>default</b>: An optional default value for the argument       to use if it is not provided and is optional.</li>      <li><b>description</b>: A description of the argument which       will be shown if the command \'help\' is executed.</li>      <li><b>values</b>: A set of values that the argument can have. If provided,       only the values on the list will be allowed. Note that if null or empty string       is in the array, it will be ignored. Also, if boolean values are       provided, true will be converted to the string \'y\' and false will       be converted to the string \'n\'.</li>      </ul>',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the argument is added, the method will return true.       Other than that, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'addArgs',
                'access-modifier' => 'public function',
                'summary' => 'Adds multiple arguments to the command',
                'description' => 'Adds multiple arguments to the command ',
                'params' => [
                    '$arr' => [
                        'type' => 'array',
                        'description' => 'An associative array of sub associative arrays. The       key of each sub array is argument name. Each       sub-array can have the following indices:      <ul>      <li><b>optional</b>: A boolean. if set to true, it means that the argument       is optional and can be ignored when running the command.</li>      <li><b>default</b>: An optional default value for the argument       to use if it is not provided and is optional.</li>      <li><b>description</b>: A description of the argument which       will be shown if the command \'help\' is executed.</li>      <li><b>values</b>: A set of values that the argument can have. If provided,       only the values on the list will be allowed. Note that if null or empty string       is in the array, it will be ignored. Also, if boolean values are       provided, true will be converted to the string \'y\' and false will       be converted to the string \'n\'.</li>      </ul>',
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
                'name' => 'clear',
                'access-modifier' => 'public function',
                'summary' => 'Clears the output before or after cursor position.',
                'description' => 'Clears the output before or after cursor position. This method will replace the visible characters with spaces.      Note that support for this operation depends on terminal support for       ANSI escape codes.',
                'params' => [
                    '$numberOfCols' => [
                        'type' => 'int',
                        'description' => 'Number of columns to clear. The columns that       will be cleared are before and after cursor position. They don\'t include       the character at which the cursor is currently pointing to.',
                        'optional' => false,
                    ],
                    '$beforeCursor' => [
                        'type' => 'boolean',
                        'description' => 'If set to true, the characters which       are before the cursor will be cleared. Default is true.',
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
                'name' => 'clearConsole',
                'access-modifier' => 'public function',
                'summary' => 'Clears the whole content of the console.',
                'description' => 'Clears the whole content of the console. Note that support for this operation depends on terminal support for       ANSI escape codes.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'clearLine',
                'access-modifier' => 'public function',
                'summary' => 'Clears the line at which the cursor is in and move it back to the start       of the line.',
                'description' => 'Clears the line at which the cursor is in and move it back to the start       of the line. Note that support for this operation depends on terminal support for       ANSI escape codes.',
                'params' => [
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'confirm',
                'access-modifier' => 'public function',
                'summary' => 'Asks the user to conform something.',
                'description' => 'Asks the user to conform something. This method will display the question and wait for the user to confirm the       action by entering \'y\' or \'n\' in the terminal. If the user give something       other than \'Y\' or \'n\', it will shows an error and ask him to confirm       again. If a default answer is provided, it will appear in upper case in the       terminal. For example, if default is set to true, at the end of the prompt,       the string that shows the options would be like \'(Y/n)\'.',
                'params' => [
                    '$confirmTxt' => [
                        'type' => 'string',
                        'description' => 'The text of the question which will be asked.',
                        'optional' => false,
                    ],
                    '$default' => [
                        'type' => 'boolean|null',
                        'description' => 'Default answer to use if empty input is given.       It can be true for \'y\' and false for \'n\'. Default value is null which       means no default will be used.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the user choose \'y\', the method will return true. If       he choose \'n\', the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'error',
                'access-modifier' => 'public function',
                'summary' => 'Display a message that represents an error.',
                'description' => 'Display a message that represents an error. The message will be prefixed with the string \'Error:\' in       red. The output will be sent to STDOUT.',
                'params' => [
                    '$message' => [
                        'type' => 'string',
                        'description' => 'The message that will be shown.',
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
                'name' => 'excCommand',
                'access-modifier' => 'public function',
                'summary' => 'Execute the command.',
                'description' => 'Execute the command. This method should not be called manually by the developer.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'If the command is executed, the method will return 0. Other       than that, it will return a number which depends on the return value of       the method \'CLICommand::exec()\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'exec',
                'access-modifier' => 'public abstract function',
                'summary' => 'Execute the command.',
                'description' => 'Execute the command. The implementation of this method should contain the code that will run       when the command is executed.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The developer should implement this method in a way it returns 0       or null if the command is executed successfully and return -1 if the       command did not execute successfully.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.integer.php', 'int'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'formatOutput',
                'access-modifier' => 'public static function',
                'summary' => 'Formats an output string.',
                'description' => 'Formats an output string. This method is used to add colors to the output string or       make it bold or underlined. The returned value of this       method can be sent to STDOUT using the method \'fprintf()\'.       Note that the support for colors       and formatting will depend on the terminal configuration. In addition,       if the constant NO_COLOR is defined or is set in the environment, the       returned string will be returned as is.',
                'params' => [
                    '$string' => [
                        'type' => 'string',
                        'description' => 'The string that will be formatted.',
                        'optional' => false,
                    ],
                    '$formatOptions' => [
                        'type' => 'array',
                        'description' => 'An associative array of formatting       options. Supported options are:      <ul>      <li><b>color</b>: The foreground color of the output text. Supported colors       are:       <ul>      <li>white</li>      <li>black</li>      <li>red</li>      <li>light-red</li>      <li>green</li>      <li>light-green</li>      <li>yellow</li>      <li>light-yellow</li>      <li>gray</li>      <li>blue</li>      <li>light-blue</li>      </ul>      </li>      <li><b>bg-color</b>: The background color of the output text. Supported colors       are the same as the supported colors by the \'color\' option.</li>      <li><b>bold</b>: A boolean. If set to true, the text will       be bold.</li>      <li><b>underline</b>: A boolean. If set to true, the text will       be underlined.</li>      <li><b>reverse</b>: A boolean. If set to true, the foreground       color and background color will be reversed (invert the foreground and background colors).</li>      <li><b>blink</b>: A boolean. If set to true, the text will       blink.</li>      </ul>',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The string after applying the formatting to it.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getArgInfo',
                'access-modifier' => 'public function',
                'summary' => 'Returns an associative array that contains one argument information.',
                'description' => 'Returns an associative array that contains one argument information. ',
                'params' => [
                    '$argName' => [
                        'type' => 'string',
                        'description' => 'The name of the argument.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the argument exist, the method will return an associative       array. The returned array will possibly have the following indices:      <ul>      <li><b>optional</b>: A booleean which is set to true if the argument is optional.</li>      <li><b>description</b>: The description of the argument. Appears when help command       is executed.</li>      <li><b>default</b>: A default value for the argument. It will be not set if no default       value for the argument is provided.</li>      <li><b>values</b>: A set of values at which the argument can have.</li>      <li><b>provided</b>: Set to true if the argument is provided in command line       interface.</li>      <li><b>val</b>: The value of the argument taken from the command line interface.</li>      </ul>      If the argument does not exist, the returned array will be empty.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getArgValue',
                'access-modifier' => 'public function',
                'summary' => 'Returns the value of command option from CLI given its name.',
                'description' => 'Returns the value of command option from CLI given its name. ',
                'params' => [
                    '$optionName' => [
                        'type' => 'string',
                        'description' => 'The name of the option.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the value of the option is set, the method will       return its value as string. If it is not set, the method will return null.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                        new Anchor('http://php.net/manual/en/language.types.null.php', 'null'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getArgs',
                'access-modifier' => 'public function',
                'summary' => 'Returns an associative array that contains command args.',
                'description' => 'Returns an associative array that contains command args. ',
                'params' => [
                ],
                'returns' => [
                    'description' => 'An associative array. The indices of the array are       the names of the arguments and the values are sub-associative arrays.       the sub arrays will have the following indices:       <ul>      <li>optional</li>      <li>description</li>      <li>default</li>      <ul>      Note that the last index might not be set.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.array.php', 'array'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getDescription',
                'access-modifier' => 'public function',
                'summary' => 'Returns the description of the command.',
                'description' => 'Returns the description of the command. The description of the command is a string that describes what does the       command do and it will appear in CLI if the command \'help\' is executed.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The description of the command. Default return value       is \'&lt;NO DESCRIPTION&gt;\'',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getInput',
                'access-modifier' => 'public function',
                'summary' => 'Take an input value from the user.',
                'description' => 'Take an input value from the user. This method will read the input from STDIN.',
                'params' => [
                    '$prompt' => [
                        'type' => 'string',
                        'description' => 'The string that will be shown to the user. The       string must be non-empty.',
                        'optional' => false,
                    ],
                    '$default' => [
                        'type' => 'string',
                        'description' => 'An optional default value to use in case the user       hit "Enter" without entering any value. If null is passed, no default       value will be set.',
                        'optional' => false,
                    ],
                    '$validator' => [
                        'type' => 'callable',
                        'description' => 'A callback that can be used to validate user       input. The callback accepts one parameter which is the value that       the user has given. If the value is valid, the callback must return true.       If the callback returns anything else, it means the value which is given       by the user is invalid and this method will ask the user to enter the       value again.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the value which was taken from the       user.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'getName',
                'access-modifier' => 'public function',
                'summary' => 'Returns the name of the command.',
                'description' => 'Returns the name of the command. The name of the command is a string which is used to call the command       from CLI.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The name of the command (such as \'v\' or \'help\'). Default       return value is \'new-command\'.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'hasArg',
                'access-modifier' => 'public function',
                'summary' => 'Checks if the command has a specific command line argument or not.',
                'description' => 'Checks if the command has a specific command line argument or not. ',
                'params' => [
                    '$argName' => [
                        'type' => 'string',
                        'description' => 'The name of the command line argument.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the argument is added to the command, the method will       return true. If no argument which has the given name does exist, the method       will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'info',
                'access-modifier' => 'public function',
                'summary' => 'Display a message that represents extra information.',
                'description' => 'Display a message that represents extra information. The message will be prefixed with the string \'Info:\' in       blue. The output will be sent to STDOUT.',
                'params' => [
                    '$message' => [
                        'type' => 'string',
                        'description' => 'The message that will be shown.',
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
                'name' => 'isArgProvided',
                'access-modifier' => 'public function',
                'summary' => 'Checks if an argument is provided in the CLI or not.',
                'description' => 'Checks if an argument is provided in the CLI or not. The method will not check if the argument has a value or not.',
                'params' => [
                    '$argName' => [
                        'type' => 'string',
                        'description' => 'The name of the command line argument.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the argument is provided, the method will return       true. Other than that, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'moveCursorDown',
                'access-modifier' => 'public function',
                'summary' => 'Moves the cursor down by specific number of lines.',
                'description' => 'Moves the cursor down by specific number of lines. Note that support for this operation depends on terminal support for       ANSI escape codes.',
                'params' => [
                    '$lines' => [
                        'type' => 'int',
                        'description' => 'The number of lines the cursor will be moved. Default       value is 1.',
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
                'name' => 'moveCursorLeft',
                'access-modifier' => 'public function',
                'summary' => 'Moves the cursor to the left by specific number of columns.',
                'description' => 'Moves the cursor to the left by specific number of columns. Note that support for this operation depends on terminal support for       ANSI escape codes.',
                'params' => [
                    '$numberOfCols' => [
                        'type' => 'int',
                        'description' => 'The number of columns the cursor will be moved. Default       value is 1.',
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
                'name' => 'moveCursorRight',
                'access-modifier' => 'public function',
                'summary' => 'Moves the cursor to the right by specific number of columns.',
                'description' => 'Moves the cursor to the right by specific number of columns. Note that support for this operation depends on terminal support for       ANSI escape codes.',
                'params' => [
                    '$numberOfCols' => [
                        'type' => 'int',
                        'description' => 'The number of columns the cursor will be moved. Default       value is 1.',
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
                'name' => 'moveCursorTo',
                'access-modifier' => 'public function',
                'summary' => 'Moves the cursor to specific position in the terminal.',
                'description' => 'Moves the cursor to specific position in the terminal. If no arguments are supplied to the method, it will move the cursor       to the upper-left corner of the screen (line 0, column 0).      Note that support for this operation depends on terminal support for       ANSI escape codes.',
                'params' => [
                    '$line' => [
                        'type' => 'int',
                        'description' => 'The number of line at which the cursor will be moved       to. If not specified, 0 is used.',
                        'optional' => false,
                    ],
                    '$col' => [
                        'type' => 'int',
                        'description' => 'The number of column at which the cursor will be moved       to. If not specified, 0 is used.',
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
                'name' => 'moveCursorUp',
                'access-modifier' => 'public function',
                'summary' => 'Moves the cursor up by specific number of lines.',
                'description' => 'Moves the cursor up by specific number of lines. Note that support for this operation depends on terminal support for       ANSI escape codes.',
                'params' => [
                    '$lines' => [
                        'type' => 'int',
                        'description' => 'The number of lines the cursor will be moved. Default       value is 1.',
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
                'name' => 'printList',
                'access-modifier' => 'public function',
                'summary' => 'Prints an array as a list of items.',
                'description' => 'Prints an array as a list of items. This method is useful if the developer would like to print out a list       of multiple items. Each item will be prefixed with a number that represents       its index in the array.',
                'params' => [
                    '$array' => [
                        'type' => 'array',
                        'description' => 'The array that will be printed.',
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
                'name' => 'println',
                'access-modifier' => 'public function',
                'summary' => 'Print out a string and terminates the current line by writing the       line separator string.',
                'description' => 'Print out a string and terminates the current line by writing the       line separator string. This method will work like the function fprintf(). The difference is that       it will print out directly to STDOUT and the text can have formatting       options. Note that support for output formatting depends on terminal support for       ANSI escape codes.',
                'params' => [
                    '$str' => [
                        'type' => 'string',
                        'description' => 'The string that will be printed to STDOUT.',
                        'optional' => false,
                    ],
                    '$_' => [
                        'type' => 'mixed',
                        'description' => 'One or more extra arguments that can be supplied to the       method. The last argument can be an array that contains text formatting options.       for available options, check the method CLICommand::formatOutput().',
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
                'name' => 'prints',
                'access-modifier' => 'public function',
                'summary' => 'Print out a string.',
                'description' => 'Print out a string. This method works exactly like the function \'fprintf()\'. The only       difference is that the method will print out the output to STDOUT and       the method accepts formatting options as last argument to format the output.       Note that support for output formatting depends on terminal support for       ANSI escape codes.',
                'params' => [
                    '$str' => [
                        'type' => 'string',
                        'description' => 'The string that will be printed to STDOUT.',
                        'optional' => false,
                    ],
                    '$_' => [
                        'type' => 'mixed',
                        'description' => 'One or more extra arguments that can be supplied to the       method. The last argument can be an array that contains text formatting options.       for available options, check the method CLICommand::formatOutput().',
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
                'name' => 'read',
                'access-modifier' => 'public function',
                'summary' => 'Reads a string from STDIN stream.',
                'description' => 'Reads a string from STDIN stream. This method is limit to read 1024 bytes at once from STDIN.',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return the string which was given as input       in STDIN.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'readln',
                'access-modifier' => 'public function',
                'summary' => 'Reads one line from STDIN.',
                'description' => 'Reads one line from STDIN. The method will continue to read from STDIN till it finds end of       line character "\\n".',
                'params' => [
                ],
                'returns' => [
                    'description' => 'The method will return the string which was taken from       STDIN without the end of line character.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'select',
                'access-modifier' => 'public function',
                'summary' => 'Ask the user to select one of multiple values.',
                'description' => 'Ask the user to select one of multiple values. This method will display a prompt and wait for the user to select       the a value from a set of values. If the user give something other than the listed values,       it will shows an error and ask him to select again again. The       user can select an answer by typing its text or its number which will appear       in the terminal.',
                'params' => [
                    '$prompt' => [
                        'type' => 'string',
                        'description' => 'The text that will be shown for the user.',
                        'optional' => false,
                    ],
                    '$choices' => [
                        'type' => 'array',
                        'description' => 'An indexed array of values to select from.',
                        'optional' => false,
                    ],
                    '$defaultIndex' => [
                        'type' => 'int',
                        'description' => 'The index of the default value in case no value       is selected and the user hit enter.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'The method will return the value which is selected by       the user.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.string.php', 'string'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setArgValue',
                'access-modifier' => 'public function',
                'summary' => 'Sets the value of an argument.',
                'description' => 'Sets the value of an argument. This method is useful in writing test cases for the commands.',
                'params' => [
                    '$argName' => [
                        'type' => 'string',
                        'description' => 'The name of the argument.',
                        'optional' => false,
                    ],
                    '$argValue' => [
                        'type' => 'string',
                        'description' => 'The value to set.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the value of the argument is set, the method will return       true. If not set, the method will return false. The value of the attribute       will be not set in the following cases:      <ul>      <li>If the argument can have a specific set of values and the given       value is not one of them.</li>      <li>The given value is empty string or null.</li>      </u>',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setDescription',
                'access-modifier' => 'public function',
                'summary' => 'Sets the description of the command.',
                'description' => 'Sets the description of the command. The description of the command is a string that describes what does the       command do and it will appear in CLI if the command \'help\' is executed.',
                'params' => [
                    '$str' => [
                        'type' => 'string',
                        'description' => 'A string that describes the command. It must be non-empty       string.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the description of the command is set, the method will return       true. Other than that, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'setName',
                'access-modifier' => 'public function',
                'summary' => 'Sets the name of the command.',
                'description' => 'Sets the name of the command. The name of the command is a string which is used to call the command       from CLI.',
                'params' => [
                    '$name' => [
                        'type' => 'string',
                        'description' => 'The name of the command (such as \'v\' or \'help\').       It must be non-empty string and does not contain spaces.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => 'If the name of the command is set, the method will return       true. Other than that, the method will return false.',
                    'return-types' => [
                        new Anchor('http://php.net/manual/en/language.types.boolean.php', 'boolean'),
                    ]
                ]

            ]),
            new FunctionDef([
                'name' => 'success',
                'access-modifier' => 'public function',
                'summary' => 'Display a message that represents a success status.',
                'description' => 'Display a message that represents a success status. The message will be prefixed with the string "Success:" in green.       The output will be sent to STDOUT.',
                'params' => [
                    '$message' => [
                        'type' => 'string',
                        'description' => 'The message that will be displayed.',
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
                'name' => 'warning',
                'access-modifier' => 'public function',
                'summary' => 'Display a message that represents a warning.',
                'description' => 'Display a message that represents a warning. The message will be prefixed with the string \'Warning:\' in       red. The output will be sent to STDOUT.',
                'params' => [
                    '$message' => [
                        'type' => 'string',
                        'description' => 'The message that will be shown.',
                        'optional' => false,
                    ],
                ],
                'returns' => [
                    'description' => '',
                    'return-types' => [
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