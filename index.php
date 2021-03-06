<?php

include_once 'scr/CSVController.php';
include_once 'scr/MySQLController.php';
include_once 'scr/Loger.php';

if(isset($_POST)){
    if($_FILES['data']['size'] > 0){
        $importFile = $_FILES;
        $csv = new CSVController($importFile);
        $csvContent = $csv->GetUsersData();

        $db = new MySQLController();
        $db->CompareCSV($csvContent);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>User Data</title>
</head>
<body>
    <form action="/" method="post" enctype="multipart/form-data">
        <label for="data">Import data</label>
        <input type="file" name="data" id="data" accept=".csv">
        <input type="submit" name="import" value="Import">
    </form>

    <?php if( Loger::GetUpdateCount() > 0):?>
        <p>Has been updated: <?php echo Loger::GetUpdateCount() ?> </p>
    <?endif;?>
    <?php if( Loger::GetDeleteCount() > 0):?>
        <p>Has been deleted: <?php echo Loger::GetDeleteCount() ?> </p>
    <?php endif;?>
    <?php if( Loger::GetAddCount() > 0):?>
        <p>Has been added: <?php echo Loger::GetAddCount() ?> </p>
    <?endif;?>

    <?php

    $db = new MySQLController();
    $content = $db->Select();?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">uid</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Birth Day</th>
                <th scope="col">Date Change</th>
                <th scope="col">Description</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($content as $row):?>
            <tr>
                <th scope="row"><?=$row['uid']?></th>
                <td><?php echo $row['firstName']?></td>
                <td><?php echo $row['lastName']?></td>
                <td><?php echo $row['birthDay']?></td>
                <td><?php echo $row['dateChange']?></td>
                <td><?php echo $row['description']?></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>