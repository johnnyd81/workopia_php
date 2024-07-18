<?php

class Database
{
    // public property to connect to the database
    public $conn;

    /**
     * Constructor to connect to the database 
     * 
     * @param array $config
     */
    public function __construct($config)
    {
        //$dsn string is used to create a new PHP database object to interact with the database i.e. PDO
        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";

        // options array specifies the format of the retrieved data i.e. object, associative array etc
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ];

        try {
            $this->conn = new PDO($dsn, $config['username'], $config['password'], $options);
        } catch (PDOException $e) {
            // handles an exception
            throw new Exception("Database connection failed: {$e->getMessage()}");
        }
    }

    /**
     * Query the database
     * 
     * @param string $query
     * 
     * @return PDOStatement
     * @throws PDOException
     */
    public function query($query, $params = [])
    {
        try {
           //create a statement that will contain the query data if it is retrieved successfully
            $sth = $this->conn->prepare($query);

            //Bind named params
            foreach ($params as $param => $value) {
                $sth->bindValue(':' . $param, $value);
            }

            $sth->execute();
            return $sth;
        } catch (PDOException $e) {
            throw new Exception("Query failed to execute: {$e->getMessage()}");
        }
    }
}
