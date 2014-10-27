<?php

class PostTableGateway {

    public function findByID($id) {
        $sqltxt = "SELECT * FROM tbl_person WHERE id = :id";
        $fieldValueMapping = array(':id'=>$id);

        $pquery = prepareSql($sqltxt);
        $pquery->setFetchMode(PDO::FETCH_CLASS, 'Post');
        $pquery = executeSql($pquery, $fieldValueMapping);

        return $pquery->fetch();
    }

    public function findByAttribute($attribute, $value) {
        $sqltxt = "SELECT * FROM tbl_person WHERE $attribute = :$attribute";
        $fieldValueMapping = array(":$attribute"=>$value);

        $sql = prepareSql($sqltxt);
        $sql->setFetchMode(PDO::FETCH_CLASS, 'Post');
        $query = executeSql($sql, $fieldValueMapping);

        return $query->fetchAll();
    }

    public function findAll() {
        $sqltxt = "SELECT * FROM tbl_person";

        $sql = prepareSql($sqltxt);
        $sql->setFetchMode(PDO::FETCH_CLASS, 'Post');
        $query = executeSql($sql, array());

        return $query->fetchAll();
    }

    public function create($entry) {
        $sqltxt = "INSERT INTO tbl_person (created, title, content) VALUES (:created, :title, :content)";
        $fieldValueMapping = array(':created'=>$entry->getCreated(),':title'=>$entry->getTitle(), ':content'=>$entry->getContent());

        $sql = prepareSql($sqltxt);
        $query = executeSql($sql, $fieldValueMapping);
        $entry->setId(getPDODB()->lastInsertId());
        return $entry;
    }

    public function update($entry) {
        $sqltxt = "UPDATE tbl_person SET created = :created, title = :title, content = :content WHERE id = :id";
        $fieldValueMapping = array(':created'=>$entry->getCreated(),':title'=>$entry->getTitle(), ':content'=>$entry->getContent(), ':id'=>$entry->getId());

        $sql= prepareSql($sqltxt);
        $query = executeSql($sql, $fieldValueMapping);
        return true;
    }

    public function delete($entry) {
        $sqltxt = "DELETE FROM tbl_person WHERE id=:id";
        $fieldValueMapping = array(':id'=>$entry->getId());

        $sql = prepareSql($sqltxt);
        $query = executeSql($sql, $fieldValueMapping);
    }
}
?>