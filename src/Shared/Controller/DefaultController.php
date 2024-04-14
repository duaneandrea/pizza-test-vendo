<?php
namespace App\Shared\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{

    #[Route('/')]
    function hello() :Response
    {
        return $this->render('shared/index.html.twig');
    }
}