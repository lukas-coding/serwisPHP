<?php

declare(strict_types=1);

namespace App;

require_once("src/Controller/AbstractController.php");

use App\AbstractController;
use Throwable;

class Controller extends AbstractController
{

    public function newAction(): void
    {
        try {
            if ($this->req->hasPost()) {
                $this->db->newRepair($this->req->postParam());
                header("Location: /?action=description");
            }
        } catch (Throwable $e) {
            echo $e;
            exit();
        }
        $this->view->renderSite('new', $viewParams ?? []);
    }

    public function descriptionAction(): void
    {
        try {
            if ($this->req->hasPost()) {
                $this->db->addDescription($this->req->postParam());
                header("Location: /?action=addClient");
            }
        } catch (Throwable $e) {
            echo $e;
        }
        $this->view->renderSite('description', $viewParams ?? []);
    }

    public function addClientAction(): void
    {
        try {
            if ($this->req->hasPost()) {
                $this->db->addCustomer($this->req->postParam());
                header("Location: /?action=create");
            }
        } catch (Throwable $e) {
            echo $e;
        }
        $this->view->renderSite('addClient', $viewParams ?? []);
    }


    public function showAction(): void
    {
        $customerId = (int)$this->req->getParam('id');
        try {
            $this->db->showCustomer($customerId);
            $viewParams = [
                'customer' => $this->db->showCustomer($customerId)
            ];
        } catch (NotFoundException $e) {
            echo "<h1>" . $e->getMessage() . "</h1>";
            exit();
        }
        $this->view->renderSite('show', $viewParams ?? []);
    }

    public function editAction(): void
    {
        $customerId = (int)$this->req->getParam('id');
        try {
            $this->db->showCustomer($customerId);
            $viewParams = [
                'customer' => $this->db->showCustomer($customerId)
            ];
        } catch (NotFoundException $e) {
            echo '<h1 style="text-align: center">' . $e->getMessage() . '</h1>';
            exit();
        }
        $this->view->renderSite('edit', $viewParams ?? []);
    }

    public function editSaveAction(): void
    {
        $id = (int)$this->req->getParam('id');
        $data = $this->req->postParam();
        try {
            if ($this->req->hasPost()) {
                $this->db->saveEdit($data, $id);
                header("Location: /?action=show&id=$id");
            }
        } catch (Throwable $e) {
            dump($e);
            exit();
        }
    }

    public function deleteAction(): void
    {
        try {
            $customerId = (int)$this->req->getParam('id');
            $this->db->deleteRepair($customerId);
            header("Location: /?action=create");
        } catch (NotFoundException $e) {
            echo "<h1>" . $e->getMessage() . "</h1>";
            exit();
        }
    }

    public function printAction(): void
    {
        $customerId = (int)$this->req->getParam('id');
        try {
            $this->db->showCustomer($customerId);
            $viewParams = [
                'customer' => $this->db->showCustomer($customerId)
            ];
        } catch (NotFoundException $e) {
            echo "<h1>" . $e->getMessage() . "</h1>";
            exit();
        }
        ob_start();
        include_once('/serwisPHP/templates/pages/print.php');
        $html = ob_get_clean();
        $this->mpdf->WriteHTML($html);
        $this->mpdf->Output();
        $this->view->renderSite('print', $viewParams ?? []);
    }

    public function createAction(): void
    {
        $viewParams = [
            'client' => $this->db->showList()
        ];
        $this->view->renderSite('create', $viewParams ?? []);
    }

    public function layoutAction(): void
    {
        $this->view->renderSite('layout', $viewParams ?? []);
    }
}
