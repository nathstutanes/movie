<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create extends CI_Controller{
	public $CI = NULL;

    public function __construct() {
        parent::__construct();
        $this->CI = & get_instance();
    }

	function Actor(){
		$this->load->view('cactor');
	}

	function actor_create(){
		if (isset($_POST['strActorFullName'])) {
			$actorname = $_POST['strActorFullName'];
			$actordesc = $_POST['memActorDesc'];
			if($this->MActor->add_actor($actorname, $actordesc) == true){
				redirect('Create/read_all_actors', 'refresh');
			}else {
				redirect('Create/read_all_actors', 'refresh');
			}
		}
	
	} // end of actor create 

	function read_all_actors(){
		$data= array();
		$data['actors'] = $this->MActor->read_all_actor();
		$this->load->view('ractor', $data);
	}

	function edit_actor($actor_id = 0){
		$id['id'] = $this->uri->segment(3);
		$data['actor'] = $this->MActor->read_actor_byid($actor_id);
		$this->load->vars($data);
		// print_r($data);
		$this->load->view('eactor', $data);
	}// end fetch edit actor data

	function edit_actor_data(){
		if (isset($_POST['strActorFullName'])) {
			$actorname = $_POST['strActorFullName'];
			$actordesc = $_POST['memActorDesc'];
			$actorid = $_POST['lngActorID'];
			if($this->MActor->edit_actor($actorname,$actordesc,$actorid)){
				redirect('Create/read_all_actors', 'refresh');
		}else {
				redirect('Create/edit_actor/$actor_id', 'refresh');
			}
		}
		
	}//enf of edit actor function 

	function del_actor($actor_id = 0){
		$actor_id = $this->uri->segment(3);
		if($this->MActor->delete_actor($actor_id)) {
			redirect('Create/read_all_actors', 'refresh');
		}else {
			$this->load->view('dactor');
		}
	}// end of function delete actor


	//functions for films 
	function films(){
		$data = array();
		$data['genres'] = $this->MGenre->read_genre();
		$data['cert'] = $this->MCert->read_cert();
		$this->load->view('cfilms', $data);
	} // end of film view

	function films_create(){
		if($this->MFilms->add_films()){
			redirect('Create/films', 'refresh');
		}
	} // end of add films

	function read_all_films(){
		$data['films'] = $this->MFilms->read_films();
		$this->load->view('rfilms', $data);
	}

	function edit_film($id = 0){
		$data = array();
		$data['films'] = $this->MFilms->tobe_edit_film($id);
		$data['genres'] = $this->MGenre->read_genre();
		$data['cert'] = $this->MCert->read_cert();
		$this->load->vars($data);
		var_dump($data['films']);
		$this->load->view('efilms',$data);
	}

	function edit_films(){
		if($this->MFilms->edit_films($_POST['strFilmTitle'],$_POST['memFilmStory'],$_POST['dtmFilmReleaseDate']
			, $_POST['intFilmDuration'], $_POST['lngFilmGenreID'], $_POST['lngFilmCertificateID'], $_POST['memFilmAdditionalInfo'], $_POST['lngFilmTitleID'])){
				redirect('Create/read_all_films', 'refresh');
		}else {
				redirect('Create/edit_film/$lngFilmTitleID', 'refresh');
			}
	}

	function del_film($id =0){
		if($this->MFilms->del_films($id)){
			redirect('Create/read_all_films', 'refresh');
		}
	}

	function film($id = 0){
		$id = $this->uri->segment(3);
		$data['films'] = $this->MFilms->view_film_byid($id);
		// print_r($data);
		$this->load->view('fdetails', $data);
	}
 //end of create 

	//functions for genre
	function genre(){
		$data = array();
		$data['strGenre'] = $this->MGenre->read_genre();
		$this->load->view('cgenre', $data);
	} // end of genre view

		function genre_create(){
		if($this->MGenre->add_genre()){
			redirect('Create/read_all_genre', 'refresh');
		}

	} // end of add genre
	function read_all_genre(){
		$data['genre'] = $this->MGenre->read_genre();
		$this->load->view('rgenre', $data);
	}
}
?>
