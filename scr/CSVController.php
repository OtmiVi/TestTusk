<?php

class CSVController
{

    private $errorMassage;
    private $usersData = [];

    public function __construct($importFile)
    {
        $columnsTitles = fgetcsv($importFile, 1000, ';');
        if($this->isColumnsCorrect($columnsTitles)){
            while($data = fgetcsv($importFile, 1000, ';')){
                $this->usersData[] = $data;
            }
        }else{
            echo $this->errorMassage;
        }

    }

    /**
     * Gets user data from csv
     * 
     * @return array
     */
    public function GetUsersData(){
        return $this->usersData;
    }
    /**
     *Checks the table head are correct
     *
     * @param array $columns column head
     * @return bool
     */
    private function isColumnsCorrect($columns){
        $correctColums = include_once "config/correctColums.php"; //const
        
        if(count($columns) == count($correctColums)){
            for($i = 0; $i <= count($correctColums); $i++){
                if($columns[$i] != $correctColums[$i]){
                    $this->errorMassage = "Incorrect columns";
                    return false;
                }
            }
            return true;
        }else{
            $this->errorMassage = "Incprrect table";
            return false;
        }
    }
}