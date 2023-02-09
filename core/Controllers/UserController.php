<?php

namespace Controllers;

use Attributes\DefaultEntity;
use Entity\User;

#[DefaultEntity(entityName: User::class)]
class UserController extends AbstractController
{


    public function register(){


        $username = null;
        $password = null;

        if(!empty($_POST['username'])){
            $username = htmlspecialchars($_POST['username']);

        }
        if(!empty($_POST['password'])){
            $password = htmlspecialchars($_POST['password']);

        }

        if($username && $password){

            $user = new User();
            $user->setUsername($username);
            $user->setPassword($password);

            $this->repository->insert($user);

            return $this->redirect([
                "type"=>"film",
                "action"=>"index",
                "info"=>"votre compte à bien été créé"
            ]);



        }


        return $this->render("users/signup", [
            "pageTitle"=>"New account"
        ]);
    }

    public function signIn(){
        $username = null;
        $password = null;

        if(!empty($_POST['username'])){
            $username = htmlspecialchars($_POST['username']);

        }
        if(!empty($_POST['password'])){
            $password = htmlspecialchars($_POST['password']);

        }

        if($username && $password){

            // user exists ?

            $user = $this->repository->findByUsername($username);

            if(!$user){
                return $this->redirect([
                   "type"=>"user",
                   "action"=>"signin",
                    "info"=>"username inconnu déso"
                ]);
            }

            if($user->passwordMatches($password)){

                $user->logIn();

                return $this->redirect([
                    "info"=> "bienvenue".$user->getUsername()
                ]);

            }


            return $this->redirect([
                "type"=>"user",
                "action"=>"signin",
                "info"=> "mauvais mot de passe"
            ]);


        }



        return $this->render("users/signin", [
            "pageTitle"=>"Sign In"
        ]);
    }

    public function signOut()
    {

        $user = \App\Session::getUser();
        if($user){
            $user->logOut();
        }
        return $this->redirect();

    }


}