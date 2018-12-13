<?php

class Teacher_model extends CI_Model
{
    public function teacher_schedule($id)
    {
        $query = "  SELECT `T`.Name, `HS`.ClassID, `HS`.SubjectName, `SC`.Day, `SC`.Start, `SC`.Duration
                    FROM `msteacher` AS `T`, `headersubject` AS `HS`, `schedule` AS `SC`
                    WHERE T.ID = HS.TeacherID AND HS.ScheduleID = SC.ScheduleID AND T.ID = $id
                    ORDER BY `HS`.ClassID, `SC`.ScheduleID ASC; ";
        $result = $this->db->query($query);
        return $result->result_array();      
    }

    //untuk ambil schedule besok dari siswa
    public function teacher_next_schedule($id)
    {
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

    //untuk input nilai siswa
    public function input_score($id, $score, $chapter)
    {
        $query = "   INSERT INTO Score VALUES
                    ($id, $score, $chapter) ";
        $result = $this->db->query($query);
        return $result->row_count();
    }

    //untuk liat daftar kelas dimana sang guru mengajar
    public function teacher_class($id)
    {
        $query = "  SELECT DISTINCT `HS`.ClassID, `HS`.SubjectName
                    FROM `msteacher` AS `T`, `headersubject` AS `HS`, `schedule` AS `SC`
                    WHERE T.ID = HS.TeacherID AND HS.ScheduleID = SC.ScheduleID AND T.ID = $id
                    ORDER BY `HS`.ClassID, `SC`.ScheduleID ASC; ";
        $result = $this->db->query($query);
        return $result->result_array();      
    }

    //untuk liat subjek dan chapter yang diajar guru
    public function teacher_subject($id)
    {
        $query = " 	SELECT DISTINCT `HS`.ClassID, `HS`.SubjectName, SC.ChapterID, SC.ChapterName, C.ClassName
                    FROM `msteacher` AS `T`, `headersubject` AS `HS`, `subjectchapter` AS `SC`, class AS C
                    WHERE T.ID = HS.TeacherID AND HS.SubjectID = SC.SubjectID AND HS.ClassID = C.ClassID AND T.ID = 1
                    ORDER BY HS.ClassID, HS.SubjectName, SC.ChapterID ASC; ";
        $result = $this->db->query($query);
        return $result->result_array();     
    }

    //untuk mengambil data seluruh siswa dalam satu kelas
    public function student_list($classid)
    {
        $query = " 	SELECT *
                    FROM `msstudent` AS `S`, `classdetail` AS `CD`
                    WHERE S.ID = CD.StudentID AND CD.ClassID = '10-2'
                    ORDER BY S.Name ASC ";
        $result = $this->db->query($query);
        return $result->result_array();   
    }
}
