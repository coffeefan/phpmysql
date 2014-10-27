<?php
require_once realpath(dirname(__FILE__))."/post.php";
require_once realpath(dirname(__FILE__))."/posttablegateway.php";


class HomeController{

    public function show(){

        echo"<h2>Data Post Table</h2>";
        $this->makeSampleDataPostTable();
        $this->makePostTableRequests();

        echo"<h2>Post Row Data</h2>";
        $postids=$this->makeSampleDataPostRowData();
        $this->makePostRequestRowData($postids);
    }


    public function makeSampleDataPostTable(){
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

        $post4 = new Post;
        $post4->setCreated("2014-10-24");
        $post4->setTitle("Mein 4. Eintrag");
        $post4->setContent("Hier ist der 4. Inhalt");

        $post5 = new Post;
        $post5->setCreated("2014-10-26");
        $post5->setTitle("Mein 5. Eintrag");
        $post5->setContent("Hier ist der 5. Inhalt");

        $postTableGateway->create($post1);
        $postTableGateway->create($post2);
        $postTableGateway->create($post3);
        $postTableGateway->create($post4);
        $postTableGateway->create($post5);
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

    public function makePostRequestRowData($postids){
        # print all rows
        echo '<p>Alle Posts anzeigen anhand eines Arrays</p>';
        echo '<table class="table">';
        echo '<tr><th>Erstellt</th><th>Titel</th><th>Inhalt</th></tr>';
        foreach ($postids as $postid) {
            $post=new Post();
            $post->findByID($postid);
            echo '<tr>';
            echo '<td>'.$post->getCreated().'</td>';
            echo '<td>'.$post->getTitle().'</td>';
            echo '<td>'.$post->getContent().'</td>';
            echo '</tr>';
        }
        echo '</table>';


        echo '<p>Einzelner Post anzeigen, mit ID '.$postids[0].'</p>';
        echo '<table class="table">';
        echo '<tr><th>Erstellt</th><th>Titel</th><th>Inhalt</th></tr>';
        $post = new Post;
        $post->findById($postids[0]);
        echo '<tr>';
        echo '<td>'.$post->getCreated().'</td>';
        echo '<td>'.$post->getTitle().'</td>';
        echo '<td>'.$post->getContent().'</td>';
        echo '</tr>';
        echo '</table>';


        echo '<p>Aktualisiere Post mit ID '.$postids[0].'</p>';
        $post->setContent("Neuer Inhalt");
        $post->update();


        echo '<p>Der Aktualisierte Post('.$postids[0].')</p>';
        echo '<table class="table">';
        echo '<tr><th>Erstellt</th><th>Titel</th><th>Inhalt</th></tr>';
        $post = new Post;
        $post->findById($postids[0]);
        echo '<tr>';
        echo '<td>'.$post->getCreated().'</td>';
        echo '<td>'.$post->getTitle().'</td>';
        echo '<td>'.$post->getContent().'</td>';
        echo '</tr>';
        echo '</table>';

        echo '<p>Lösche Post mit id = '.$post->getId().'</p>';
        $post->delete();

    }

    public function makePostTableRequests(){
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

        echo '<p>Alle Post welche das Attribut created= "2014-10-24": </p>';
        echo '<table class="table">';
        echo '<tr><th>Erstellt</th><th>Titel</th><th>Inhalt</th></tr>';
        $lastID=0;
        foreach ($postTableGateway->findByAttribute('created', '2014-10-24') as $post) {
            echo '<tr>';
            echo '<td>'.$post->getCreated().'</td>';
            echo '<td>'.$post->getTitle().'</td>';
            echo '<td>'.$post->getContent().'</td>';
            echo '</tr>';
            $lastID=$post->getId();
        }
        echo '</table>';


        echo '<p>Post in Datenbank unter ID = '.$lastID.'anzeigen</p>';
        echo '<table class="table">';
        echo '<tr><th>Erstellt</th><th>Titel</th><th>Inhalt</th></tr>';
        $post = $postTableGateway->findById($lastID);
        echo '<tr>';
        echo '<td>'.$post->getCreated().'</td>';
        echo '<td>'.$post->getTitle().'</td>';
        echo '<td>'.$post->getContent().'</td>';
        echo '</tr>';
        echo '</table>';


        echo '<p>Aktualisiere Post mit id = '.$lastID.'</p>';
        $post->setContent("Neuer Inhalt");
        $postTableGateway->update($post);


        echo '<p>Anzeige des aktualisiereten Eintrags ('.$lastID.')</p>';
        echo '<table class="table">';
        echo '<tr><th>Erstellt</th><th>Titel</th><th>Inhalt</th></tr>';
        $post = $postTableGateway->findById($lastID);
        echo '<tr>';
        echo '<td>'.$post->getCreated().'</td>';
        echo '<td>'.$post->getTitle().'</td>';
        echo '<td>'.$post->getContent().'</td>';
        echo '</tr>';
        echo '</table>';

        echo '<p>Lösche Post mit id = '.$lastID.'</p>';
        $postTableGateway->delete($post);

        $postTableGateway = new PostTableGateway();
        echo '<p>Alle Posts nach Löschung </p>';
        echo '<table class="table">';
        echo '<tr><th>Created</th><th>Title</th><th>Content</th></tr>';
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