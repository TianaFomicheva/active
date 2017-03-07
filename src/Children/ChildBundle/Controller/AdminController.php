<?php
namespace Children\ChildBundle\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

 
class AdminController extends Controller
{
    public function indexAction()
    {
    
        return $this->render('ChildrenChildBundle:Admin:index.html.twig');
    }
}

