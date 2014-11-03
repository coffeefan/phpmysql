<?php

class Post {
        
        private $id;
        private $created;
        private $title;
        private $content;
        private $version;
        
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
                $this->version=$ptemp->getVersion();
        }
        
        public function create() {
                $sqltxt = "INSERT INTO tbl_person (created, title, content,version) VALUES (:created, :title, :content,1)";
                $fieldValueMapping = array(':created'=>$this->getCreated(),':title'=>$this->getTitle(), ':content'=>$this->getContent());

                $sql = prepareSql($sqltxt);
                $sql = executeSql($sql, $fieldValueMapping);
                $this->setId(getPDODB()->lastInsertId());
        }
        
        public function update() {
            $sqltxt = "UPDATE tbl_person SET created = :created, title = :title, content = :content, version=:version+1 WHERE id = :id and version=:version";
                $fieldValueMapping = array(':created'=>$this->getCreated(),':title'=>$this->getTitle(), ':content'=>$this->getContent(), ':id'=>$this->getId(),
                ':version'=>$this->version);

            $sql = prepareSql($sqltxt);
            $query = executeSql($sql, $fieldValueMapping);
            if ($query->rowCount() == 0) {
                throw new Exception($sqltxt.'optimitisches Locking Error: Das Objekt wurde vor dem Speichern bereits von einer andren Instantz geändert !');
            }
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


        public function getVersion() {
            return $this->version;
        }
        
}


  







?>