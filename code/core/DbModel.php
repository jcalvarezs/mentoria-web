<?php
namespace app\core;

///use Attribute;

abstract class DbModel extends Model
{

    abstract public function tableName(): string;
    abstract public function attributes(): array;

    public function save(){
        $pdo = Application::$app->db->pdo;
        $tableName = $this-> tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr)=> ":$attr", $attributes);

       // insert into user (columnas) VALUES (:firstname, ....)
        $statement= $pdo->prepare("
        INSERT INTO $tableName
            (" . implode(",", $attributes ) . ")
            VALUES
            (" . implode(",", $attributes ) . ")       
        ");
        foreach ($attributes as $attribute){
            $statement->bindValue(":$attribute", $this->{$attribute} );

        }
        $statement->execute();
        return true;
    }

}