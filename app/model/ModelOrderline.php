<?php
include_once PATH_MODEL . 'Connection.php';
class ModelOrderline
{

    //=============
    // readAll
    //=============
    /**
     *
     *
     *
     */
    public static function readAll()
    {
        //requete
        $pdo = Connection::getPdo();

        $sql    = "SELECT * FROM orderline ";
        $result = $pdo->query($sql);
        if ($result) {
            $array = $result->fetchAll(PDO::FETCH_CLASS, 'Orderline');
        } else {
            $array = [];
        }
        return $array;
    }
    //=============
    // readAllBy
    //=============
    /**
     *
     *
     *
     */
    public function readAllBy($parameter, $value)
    {
        $pdo = Connection::getPdo();

        $sql    = "SELECT * FROM orderline where $parameter = '$value'";
        $result = $pdo->query($sql);

        if ($result) {
            $array = $result->fetchAll(PDO::FETCH_CLASS, 'Orderline');
        } else {
            $array = [];
        }
        return $array;
    }
    //=============
    // readOneBy
    //=============
    /**
     * Read orderline with ele1 at value ele2
     * 
     *  $parametrer
     *  $value
     *  return object orderline
     */
    public function readOneBy($parameter, $value)
    {
        //requete
        $pdo = Connection::getPdo();

        $sql = "SELECT * FROM orderline where $parameter = '$value'";

        $result = $pdo->query($sql);
        if ($result) {

            $data = $result->fetch(PDO::FETCH_ASSOC);
        } else {

            $data = [];
        }

        $orderLine = new Orderline();
        $orderLine->setOrderlineFromArray($data);
        return $orderLine;
    }
}
