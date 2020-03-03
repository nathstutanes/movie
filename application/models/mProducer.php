<?php
class MProducer extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	function add_producer($pn, $cea, $we){
		$data = array(
   		'strProducerName' => $pn,
        'hypContactEmailAddress' => $cea
        'hypWebsite' => $we
        );
			if($this->db->insert('tblproducers', $data)) {
				return true;
			}
		}
	} // end of add_producer

	function read_all_producer(){
		// Produces: SELECT * FROM mytable
		$query = $this->db->get('tblproducers');
		return $query->result();
		mysqli_free_result($query);
	}// end of read all producer

	function edit_actor($pn, $cea, $we, $producer_id){
		$data = array(
            'strProducerName' => $pn,
            'hypContactEmailAddress' => $cea
            'hypWebsite' => $we
		);
			$this->db->where('lngProducerID', $producer_id);
			
			if($this->db->update('tblproducers', $data)){
				return true; 
			}
		}
	}//end of edit actor

	function read_producer_byid($producer_id){
		$data = array();
		$this->db->select('*');
		$this->db->where('lngProducerID', $producer_id);
		$query = $this->db->get('tblproducers');
		if($query->num_rows() > 0){
			foreach ($query->result_array() as $row) {
				$data['lngProducerID'] = $row['lngProducerID'];
				$data['strProducerName'] = $row['strProducerName'];
                $data['hypContactEmailAddress'] = $row['hypContactEmailAddress'];
                $data['hypWebsite'] = $row['hypWebsite'];
			}
		}
		$query->free_result();
		return $data;
	}

	function delete_producer($producer_id){
		if($this->db->delete('tblproducers', array('lngProducerID' => $producer_id))){
			return true;
		}else {
			return false; 
		}
	}
} // end of model producer

?>
