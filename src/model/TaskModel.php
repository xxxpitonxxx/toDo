<?

namespace Red\TodoappCom\model;


class TaskModel {
    public function findAllTasks() {
        $is_del = 0;
        return \R::findAll('tasks', 'is_delete = ?', [$is_del]);
    }


    public function dropTaskById($id) {

        try{
            $record = \R::load('tasks', $id);
            $record->is_delete = 1;
            \R::store($record);
            return [
                "id"=>$id,
                "drop"=>true
            ];

        }catch(\Exception $exception) {
            throw new \Exception;
        }
    }

    public function addTask($array) {

        if(empty($array['name'] || empty($array['description']))) {
            throw new \Exception("fields is empty");
        }

        try{
            $table = \R::dispense('tasks');
            $table->name = $array['name'];
            $table->description = $array['description'];
            $table->is_delete = 0;
            \R::store($table);
            return $table;
        } catch(\Exception $exp) {
            throw new \Exception("can't save");
        }
    }

    public function taskDone($id) {

        try{
            $record = \R::load('tasks', $id);
            $record->done = 1;
            \R::store($record);
            return $record;

        }catch(\Exception $exception) {
            throw new \Exception;
        }
    }

}