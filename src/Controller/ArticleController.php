<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Status;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController

{
    public function homepage()

    {


        return new Response('OMG! My first page already! WOOO!');
    }

    /**
 * @Route("/product/{id}")
 */
public function show($id)
{
    $Status = $this->getDoctrine()
        ->getRepository(Status::class)
        ->find($id);

    if (!$Status) {
        throw $this->createNotFoundException(
            'No product found for id '.$id
        );
    }
  return  $this->render('article/show.html.twig',
  ['title' => $Status->getName(),]);

}


/**
* @Route("/status/")
*/
public function showstatus()
{
$Status = $this->getDoctrine()
    ->getRepository(Status::class)
    ->findAll();

if (!$Status) {
    throw $this->createNotFoundException(
        'No status found'
    );
}
dump($Status);
return  $this->render('article/show.html.twig',
array('title' =>$Status));

}
    /**
     * @Route("/news/why-asteroids-taste-like-bacon")
     */
    public function showem()

    {
        return new Response('Future page to show one space article!');
    }

    
}
 ?>
