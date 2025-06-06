<?php

class Database
{
    // public property to create a connection to the database i.e. workopia
    public $conn;

    /**
     * Constructor to connect to the custom database 
     * 
     * @param array $config
     * @return void
     */
    public function __construct($config)
    {
        //$dsn string is used to create a new PHP database object to interact with the database i.e. PDO
        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";

        // options array specifies the format of the retrieved data and error handling i.e. object, associative array etc.
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ];

        try {
            //Create a new PDO instance to interact with the database i.e. workopia
            $this->conn = new PDO($dsn, $config['username'], $config['password'], $options);
        } catch (PDOException $e) {
            // handles an exception if an error occurs while connecting to the database
            //the method $e->getMessage() returns the error message
            throw new Exception("Database connection failed: {$e->getMessage()}");
        }
    }

    /**
     * Query the database using a sql query
     * 
     * @param string $query
     * 
     * @return PDOStatement
     * @throws PDOException
     */
    public function query($query, $params = [])
    {
        try {
           //create a statement variable that will contain the query data if it is retrieved successfully
            $sth = $this->conn->prepare($query);

            //Bind named params in the query
            foreach ($params as $param => $value) {
                $sth->bindValue(':' . $param, $value);
            }

            //the $params array can also be used as an argument in the execute method without directly binding it to the $sth variable
            $sth->execute();
            return $sth;
        } catch (PDOException $e) {
            //an Exception will be thrown if an error occurs
            throw new Exception("Query failed to execute: {$e->getMessage()}");
        }
    }
}
