<?php
class Database
{
    public $connect;

    public function __construct()
    {
        $this->connect = mysqli_connect("localhost", "root", "", "dblaundry");
        if ($this->connect) {
            //echo "Database Connected";
        } else {
            echo "Database Not Connected";
        }
    }
    function return_db()
    {
        return $this->connect;
    }
}
