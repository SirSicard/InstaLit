<?php
class Database{

    //state of database connection
    private $connection = null;


    //connection inside construct
    public function __construct($dbhost="localhost", $dbname="instalit", $dbuser="root", $dbpassword="")
    {
        try{
            $this->connection = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
            }catch(Exception $e)
        {
            throw new Exception($e->getMessage());
        }
    }

    //insert into database
    public function insert($statement)
{

        $this->executeSQL($statement);
        return $this->connection->insert_id;

}


    //selecting items from database
    public function select($statement)
    {

            $data = $this->executeSQL($statement);
            return $data->get_result()->fetch_all(MYSQLI_ASSOC);

        
    }

    //update items
    public function update($statement)
    {
        $this->executeSQL($statement);
    }

    //remove items
    public function remove($statement)
    {
        $this->executeSQL($statement);
    }




    //execute sql and get result
    private function executeSQL($statement)
    {
        try{
            $doWork = $this->connection->prepare($statement);
            $doWork->execute();
            return $doWork;
        }catch(Exception $e)
        {
            throw new Exception($e->getMessage());
        }
    }



}