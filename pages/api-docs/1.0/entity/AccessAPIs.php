<?php
require_once ROOT_DIR.'/pages/api-docs/APIView.php';

class AccessAPIs extends APIView{
    public function __construct() {
        parent::__construct('Access','webfiori/entity','1.0');
        $this->getClassAPIObj()->setDescription('This class is used to '
                . 'manage privileges and user groups. The '
                . 'developer can create groups and add privileges to '
                . 'each different group. Used to manage which '
                . 'users can access specific parts of the system.');
        new APIPage($this->getClassAPIObj());
    }

    public function defineClassFunctions() {
        $this->addFunctionDef(array(
            'name'=>'createPermissionsStr',
            'short-desc'=>'Creates a string of permissions given a user.',
            'long-desc'=>'Creates a string of permissions given a user.',
            'access-modifier'=>'public static',
            'params'=>array(
                array(
                    'name'=>'$user',
                    'type'=>'<a href="'.$this->getBaseURL().'entity/User" style="font-family:monospace">User</a>',
                    'description'=>'',
                )
            ),
            'return-types'=>'string',
            'return-desc'=>'A string of privileges. The format of the string will 
                follow the following format: \'<span style="font-family:monospace">PRIVILEGE_1-0;PRIVILEGE_2-1;</span>\' where 
                \'<span style="font-family:monospace">PRIVILEGE_1</span>\' and 
                \'<span style="font-family:monospace">PRIVILEGE_2</span>\' are IDs of 
                privileges and the number 
                that comes after the dash is the status of the privilege. If 0, then the 
                user will not have the given privilege. If 1, the user will have the 
                privilege. In the given example, The user will have only \'<span style="font-family:monospace">PRIVILEGE_2</span>\'. Each 
                privilege will be separated from the other by a semicolon.'
        ));
        $this->addFunctionDef(array(
            'name'=>'&getGroup',
            'access-modifier'=>'public static',
            'short-desc'=>'Returns a <a href="'.$this->getBaseURL().'entity/UsersGroup" style="font-family:monospace">UsersGroup</a> object given its ID.',
            'long-desc'=>'Returns a <a href="'.$this->getBaseURL().'entity/UsersGroup" style="font-family:monospace">UsersGroup</a> object given its ID.',
            'params'=>array(
                array(
                    'name'=>'$groupId',
                    'type'=>'string',
                    'description'=>'The ID of the users group.',
                )
            ),
            'return-types'=>'<a href="'.$this->getBaseURL().'entity/UsersGroup" style="font-family:monospace">UsersGroup</a>|NULL',
            'return-desc'=>'If a users group with the given ID was found, It will be returned. If not, the function will return NULL.'
        ));
        $this->addFunctionDef(array(
            'name'=>'&getPrivilege',
            'access-modifier'=>'public static',
            'short-desc'=>'Returns a privilege object given its ID.',
            'long-desc'=>'Returns a privilege object given its ID.',
            'params'=>array(
                array(
                    'name'=>'$id',
                    'type'=>'string',
                    'description'=>'The ID of the privilege.',
                )
            ),
            'return-types'=>'<a href="'.$this->getBaseURL()
                .'entity/Privilege">Privilege</a>|NULL',
            'return-desc'=>'If a privilege with the given ID was found in any user group, It will be returned. If not, the function will return NULL.'
        ));
        $this->addFunctionDef(array(
            'name'=>'groups',
            'access-modifier'=>'public static',
            'short-desc'=>'Returns an array which contains all user groups.',
            'long-desc'=>'Returns an array which contains all user groups.',
            'return-types'=>'array',
            'return-desc'=>'An array that contains an objects of type <a style="font-family:monospace" href="'.$this->getBaseURL().'entity/UsersGroup">UsersGroup</a>.'
        ));
        $this->addFunctionDef(array(
            'name'=>'hasGroup',
            'access-modifier'=>'public static',
            'short-desc'=>'Checks if a users group does exist or not given its ID.',
            'long-desc'=>'Checks if a users group does exist or not given its ID.',
            'params'=>array(
                array(
                    'name'=>'$groupId',
                    'type'=>'string',
                    'description'=>'The ID of the group.',
                )
            ),
            'return-types'=>'boolean',
            'return-desc'=>'The function will return TRUE if a users group with the given ID was found. FALSE if not.'
        ));
        $this->addFunctionDef(array(
            'name'=>'hasPrivilege',
            'access-modifier'=>'public static',
            'short-desc'=>'Checks if a privilege does exist or not given its ID.',
            'long-desc'=>'Checks if a privilege does exist or not given its ID.',
            'params'=>array(
                array(
                    'name'=>'$Id',
                    'type'=>'string',
                    'description'=>'The ID of the privilege.',
                )
            ),
            'return-types'=>'boolean',
            'return-desc'=>'The function will return TRUE if a privilege with the given ID was found. FALSE if not.'
        ));
        $this->addFunctionDef(array(
            'name'=>'newGroup',
            'access-modifier'=>'public static',
            'short-desc'=>'Creates new users group using specific ID.',
            'long-desc'=>'Creates new users group using specific ID.',
            'params'=>array(
                array(
                    'name'=>'$groupId',
                    'type'=>'string',
                    'description'=>'The ID of the group. The ID must not contain '
                    . 'any of the following characters, \';\',\'-\' or a space.',
                )
            ),
        ));
        $this->addFunctionDef(array(
            'name'=>'newPrivilege',
            'access-modifier'=>'public static',
            'short-desc'=>'Creates new privilege in a specific group given its ID.',
            'long-desc'=>'Creates new privilege in a specific group given its ID.',
            'params'=>array(
                array(
                    'name'=>'$groupId',
                    'type'=>'string',
                    'description'=>'The ID of the group that the privilege will be '
                    . 'added to. It must be a group in the groups array of the <a href="'.$this->getLink().'">Access</a> class.',
                ),
                array(
                    'name'=>'$privilegeId',
                    'type'=>'string',
                    'description'=>'The ID of the privilege. The ID must not contain '
                    . 'any of the following characters, \';\',\'-\' or a space.'
                )
            ),
        ));
        $this->addFunctionDef(array(
            'name'=>'privileges',
            'access-modifier'=>'public static',
            'short-desc'=>'Returns an array which contains all privileges or privileges in a specific user group.',
            'long-desc'=>'Returns an array which contains all privileges or privileges in a specific user group.',
            'params'=>array(
                array(
                    'name'=>'$groupId',
                    'type'=>'string|NULL',
                    'description'=>'The ID of the group which its 
                        privileges will be returned. If NULL is given, all privileges will be 
                        returned. ',
                    'is-optional'=>true
                    ),
                ),
            'return-types'=>'array',
            'return-desc'=>'An array which contains an objects of type '
            . '<a href="'.$this->getBaseURL().'entity/Privilege" style="font-family:monospace">Privilege</a>. If the given group ID does not exist, the returned array will be empty.'
        ));
        $this->addFunctionDef(array(
            'name'=>'resolvePriviliges',
            'access-modifier'=>'public static',
            'short-desc'=>'Adds privileges to a user given privileges string.',
            'long-desc'=>'Adds privileges to a user given privileges string.',
            'params'=>array(
                array(
                    'name'=>'$str',
                    'type'=>'string',
                    'description'=>'A string of privileges. The format of the string should 
                follow the following format: \'<span style="font-family:monospace">PRIVILEGE_1-0;PRIVILEGE_2-1;</span>\' where 
                \'<span style="font-family:monospace">PRIVILEGE_1</span>\' and 
                \'<span style="font-family:monospace">PRIVILEGE_2</span>\' are IDs of 
                privileges and the number 
                that comes after the dash is the status of the privilege. If 0, then the 
                user will not have the given privilege. If 1, the user will have the 
                privilege. In the given example, The user will have only \'<span style="font-family:monospace">PRIVILEGE_2</span>\'. Each 
                privilege will be separated from the other by a semicolon.',
                ),
                array(
                    'name'=>'&$user',
                    'type'=>'<a href="'.$this->getBaseURL().'entity/User" style="font-family:monospace">User</a>',
                    'description'=>'The user which the permissions will be added to.',
                )
            ),
        ));
    }

    public function defineClassAttributes() {
        
    }

}
new AccessAPIs();