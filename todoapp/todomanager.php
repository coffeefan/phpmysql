<?


function newDBConnection(){
    $db = new PDO('mysql:host=127.0.0.1;dbname=dbtodo;charset=utf8', 'todouser', '4ever');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    return $db;

}

function showTodos(){
    $db=newDBConnection();
    $todos=array();
    try {
        foreach($db->query('Select todoid,description,deadline,status from todos Order by status, deadline asc') as $row) {

            array_push($todos,$row);
        }
    } catch(PDOException $ex) {
        echo "An Error occured!".$ex->getMessage(); //user friendly message
    }
    return $todos;
}

function insertTodo($todo){
    $db=newDBConnection();
    $stmt = $db->prepare("INSERT INTO todos(description,deadline,status) VALUES(:description,:deadline,'uncompleted')");
    $stmt->execute(array(':description' => $todo["description"], ':deadline' =>  $todo["deadline"]));
    $affected_rows = $stmt->rowCount();
}

function updateTodo($todo){
    $db=newDBConnection();
    $stmt = $db->prepare("Update todos set description=:description, deadline=:deadline where todoid=:todoid");
    $stmt->execute(array(':description' => $todo["description"], ':deadline' =>  $todo["deadline"], ':todoid' => $todo["todoid"]));
    $affected_rows = $stmt->rowCount();
}

function changStatus($status,$todoid){
    $db=newDBConnection();
    $stmt = $db->prepare("Update todos set status=:status where todoid=:todoid");
    $stmt->execute(array(':status' => $status,':todoid' => $todoid));
    $affected_rows = $stmt->rowCount();
}

function deleteTodo($todoid){
    $db=newDBConnection();
    $stmt = $db->prepare("Delte from todos where todoid=:todoid");
    $stmt->execute(array(':todoid' => $todoid));
    $affected_rows = $stmt->rowCount();
}


?>