<?php
class Database{

    //state of database connection
    private $connection = null;


    //connection inside construct
    public function __construct($dbhost="localhost", $dbname="instalit", $dbuser="MattiasHerzig", $dbpassword="Exet1338!")
    {
        try{
            $this->connection = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
            }catch(Exception $e)
        {
            throw new Exception($e->getMessage());
        }
    }

//    $types = data types in columns, s for string, i for integer

    //insert into database
    public function insert($statement, $types, $parameters)
{

        $this->executeSQL($statement, $types, $parameters);
        return $this->connection->insert_id;

}


    //selecting items from database
    public function select($statement, $types, $parameters)
    {

            $data = $this->executeSQL($statement, $types, $parameters);
            return $data->get_result()->fetch_all(MYSQLI_ASSOC);

        
    }

    //update items
    public function update($statement, $types, $parameters)
    {

        $this->executeSQL($statement, $types, $parameters);
    }

    //remove items
    public function remove($statement, $types, $parameters)
    {

        $this->executeSQL($statement, $types, $parameters);
    }




    //execute sql and get result
    private function executeSQL($statement,$types, $parameters)
    {
        try{
            $doWork = $this->connection->prepare($statement);
//            $types = str_repeat('s', count($parameters));
            $doWork->bind_param($types,...$parameters);
            $doWork->execute();
            return $doWork;
        }catch(Exception $e)
        {
            throw new Exception($e->getMessage());
        }
    }



}