<?php 

class Score_model extends CI_Model {
    private $table = "score";
    protected $studentid;
    protected $score;
    protected $chapterid;

    public function getById($studentid){
        $query = $this->db->query('SELECT * FROM Score WHERE studentid = $studentid');
        return $query;
    }
}





