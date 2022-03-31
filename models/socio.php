<?php

//models/socio.php

class socio extends Model{

	public function getSocios(){
		$this->db->query("SELECT * FROM socios");
		return $this->db->fetchAll();
	}

	public function getSocio($s){
		if(!isset($s)) throw new ValidacionSocException();
		if(!ctype_digit($s)) throw new ValidacionSocException();
		if($s<10000000) throw new ValidacionSocException();
		if($s>60000000) throw new ValidacionSocException();
		$this->db->query("SELECT * FROM socios WHERE dni = $s ");
		return $this->db->fetchAll();
	}

	public function inscribir($s, $a){
		if(!isset($s)) throw new ValidacionSocException();
		if(!ctype_digit($s)) throw new ValidacionSocException();
		if($s<10000000) throw new ValidacionSocException();
		if($s>60000000) throw new ValidacionSocException();

		if(!isset($a)) throw new ValidacionSocException();
		if(!ctype_digit($a)) throw new ValidacionSocException();
		if($a<1) throw new ValidacionSocException();
		if($a>2000) throw new ValidacionSocException();

		$this->db->query("INSERT INTO socio_actividad (socio, actividad)
		VALUES ($s, $a) ");
		$this->db->query("UPDATE actividades SET cantidad=cantidad+1
		WHERE codigo_actividad=$a ");
	}

	public function reservar($s,$maq,$d,$m,$a,$h,$min){
		if(!isset($s)) throw new ValidacionSocException();
		if(!ctype_digit($s)) throw new ValidacionSocException();
		if($s<10000000) throw new ValidacionSocException();
		if($s>60000000) throw new ValidacionSocException();

		if(!isset($maq)) throw new ValidacionSocException();
		if(!ctype_digit($maq)) throw new ValidacionSocException();
		if($maq<1) throw new ValidacionSocException();
		if($maq>2000) throw new ValidacionSocException();

		if(!isset($d)) throw new ValidacionSocException();
		if(!ctype_digit($d)) throw new ValidacionSocException();
		if($d<1) throw new ValidacionSocException();
		if($d>31) throw new ValidacionSocException();

		if(!isset($m)) throw new ValidacionSocException();
		if(!ctype_digit($m)) throw new ValidacionSocException();
		if($m<1) throw new ValidacionSocException();
		if($m>12) throw new ValidacionSocException();


		if(!isset($a)) throw new ValidacionSocException();
		if(!ctype_digit($a)) throw new ValidacionSocException();
		if($a<2021) throw new ValidacionSocException();
		if($a>2022) throw new ValidacionSocException();

		if(!isset($h)) throw new ValidacionSocException();
		if(!ctype_digit($h)) throw new ValidacionSocException();
		if($h<8) throw new ValidacionSocException();
		if($h>21) throw new ValidacionSocException();

		if(!isset($min)) throw new ValidacionSocException();
		if(!ctype_digit($min)) throw new ValidacionSocException();
		if($min<00) throw new ValidacionSocException();
		if($min>30) throw new ValidacionSocException();


		$this->db->query("INSERT INTO socio_maquinaria (socio, maquinaria, dia, mes, anio, hora, minuto)
		VALUES ($s, $maq, $d, $m, $a, $h, $min) ");
	}

	public function baja($s){
		if(!isset($s)) throw new ValidacionSocException();
		if(!ctype_digit($s)) throw new ValidacionSocException();
		if($s<10000000) throw new ValidacionSocException();
		if($s>60000000) throw new ValidacionSocException();

		$this->db->query("DELETE FROM socios 
			WHERE dni=$s LIMIT 1");
		$this->db->query("DELETE FROM socio_actividad 
			WHERE socio=$s LIMIT 1");
		$this->db->query("DELETE FROM usuarios 
			WHERE DNI=$s LIMIT 1");
	}

	public function alta($s,$dni,$d,$t,$u,$c){
		if(!isset($s)) throw new ValidacionSocException();
		if(strlen($s)<1) throw new ValidacionSocException();
		if(strlen($s)>30) throw new ValidacionSocException();
		$this->db->escape($s);
		$this->db->escapeWildcards($s);

		if(!isset($dni)) throw new ValidacionSocException();
		if(!ctype_digit($dni)) throw new ValidacionSocException();
		if($dni<10000000) throw new ValidacionSocException();
		if($dni>60000000) throw new ValidacionSocException();

		if(!isset($d)) throw new ValidacionSocException();
		if(strlen($d)<1) throw new ValidacionSocException();
		if(strlen($d)>30) throw new ValidacionSocException();
		$this->db->escape($d);
		$this->db->escapeWildcards($d);

		if(!isset($t)) throw new ValidacionSocException();
		if(!ctype_digit($t)) throw new ValidacionSocException();
		if($t<0) throw new ValidacionSocException();
		if($t>9999999999) throw new ValidacionSocException();

		if(!isset($u)) throw new ValidacionSocException();
		if(strlen($u)<1) throw new ValidacionSocException();
		if(strlen($u)>30) throw new ValidacionSocException();
		$this->db->escape($u);
		$this->db->escapeWildcards($u);

		if(!isset($c)) throw new ValidacionSocException();
		if(strlen($c)<1) throw new ValidacionSocException();
		if(strlen($c)>30) throw new ValidacionSocException();
		$this->db->escape($c);
		$this->db->escapeWildcards($c);
		$c=sha1($c);

		$this->db->query("INSERT INTO socios (dni, nombre_socio, direccion_socio, telefono_socio) VALUES ('$dni', '$s', '$d', '$t')");
		$this->db->query("INSERT INTO usuarios (usuario, password, ingresa, DNI) VALUES ('$u', '$c', 'socios', '$dni')");
	}

	public function existeInscripcion($s,$a){
		if(!isset($s)) throw new ValidacionSocException();
		if(!ctype_digit($s)) throw new ValidacionSocException();
		if($s<10000000) throw new ValidacionSocException();
		if($s>60000000) throw new ValidacionSocException();

		if(!isset($a)) throw new ValidacionSocException();
		if(!ctype_digit($a)) throw new ValidacionSocException();
		if($a<1) throw new ValidacionSocException();
		if($a>2000) throw new ValidacionSocException();

		$this->db->query("SELECT * FROM socio_actividad
			WHERE socio=$s AND actividad=$a ");
		if($this->db->numRows()!=1) return false;
		return true;
	}

	public function superaLimite($a){
		if(!isset($a)) throw new ValidacionSocException();
		if(!ctype_digit($a)) throw new ValidacionSocException();
		if($a<1) throw new ValidacionSocException();
		if($a>2000) throw new ValidacionSocException();

		$this->db->query("SELECT * FROM actividades
			WHERE codigo_actividad=$a AND limite = cantidad");
		if($this->db->numRows()!=1) return false;
		return true;
	}

	public function existeReserva($s,$m){
		if(!isset($s)) throw new ValidacionSocException();
		if(!ctype_digit($s)) throw new ValidacionSocException();
		if($s<10000000) throw new ValidacionSocException();
		if($s>60000000) throw new ValidacionSocException();

		if(!isset($m)) throw new ValidacionSocException();
		if(!ctype_digit($m)) throw new ValidacionSocException();
		if($m<1) throw new ValidacionSocException();
		if($m>2000) throw new ValidacionSocException();

		$this->db->query("SELECT * FROM socio_maquinaria
			WHERE socio=$s AND maquinaria=$m ");
		if($this->db->numRows()!=1) return true;
		return false;
	}

	public function existeFecha($maq,$d,$m,$a,$h,$min){
		if(!isset($maq)) throw new ValidacionSocException();
		if(!ctype_digit($maq)) throw new ValidacionSocException();
		if($maq<1) throw new ValidacionSocException();
		if($maq>2000) throw new ValidacionSocException();

		if(!isset($d)) throw new ValidacionSocException();
		if(!ctype_digit($d)) throw new ValidacionSocException();
		if($d<1) throw new ValidacionSocException();
		if($d>31) throw new ValidacionSocException();

		if(!isset($m)) throw new ValidacionSocException();
		if(!ctype_digit($m)) throw new ValidacionSocException();
		if($m<1) throw new ValidacionSocException();
		if($m>12) throw new ValidacionSocException();

		if(!isset($a)) throw new ValidacionSocException();
		if(!ctype_digit($a)) throw new ValidacionSocException();
		if($a<2021) throw new ValidacionSocException();
		if($a>2022) throw new ValidacionSocException();

		if(!isset($h)) throw new ValidacionSocException();
		if(!ctype_digit($h)) throw new ValidacionSocException();
		if($h<8) throw new ValidacionSocException();
		if($h>21) throw new ValidacionSocException();

		if(!isset($min)) throw new ValidacionSocException();
		if(!ctype_digit($min)) throw new ValidacionSocException();
		if($min<00) throw new ValidacionSocException();
		if($min>30) throw new ValidacionSocException();

		$this->db->query("SELECT * FROM socio_maquinaria
			WHERE maquinaria=$maq AND dia=$d AND mes=$m AND anio=$a AND hora=$h AND minuto=$min ");
		if($this->db->numRows()!=1) return true;
		return false;
	}
}

class ValidacionSocException extends Exception {} 