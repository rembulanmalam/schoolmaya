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

    //untuk ambil schedule besok dari teacher
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

    //untuk liat daftar kelas dimana sang guru mengajar
    public function teacher_class_subject_chapter($id)
    {
        $query = "  SELECT DISTINCT `HS`.ClassID, `HS`.SubjectName, SCH.ChapterID, SCH.ChapterName, SCH.SubjectID
                    FROM `msteacher` AS `T`, `headersubject` AS `HS`, `schedule` AS `SC`, subjectchapter AS SCH 
                    WHERE T.ID = HS.TeacherID AND HS.ScheduleID = SC.ScheduleID AND T.ID = $id AND SCH.SubjectID = HS.SubjectID ORDER BY `HS`.ClassID, `SC`.ScheduleID ASC  ";
        $result = $this->db->query($query);
        return $result->result_array();      
    }

    //untuk liat daftar kelas dimana sang guru mengajar
    public function teacher_class($id)
    {
        $query = "  SELECT DISTINCT `HS`.ClassID
                    FROM `msteacher` AS `T`, `headersubject` AS `HS`, `schedule` AS `SC`
                    WHERE T.ID = HS.TeacherID AND HS.ScheduleID = SC.ScheduleID AND T.ID = $id
                    ORDER BY `HS`.ClassID ASC; ";
        $result = $this->db->query($query);
        return $result->result_array();      
    }


    //untuk liat subjek dan chapter yang diajar guru
    public function teacher_subject($id)
    {
        $query = " 	SELECT DISTINCT `HS`.ClassID, `HS`.SubjectName, SC.ChapterID, SC.ChapterName, C.ClassName
                    FROM `msteacher` AS `T`, `headersubject` AS `HS`, `subjectchapter` AS `SC`, class AS C
                    WHERE T.ID = HS.TeacherID AND HS.SubjectID = SC.SubjectID AND HS.ClassID = C.ClassID AND T.ID = $id
                    ORDER BY HS.ClassID, HS.SubjectName, SC.ChapterID ASC; ";
        $result = $this->db->query($query);
        return $result->result_array();     
    }

    //untuk mengambil data seluruh siswa dalam satu kelas
    public function student_list($classid, $chapterid)
    {
        $query = "  SELECT * 
                    FROM `msstudent` AS `S` 
                    JOIN `classdetail` AS `CD` ON S.ID = CD.StudentID 
                    LEFT JOIN score AS SCR ON SCR.StudentID = CD.StudentID AND SCR.ChapterID = '$chapterid'
                    WHERE CD.ClassID = '$classid' 
                    ORDER BY S.Name ASC";
        $result = $this->db->query($query);
        return $result->result_array();   
    }

    public function create_new_score($data){
        $this->db->insert('Score', $data);
        return $this->db->affected_rows();
    }

    public function update_score($data){
        $this->db->update('Score', $data, array( 'StudentID' => $data['StudentID'], 'ChapterID' => $data['ChapterID']));
        return $this->db->affected_rows();
    }

    public function exam_schedule($chapterid, $classid){
        $query = "  SELECT * FROM Exam WHERE ChapterID = '$chapterid' AND ClassID = '$classid'";
        $result = $this->db->query($query);
        return $result->row_array();  
    }

    public function update_exam($data){
        $this->db->replace('exam', $data);
        return $this->db->affected_rows();
    }

    //liat schedule teacher untuk subject dan kelas tertentu
    public function teacher_subject_class_schedule($id, $subjectid, $classid)
    {
        $query = "  SELECT DISTINCT `T`.Name, `HS`.ClassID, `HS`.SubjectName, `SC`.Day
                    FROM `msteacher` AS `T`, `headersubject` AS `HS`, `schedule` AS `SC`
                    WHERE T.ID = HS.TeacherID AND HS.ScheduleID = SC.ScheduleID AND T.ID = $id 
                        AND HS.SubjectID = '$subjectid' AND HS.ClassID = '$classid'
                    ORDER BY `HS`.ClassID, `SC`.ScheduleID ASC; ";
        $result = $this->db->query($query);
        return $result->result_array();      
    }
}
