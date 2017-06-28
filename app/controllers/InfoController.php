<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class InfoController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for info
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Info', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "id";

        $info = Info::find($parameters);
        if (count($info) == 0) {
            $this->flash->notice("La búsqueda no encontró ninguna información.");

            $this->dispatcher->forward([
                "controller" => "info",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $info,
            'limit'=> 10,
            'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a info
     *
     * @param string $id
     */
    public function editAction($id)
    {
        if (!$this->request->isPost()) {

            $info = Info::findFirstByid($id);
            if (!$info) {
                $this->flash->error("No se encontró información");

                $this->dispatcher->forward([
                    'controller' => "info",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->id = $info->id;

            $this->tag->setDefault("id", $info->getId());
            $this->tag->setDefault("nombre", $info->getNombre());
            $this->tag->setDefault("email", $info->getEmail());
            $this->tag->setDefault("telefono", $info->getTelefono());
            $this->tag->setDefault("fecha", $info->getFecha());
            
        }
    }

    /**
     * Creates a new info
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "info",
                'action' => 'index'
            ]);

            return;
        }

        $info = new Info();
        $info->setId($this->request->getPost("id"));
        $info->setNombre($this->request->getPost("nombre"));
        $info->setEmail($this->request->getPost("email", "email"));
        $info->setTelefono($this->request->getPost("telefono"));
        $info->setFecha($this->request->getPost("fecha"));
        

        if (!$info->save()) {
            foreach ($info->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "info",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("se a creado un usuario");

        $this->dispatcher->forward([
            'controller' => "info",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a info edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "info",
                'action' => 'index'
            ]);

            return;
        }

        $id = $this->request->getPost("id");
        $info = Info::findFirstByid($id);

        if (!$info) {
            $this->flash->error("Usuario no existe " . $id);

            $this->dispatcher->forward([
                'controller' => "info",
                'action' => 'index'
            ]);

            return;
        }

        $info->setId($this->request->getPost("id"));
        $info->setNombre($this->request->getPost("nombre"));
        $info->setEmail($this->request->getPost("email", "email"));
        $info->setTelefono($this->request->getPost("telefono"));
        $info->setFecha($this->request->getPost("fecha"));
        

        if (!$info->save()) {

            foreach ($info->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "info",
                'action' => 'edit',
                'params' => [$info->id]
            ]);

            return;
        }

        $this->flash->success("La información se actualizó correctamente");

        $this->dispatcher->forward([
            'controller' => "info",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a info
     *
     * @param string $id
     */
    public function deleteAction($id)
    {
        $info = Info::findFirstByid($id);
        if (!$info) {
            $this->flash->error("No se encontró información");

            $this->dispatcher->forward([
                'controller' => "info",
                'action' => 'index'
            ]);

            return;
        }

        if (!$info->delete()) {

            foreach ($info->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "info",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("Usuario eliminado correctamente");

        $this->dispatcher->forward([
            'controller' => "info",
            'action' => "index"
        ]);
    }

}
