<?
namespace Red\TodoappCom\controller;
use Red\TodoappCom\model\TaskModel;

class TaskController {

    private $taskModel;

    function __construct() {
        $this->taskModel = new TaskModel;
    }

    public function findAlltasks() {
        return json_encode($this->taskModel->findAllTasks());
    }

    public function dropTaskById($id) {
        try{
            return json_encode($this->taskModel->dropTaskById($id));
        } catch(\Exception $exp) {
            return json_encode(["error"=>"not found"]);
        }
    }

    public function addTask($array) {
        try{
            return json_encode($this->taskModel->addTask($array));
        } catch(\Exception $exp) {
            return json_encode(["error"=>"can't save"]);
        }
    }

    public function taskDone($id) {
        try{
            return json_encode($this->taskModel->taskDone($id));
        } catch(\Exception $exp) {
            return json_encode(["error"=>"not found"]);
        }
    }
  


}