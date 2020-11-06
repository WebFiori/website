<?php

namespace app\database;

use webfiori\database\mysql\MySQLTable;

/**
 * A class which represents the database table '`sessions`'.
 * The table which is associated with this class will have the following columns:
 * <ul>
 * <li><b>session-id</b>: Name in database: '`session_id`'. Data type: 'varchar'.</li>
 * <li><b>created-on</b>: Name in database: '`created_on`'. Data type: 'timestamp'.</li>
 * <li><b>session-data</b>: Name in database: '`session_data`'. Data type: 'mediumtext'.</li>
 * </ul>
 */
class SessionsTable extends MySQLTable {
    /**
     * Creates new instance of the class.
     */
    public function __construct(){
        parent::__construct('`sessions`');
        $this->setComment('This table is used to store all generated system sessions.');
        $this->addColumns([
            'session-id' => [
                'type' => 'varchar',
                'size' => '128',
                'primary' => true,
                'is-unique' => true,
                'comment' => 'The ID of the session. Each session must have a unique ID.',
            ],
            'created-on' => [
                'type' => 'timestamp',
                'default' => 'now()',
                'comment' => 'The date and time at which the session was initioated on.',
            ],
            'session-data' => [
                'type' => 'mediumtext',
                'comment' => 'The serialized session data.',
            ],
        ]);
    }
}
