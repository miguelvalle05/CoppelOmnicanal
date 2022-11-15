<?php

include './TaskModel.php';

$model = new ModelTask();



    $rows = $model->fetch();





echo json_encode($rows);