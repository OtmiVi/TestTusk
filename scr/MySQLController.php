<?php
include_once "Loger.php";

class MySQLController
{
    private $dbConnect;

    public function __construct()
    {
        try{
            $this->dbConnect = new PDO("mysql:host=localhost;dbname=users", "root", "root");
        }catch(PDOException $e){
            echo($e);
            die;
        }
    }

    /**
     * Synchronizes DB with csv file
     *
     * @param array $data file data
     */
    public function CompareCSV($data){
        $dbContent = $this->Select();
        if(count($dbContent) == 0){
            for($i = 0; $i < count($data); $i++){
                $this->Insert($data[$i]);
            }
        }else{
            $this->DeleteExtraUsers($data);
            $this->AddNewUsers($data);
            $isSameId = false;
            $isSameChange = false;
            for($i = 0; $i < count($data); $i++){
                for($j = 0; $j < count($dbContent); $j++){
                    $isSameId = $data[$i][0] == $dbContent[$j][0];
                    if($isSameId){
                        $isSameChange = (strcmp($data[$i][4], $dbContent[$j][4]) == 1);
                        if($isSameChange){
                            $this->Update($data[$i]);
                        }
                    }
                }
            }
        }  
    }

    /**
     * Gets ussers id from csv
     *
     * @param array $data csv data
     * @return array
     */
    private function GetUsersId($data){
        $result = [];
        foreach($data as $user){
            $result[] = $user[0];
        }
        return $result;
    }

    /**
     * Check and add new users
     *
     * @param array $data csv data
     */
    private function AddNewUsers($data){
        $userIdFromDb = $this->SelectId();

        for($i = 0; $i < count($data); $i++){
            if(!in_array( $data[$i][0], $userIdFromDb)){
                $this->Insert($data[$i]);
            }
        }
    }

    /**
     * Delete extra users from db
     *
     * @param array $data csv data
     */
    private function DeleteExtraUsers($data){
        $usersId = $this->GetUsersId($data);

        $users = $this->Select();
        foreach($users as $row){
            if(!in_array( $row['uid'], $usersId)){
                $this->Delete($row['uid']);
            }
        }
    }

    /**
     * select all id from db
     *
     * @return array id array
     */
    private function SelectId(){
        $data = $this->dbConnect->query("SELECT `uid` FROM `users`; ");
        $result = [];
        foreach ($data as $row) {
            $result[] = $row[0];
        }
        return $result;
    }
    /**
     * select all data from db
     *
     * @return array 
     */
    public function Select(){
        $data = $this->dbConnect->query("SELECT * FROM `users`; ");
        $result = [];
        foreach ($data as $row) {
            $result[] = $row;
        }
        return $result;
    }

    /**
     * Insert data to db
     *
     * @param array $data csv data
     */
    private function Insert($data){
        $this->dbConnect->query("
        INSERT INTO `users` (`uid`, `firstName`, `lastName`, `dirthDay`, `dateChange`, `description`) 
        VALUES ('{$data[0]}', '{$data[1]}', '{$data[2]}', '{$data[3]}', '{$data[4]}', '{$data[5]}');
        ");
        Loger::Add();
    }

    /**
     * Delete data from db
     *
     * @param int $id user id who needs to be deleted
     */
    private function Delete($id){
        $this->dbConnect->query("
        DELETE FROM `users` WHERE `users`.`uid` = {$id}
        ");
        Loger::Delete();
    }
    
    /**
     * Update data on db
     *
     * @param array $data csv data
     */
    private function Update($data){
        $this->dbConnect->query("
        UPDATE `users` SET 
        `firstName` = '{$data[1]}',
        `lastName` = '{$data[2]}',
        `dirthDay` = '{$data[3]}',
        `dateChange` = '{$data[4]}',
        `description` = '{$data[5]}'
        WHERE uid = {$data[0]};");
        Loger::Update();
    }
}