<?php

namespace core\database;


use PDO;

abstract class Repository
{

    protected $connection;
    protected $baseTable;
    protected $instanceConfig;
    protected $errorMessage;
    protected static $config;

    public function __construct($name)
    {
        $this->instanceConfig = self::$config[$name];
        $this->connection     = $this->getConnection();
    }

    public static function setConfig($config)
    {
        self::$config = $config;
    }

    protected function getConnection()
    {
        return MySqlDataBaseProvider::getConnection();
    }

    public function getEntityById($id)
    {
        $values    = [
            'id' => $id,
        ];
        $statement = $this->connection->prepare('SELECT * FROM '
                                                . $this->instanceConfig['base_table']
                                                . ' WHERE id = :id');
        $statement->execute($values);

        return $statement->fetchObject($this->instanceConfig['model']);
    }

    public function getEntityByParameter($parameter, $value)
    {
        $values    = [
            $parameter => $value,
        ];
        $statement = $this->connection->prepare('SELECT * FROM '
                                                . $this->instanceConfig['base_table']
                                                . ' WHERE ' . $parameter
                                                . ' = :' . $parameter);
        $statement->execute($values);

        return $statement->fetchObject($this->instanceConfig['model']);
    }

    public function getSubEntityById($subEntityName, $id)
    {
        if ($subEntity = $this->instanceConfig[$subEntityName]) {

            $values    = [
                'id' => $id,
            ];
            $statement = $this->connection->prepare('SELECT * FROM '
                                                    . $subEntity['base_table']
                                                    . ' WHERE id = :id');
            $statement->execute($values);

            return $statement->fetchObject($subEntity['model']);
        }
    }

    public function saveNew($entity)
    {
        $fields = implode(array_keys($entity), ', ');
        $values = ':' . implode(array_keys($entity), ', :');

        if ($this->validateNew($entity)) {

            $query = 'INSERT INTO ' . $this->instanceConfig['base_table']
                     . ' (' . $fields . ') VALUES (' . $values . ');';

            $statement = $this->getConnection()->prepare($query);

            // TODO: Create validation.
            $result  = $statement->execute($entity);
            $message = [
                'status' => 'ok',
            ];
        } else {
            $message = [
                'status' => 'error',
            ];

        }

        return $message;
    }

    public function getAllRowsCertainFieldsFromTable(
        $fields,
        $from = 0,
        $limit = 0
    ) {
        $fieldsStr = implode($fields, ', ');

        $query = 'SELECT ' . $fieldsStr . ' FROM '
                 . $this->instanceConfig['base_table'];

        if ($from > 0 && $limit > 0) {
            $query .= ' LIMIT ' . $from . ', ' . $limit . ';';
        } elseif ($limit > 0) {
            $query .= ' LIMIT ' . $from . ', ' . $limit . ';';
        } else {
            $query .= ';';
        }

        $statement = $this->getConnection()->prepare($query);

        $statement->execute();
        // TODO: Create validation.
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getAllRowsCertainFieldsFromTableByParameter(
        $fields,
        $parameter,
        $isOrdered = false,
        $orderedParam = '',
        $isReverse = false
    ) {
        $fieldsStr = implode($fields, ', ');

        $param = implode(array_keys($parameter));

        $query = 'SELECT ' . $fieldsStr . ' FROM '
                 . $this->instanceConfig['base_table'] . ' WHERE ' . $param
                 . '=:' . $param;

        if ($isOrdered) {
            $query .= ' ORDER BY ' . $orderedParam;
            if ($isReverse) {
                $query .= ' DESC';
            }
        }

        $query .= ';';
        $statement = $this->getConnection()->prepare($query);

        $statement->execute($parameter);
        // TODO: Create validation.
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function updateEntity($fields)
    {
        $query    = 'UPDATE ' . $this->instanceConfig['base_table'] . ' SET';
        $last_key = key(array_slice($fields, -1, 1, true));
        foreach ($fields as $key => $value) {
            if ($key != 'id') {
                $query .= ' ' . $key . '=:' . $key;
                if ($key != $last_key) {
                    $query .= ',';
                }
            }
        }
        $query     .= ' WHERE id=:id;';
        $statement = $this->getConnection()->prepare($query);
        $result    = $statement->execute($fields);

        return $result;

    }

    public function deleteEntityById($id)
    {
        $query = 'DELETE  FROM ' . $this->instanceConfig['base_table']
                 . ' WHERE id=:id;';

        $statement = $this->getConnection()->prepare($query);
        $result    = $statement->execute(['id' => $id]);

        return $result;
    }

    public function getRowsCount()
    {
        $query = 'SELECT COUNT(*) FROM ' . $this->instanceConfig['base_table']
                 . ';';

        return $this->getConnection()->query($query)->fetchColumn();
    }

    public abstract function validateNew($entity);

    /**
     * @return mixed
     */
    public function getInstanceConfig()
    {
        return $this->instanceConfig;
    }

    /**
     * @param mixed $instanceConfig
     */
    public function setInstanceConfig($instanceConfig): void
    {
        $this->instanceConfig = $instanceConfig;
    }

    /**
     * @return mixed
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @param mixed $errorMessage
     */
    public function setErrorMessage($errorMessage): void
    {
        $this->errorMessage = $errorMessage;
    }

}