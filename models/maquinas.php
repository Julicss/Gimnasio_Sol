<?php

//models/maquinas.php

class maquinas extends Model {
	
	public function getMaquinas(){
		$this->db->query("SELECT * FROM tipo_maquinaria");
		return $this->db->fetchAll();
	}

	public function getMaquinasReservadas($d){
		if(!isset($d)) throw new ValidacionMaqException();
		if(!ctype_digit($d)) throw new ValidacionMaqException();
		if($d<10000000) throw new ValidacionMaqException();
		if($d>60000000) throw new ValidacionMaqException();

		$this->db->query("SELECT * FROM socio_maquinaria sm, maquinarias m, tipo_maquinaria tm
			WHERE sm.maquinaria=m.codigo_maquinaria 
			AND m.tipo=tm.codigo_tipo AND sm.socio=$d");
		return $this->db->fetchAll();
	}

	public function bajaReserva($dni,$maq){
		if(!isset($dni)) throw new ValidacionMaqException();
		if(!ctype_digit($dni)) throw new ValidacionMaqException();
		if($dni<10000000) throw new ValidacionMaqException();
		if($dni>60000000) throw new ValidacionMaqException();

		if(!isset($maq)) throw new ValidacionMaqException();
		if(!ctype_digit($maq)) throw new ValidacionMaqException();
		if($maq<1) throw new ValidacionMaqException();
		if($maq>2000) throw new ValidacionMaqException();
		$this->db->query("DELETE FROM socio_maquinaria
			WHERE socio=$dni AND maquinaria=$maq LIMIT 1");
	}

	public function getNumeros($t){
		if(!isset($t)) throw new ValidacionMaqException();
		if(!ctype_digit($t)) throw new ValidacionMaqException();
		if($t<1) throw new ValidacionMaqException();
		if($t>2000) throw new ValidacionMaqException();
		
		$this->db->query("SELECT * FROM maquinarias
			WHERE tipo=$t");
		return $this->db->fetchAll();
	}
}

class ValidacionMaqException extends Exception {} 