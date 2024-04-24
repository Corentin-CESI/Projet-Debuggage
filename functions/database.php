<?php

/** Permet la connection à la BDD et execution de requête SQL */
function run_query(string $query) {   

    /** @ permet de supprimer tous messages d'erreur d'une expression ou d'une 
     *  fonction. Ce permet notamment d'éviter que l'utilisateur voit les 
     *  messages d'erreurs et de les gérer directement dans le code. Par contre, 
     *  ça peut rendre le débogage compliqué 
     * */ 
    $connection  = @mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME'], $_ENV['DB_PORT']);

    /** Retourne le code error du dernier appel de la fonction mysqli_connect */
    if (mysqli_connect_errno()) {
        throw new Exception("Database connection failed: " . mysqli_connect_error());
    }

    if(!$result = mysqli_query($connection, $query)) {
        throw new Exception(mysqli_error($connection));
    } else {
        return $result;
    }
}

/** Permet l'insertion de données dans la BDD sous forme de JSON DATA */
function insert(string $table, array $datas) {
    $dataColumn = null;
    $dataValues = null;
    foreach($datas as $column => $values) {
        $dataColumn .= $column . ",";
        $dataValues .= "'" . $values . "',";
    }

    $dataColumn = rtrim($dataColumn,',');
    $dataValues = rtrim($dataValues,',');

    $query = "INSERT INTO {$table} ({$dataColumn}) VALUES({$dataValues})";

    return run_query($query);
}

/** Permet la lecture de données de la BDD en y faisant une requête */
function select(string $table, string $column = null, $conditions = array()) {
    if(empty($column)) {
        $column = "*";
    }

    $query = "SELECT {$column} FROM {$table}";
    if(!empty($conditions)) {
        $query .= " WHERE {$conditions[0]} {$conditions[1]} '{$conditions[2]}'";
    }

    if (!$result = run_query($query)) {
        throw new Exception('Error when looking to the data');
    } else {
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }
}

