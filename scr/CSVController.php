<?php

class CSVController
{

    private $errorMassage;
    private $usersData = [];

    public function __construct($file)
    {
        $importFile = $file['data']['tmp_name'];
        if($this->isCSVFile($file)){
            $importFile = fopen($importFile, 'r');
            $columnsTitles = fgetcsv($importFile, 1000, ';');
            if($this->isColumnsCorrect($columnsTitles)){
                while($data = fgetcsv($importFile, 1000, ';')){
                    $this->usersData[] = $data;
                }
            }else{
                echo $this->errorMassage;
            }
            echo $this->errorMassage;
            fclose($importFile);
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
        $correctColums = include_once "config/correctColums.php";
        
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

    private function isCSVFile($file){
        $isCorrectType = $file['data']['type'] == "application/vnd.ms-excel";
        if($isCorrectType){
            return true;
        }else{
            $this->errorMassage = "Incprrect file type";
            return false;
        }
    }
}