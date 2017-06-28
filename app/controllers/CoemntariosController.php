<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class CoemntariosController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for coemntarios
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Coemntarios', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "id";

        $coemntarios = Coemntarios::find($parameters);
        if (count($coemntarios) == 0) {
            $this->flash->notice("La búsqueda no encontró comentarios");

            $this->dispatcher->forward([
                "controller" => "coemntarios",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $coemntarios,
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
     * Edits a coemntario
     *
     * @param string $id
     */
    public function editAction($id)
    {
        if (!$this->request->isPost()) {

            $coemntario = Coemntarios::findFirstByid($id);
            if (!$coemntario) {
                $this->flash->error("Comentario no fue encontrado");

                $this->dispatcher->forward([
                    'controller' => "coemntarios",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->id = $coemntario->id;

            $this->tag->setDefault("id", $coemntario->getId());
            $this->tag->setDefault("fecha", $coemntario->getFecha());
            $this->tag->setDefault("comentario", $coemntario->getComentario());
            
        }
    }

    /**
     * Creates a new coemntario
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "coemntarios",
                'action' => 'index'
            ]);

            return;
        }

        $coemntario = new Coemntarios();
        $coemntario->setId($this->request->getPost("id"));
        $coemntario->setFecha($this->request->getPost("fecha"));
        $coemntario->setComentario($this->request->getPost("comentario"));
        

        if (!$coemntario->save()) {
            foreach ($coemntario->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "coemntarios",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("Comentario se creó correctamente");

        $this->dispatcher->forward([
            'controller' => "coemntarios",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a coemntario edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "coemntarios",
                'action' => 'index'
            ]);

            return;
        }

        $id = $this->request->getPost("id");
        $coemntario = Coemntarios::findFirstByid($id);

        if (!$coemntario) {
            $this->flash->error("Comentario no existe " . $id);

            $this->dispatcher->forward([
                'controller' => "coemntarios",
                'action' => 'index'
            ]);

            return;
        }

        $coemntario->setId($this->request->getPost("id"));
        $coemntario->setFecha($this->request->getPost("fecha"));
        $coemntario->setComentario($this->request->getPost("comentario"));
        

        if (!$coemntario->save()) {

            foreach ($coemntario->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "coemntarios",
                'action' => 'edit',
                'params' => [$coemntario->id]
            ]);

            return;
        }

        $this->flash->success("Comentario fue actualizado con éxito");

        $this->dispatcher->forward([
            'controller' => "coemntarios",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a coemntario
     *
     * @param string $id
     */
    public function deleteAction($id)
    {
        $coemntario = Coemntarios::findFirstByid($id);
        if (!$coemntario) {
            $this->flash->error("Comentario no fue encontrado");

            $this->dispatcher->forward([
                'controller' => "coemntarios",
                'action' => 'index'
            ]);

            return;
        }

        if (!$coemntario->delete()) {

            foreach ($coemntario->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "coemntarios",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("Comentario se eliminó correctamente");

        $this->dispatcher->forward([
            'controller' => "coemntarios",
            'action' => "index"
        ]);
    }

}
