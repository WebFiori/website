<?php

namespace app\config;

use webfiori\database\ConnectionInfo;
use webfiori\email\SMTPAccount;
use webfiori\http\Uri;
/**
 * Configuration class of the application
 *
 * @author Ibrahim
 *
 * @version 1.0.1
 *
 * @since 2.1.0
 */
class AppConfig {
    /**
     * An array that holds global constants of the application
     * 
     * @var array
     * 
     */
    private $globalConst;
    /**
     * The date at which the application was released.
     * 
     * @var string
     * 
     */
    private $appReleaseDate;
    /**
     * A string that represents the type of the release.
     * 
     * @var string
     * 
     */
    private $appVersionType;
    /**
     * Version of the web application.
     * 
     * @var string
     * 
     */
    private $appVersion;
    /**
     * The name of base website UI Theme.
     * 
     * @var string
     * 
     */
    private $baseThemeName;
    /**
     * The base URL that is used by all website pages to fetch resource files.
     * 
     * @var string
     * 
     */
    private $baseUrl;
    /**
     * Configuration file version number.
     * 
     * @var string
     * 
     */
    private $configVision;
    /**
     * Password hash of scheduler sub-system.
     * 
     * @var string
     * 
     */
    private $schedulerPass;
    /**
     * An associative array that will contain database connections.
     * 
     * @var array
     * 
     */
    private $dbConnections;
    /**
     * An array that is used to hold default page titles for different languages.
     * 
     * @var array
     * 
     */
    private $defaultPageTitles;
    /**
     * An array that is used to hold default page descriptions for different languages.
     * 
     * @var array
     * 
     */
    private $descriptions;
    /**
     * An array that holds SMTP connections information.
     * 
     * @var string
     * 
     */
    private $emailAccounts;
    /**
     * The URL of the home page.
     * 
     * @var string
     * 
     */
    private $homePage;
    /**
     * The primary language of the website.
     * 
     * @var string
     * 
     */
    private $primaryLang;
    /**
     * The character which is used to separate site name from page title.
     * 
     * @var string
     * 
     */
    private $titleSep;
    /**
     * An array which contains all website names in different languages.
     * 
     * @var string
     * 
     */
    private $webSiteNames;
    /**
     * Creates new instance of the class.
     * 
     */
    public function __construct() {
        $this->configVision = '1.0.1';
        $this->initVersionInfo();
        $this->initSiteInfo();
        $this->initDbConnections();
        $this->initSmtpConnections();
        $this->initConstants();
        $this->schedulerPass = 'NO_PASSWORD';
    }
    /**
     * Adds SMTP account.
     * 
     * The developer can use this method to add new account during runtime.
     * The account will be removed once the program finishes.
     * 
     * @param SMTPAccount $acc An object of type SMTPAccount.
     * 
     */
    public function addAccount(SMTPAccount $acc) {
        $this->emailAccounts[$acc->getAccountName()] = $acc;
    }
    /**
     * Adds new database connection or updates an existing one.
     * 
     * @param ConnectionInfo $connectionInfo An object of type 'ConnectionInfo' that will contain connection information.
     * 
     */
    public function addDbConnection(ConnectionInfo $connectionInfo) {
        $this->dbConnections[$connectionInfo->getName()] = $connectionInfo;
    }
    /**
     * Initialize application environment constants.
     * 
     * 
     */
    public function initConstants() {
        $this->globalConst = [
            'WF_VERBOSE' => [
                'value' => false,
                'description' => 'Configure the verbosity of error messsages at run-time. This should be set to true in testing and false in production.',
             ],
        ];
    }
    /**
     * Returns an array that contains application environment constants.
     * 
     * 
     */
    public function getConstants() : array  {
        return $this->globalConst;
    }
    /**
     * Returns SMTP account given its name.
     * 
     * The method will search for an account with the given name in the set
     * of added accounts. If no account was found, null is returned.
     * 
     * @param string $name The name of the account.
     * 
     * @return SMTPAccount|null If the account is found, The method
     * will return an object of type SMTPAccount. Else, the
     * method will return null.
     */
    public function getAccount(string $name) {
        if (isset($this->emailAccounts[$name])) {
            return $this->emailAccounts[$name];
        }
    }
    /**
     * Returns an associative array that contains all email accounts.
     * 
     * The indices of the array will act as the names of the accounts.
     * The value of the index will be an object of type SMTPAccount.
     * 
     * @return array An associative array that contains all email accounts.
     */
    public function getAccounts() : array {
        return $this->emailAccounts;
    }
    /**
     * Returns the name of base theme that is used in website pages.
     * 
     * Usually, this theme is used for the normally visitors of the website.
     * 
     * @return string The name of base theme that is used in website pages.
     */
    public function getBaseThemeName() : string {
        return $this->baseThemeName;
    }
    /**
     * Returns the base URL that is used to fetch resources.
     * 
     * The return value of this method is usually used by the tag 'base'
     * of website pages.
     * 
     * @return string The base URL.
     */
    public function getBaseURL() : string {
        return $this->baseUrl;
    }
    /**
     * Returns version number of the configuration file.
     * 
     * This value can be used to check for the compatability of configuration file
     * 
     * @return string The version number of the configuration file.
     */
    public function getConfigVersion() : string {
        return $this->configVision;
    }
    /**
     * Returns sha256 hash of the password which is used to prevent unauthorized access to run the tasks or access scheduler web interface.
     * 
     * @return string Password hash or the string 'NO_PASSWORD' if there is no password.
     */
    public function getSchedulerPassword() : string {
        return $this->schedulerPass;
    }
    /**
     * Returns database connection information given connection name.
     * 
     * @param string $conName The name of the connection.
     * 
     * @return ConnectionInfo|null The method will return an object of type
     * ConnectionInfo if a connection info was found for the given connection name.
     * Other than that, the method will return null.
     */
    public function getDBConnection(string $conName) {
        $conns = $this->getDBConnections();
        $trimmed = trim($conName);
        
        if (isset($conns[$trimmed])) {
            return $conns[$trimmed];
        }
    }
    /**
     * Returns an associative array that contain the information of database connections.
     * 
     * The keys of the array will be the name of database connection and the
     * value of each key will be an object of type ConnectionInfo.
     * 
     * @return array An associative array.
     */
    public function getDBConnections() : array {
        return $this->dbConnections;
    }
    /**
     * Returns the global title of the website that will be used as default page title.
     * 
     * @param string $langCode Language code such as 'AR' or 'EN'.
     * 
     * @return string|null If the title of the page
     * does exist in the given language, the method will return it.
     * If no such title, the method will return null.
     */
    public function getDefaultTitle(string $langCode) {
        $langs = $this->getTitles();
        $langCodeF = strtoupper(trim($langCode));
        
        if (isset($langs[$langCodeF])) {
            return $langs[$langCode];
        }
    }
    /**
     * Returns the global description of the website that will be used as default page description.
     * 
     * @param string $langCode Language code such as 'AR' or 'EN'.
     * 
     * @return string|null If the description for the given language
     * does exist, the method will return it. If no such description, the
     * method will return null.
     */
    public function getDescription(string $langCode) {
        $langs = $this->getDescriptions();
        $langCodeF = strtoupper(trim($langCode));
        if (isset($langs[$langCodeF])) {
            return $langs[$langCode];
        }
    }
    /**
     * Returns an associative array which contains different website descriptions in different languages.
     * 
     * Each index will contain a language code and the value will be the description
     * of the website in the given language.
     * 
     * @return array An associative array which contains different website descriptions
     * in different languages.
     */
    public function getDescriptions() : array {
        return $this->descriptions;
    }
    /**
     * Returns the home page URL of the website.
     * 
     * @return string The home page URL of the website.
     */
    public function getHomePage() : string {
        return $this->homePage;
    }
    /**
     * Returns the primary language of the website.
     * 
     * @return string Language code of the primary language such as 'EN'.
     */
    public function getPrimaryLanguage() : string {
        return $this->primaryLang;
    }
    /**
     * Returns the date at which the application was released at.
     * 
     * @return string The method will return a string in the format
     * YYYY-MM-DD' that represents application release date.
     */
    public function getReleaseDate() : string {
        return $this->appReleaseDate;
    }
    /**
     * Returns an array that holds the default page title for different display languages.
     * 
     * @return array An associative array. The indices of the array are language codes
     * and the values are pages titles.
     */
    public function getTitles() : array {
        return $this->defaultPageTitles;
    }
    /**
     * Returns the character (or string) that is used to separate page title from website name.
     * 
     * @return string A string such as ' - ' or ' | '. Note that the method
     * will add the two spaces by default.
     */
    public function getTitleSep() : string {
        return $this->titleSep;
    }
    /**
     * Returns default title to use for specific display language.
     * 
     * 
     * @param string $langCode The code of display language.
     * 
     * @return string If the provided language is found, The method
     * will return the title as string. Other than that,
     * method will return empty string.
     */
    public function getTitle(string $langCode) {
        if (isset($this->defaultPageTitles[$langCode])) {
            return $this->defaultPageTitles[$langCode];
        }
    }
    /**
     * Returns version number of the application.
     * 
     * @return string The method should return a string in the
     * form 'x.x.x.x'.
     */
    public function getVersion() : string {
        return $this->appVersion;
    }
    /**
     * Returns a string that represents application release type.
     * 
     * @return string The method will return a string such as
     * 'Stable', 'Alpha', 'Beta' and so on.
     */
    public function getVersionType() : string {
        return $this->appVersionType;
    }
    /**
     * Returns the global website name.
     * 
     * @param string $langCode Language code such as 'AR' or 'EN'.
     * 
     * @return string|null If the name of the website for the given language
     * does exist, the method will return it. If no such name, the
     * method will return null.
     */
    public function getWebsiteName(string $langCode) {
        $langs = $this->getWebsiteNames();
        $langCodeF = strtoupper(trim($langCode));
        
        if (isset($langs[$langCodeF])) {
            return $langs[$langCode];
        }
    }
    /**
     * Returns an array which contains different website names in different languages.
     * 
     * Each index will contain a language code and the value will be the name
     * of the website in the given language.
     * 
     * @return array An array which contains different website names in different languages.
     */
    public function getWebsiteNames() : array {
        return $this->webSiteNames;
    }
    /**
     * Removes all stored database connections.
     * 
     * 
     */
    public function removeDBConnections() {
        $this->dbConnections = [];
    }
    /**
     */
    private function initDbConnections() {
        $this->dbConnections = [
        ];
    }
    /**
     */
    private function initSiteInfo() {
        $this->webSiteNames = [
            'AR' => 'تطبيق',
            'EN' => 'Application',
        ];
    
        $this->defaultPageTitles = [
            'AR' => 'افتراضي',
            'EN' => 'Default',
        ];
        $this->descriptions = [
            'AR' => '',
            'EN' => '',
        ];
        $this->baseUrl = Uri::getBaseURL();
        $this->titleSep = '|';
        $this->primaryLang = 'EN';
        $this->baseThemeName = '';
        $this->homePage = Uri::getBaseURL();
    }
    /**
     */
    private function initSmtpConnections() {
        $this->emailAccounts = [
        ];
    }
    /**
     */
    private function initVersionInfo() {
        $this->appVersion = '1.0';
        $this->appVersionType = 'Stable';
        $this->appReleaseDate = '2021-01-10';
    }
}
