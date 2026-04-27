class Database
{
public $conn;

public function_construct($config)
{
$dsn="mysql:host={$config['host']}; post={$config['port']}; dbname={$config['dbname']}';
$option=[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try{
$this->conn=new PDO($dsn, $config['usernmae'], $config['password']);
co
} catch (PDOException $e){
throw new Exception("Database connection Failed: {$e->getMessage()}");
}
}
}