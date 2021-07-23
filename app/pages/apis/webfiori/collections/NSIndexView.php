<?php
namespace docGenerator\webfiori\collections;
use webfiori\docs\apiParser\DocsWebPage as P;
use webfiori\apiParser\NameSpaceAPI;

class NSIndexView extends P {
    public function __construct(){
        parent::__construct();
        $this->setDescription('All classes and sub-namespaces in the namespace \'\\webfiori\\collections\'.');
        $this->setTitle('Namespace \\webfiori\\collections');
        $nsObj = new NameSpaceAPI('\webfiori\collections',[
        "AbstractCollection" => [
            "access-modifier" => "abstract class",
            "summary" => "A base class that can be used to create different collections."
        ],
        "LinkedList" => [
            "access-modifier" => "class",
            "summary" => "A class that represents a linked list data structure."
        ],
        "Node" => [
            "access-modifier" => "class",
            "summary" => "A singly linked node that can be used to construct different data structures."
        ],
        "Queue" => [
            "access-modifier" => "class",
            "summary" => "A class that represents a queue data structure."
        ],
        "Stack" => [
            "access-modifier" => "class",
            "summary" => "A class that represents a stack data structure."
        ],
        "Comparable" => [
            "access-modifier" => "interface",
            "summary" => "An interface that is used to compare objects."
        ],
        ], [
        ]);
        $this->setNSObj($nsObj);
    }
}
return __NAMESPACE__;