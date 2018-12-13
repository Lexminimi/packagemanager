<?php
/* semmire nem használom */
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $name = "";
        $message = "";
        return $this->render('message/index.html.twig', ["name"=>$name,
            "message"=>$message]);
    }
}
