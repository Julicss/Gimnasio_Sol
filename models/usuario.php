<?php

//models/usuario.php

class usuario extends Model {
	
	public function existeUsuario($user,$pass){
		if(!isset($user)) throw new ValidacionUsuException();
		if(strlen($user)<1) throw new ValidacionUsuException();
		if(strlen($user)>30) throw new ValidacionUsuException();
		$this->db->escape($user);
		$this->db->escapeWildcards($user);

		if(!isset($pass)) throw new ValidacionUsuException();
		if(strlen($pass)<1) throw new ValidacionUsuException();
		if(strlen($pass)>50) throw new ValidacionUsuException();
		$this->db->escape($pass);
		$this->db->escapeWildcards($pass);
		$this->db->query("SELECT * FROM usuarios WHERE usuario='$user' AND password='$pass' ");
		if($this->db->numRows() != 1) return false;
		return true;
	}

	public function getDatos($user,$pass){
		if(!isset($user)) throw new ValidacionUsuException();
		if(strlen($user)<1) throw new ValidacionUsuException();
		if(strlen($user)>50) throw new ValidacionUsuException();
		$this->db->escape($user);
		$this->db->escapeWildcards($user);

		if(!isset($pass)) throw new ValidacionUsuException();
		if(strlen($pass)<1) throw new ValidacionUsuException();
		if(strlen($pass)>50) throw new ValidacionUsuException();
		$this->db->escape($pass);
		$this->db->escapeWildcards($pass);
		$aux = new Usuario();
		if(!$aux->existeUsuario($user,$pass)) die ('no existe el usuario');
		$this->db->query("SELECT * FROM usuarios WHERE usuario='$user' AND password='$pass' ");
		return $this->db->fetch();
	}
}

class ValidacionUsuException extends Exception {} 