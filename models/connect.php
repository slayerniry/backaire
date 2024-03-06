<?php

class connect
{
    private $dbHost;
    private $dbUser;
    private $dbPassword;
    private $dbName;

    function __construct()
    {
        $this->dbHost = $_ENV['DB_HOST'];
        $this->dbUser = $_ENV['DB_USER'];
        $this->dbPassword = $_ENV['DB_PWD'];
        $this->dbName = $_ENV['DB_NAME'];
    }

    public function execute_req($sql)
    {
        $dsn = "mysql:dbname=" . $this->dbName . ";charset=utf8;host=" . $this->dbHost;
        try {
            $connexion = new PDO($dsn, $this->dbUser, $this->dbPassword);
            $connexion->query($sql);
            $connexion = null;
        } catch (PDOException $e) {
            printf("Échec de la connexion : %s\n" . $sql, $e->getMessage());
            exit();
        }
    }

    public function execute_req_pdo($req)
    {
        $host = $this->dbHost;
        $db   = $this->dbName;
        $user = $this->dbUser;
        $pass = $this->dbPassword;

        try {
            $conn = new PDO("mysql:host=$host;charset=utf8;dbname=$db", $user, $pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare($req);
            $stmt->execute();

            // set the resulting array to associative
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $data = $stmt->fetchAll();

            $data["cnt"] = count($data);

            $stmt->closeCursor();

            return $data;
        } catch (\PDOException $e) {
            debug($req);
        }
    }

    public function my_htmlencode($value, $transforme)
    {
        if ($transforme == 0) {
            return addslashes(trim($value));
        } else {

            $texte =  htmlentities(trim($value));

            $texte = str_replace("&lt;","<",$texte);
            $texte = str_replace("&quot;",'"',$texte);
            $texte = str_replace("&gt;",'>',$texte);
            $texte = str_replace("&amp;nbsp;",' ',$texte);

            return (addslashes(replace_texte_speciaux($texte))) ;
        }
    }

    public function execute_insert($table, $data)
    {
        $encodedData = array();
        foreach ($data as $column => $value) {
            $encodedValue = $value;
            $encodedData[$column] = $encodedValue;
        }

        $setClause = '';
        foreach ($encodedData as $column => $value) {
            $setClause .= "$column = '$value', ";
        }
        $setClause = rtrim($setClause, ', ');

        $sql = "INSERT INTO $table SET $setClause " . " , updated = CURRENT_TIMESTAMP() , user_code_upd  = " . $_SESSION["user_code"] . " ";

        $this->execute_req($sql);
    }

    public function execute_update($table, $data, $condition)
    {
        $encodedData = array();
        foreach ($data as $column => $value) {
            $encodedValue = $value;
            $encodedData[$column] = $encodedValue;
        }

        $setClause = '';
        foreach ($encodedData as $column => $value) {
            $setClause .= "$column = '$value', ";
        }
        $setClause = rtrim($setClause, ', ');

        $sql = "UPDATE $table SET $setClause " . " , updated = CURRENT_TIMESTAMP() , user_code_upd  = " . $_SESSION["user_code"] . " WHERE $condition";


        echo($sql);


        $this->execute_req($sql);
    }

    public function execute_delete($table, $condition)
    {
        $sql = "DELETE FROM $table WHERE $condition";
        $this->execute_req($sql);
    }
}

/*

$database = new connect();

// Example for INSERT
$dataToInsert = array(
    'column1' => 'value1',
    'column2' => 'value2',
    // Add more columns and values as needed
);
$database->execute_insert('your_table_name', $dataToInsert);

// Example for UPDATE
$dataToUpdate = array(
    'column1' => 'new_value1',
    'column2' => 'new_value2',
    // Add more columns and values as needed
);
$condition = "id = 1"; // Change this condition as per your requirement
$database->execute_update('your_table_name', $dataToUpdate, $condition);

// Example for DELETE
$conditionToDelete = "id = 2"; // Change this condition as per your requirement
$database->execute_delete('your_table_name', $conditionToDelete);

*/
