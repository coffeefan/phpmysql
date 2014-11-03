<?php
require_once realpath(dirname(__FILE__))."/database.php";
require_once realpath(dirname(__FILE__))."/post.php";
require_once realpath(dirname(__FILE__))."/posttablegateway.php";

class Aufgabe4{

    public function show(){
        ?>
        <h1>Aufgabe4</h1>
        <?
        $posts=$this->makeSampleDataPostRowData();
        $this->checkLocking();
    }

    public function makeSampleDataPostRowData(){
        $postTableGateway = new PostTableGateway();

        //Zuerst alle Post die existieren löschen
        foreach ($postTableGateway->findAll() as $post) {
            $postTableGateway->delete($post);
        }

        $post1 = new Post;
        $post1->setCreated("2014-10-21");
        $post1->setTitle("Mein 1. Eintrag");
        $post1->setContent("Das ist der 1. Inhalt");

        $post2 = new Post;
        $post2->setCreated("2014-10-24");
        $post2->setTitle("Mein 2. Eintrag");
        $post2->setContent("Das ist der 2. Inhalt");

        $post3 = new Post;
        $post3->setCreated("2014-10-24");
        $post3->setTitle("Mein 3. Eintrag");
        $post3->setContent("Hier ist der 3. Inhalt");

        $post1->create($post1);
        $post2->create($post2);
        $post3->create($post3);

        return [$post1->getId(),$post2->getId(),$post3->getId()];
    }

    public function checkLocking(){
        $postTableGateway = new PostTableGateway();
        echo '<p>Alle Posts </p>';
        echo '<table class="table">';
        echo '<tr><th>Erstellt</th><th>Titel</th><th>Inhalt</th></tr>';
        $posts=$postTableGateway->findAll();
        foreach ($posts as $post) {
            echo '<tr>';
            echo '<td>'.$post->getCreated().'</td>';
            echo '<td>'.$post->getTitle().'</td>';
            echo '<td>'.$post->getContent().'</td>';
            echo '</tr>';
        }
        echo '</table>';
        $post1 = new Post();
        $post1->findById($posts[0]->getId());

        $post1_copy = new Post();
        $post1_copy->findById($posts[0]->getId());



        $post1->setTitle("Mein Eintrag hat ein neuer Titel");
        try {
            $post1->update();
        } catch (Exception $e) {
            echo '<p>Error Update Post 1',  $e->getMessage(), "</p>";
        }


        $post1_copy->setTitle("Mein Eintrag hat einen besseren neuen Titel");

        try {
            $post1_copy->update();
            echo "yes";
        } catch (Exception $e) {
            echo '<p>Error Update Post 1 Copy',  $e->getMessage(), "</p>";
        }


        $postTableGateway = new PostTableGateway();
        echo '<p>Alle Posts </p>';
        echo '<table class="table">';
        echo '<tr><th>Erstellt</th><th>Titel</th><th>Inhalt</th></tr>';
        foreach ($postTableGateway->findAll() as $post) {
            echo '<tr>';
            echo '<td>'.$post->getCreated().'</td>';
            echo '<td>'.$post->getTitle().'</td>';
            echo '<td>'.$post->getContent().'</td>';
            echo '</tr>';
        }
        echo '</table>';



    }


}

?>