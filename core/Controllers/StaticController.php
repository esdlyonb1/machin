<?php

namespace Controllers;

use Attributes\UsesEntity;

#[UsesEntity(value: False)]
class StaticController extends AbstractController
{



    public function mentionsLegales()
    {
        return $this->render("films/mentions", [
            "pageTitle" => "Mentions Legales"
        ]);
    }
}