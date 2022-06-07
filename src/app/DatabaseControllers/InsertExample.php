<?php


namespace App\DatabaseControllers;
use PDO;
class InsertExample {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function insertDataExample($table_name, $first_parameter, $second_parameter) {

        $name = $first_parameter;
        $channel = $second_parameter;

        $query = 'INSERT INTO  '. $table_name . ' (name, channel)
              VALUES (:name, :channel)';
        $id_query = 'SELECT * FROM '.  $table_name  . ' WHERE id =';

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':channel', $channel);

        $stmt->execute();

        $id = (int) $this->db->lastInsertId();

        return $this->db
            ->query($id_query . $id)
            ->fetch();
    }
}