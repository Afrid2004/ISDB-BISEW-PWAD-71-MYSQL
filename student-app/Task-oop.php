<?php 
class TASKOOP{
    public $taskname;
    public $taskdesc;
    public $tasktime;
    public $studentid;

    // constructor to recevie value from perameter and set them to the variables
    public function __construct($name, $desc, $time)
    {
        $this->taskname = $name;
        $this->taskdesc = $desc;
        $this->tasktime = $time;
        $this->studentid = $_SESSION['id'];
    }

    //save the data into db
    function save(){
        global $db;
        $sql = "INSERT INTO alltasks (task_name, task_desc, task_time, student_id) VALUES ('$this->taskname', '$this->taskdesc', '$this->tasktime', '$this->studentid')";
        $stmt = $db->query($sql);
        return "Task added successfully";
    }

    //get all task data by user id
    static function showAll($studentid){
        global $db;
        // to push all task as array of object
        $taskdata=[];
        $sql = "SELECT * FROM alltasks WHERE student_id=$studentid";
        $stmt = $db->query($sql);
        $tasks = $stmt->fetch_all(MYSQLI_ASSOC);

        foreach ($tasks as $task) {
            array_push($taskdata, (object)$task);
        }
        // return all the task data as array of object
        return $taskdata;
    }
}

?>