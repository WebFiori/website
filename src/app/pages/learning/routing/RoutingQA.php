<?php
namespace webfiori\views\learn\routing;

use phpStructs\html\HTMLNode;
use webfiori\entity\Page;
use phpStructs\html\UnorderedList;
/**
 * Description of RoutingQA
 *
 * @author Ibrahim
 */
class RoutingQA extends RoutingLearnView{
    public function __construct() {
        parent::__construct([
            'title' => 'Questions and Answers About Routing',
            'description' => 'Most common questions and answers about routing.',
            'active-aside' => 6
        ]);
        $this->setPrevTopicLink('learn/topics/routing/variables', 'URI Variables');
        Page::insert($this->createParagraph('Here you will find a list of common '
                . 'questions about routing and the answer to each one.'));
        $questionsArr = [];
        $questionsArr[] = $this->createQuestionBox(
                'What is the meaning of routing?', 
                'It simply means taking a request and sending it to the correct '
                . 'resource. A reasource can be a web page, a file or an API end point.');
        $questionsArr[] = $this->createQuestionBox(
                'How to create a route to a PHP file?', 
                'Simply, use one of the following methods to create your route:'
                . '<ul>'
                . '<li><a href="docs/webfiori/entity/router/Router#view" target="_blank">Router::view()</a></li>'
                . '<li><a href="docs/webfiori/entity/router/Router#api" target="_blank">Router::api()</a></li>'
                . '<li><a href="docs/webfiori/entity/router/Router#closure" target="_blank">Router::closure()</a></li>'
                . '<li><a href="docs/webfiori/entity/router/Router#other" target="_blank">Router::other()</a></li>'
                . '</ul>'
                . 'For each method, you must at least supply two options:'
                . '<ul>'
                . '<li><b>path</b>: The link that will appear in address bar of the web browser.</li>'
                . '<li><b>route-to</b>: The resource that the route will point to.</li>'
                . '</ul>'
                . 'For more info about creating routes, please go to '
                . '"<a href="learn/topics/routing/types-of-routes">Types of Routes</a>". ');
        $questionsArr[] = $this->createQuestionBox('How to access current route properties '
                . 'within the resource?',''
                . 'If your resource is a PHP script, then it is possible to use the '
                . 'method <a href="docs/webfiori/entity/router/Router#getRouteUri">Router::getRouteUri()</a>. The method will return an object of type '
                . '<a href="docs/webfiori/entity/router/RouterUri">RouterUri</a> that contains many usefule information about the route.'
                . '');
        $questionsArr[] = $this->createQuestionBox('What are URI variables?',''
                . 'URI variables are parts of the path in the URI which does not have '
                . 'specific value. The value is set when a request is sent to the resource '
                . 'that the URI points to.'
                . '');
        $questionsArr[] = $this->createQuestionBox('How to create URI variables?',''
                . 'In order to add a variable to the URI, simply include its name '
                . 'between "{}" when specifying the path of the URI when creating the '
                . 'route. For example, if we would like to include a variable with name '
                . ' <code>book-id</code>, then the path would be <code>view-book-details/{book-id}</code>  '
                . '');
        $questionsArr[] = $this->createQuestionBox('How to access URI variable value '
                . 'in a resource?',''
                . 'If the resource is a PHP script, it is possible to get the value of a '
                . 'variable using the method <a href="docs/webfiori/entity/router/Router#getVarValue">Router::getVarValue()</a>. '
                . 'Simply, pass the name of the variable to the method and its value will be returned as '
                . 'string.'
                . '');
        $questionsArr[] = $this->createQuestionBox('Are the URIs will be case sensitive or not?',''
                . 'By default, the URIs will be case sensitive. But it is possible to '
                . 'make them not. When creating the route, there is an option which '
                . 'has the name <code>case-sensitive</code>. If the option is set to '
                . 'false, the URI of the route will be case insensitive. For instance, '
                . 'the URI <code>https://example.com/my-resource</code> will be the '
                . 'same as <code>https://example.com/MY-reSOurce</code>'
                . '');
        $questionsArr[] = $this->createQuestionBox('What will happen if a user tried to '
                . 'navigate to a URI which does not exist?',''
                . 'The default behavior will be to show a 404 page to the user. If it is '
                . 'an API call, the client will receive a 404 error code with JSON that '
                . 'tells the client that the resource was not found. Note that it is '
                . 'possible to override this behavior by setting a custom event using the '
                . 'method <a href="docs/webfiori/entity/router/Router#setOnNotFound">Router::setOnNotFound()</a>'
                . ''
                . '');
        $questionsUl = new UnorderedList();
        Page::insert($questionsUl);
        $qNum = 0;
        foreach ($questionsArr as $questionBox){
            $questionBox->setID('question-'.$qNum);
            $questionTitleNode = $questionBox->getChildrenByTag('h4')->get(0);
            $questionsUl->addListItem($this->createLinkListItem(Page::canonical().'#'.$questionBox->getID(), $questionTitleNode->getChild(0)->getText()));
            Page::insert($questionBox);
            $qNum++;
        }
        $this->displayView();
    }
}
return __NAMESPACE__;