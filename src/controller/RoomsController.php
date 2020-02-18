<?php

namespace App\Controller;

class RoomsController extends AbstractController
{



    public function index()
    {
        $rooms = $this->container->getRoomManager()->findAll();


        echo $this->container->getTwig()->render('/pages/index.html.twig', [
            'rooms'      => $rooms
        ]);
    }

    /**
     * Afficher le formulaire de création d'un room
     * Route : GET /rooms/new
     */
    public function new()
    {
        echo $this->container->getTwig()->render('/rooms/form.html.twig');
    }

    /**
     * Enregistrer un room en base de données (vient d'un formulaire)
     * Route : POST /rooms
     */
    public function create()
    {
        $this->container->getRoomManager()->create($_POST);

        header('Location: ' . $this->configuration['env']['base_path'] . '/rooms');
    }


    /**
     * Afficher le formulaire d'édition d'un room
     * Route : GET /rooms/:id/edit
     */
    public function edit(int $id)
    {
        $room = $this->container->getRoomManager()->findOneById($id);

        echo $this->container->getTwig()->render('/rooms/form.html.twig', [
            'room' => $room
        ]);
    }

    /**
     * Update d'un room en base de données (vient d'un formulaire edit)
     * Route : POST /rooms/:id/edit
     */
    public function update(int $id)
    {
        $this->container->getRoomManager()->update($id, $_POST);
        $this->index();
    }

    public function delete(int $id)
    {
        $room = $this->container->getRoomManager()->delete($id);
        $this->index();
    }

    /**
     * Afficher la page de 1 room
     * Route: GET /rooms/:id
     */
    public function show(int $id)
    {
        // 1. Récupérer le room par son id
        $room = $this->container->getRoomManager()->findOneById($id);

        //2. Afficher la room
        echo $this->container->getTwig()->render('rooms/show.html.twig', [
            'room' => $room
        ]);
    }
}
