<?php
namespace docGenerator;
use webfiori\framework\router\Router;
class DocGeneratorRoutes{
    public static function createRoutes(){
        Router::page([
            'path' => 'docs/webfiori/ui/Anchor',
            'route-to' => '/apis/webfiori/ui/AnchorView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/ui',
            'route-to' => '/apis/webfiori/ui/NSIndexView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/ui/Br',
            'route-to' => '/apis/webfiori/ui/BrView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/ui/CodeSnippet',
            'route-to' => '/apis/webfiori/ui/CodeSnippetView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/ui/HTMLDoc',
            'route-to' => '/apis/webfiori/ui/HTMLDocView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/ui/HTMLList',
            'route-to' => '/apis/webfiori/ui/HTMLListView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/ui/HTMLNode',
            'route-to' => '/apis/webfiori/ui/HTMLNodeView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/ui/HTMLTable',
            'route-to' => '/apis/webfiori/ui/HTMLTableView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/ui/HeadNode',
            'route-to' => '/apis/webfiori/ui/HeadNodeView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/ui/Input',
            'route-to' => '/apis/webfiori/ui/InputView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/ui/JsCode',
            'route-to' => '/apis/webfiori/ui/JsCodeView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/ui/Label',
            'route-to' => '/apis/webfiori/ui/LabelView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/ui/ListItem',
            'route-to' => '/apis/webfiori/ui/ListItemView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/ui/OrderedList',
            'route-to' => '/apis/webfiori/ui/OrderedListView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/ui/Paragraph',
            'route-to' => '/apis/webfiori/ui/ParagraphView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/ui/RadioGroup',
            'route-to' => '/apis/webfiori/ui/RadioGroupView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/ui/TableCell',
            'route-to' => '/apis/webfiori/ui/TableCellView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/ui/TableRow',
            'route-to' => '/apis/webfiori/ui/TableRowView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/ui/UnorderedList',
            'route-to' => '/apis/webfiori/ui/UnorderedListView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/ui/exceptions/InvalidNodeNameException',
            'route-to' => '/apis/webfiori/ui/exceptions/InvalidNodeNameExceptionView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/ui/exceptions',
            'route-to' => '/apis/webfiori/ui/exceptions/NSIndexView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/ui/exceptions/TemplateNotFoundException',
            'route-to' => '/apis/webfiori/ui/exceptions/TemplateNotFoundExceptionView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/json/CaseConverter',
            'route-to' => '/apis/webfiori/json/CaseConverterView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/json',
            'route-to' => '/apis/webfiori/json/NSIndexView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/json/Json',
            'route-to' => '/apis/webfiori/json/JsonView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/json/JsonConverter',
            'route-to' => '/apis/webfiori/json/JsonConverterView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/json/JsonI',
            'route-to' => '/apis/webfiori/json/JsonIView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/json/JsonTypes',
            'route-to' => '/apis/webfiori/json/JsonTypesView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/json/Property',
            'route-to' => '/apis/webfiori/json/PropertyView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/http/APIFilter',
            'route-to' => '/apis/webfiori/http/APIFilterView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/http',
            'route-to' => '/apis/webfiori/http/NSIndexView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/http/AbstractWebService',
            'route-to' => '/apis/webfiori/http/AbstractWebServiceView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/http/ManagerInfoService',
            'route-to' => '/apis/webfiori/http/ManagerInfoServiceView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/http/ParamTypes',
            'route-to' => '/apis/webfiori/http/ParamTypesView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/http/Request',
            'route-to' => '/apis/webfiori/http/RequestView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/http/RequestParameter',
            'route-to' => '/apis/webfiori/http/RequestParameterView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/http/Response',
            'route-to' => '/apis/webfiori/http/ResponseView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/http/Uri',
            'route-to' => '/apis/webfiori/http/UriView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/http/WebServicesManager',
            'route-to' => '/apis/webfiori/http/WebServicesManagerView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/Access',
            'route-to' => '/apis/webfiori/framework/AccessView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework',
            'route-to' => '/apis/webfiori/framework/NSIndexView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/AutoLoader',
            'route-to' => '/apis/webfiori/framework/AutoLoaderView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/Config',
            'route-to' => '/apis/webfiori/framework/ConfigView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/ConfigController',
            'route-to' => '/apis/webfiori/framework/ConfigControllerView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/DB',
            'route-to' => '/apis/webfiori/framework/DBView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/EAbstractWebService',
            'route-to' => '/apis/webfiori/framework/EAbstractWebServiceView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/ExtendedWebServicesManager',
            'route-to' => '/apis/webfiori/framework/ExtendedWebServicesManagerView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/File',
            'route-to' => '/apis/webfiori/framework/FileView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/i18n/Language',
            'route-to' => '/apis/webfiori/framework/i18n/LanguageView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/i18n',
            'route-to' => '/apis/webfiori/framework/i18n/NSIndexView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/Logger',
            'route-to' => '/apis/webfiori/framework/LoggerView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/Privilege',
            'route-to' => '/apis/webfiori/framework/PrivilegeView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/PrivilegesGroup',
            'route-to' => '/apis/webfiori/framework/PrivilegesGroupView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/Theme',
            'route-to' => '/apis/webfiori/framework/ThemeView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/ThemeLoader',
            'route-to' => '/apis/webfiori/framework/ThemeLoaderView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/UploadFile',
            'route-to' => '/apis/webfiori/framework/UploadFileView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/Uploader',
            'route-to' => '/apis/webfiori/framework/UploaderView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/User',
            'route-to' => '/apis/webfiori/framework/UserView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/Util',
            'route-to' => '/apis/webfiori/framework/UtilView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/WebFioriApp',
            'route-to' => '/apis/webfiori/framework/WebFioriAppView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/ui/ErrorBox',
            'route-to' => '/apis/webfiori/framework/ui/ErrorBoxView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/ui',
            'route-to' => '/apis/webfiori/framework/ui/NSIndexView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/ui/HTTPCodeView',
            'route-to' => '/apis/webfiori/framework/ui/HTTPCodeViewView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/ui/MessageBox',
            'route-to' => '/apis/webfiori/framework/ui/MessageBoxView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/ui/ServerErrView',
            'route-to' => '/apis/webfiori/framework/ui/ServerErrViewView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/ui/StarterPage',
            'route-to' => '/apis/webfiori/framework/ui/StarterPageView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/ui/WebPage',
            'route-to' => '/apis/webfiori/framework/ui/WebPageView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/session/DatabaseSessionStorage',
            'route-to' => '/apis/webfiori/framework/session/DatabaseSessionStorageView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/session',
            'route-to' => '/apis/webfiori/framework/session/NSIndexView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/session/DefaultSessionStorage',
            'route-to' => '/apis/webfiori/framework/session/DefaultSessionStorageView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/session/MSSQLSessionDataTable',
            'route-to' => '/apis/webfiori/framework/session/MSSQLSessionDataTableView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/session/MSSQLSessionsTable',
            'route-to' => '/apis/webfiori/framework/session/MSSQLSessionsTableView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/session/MySQLSessionDataTable',
            'route-to' => '/apis/webfiori/framework/session/MySQLSessionDataTableView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/session/MySQLSessionsTable',
            'route-to' => '/apis/webfiori/framework/session/MySQLSessionsTableView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/session/Session',
            'route-to' => '/apis/webfiori/framework/session/SessionView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/session/SessionOperations',
            'route-to' => '/apis/webfiori/framework/session/SessionOperationsView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/session/SessionStorage',
            'route-to' => '/apis/webfiori/framework/session/SessionStorageView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/session/SessionsManager',
            'route-to' => '/apis/webfiori/framework/session/SessionsManagerView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/router/Router',
            'route-to' => '/apis/webfiori/framework/router/RouterView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/router',
            'route-to' => '/apis/webfiori/framework/router/NSIndexView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/router/RouterUri',
            'route-to' => '/apis/webfiori/framework/router/RouterUriView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/middleware/AbstractMiddleware',
            'route-to' => '/apis/webfiori/framework/middleware/AbstractMiddlewareView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/middleware',
            'route-to' => '/apis/webfiori/framework/middleware/NSIndexView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/middleware/MiddlewareManager',
            'route-to' => '/apis/webfiori/framework/middleware/MiddlewareManagerView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/mail/EmailMessage',
            'route-to' => '/apis/webfiori/framework/mail/EmailMessageView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/mail',
            'route-to' => '/apis/webfiori/framework/mail/NSIndexView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/mail/SMTPAccount',
            'route-to' => '/apis/webfiori/framework/mail/SMTPAccountView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/mail/SMTPServer',
            'route-to' => '/apis/webfiori/framework/mail/SMTPServerView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/exceptions/ClassLoaderException',
            'route-to' => '/apis/webfiori/framework/exceptions/ClassLoaderExceptionView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/exceptions',
            'route-to' => '/apis/webfiori/framework/exceptions/NSIndexView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/exceptions/FileException',
            'route-to' => '/apis/webfiori/framework/exceptions/FileExceptionView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/exceptions/InitializationException',
            'route-to' => '/apis/webfiori/framework/exceptions/InitializationExceptionView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/exceptions/InvalidCRONExprException',
            'route-to' => '/apis/webfiori/framework/exceptions/InvalidCRONExprExceptionView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/exceptions/MissingLangException',
            'route-to' => '/apis/webfiori/framework/exceptions/MissingLangExceptionView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/exceptions/NoSuchThemeException',
            'route-to' => '/apis/webfiori/framework/exceptions/NoSuchThemeExceptionView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/exceptions/RoutingException',
            'route-to' => '/apis/webfiori/framework/exceptions/RoutingExceptionView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/exceptions/SMTPException',
            'route-to' => '/apis/webfiori/framework/exceptions/SMTPExceptionView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/exceptions/SessionException',
            'route-to' => '/apis/webfiori/framework/exceptions/SessionExceptionView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/exceptions/UIException',
            'route-to' => '/apis/webfiori/framework/exceptions/UIExceptionView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cron/AbstractJob',
            'route-to' => '/apis/webfiori/framework/cron/AbstractJobView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cron',
            'route-to' => '/apis/webfiori/framework/cron/NSIndexView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cron/Cron',
            'route-to' => '/apis/webfiori/framework/cron/CronView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cron/CronEmail',
            'route-to' => '/apis/webfiori/framework/cron/CronEmailView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cron/CronJob',
            'route-to' => '/apis/webfiori/framework/cron/CronJobView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cron/JobArgument',
            'route-to' => '/apis/webfiori/framework/cron/JobArgumentView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cron/webUI/CronLoginView',
            'route-to' => '/apis/webfiori/framework/cron/webUI/CronLoginViewView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cron/webUI',
            'route-to' => '/apis/webfiori/framework/cron/webUI/NSIndexView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cron/webUI/CronTasksView',
            'route-to' => '/apis/webfiori/framework/cron/webUI/CronTasksViewView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cron/webUI/CronView',
            'route-to' => '/apis/webfiori/framework/cron/webUI/CronViewView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cron/webServices/CronLoginService',
            'route-to' => '/apis/webfiori/framework/cron/webServices/CronLoginServiceView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cron/webServices',
            'route-to' => '/apis/webfiori/framework/cron/webServices/NSIndexView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cron/webServices/CronLogoutService',
            'route-to' => '/apis/webfiori/framework/cron/webServices/CronLogoutServiceView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cron/webServices/CronServicesManager',
            'route-to' => '/apis/webfiori/framework/cron/webServices/CronServicesManagerView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cron/webServices/ForceCronExecutionService',
            'route-to' => '/apis/webfiori/framework/cron/webServices/ForceCronExecutionServiceView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cron/webServices/GetJobsService',
            'route-to' => '/apis/webfiori/framework/cron/webServices/GetJobsServiceView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli/CLI',
            'route-to' => '/apis/webfiori/framework/cli/CLIView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli',
            'route-to' => '/apis/webfiori/framework/cli/NSIndexView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli/CLICommand',
            'route-to' => '/apis/webfiori/framework/cli/CLICommandView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli/InputStream',
            'route-to' => '/apis/webfiori/framework/cli/InputStreamView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli/OutputStream',
            'route-to' => '/apis/webfiori/framework/cli/OutputStreamView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli/StdIn',
            'route-to' => '/apis/webfiori/framework/cli/StdInView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli/StdOut',
            'route-to' => '/apis/webfiori/framework/cli/StdOutView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli/writers/ClassWriter',
            'route-to' => '/apis/webfiori/framework/cli/writers/ClassWriterView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli/writers',
            'route-to' => '/apis/webfiori/framework/cli/writers/NSIndexView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli/writers/LangClassWriter',
            'route-to' => '/apis/webfiori/framework/cli/writers/LangClassWriterView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli/writers/QueryClassWriter',
            'route-to' => '/apis/webfiori/framework/cli/writers/QueryClassWriterView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli/writers/ServiceHolder',
            'route-to' => '/apis/webfiori/framework/cli/writers/ServiceHolderView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli/writers/ThemeClassWriter',
            'route-to' => '/apis/webfiori/framework/cli/writers/ThemeClassWriterView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli/writers/WebServiceWriter',
            'route-to' => '/apis/webfiori/framework/cli/writers/WebServiceWriterView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli/helpers/CreateCLIClassHelper',
            'route-to' => '/apis/webfiori/framework/cli/helpers/CreateCLIClassHelperView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli/helpers',
            'route-to' => '/apis/webfiori/framework/cli/helpers/NSIndexView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli/helpers/CreateCronJob',
            'route-to' => '/apis/webfiori/framework/cli/helpers/CreateCronJobView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli/helpers/CreateMiddleware',
            'route-to' => '/apis/webfiori/framework/cli/helpers/CreateMiddlewareView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli/helpers/CreateTable',
            'route-to' => '/apis/webfiori/framework/cli/helpers/CreateTableView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli/helpers/CreateTableObj',
            'route-to' => '/apis/webfiori/framework/cli/helpers/CreateTableObjView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli/helpers/CreateThemeHelper',
            'route-to' => '/apis/webfiori/framework/cli/helpers/CreateThemeHelperView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli/helpers/CreateWebService',
            'route-to' => '/apis/webfiori/framework/cli/helpers/CreateWebServiceView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli/commands/AddCommand',
            'route-to' => '/apis/webfiori/framework/cli/commands/AddCommandView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli/commands',
            'route-to' => '/apis/webfiori/framework/cli/commands/NSIndexView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli/commands/CreateCommand',
            'route-to' => '/apis/webfiori/framework/cli/commands/CreateCommandView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli/commands/CronCommand',
            'route-to' => '/apis/webfiori/framework/cli/commands/CronCommandView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli/commands/HelpCommand',
            'route-to' => '/apis/webfiori/framework/cli/commands/HelpCommandView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli/commands/ListCronCommand',
            'route-to' => '/apis/webfiori/framework/cli/commands/ListCronCommandView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli/commands/ListRoutesCommand',
            'route-to' => '/apis/webfiori/framework/cli/commands/ListRoutesCommandView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli/commands/ListThemesCommand',
            'route-to' => '/apis/webfiori/framework/cli/commands/ListThemesCommandView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli/commands/RunSQLQueryCommand',
            'route-to' => '/apis/webfiori/framework/cli/commands/RunSQLQueryCommandView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli/commands/SettingsCommand',
            'route-to' => '/apis/webfiori/framework/cli/commands/SettingsCommandView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli/commands/TestRouteCommand',
            'route-to' => '/apis/webfiori/framework/cli/commands/TestRouteCommandView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli/commands/UpdateSettingsCommand',
            'route-to' => '/apis/webfiori/framework/cli/commands/UpdateSettingsCommandView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli/commands/UpdateTableCommand',
            'route-to' => '/apis/webfiori/framework/cli/commands/UpdateTableCommandView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/framework/cli/commands/VersionCommand',
            'route-to' => '/apis/webfiori/framework/cli/commands/VersionCommandView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/database/AbstractQuery',
            'route-to' => '/apis/webfiori/database/AbstractQueryView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/database',
            'route-to' => '/apis/webfiori/database/NSIndexView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/database/Column',
            'route-to' => '/apis/webfiori/database/ColumnView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/database/ColumnFactory',
            'route-to' => '/apis/webfiori/database/ColumnFactoryView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/database/Condition',
            'route-to' => '/apis/webfiori/database/ConditionView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/database/Connection',
            'route-to' => '/apis/webfiori/database/ConnectionView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/database/ConnectionInfo',
            'route-to' => '/apis/webfiori/database/ConnectionInfoView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/database/Database',
            'route-to' => '/apis/webfiori/database/DatabaseView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/database/DatabaseException',
            'route-to' => '/apis/webfiori/database/DatabaseExceptionView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/database/DateTimeValidator',
            'route-to' => '/apis/webfiori/database/DateTimeValidatorView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/database/EntityMapper',
            'route-to' => '/apis/webfiori/database/EntityMapperView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/database/Expression',
            'route-to' => '/apis/webfiori/database/ExpressionView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/database/ForeignKey',
            'route-to' => '/apis/webfiori/database/ForeignKeyView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/database/JoinTable',
            'route-to' => '/apis/webfiori/database/JoinTableView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/database/ResultSet',
            'route-to' => '/apis/webfiori/database/ResultSetView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/database/SelectExpression',
            'route-to' => '/apis/webfiori/database/SelectExpressionView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/database/Table',
            'route-to' => '/apis/webfiori/database/TableView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/database/WhereExpression',
            'route-to' => '/apis/webfiori/database/WhereExpressionView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/database/mysql/MySQLColumn',
            'route-to' => '/apis/webfiori/database/mysql/MySQLColumnView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/database/mysql',
            'route-to' => '/apis/webfiori/database/mysql/NSIndexView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/database/mysql/MySQLConnection',
            'route-to' => '/apis/webfiori/database/mysql/MySQLConnectionView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/database/mysql/MySQLQuery',
            'route-to' => '/apis/webfiori/database/mysql/MySQLQueryView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/database/mysql/MySQLTable',
            'route-to' => '/apis/webfiori/database/mysql/MySQLTableView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/database/mssql/MSSQLColumn',
            'route-to' => '/apis/webfiori/database/mssql/MSSQLColumnView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/database/mssql',
            'route-to' => '/apis/webfiori/database/mssql/NSIndexView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/database/mssql/MSSQLConnection',
            'route-to' => '/apis/webfiori/database/mssql/MSSQLConnectionView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/database/mssql/MSSQLQuery',
            'route-to' => '/apis/webfiori/database/mssql/MSSQLQueryView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/database/mssql/MSSQLTable',
            'route-to' => '/apis/webfiori/database/mssql/MSSQLTableView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/collections/AbstractCollection',
            'route-to' => '/apis/webfiori/collections/AbstractCollectionView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/collections',
            'route-to' => '/apis/webfiori/collections/NSIndexView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/collections/Comparable',
            'route-to' => '/apis/webfiori/collections/ComparableView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/collections/LinkedList',
            'route-to' => '/apis/webfiori/collections/LinkedListView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/collections/Node',
            'route-to' => '/apis/webfiori/collections/NodeView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/collections/Queue',
            'route-to' => '/apis/webfiori/collections/QueueView.php',
            'in-sitemap' => true
        ]);
        Router::page([
            'path' => 'docs/webfiori/collections/Stack',
            'route-to' => '/apis/webfiori/collections/StackView.php',
            'in-sitemap' => true
        ]);
    }
}