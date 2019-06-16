<?php
/**
 * Created by PhpStorm.
 * User: ABC
 * Date: 6/15/2019
 * Time: 10:54 PM
 */

class Database
{

    public $host = "localhost";
    public $user = "root";
    public $password ="";
    public $database = "simple_shop";
    public $connection;

//    phuong thuc khoi tao contructor
public function __construct()
{
    $this -> connection = $this ->connecdatabase();
}
public function connecdatabase(){
    $connection = mysqli_connect($this ->host, $this ->user, $this ->password, $this ->database );
    return $connection;

}

//phuong thuc chay cau lenh truy van sql va tra ve array

public function runQuery($sql){
    $data =array();
    $result = mysqli_query($this ->connection, $sql);

    while ($row = mysqli_fetch_assoc($result)){
        $data[] =$row;

    }

    return $data;
}



}