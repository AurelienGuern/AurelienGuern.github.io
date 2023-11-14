<?php

class MainController extends CoreController
{
    public function home()
    {
        // on appelle la méthode show pour afficher notre vue
        $this->show('home', [
            "pageTitle" => "Aurélien GUERN - Portfolio",
        ]);
    }

    public function portfolio()
    {
        // on appelle la méthode show pour afficher notre vue
        $this->show('portfolio', [
            "pageTitle" => "Aurélien GUERN - Portfolio",
        ]);
    }

    public function contact()
    {
        // on appelle la méthode show pour afficher notre vue
        $this->show('contact', [
            "pageTitle" => "Aurélien GUERN - A propos",
        ]);
    }
}