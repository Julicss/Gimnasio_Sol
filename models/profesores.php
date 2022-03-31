<?php

//models/profesores.php

class profesores extends Model {

	public function getProfesores(){
		$this->db->query("SELECT * FROM profesores");
		return $this->db->fetchAll();
	}

	public function comprobarActividad($a){
		if(!isset($a)) throw new ValidacionProException();
		if(!ctype_digit($a)) throw new ValidacionProException();
		if($a<1) throw new ValidacionProException();
		if($a>2000) throw new ValidacionProException();

		$this->db->query("SELECT * FROM profesor_actividad
			WHERE actividad=$a ");
		if($this->db->numRows()!=1) return true;
		return false;
	}

	public function asignarProfesor($p,$a){
		if(!isset($p)) throw new ValidacionProException();
		if(!ctype_digit($p)) throw new ValidacionProException();
		if($p<1) throw new ValidacionProException();
		if($p>2000) throw new ValidacionProException();

		if(!isset($a)) throw new ValidacionProException();
		if(!ctype_digit($a)) throw new ValidacionProException();
		if($a<1) throw new ValidacionProException();
		if($a>2000) throw new ValidacionProException();

		$this->db->query("INSERT INTO profesor_actividad (profesor, actividad) VALUES ($p, $a)");
	}

	public function quitarProfesor($p,$a){
		if(!isset($p)) throw new ValidacionProException();
		if(!ctype_digit($p)) throw new ValidacionProException();
		if($p<1) throw new ValidacionProException();
		if($p>2000) throw new ValidacionProException();

		if(!isset($a)) throw new ValidacionProException();
		if(!ctype_digit($a)) throw new ValidacionProException();
		if($a<1) throw new ValidacionProException();
		if($a>2000) throw new ValidacionProException();

		$this->db->query("DELETE FROM profesor_actividad 
			WHERE profesor=$p and actividad=$a LIMIT 1");
	}

	public function baja($p){
		if(!isset($p)) throw new ValidacionProException();
		if(!ctype_digit($p)) throw new ValidacionProException();
		if($p<1) throw new ValidacionProException();
		if($p>2000) throw new ValidacionProException();

		$this->db->query("DELETE FROM profesores 
			WHERE id_profesor=$p LIMIT 1");
		$this->db->query("DELETE FROM profesor_actividad 
			WHERE profesor=$p LIMIT 1");
	}

	public function alta($p,$d,$t){
		if(!isset($p)) throw new ValidacionProException();
		if(strlen($p)<1) throw new ValidacionProException();
		if(strlen($p)>30) throw new ValidacionProException();
		$this->db->escape($p);
		$this->db->escapeWildcards($p);

		if(!isset($d)) throw new ValidacionProException();
		if(strlen($d)<1) throw new ValidacionProException();
		if(strlen($d)>30) throw new ValidacionProException();
		$this->db->escape($d);
		$this->db->escapeWildcards($d);

		if(!isset($t)) throw new ValidacionProException();
		if(!ctype_digit($t)) throw new ValidacionProException();
		if($t<1000000000) throw new ValidacionProException();
		if($t>9999999999) throw new ValidacionProException();

		$this->db->query("INSERT INTO profesores (nombre_profesor, direccion_profesor, telefono_profesor) VALUES ('$p', '$d', '$t')");
	}
}

class ValidacionProException extends Exception {}