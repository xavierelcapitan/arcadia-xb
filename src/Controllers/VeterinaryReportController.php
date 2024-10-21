<?php 

public static function getByAnimalId($animal_id)
{
    $db = (new self())->getDbInstance();
    $stmt = $db->prepare('SELECT * FROM veterinary_reports WHERE animal_id = :animal_id');
    $stmt->execute(['animal_id' => $animal_id]);
    return $stmt->fetchAll(\PDO::FETCH_OBJ);
}

?>