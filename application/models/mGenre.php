<?php

/**
 * class for certificate model 
 */
class MGenre extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	function add_genre(){
		$data = array(
			'strGenre' => ($_POST['strGenre'])
		);
		$this->db->insert('tblfilmgenres', $data);
	}
	function read_genre(){
		$genre = $this->db->get('tblfilmgenres');
		return $genre->result();
	} //end of read genre
	
	function read_genre_byid($id){
		$data = array();
			$this->db->select('strGenre');
			$this->db->where('lngGenreID', $id);
			$query = $this->db->get('tblfilmgenres');
			if($query->num_rows() > 0){
				$data = $query->row();
			}
			$cert = $data->strGenre;
			$query->free_result();
			return $data;
	} 
}// end of class genre

  ?>