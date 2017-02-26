<?php

namespace Children\ChildBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ChildrenChildBundle:Default:index.html.twig');
    }
}
