<?php

class Database {
	private $host="localhost";
	private $username="root";
	private $password="";
	private $database="hotel_site";
	private $DbCon;
    
//    $db = new Database();
//    $db->connect();
	
    function __construct() {
        echo "In";
    }
	
	public function connect(){
		$con = new mysqli($this->host,$this->username,$this->password,$this->database);
		
		if($con){
			$this->DbCon=$con;
			return true;
		}else{
			return false;
		}
	}
	public function select($table,$row="*",$where=null,$order=null){
		$query='SELECT '.$row.' FROM '.$table;
		if($where!=null){
			$query.=' WHERE '.$where;
		}
		if($order!=null){
			$query.=' ORDER BY ';
		}
		$Result=$this->DbCon->query($query);
		return $Result;
	}
	public function insert($table,$value,$row=null){
		$insert= " INSERT INTO ".$table;
		if($row!=null){
			$insert.=" (". $row." ) ";
		}
		for($i=0; $i<count($value); $i++){
			if(is_string($value[$i])){
				$value[$i]= '"'. $value[$i] . '"';
			}
		}
		$value=implode(',',$value);
		$insert.=' VALUES ('.$value.')';
		$ins=$this->DbCon->query($insert);
		if($ins){
			return true;
		}else{
			return false;
		}
	}
	public function delete($table,$where=null){
		if($where == null)
            {
                $delete = "DELETE ".$table;
            }
            else
            {
                $delete = "DELETE  FROM ".$table." WHERE ".$where;
            }
			$del=$this->DbCon->query($delete);
			if($del){
				return true;
			}else{
				return false;
			}
	}
	public function update($table,$rows,$where){
		 // Parse the where values
            // even values (including 0) contain the where rows
            // odd values contain the clauses for the row
            for($i = 0; $i < count($where); $i++)
            {
                if($i%2 != 0)
                {
                    if(is_string($where[$i]))
                    {
                        if(($i+1) != null)
                            $where[$i] = '"'.$where[$i].'" AND ';
                        else
                            $where[$i] = '"'.$where[$i].'"';
                    }
                }
            }
            $where = implode(" ",$where);
            $update = 'UPDATE '.$table.' SET ';
            $keys = array_keys($rows);
            for($i = 0; $i < count($rows); $i++)
            {
                if(is_string($rows[$keys[$i]]))
                {
                    $update .= $keys[$i].'="'.$rows[$keys[$i]].'"';
                }
                else
                {
                    $update .= $keys[$i].'='.$rows[$keys[$i]];
                }
                // Parse to add commas
                if($i != count($rows)-1)
                {
                    $update .= ',';
                }
            }
            $update .= ' WHERE '.$where;
            $query = $this->DbCon->query($update);
            if($query)
            {
                return true;
            }
            else
            {
                return false;
            }
	    
         }
        
	
};
?>
