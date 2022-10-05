# PDO
Easy PDO Database file
# Connecting with your database
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
   
   In the construct function just change the function parameters with your own database information for example you have a database with a name blue, your database username is john and your password for the database is smith. Then your code will change the construct and the construct function will be displayed as
   public function __construct($username="john",$password="smith",$host="localhost",$dbname="blue",$options=[])
  same is for your server name. If it has a different hostname which is other than localhost then you can write the name in the quotes.
  
  ## The rest of information regarding CRUD operations have been shared with individual php files so that you could easily understand or utilize as per your need. 
  
  ### This is a basic PDO file it is not an advance one
