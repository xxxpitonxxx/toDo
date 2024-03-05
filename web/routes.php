<?
use Steampixel\Route;
use Red\TodoappCom\controller\TaskController;

// get
Route::add('/api/findAll', function() {
    $taskController = new TaskController;
    echo $taskController->findAlltasks();
});


// delete
Route::add('/api/dropTaskById/([0-9-]*)', function($id) {
    $taskController = new TaskController;
    echo $taskController->dropTaskById($id);
}, 'delete');

// post
Route::add('/api/addTask', function() {
    $json = json_decode(file_get_contents("php://input"), true);
    $taskController = new TaskController;
    echo $taskController->addTask($json);
}, 'post');

// patch
Route::add('/api/taskDone/([0-9-]*)', function($id){
    $taskController = new TaskController;
    echo $taskController->taskDone($id);
},'patch');
