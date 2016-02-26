<?php 
	/**
	 * My own class for working with MySQL Database
	 * @author Petrenko Yaroslav
	 * @package ExtendedMysqli
	 * @license MIT
	 * 
	 */
	class ExtendedMysqli {
		/**
		 * DB connection link
		 * @var object
		 */
		private $dbc;
		/**
		 * MySql host name
		 * @var string
		 */
		private $host;
		/**
		 * MySql user login 
	 	 * @var string
		 */
		private $login;
		/**
		 * MySql user password
		 * @var string
		 */
		private $password;
		/**
		 * MySql database name
		 * @var string
		 */
		private $db;
		/**
		 * Establishes connection with database
		 * @param <string> $db required 
		 * @param <string> $host by default ="localhost"
		 * @param <string> $login by default ="root"
		 * @param <string> $password by default an empty string
		 * @throws MysqliExcteption if $dbc has connect_error
		 * @return <void>
		 */
		public function __construct($db,$host = 'localhost',$login = 'root' ,$password = ''){
			$this->host = $host;
			$this->login = $login;
			$this->password = $password;
			$this->db = $db;
			try {
				$this->dbc = new Mysqli($this->host, $this->login, $this->password, $this->db);
				if ($this->dbc->connect_errno){
					throw new MysqliException($this->dbc);
				} else {
					$this->dbc->query("SET NAMES UTF8");
				}
			} catch (MysqliException $e) {
				echo $e;
			}
		}

		/**
		 * Close db connection
		 */
		public function __destruct(){
			if ($this->dbc)
				$this->dbc->close();
		}

		/**
		 * Sanitalizing string
		 * @param <string> $str required
		 * @return <string> ready for using string 
		 */
		private function clrStr($str){

			if ($macth = preg_match("/^[\w\d?]+\^/", $str,$func)){
				$str = str_replace($func[0],'',$str);
			}
			if (isset($_GET[$str])){
				$str = $_GET[$str];
			} elseif (isset($_POST[$str])){
				$str = $_POST[$str];
			}
			$res = trim($this->dbc->real_escape_string ($str));
			if ($macth){
				$func = str_replace('^','',$func[0]); 
				return $func($res);
			} else {
				return $res;	
			}
		}

		/**
		 * Wrap the string in the quotes
		 * @param <mixed> $values a simple string 
		 * @return <string> wrapped string
		 * @example str => 'str'
		 */
		private function addQuotes($values){
			if (!is_array($values)){
				$values = explode(',',$values);
			}
			if (count($values) > 1){
				$res="";
				foreach ($values as $key => $val) {
					$res.= "'".$this->clrStr($val)."' , ";		
				}
				return preg_replace("/[,\s]+$/",'',$res);
			} else { 
				return "'".$values."'";
			}
		}

		/**
		 * Add prefix to string
		 * @param <string> $target a list of table fields
		 * @param <string> $pref a field prefix
		 * @return <string> concatenation of field and prefix
		 */
		private function setPrefix($target,$pref){
			if ($parts = explode(',',$target)){
				foreach ($parts as $key => $val) {
					if(!strpos($val,'.')) 
						$parts[$key] = $pref.'.'.$val;
				}
				return implode(' , ',$parts);
			} else {
				return $pref.'.'.$target;
			}
		}

		/**
		 * Executes a query
		 * @param <string> $q any SQL query
		 * @return <object> mysqli_result object
		 */
		private function query($q){
			//echo $q.'<br>';
			try {
				$sqlquery = $this->dbc->query($q);
				if (!$sqlquery){
					throw new Exception($this->dbc->error.'<br>'.$q);
				} else {
					return $sqlquery;
				}
			} catch (Exception $e) {
				echo $e->getMessage();
			} 
		}
		
		/**
		 * Make a 'select' query
		 * All ARGS EXCEPT FIRST are UNNECESSARY so you can pass the empty string or NULL
		 * @param <string> $table db table name
		 * @param <string> $fields list of fields, alsoyou can use fields from default teble without table prefix 
		 * @param <string> $where  where condition. Use table name as prefix, if you using some joins                                  
		 * @param <string> $join   type of join and join condition                                                                     
		 * @param <string> $order  order type                                  
		 * @param <mixed> $limit   just row count OR  second argument row count, and first is OFFSET                                 
		 * @return <object> mysqli_result object
		 */
		public function select($table,$fields = " * ",$where=true,$join = "",$order = "",$limit=""){
			!strpos($fields ,'*')
			 	? $fields = $this->setPrefix($fields,$table)
			 	: null;
			!empty($order)
				? $order = "ORDER BY ".$order
				: null;
			empty($where) 
				? $where = true
				: null;
			!empty($limit)
				? $limit = "LIMIT ".$limit 
				: null; 
			$query = "SELECT $fields FROM $table $join WHERE $where $order $limit";
			return $this->query($query);	
		}

		/**
		 * Create a two-dimensional array on query results
		 * @param same as select method
		 * @return <array> two-dimensional array
		 */
		public function fetchTable($table,$fields = " * ",$where=true,$join = "",$order = "",$limit=""){
			$res = $this->select($table,$fields,$where,$join,$order,$limit);
			$resTable = array();
			while ($row  = $res->fetch_assoc()){
				$resTable[] = $row;
			}
			$res->free();
			return $resTable;
		}

		/**
		 * Create an array on query results
		 * @param same as select method
		 * @return <array> 
		 */
		public function fetchRow($table,$fields = " * ",$where=true,$join = "",$order = "",$limit=""){
			$res = $this->select($table,$fields,$where,$join,$order,$limit);
			return $res->fetch_assoc();
		}
		/**
		 * @return <int> count of result array 
		 */
		public function getRowsCount($table,$fields = " * ",$where=true,$join = "",$order = "",$limit=""){
			$res = $this->fetchTable($table,$fields,$where,$join,$order,$limit);
			return count($res);
		}
		/**
		 * Make a 'update' query
		 * @param <string> $table db table name
		 * @param <string> $name field names list
		 * @param <mixed>  $value new values for relevant fields 
		 * @param <string> where condition
		 * @return <boolean>
		 */
		public function update($table,$name,$value="",$where){
			$name = explode(',',$name);
			if(!is_array($value)){
				$value = explode(',',$value);
			}
			$query = "UPDATE $table SET ";
			if (count($name) == count($value)){
				for ($i=0;$i<count($name);$i++){
					$query.=trim($name[$i])." = '".$this->clrStr($value[$i])."', ";
				}
				$query= preg_replace("/[,\s]+$/",'',$query)." WHERE $where";
			} else { 
				return false;
			}
			$this->query($query);
			return true;
		}
		/**
		 * Make a 'insert' query
		 * @param <string> $table db table name
		 * @param <string> $fields field names list
		 * @param <mixed>  $value new values for relevant fields 
		 * @return <int>
		 */
		public function insert($table,$fields,$values=""){
			$query = "INSERT INTO $table ($fields) VALUES (".$this->addQuotes($values).")";
			$this->query($query);
			return $this->dbc->insert_id;
		}
		/**
		 * Make a 'delete' query
		 * @param <string> $table db table name
		 * @param <string> where condition. Use table name as prefix, if you using some joins
		 * @param <string> field names list
		 * @param <string> type of join and join condition  
		 * @return <boolean>
		 */
		public function delete($table,$where,$fields='',$join = ""){
			$query="DELETE $fields FROM $table $join WHERE $where ";
			$this->query($query);
			return true;
		}
		/**
		 * Create a two-dimensional array on query results 
		 * @param same as select method
		 * @return <array> two-dimensional array
		 */
		public function search($table,$keywords,$fields = " ",$order = "",$limit="",$join = ""){
			if($matches = preg_split("/[,\.' ']+/",$keywords)){
				foreach ($matches as $key => $word){
					$result[] = str_replace(','," LIKE '%$word%' OR ",$fields);
					$result[$key].=" LIKE '%$word%' ";
				}
				$where = implode(" OR ",$result);
				var_dump($result);
			}
			return $this->fetchTable($table,$fields,$where,$join,$order,$limit);
		}
	}

	class MysqliException extends Exception {
		/**
		 * @param <object> $obj - connection link
		 * @return <void>
		 */
		function __construct(Mysqli $obj){
			$msg = "Error ".$obj->connect_errno.' - '.$obj->connect_error;
			parent::__construct($msg);
		}
	}
?>