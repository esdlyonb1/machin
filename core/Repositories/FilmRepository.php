<?php

namespace Repositories;

use Attributes\TargetEntity;
use Entity\Film;

#[TargetEntity(entityName: Film::class)]
class FilmRepository extends AbstractRepository
{

    public function insert(Film $film){

        $query = $this->pdo->prepare("INSERT INTO {$this->tableName} SET title = :title, synopsis = :synopsis, image=:image, user_id=:user_id ");

        $query->execute([
            "title"=>$film->getTitle(),
            "synopsis"=>$film->getSynopsis(),
            "image"=>$film->getImage(),
            "user_id"=>$film->getUserId()
        ]);
        return $this->pdo->lastInsertId();

    }


}