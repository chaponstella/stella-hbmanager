<?php

namespace App\Controller;

class ClientsController extends AbstractController
{


    public function index()
    {
        $clients = $this->container->getClientManager()->findAll();


        echo $this->container->getTwig()->render('/clients/index.html.twig', [
            'clients'      => $clients
        ]);
    }

    public function show(int $id)
    {
        $client = $this->container->getClientManager()->findOneById($id);
        echo $this->container->getTwig()->render('/clients/show.html.twig', [
            'client' => $client
        ]);
    }

    /**
     * Afficher le formulaire de création d'un client
     * Route : GET /clients/new
     */
    public function new()
    {
        echo $this->container->getTwig()->render('/clients/form.html.twig');
    }

    /**
     * Enregistrer un client en base de données (vient d'un formulaire)
     * Route : POST /clients
     */
    public function create()
    {
        $this->container->getClientManager()->create($_POST);

        header('Location: ' . $this->configuration['env']['base_path'] . '/clients');
    }


    /**
     * Afficher le formulaire d'édition d'un client
     * Route : GET /clients/:id/edit
     */
    public function edit(int $id)
    {
        $client = $this->container->getClientManager()->findOneById($id);

        echo $this->container->getTwig()->render('/clients/form.html.twig', [
            'client' => $client
        ]);
    }

    /**
     * Update d'un client en base de données (vient d'un formulaire edit)
     * Route : POST /clients/:id/edit
     */
    public function update(int $id)
    {
        $this->container->getClientManager()->update($id, $_POST);
        $this->index();
    }

    public function delete(int $id)
    {
        $client = $this->container->getClientManager()->delete($id);
        $this->index();
    }
}
