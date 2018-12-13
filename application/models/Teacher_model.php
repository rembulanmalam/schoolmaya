<?php

class Teacher_model extends CI_Model
{
    public function teacher_schedule($id){
        $query = "  SELECT `T`.Name, `HS`.ClassID, `HS`.SubjectName, `SC`.Day, `SC`.Start, `SC`.Duration
                    FROM `msteacher` AS `T`, `headersubject` AS `HS`, `schedule` AS `SC`
                    WHERE T.ID = HS.TeacherID AND HS.ScheduleID = SC.ScheduleID AND T.ID = $id
                    ORDER BY `HS`.ClassID, `SC`.ScheduleID ASC; ";
        $result = $this->db->query($query);
        return $result->result_array();      
    }

    //untuk ambil schedule besok dari siswa
    public function teacher_next_schedule($id){
        $query = "  SELECT `T`.Name, `HS`.ClassID, `HS`.SubjectName, `SC`.Day, `SC`.Start, `SC`.Duration
                    FROM `msteacher` AS `T`, `headersubject` AS `HS`, `schedule` AS `SC`
                    WHERE T.ID = HS.TeacherID AND HS.ScheduleID = SC.ScheduleID AND T.ID = $id AND 
                        SC.Day = (
                            SELECT DAYNAME(CURDATE()+1)
                        )
                    ORDER BY `HS`.ClassID, `SC`.ScheduleID ASC; ";
        $result = $this->db->query($query);
        return $result->result_array();      
    }
}
