<?php

//models/actividades.php

class actividades extends Model {

	public function getActividades(){
		$this->db->query("SELECT * FROM actividades GROUP BY nombre_actividad");
		return $this->db->fetchAll();
	}

	public function getVistaActividades(){
		$this->db->query("SELECT * FROM actividades a, profesor_actividad pa, profesores p
		WHERE a.codigo_actividad=pa.actividad AND pa.profesor=p.id_profesor");
		return $this->db->fetchAll();
	}

	public function getCronograma(){
		$this->db->query("SELECT * FROM actividades");
		return $this->db->fetchAll();
	}

	public function getCronogramaOrdenado(){
		$this->db->query("SELECT * FROM actividades ORDER BY nombre_actividad, hora, dia");
		return $this->db->fetchAll();
	}

	public function getDias($a){
		if(!isset($a)) throw new ValidacionActException();
		if(strlen($a)<1) throw new ValidacionActException();
		if(strlen($a)>30) throw new ValidacionActException();
		$this->db->escape($a);
		$this->db->escapeWildcards($a);
		$this->db->query("SELECT * FROM actividades WHERE nombre_actividad LIKE '$a' GROUP BY dia ORDER BY dia");
		return $this->db->fetchAll();
	}

	public function getHorarios($a, $d){
		if(!isset($a)) throw new ValidacionActException();
		if(strlen($a)<1) throw new ValidacionActException();
		if(strlen($a)>30) throw new ValidacionActException();
		$this->db->escape($a);
		$this->db->escapeWildcards($a);

		if(!isset($d)) throw new ValidacionActException();
		if(strlen($d)<1) throw new ValidacionActException();
		if(strlen($d)>30) throw new ValidacionActException();
		$this->db->escape($d);
		$this->db->escapeWildcards($d);
		$this->db->query("SELECT * FROM actividades WHERE nombre_actividad LIKE '$a' and dia = '$d'
			ORDER BY hora");
		return $this->db->fetchAll();
	}

	public function comprobarActividad($a, $d, $h){
		if(!isset($a)) throw new ValidacionActException();
		if(strlen($a)<1) throw new ValidacionActException();
		if(strlen($a)>30) throw new ValidacionActException();
		$this->db->escape($a);
		$this->db->escapeWildcards($a);

		if(!isset($d)) throw new ValidacionActException();
		if(strlen($d)<1) throw new ValidacionActException();
		if(strlen($d)>30) throw new ValidacionActException();
		$this->db->escape($d);
		$this->db->escapeWildcards($d);

		if(!isset($h)) throw new ValidacionActException();
		if(!ctype_digit($h)) throw new ValidacionActException();
		if($h<8) throw new ValidacionActException();
		if($h>21) throw new ValidacionActException();
		$this->db->query("SELECT * FROM actividades
			WHERE nombre_actividad='$a' AND dia='$d' AND hora='$h' ");
		if($this->db->numRows()!=1) return false;
		return true;
	}

	public function comprobarHorario($d, $h){
		if(!isset($d)) throw new ValidacionActException();
		if(strlen($d)<1) throw new ValidacionActException();
		if(strlen($d)>30) throw new ValidacionActException();
		$this->db->escape($d);
		$this->db->escapeWildcards($d);

		if(!isset($h)) throw new ValidacionActException();
		if(!ctype_digit($h)) throw new ValidacionActException();
		if($h<8) throw new ValidacionActException();
		if($h>21) throw new ValidacionActException();

		$this->db->query("SELECT * FROM actividades
			WHERE dia='$d' AND hora='$h' ");
		if($this->db->numRows()>3) return true;
		return false;
	}

	public function altaActividad($n, $d, $h, $l){
		if(!isset($n)) throw new ValidacionActException();
		if(strlen($n)<1) throw new ValidacionActException();
		if(strlen($n)>30) throw new ValidacionActException();
		$this->db->escape($n);
		$this->db->escapeWildcards($n);

		if(!isset($d)) throw new ValidacionActException();
		if(strlen($d)<1) throw new ValidacionActException();
		if(strlen($d)>30) throw new ValidacionActException();
		$this->db->escape($d);
		$this->db->escapeWildcards($d);

		if(!isset($h)) throw new ValidacionActException();
		if(!ctype_digit($h)) throw new ValidacionActException();
		if($h<8) throw new ValidacionActException();
		if($h>21) throw new ValidacionActException();

		if(!isset($l)) throw new ValidacionActException();
		if(!ctype_digit($l)) throw new ValidacionActException();
		if($l<4) throw new ValidacionActException();
		if($l>10) throw new ValidacionActException();

		$aux=new actividades();
		if($aux->comprobarActividad($n, $d, $h)) die ('Error! La actividad ya esta registrada');
		$this->db->query("INSERT INTO actividades
			(nombre_actividad, hora, minuto, dia, limite, cantidad)
			VALUES
			('$n', '$h', '00', '$d', $l, 0) ");
	}
	
	public function getActividadesInscriptas($d){
		if(!isset($d)) throw new ValidacionActException();
		if(!ctype_digit($d)) throw new ValidacionActException();
		if($d<10000000) throw new ValidacionActException();
		if($d>60000000) throw new ValidacionActException();
		
		$this->db->query("SELECT * FROM socio_actividad sa, actividades a
			WHERE sa.actividad=a.codigo_actividad AND sa.socio=$d");
		return $this->db->fetchAll();
	}

	public function getActividadesdeProfesor($p){
		if(!isset($p)) throw new ValidacionActException();
		if(!ctype_digit($p)) throw new ValidacionActException();
		if($p<1) throw new ValidacionActException();
		if($p>300) throw new ValidacionActException();

		$this->db->query("SELECT * FROM profesor_actividad pa, actividades a
			WHERE pa.actividad=a.codigo_actividad AND pa.profesor=$p");
		return $this->db->fetchAll();
	}

	public function bajaInscripcion($dni,$act){
		if(!isset($dni)) throw new ValidacionActException();
		if(!ctype_digit($dni)) throw new ValidacionActException();
		if($dni<10000000) throw new ValidacionActException();
		if($dni>60000000) throw new ValidacionActException();

 		if(!isset($act)) throw new ValidacionActException();
		if(!ctype_digit($act)) throw new ValidacionActException();
		if($act<1) throw new ValidacionActException();
		if($act>2000) throw new ValidacionActException();

		$this->db->query("DELETE FROM socio_actividad
			WHERE socio=$dni AND actividad=$act LIMIT 1");
		$this->db->query("UPDATE actividades SET cantidad=cantidad-1
		WHERE codigo_actividad=$act ");
	}
}

class ValidacionActException extends Exception {} 