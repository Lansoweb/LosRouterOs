<?php
namespace LosRouterOs\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController
{

    public function getActivesAction()
    {
        $client = $this->getServiceLocator()->get('losrouteros.client');
        $actives = $client->getActives();

        return [
            'actives' => $actives
        ];
    }
}
