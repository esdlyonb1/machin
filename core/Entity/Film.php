<?php

namespace Entity;

use Attributes\Table;
use Attributes\TargetRepository;
use Repositories\FilmRepository;
use Repositories\UserRepository;

#[Table(name: "films")]
#[TargetRepository(repositoryName: FilmRepository::class)]
class Film extends AbstractEntity
{
    private int $id;
    private string $title;
    private string $synopsis;
    private string $image;
    private int $user_id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getSynopsis(): string
    {
        return $this->synopsis;
    }

    /**
     * @param string $synopsis
     */
    public function setSynopsis(string $synopsis): void
    {
        $this->synopsis = $synopsis;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }
    public function setUser(User $user){
        $this->setUserId($user->getId());
    }

    public function getUser(){
        $userRepo = new UserRepository();
        return $userRepo->findById($this->user_id);
    }


}