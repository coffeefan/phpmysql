<?php

class Post {
        
        private $id;
        private $created;
        private $title;
        private $content;
        
        public function findByID($id) {
            $sqltxt = "SELECT * FROM tbl_person WHERE id = :id";
                $fieldValueMapping = array(':id'=>$id);

                $sql = prepareSql($sqltxt);
                $sql->setFetchMode(PDO::FETCH_CLASS, 'Post');
                $query = executeSql($sql, $fieldValueMapping);
                
                $ptemp = $query->fetch();
                $this->setId($ptemp->getId());
                $this->setCreated($ptemp->getCreated());
                $this->setTitle($ptemp->getTitle());
                $this->setContent($ptemp->getContent());
        }
        
        public function create() {
                $sqltxt = "INSERT INTO tbl_person (created, title, content) VALUES (:created, :title, :content)";
                $fieldValueMapping = array(':created'=>$this->getCreated(),':title'=>$this->getTitle(), ':content'=>$this->getContent());

                $sql = prepareSql($sqltxt);
                $sql = executeSql($sql, $fieldValueMapping);
                $this->setId(getPDODB()->lastInsertId());
        }
        
        public function update() {
            $sqltxt = "UPDATE tbl_person SET created = :created, title = :title, content = :content WHERE id = :id";
                $fieldValueMapping = array(':created'=>$this->getCreated(),':title'=>$this->getTitle(), ':content'=>$this->getContent(), ':id'=>$this->getId());

            $sql = prepareSql($sqltxt);
            $sql = executeSql($sql, $fieldValueMapping);
        }
        
        public function delete() {
            $sqltxt = "DELETE FROM tbl_person WHERE id=:id";
                $fieldValueMapping = array(':id'=>$this->getId());

            $sql = prepareSql($sqltxt);
            $sql = executeSql($sql, $fieldValueMapping);
        }
        
        // getters and setters
        
        public function setId($id)         {
                $this->id = $id;
        }
        
        public function getId() {
                return $this->id;
        }
        
        public function setCreated($created)         {
                $this->created = $created;
        }
        
        public function getCreated() {
                return $this->created;
        }
        
        public function setTitle($title)         {
                $this->title = $title;
        }
        
        public function getTitle() {
                return $this->title;
        }
        
        public function setContent($content)         {
                $this->content = $content;
        }
        
        public function getContent() {
                return $this->content;
        }
        
}


  







?>