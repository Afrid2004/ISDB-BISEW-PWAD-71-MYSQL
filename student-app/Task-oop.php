<?php
class TASKOOP
{
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
    function save()
    {
        global $db;
        $sql = "INSERT INTO alltasks (task_name, task_desc, task_time, student_id) VALUES ('$this->taskname', '$this->taskdesc', '$this->tasktime', '$this->studentid')";
        $stmt = $db->query($sql);
        return "Task added successfully";
    }

    //get all task data by user id
    static function showAll($studentid)
    {
        global $db;
        // to push all task as array of object
        $taskdata = [];
        $sql = "SELECT * FROM alltasks WHERE student_id=$studentid";
        $stmt = $db->query($sql);
        $tasks = $stmt->fetch_all(MYSQLI_ASSOC);

        foreach ($tasks as $task) {
            array_push($taskdata, (object)$task);
        }
        // return all the task data as array of object
        return $taskdata;
    }

    // find data by value
    static function findValue($value, $studentid)
    {
        global $db;
        $sql = "SELECT * FROM alltasks WHERE task_name LIKE '%$value%' AND student_id=$studentid";
        $stmt = $db->query($sql);
        if ($stmt && $stmt->num_rows > 0) {
            // return data as array if we find single data then we dont need to fetch all just type fetch_object();
            $alldata = $stmt->fetch_all(MYSQLI_ASSOC);
            return $alldata;
        } else {
            return [];
        }
    }

    // find data by id
    static function findId($id)
    {
        global $db;
        $sid = $_SESSION['id'];
        $sql = "SELECT * FROM alltasks WHERE id=$id AND student_id=$sid";
        $stmt = $db->query($sql);
        if ($stmt && $stmt->num_rows > 0) {
            // return data as array if we find single data then we dont need to fetch all just type fetch_object();
            $data = $stmt->fetch_object();
            return $data;
        } else {
            return "No data found!";
        }
    }

    //update data by id
    function updateValue($id)
    {
        global $db;
        $sql = "UPDATE alltasks SET task_name='$this->taskname', task_desc='$this->taskdesc', task_time='$this->tasktime' WHERE id=$id AND student_id=$this->studentid";
        $stmt = $db->query($sql);

        if ($stmt) {
            return "Data updated successfully!";
        }else{
            return "Update failed!";
        }
    }

    //delete data
    function delete($id) {
        global $db;
        $sql = "DELETE * FROM alltasks WHERE";
    }
}
