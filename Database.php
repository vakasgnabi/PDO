 <?php 
 
 
 class Database{
	 
	 public $isConn;
	 protected $datab;
	 //connect to the database
	 public function __construct($username="root",$password="",$host="localhost",$dbname="oop",$options=[]){
		 
		 $this->isConn=TRUE;
		 
		 try{
			 $this->datab=new PDO("mysql:host={$host};dbname={$dbname};",$username,$password,$options);
			 $this->datab->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//errmode error reporting; error exception throw
			 $this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			 
			 
		 }
		 catch(PDOException $e){
			 throw new Exception($e->getMessage());
			 
		 }
		 
		 
	 }
	 
	 public function getRow($params=[],$table,$where){
		 try{
			 
			// print_r($params);
			 $p="";
			 for($i=0;$i<count($params);$i++){
			 
			 $p.=" ".$params[$i].",";
			
			 
			 }
			// print_r($where);
			 $clause="";
			 foreach($where as $w=>$val){
				// echo $w . $val ."<br />";
				 $clause.=" ".$w."='".$val."' AND";
			 }
			 
			 //echo $clause;
			 $str_clause=rtrim($clause,"AND");
			// echo $p;
			$criteria=rtrim($p,",");
			 $query="SELECT $criteria FROM $table WHERE $str_clause";
			 //echo $query;
			 //exit;
			 $stmt=$this->datab->prepare($query);
			 $stmt->execute($params);
			 return $stmt->fetch();
			 
		 }
		  catch(PDOException $e){
			 throw new Exception($e->getMessage());
			 
		 }
	 }
	 
	  public function getAllRows($params=[],$table){
		 try{
			 
			// print_r($params);
			 $p="";
			 for($i=0;$i<count($params);$i++){
			 
			 $p.=" ".$params[$i].",";
			
			 
			 }
			// print_r($where);
			 
			// echo $p;
			$criteria=rtrim($p,",");
			 $query="SELECT $criteria FROM $table ";
			 //echo $query;
			 //exit;
			 $stmt=$this->datab->prepare($query);
			 $stmt->execute($params);
			 return $stmt->fetchAll();
			 
		 }
		  catch(PDOException $e){
			 throw new Exception($e->getMessage());
			 
		 }
	 }
	 
	 public function getAllRowsWhere($params=[],$table,$where){
		 try{
			 
			// print_r($params);
			 $p="";
			 for($i=0;$i<count($params);$i++){
			 
			 $p.=" ".$params[$i].",";
			
			 
			 }
			// print_r($where);
			 $clause="";
			 foreach($where as $w=>$val){
				// echo $w . $val ."<br />";
				 $clause.=" ".$w."='".$val."' AND";
			 }
			 
			// echo $p;
			$str_clause=rtrim($clause,"AND");
			$criteria=rtrim($p,",");
			 $query="SELECT $criteria FROM $table WHERE $str_clause";
			 //echo $query;
			 //exit;
			 $stmt=$this->datab->prepare($query);
			 $stmt->execute($params);
			 return $stmt->fetchAll();
			 
		 }
		  catch(PDOException $e){
			 throw new Exception($e->getMessage());
			 
		 }
	 }
	 public function rawSelect($query, $params=[]){
		try{
			 $stmt=$this->datab->prepare($query);
			 $stmt->execute($params);
			 return $stmt->fetchAll();
			 
		 }
		 catch(PDOException $e){
			 throw new Exception($e->getMessage());
			 
		 }
		 
		 
		 
	 }
	  public function insertRow($vals=[],$table){
		try{

			/* $stmt=$this->datab->prepare($query);
			 $stmt->execute($params);
			 return TRUE;*/
			 /*INSERT INTO Customers (CustomerName, ContactName, Address, City, PostalCode, Country)
VALUES ('Cardinal','Tom B. Erichsen','Skagen 21','Stavanger','4006','Norway');*/
		$parameters="";
		$values="";
		
		foreach($vals as $v=>$key){
			
			$parameters.=" ".$v." ,";
			$values.=" '".$key."' ,";
		}
		

		
		$trimmed_param=rtrim($parameters,',');
		$trimmed_val=rtrim($values,',');
		
		
		
		$query="INSERT INTO $table($trimmed_param) VALUES ($trimmed_val)";
		
		$stmt=$this->datab->prepare($query);
		$stmt->execute($vals);
		return TRUE;
		

		
		
			 
		 }
		 catch(PDOException $e){
			 throw new Exception($e->getMessage());
			 
		 }
		 
		 
		 
	 }
	 
	 public function updateRow($params=[],$table,$where){
		 
		 try{
			 $parameters="";
			 foreach($params as $p=>$val){
			 $parameters.=$p."='".$val."', ";
				
				
				 
			 }
			
			 $trimprams=rtrim($parameters,', ');
			
			 $clause="";
			 foreach($where as $w=>$val){
				
				 $clause.=" ".$w."='".$val."' AND";
			 }
			 
			
			$str_clause=rtrim($clause,"AND");
			$query="UPDATE $table SET $trimprams WHERE $str_clause";
			//echo $query;
			$stmt=$this->datab->prepare($query);
			 $stmt->execute($params);
			 return TRUE;
				
			 
		 }
		 catch(PDOException $e){
			 
			 throw new Exception($e->getMessage());
		 }
		 
	 }
	 
	 public function deleteRow($table,$where=[]){
		 /*
		 DELETE FROM Customers
		 WHERE CustomerName='Alfreds Futterkiste' AND ContactName='Maria Anders';
		 */		 
		 try{
			
			 $clause="";
			 foreach($where as $w=>$val){
				
				 $clause.=" ".$w."='".$val."' AND";
			 }
			 
			
			$str_clause=rtrim($clause,"AND");
			$query="DELETE FROM $table WHERE $str_clause";
			//echo $query;
			$stmt=$this->datab->prepare($query);
			 $stmt->execute($where);
			 return TRUE;
				
			 
		 }
		 catch(PDOException $e){
			 
			 throw new Exception($e->getMessage());
		 }
		 
	 }
	 
	 
	 
	 
 }