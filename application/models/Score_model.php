<?php

class Score_model extends CI_Model
{
    private $_table = "score";
    protected $studentid;
    protected $score;
    protected $chapterid;

    public function getById($studentid)
    {
        $this->studentid = 20;
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('StudentID', $this->studentid);
        $query = $this->db->get();
        return $query->result_array();
    }
}
