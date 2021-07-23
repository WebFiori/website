<?php
namespace docGenerator\webfiori\ui;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\apiParser\NameSpaceAPI;

class NSIndexView extends P {
    public function __construct(){
        parent::__construct();
        $this->setDescription('All classes and sub-namespaces in the namespace \'\\webfiori\\ui\'.');
        $this->setTitle('Namespace \\webfiori\\ui');
        $nsObj = new NameSpaceAPI('\webfiori\ui',[
        "Anchor" => [
            "access-modifier" => "class",
            "summary" => "A class that represents &lt;a&gt; tag."
        ],
        "Br" => [
            "access-modifier" => "class",
            "summary" => "A class that represents &lt;br&gt; tag."
        ],
        "CodeSnippet" => [
            "access-modifier" => "class",
            "summary" => "A class that can be used to display code snippits in good looking way."
        ],
        "HTMLDoc" => [
            "access-modifier" => "class",
            "summary" => "A class that represents HTML document."
        ],
        "HTMLList" => [
            "access-modifier" => "class",
            "summary" => "A class that represents ordered list or unordered list."
        ],
        "HTMLNode" => [
            "access-modifier" => "class",
            "summary" => "A class that represents HTML element."
        ],
        "HTMLTable" => [
            "access-modifier" => "class",
            "summary" => "A class which is used to represent basic HTML tables."
        ],
        "HeadNode" => [
            "access-modifier" => "class",
            "summary" => "A class that represents the tag &lt;head&lt; of a HTML document."
        ],
        "Input" => [
            "access-modifier" => "class",
            "summary" => "A class that represents any input element."
        ],
        "JsCode" => [
            "access-modifier" => "class",
            "summary" => "A node that represents in line JavaScript code that can be inserted on a   head node."
        ],
        "Label" => [
            "access-modifier" => "class",
            "summary" => "A class that represents &lt;label&gt; tag."
        ],
        "ListItem" => [
            "access-modifier" => "class",
            "summary" => "A class that represents List Item node."
        ],
        "OrderedList" => [
            "access-modifier" => "class",
            "summary" => "A class that represents ordered list (ol)."
        ],
        "Paragraph" => [
            "access-modifier" => "class",
            "summary" => "A class that represents a paragraph element."
        ],
        "RadioGroup" => [
            "access-modifier" => "class",
            "summary" => "A class which can be used to represent a group of radio buttons inserted   inside a &lt;fieldset&gt; element."
        ],
        "TableCell" => [
            "access-modifier" => "class",
            "summary" => "A class that represents a cell in HTML table."
        ],
        "TableRow" => [
            "access-modifier" => "class",
            "summary" => "A class that represents &lt;tr&gt; node."
        ],
        "UnorderedList" => [
            "access-modifier" => "class",
            "summary" => "A class that represents Unordered List HTML element (ul)"
        ],
        ], [
            'webfiori\ui\exceptions',
        ]);
        $this->setNSObj($nsObj);
    }
}
return __NAMESPACE__;