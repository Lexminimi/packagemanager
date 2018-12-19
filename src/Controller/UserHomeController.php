<?php
/*

Ez lesz a user bejelentkezés utáni home oldala
*/

namespace App\Controller;
use  SecurityController ;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
class UserHomeController extends AbstractController
{
    /**
     * @Route("/user/home", name="user_home")
     */
    public function index()
    {

/*var_dump($user);*/

    }

    /**
     * @Route("/user/show", name="user_show")
     */
    public function ShowOwnProducts()
    {
      $user = $this->getUser();
      if(!$user)
      {
        throw $this->createNotFoundException(
            'No user . Please login'
        );

      }

    $products = $this->getDoctrine()
        ->getRepository(Product::class)
        ->findBy(['userID' => $user->getID()]);;

    if (!$products) {
        throw $this->createNotFoundException(
            'No status found'
        );
    }

    /** We need to do this because of Doctrine's lazy loading **/
    for($i=0;$i<count($products);$i++)
    {
      $descipt=$products[$i]->getStatus()->getDescriptionEN();
    }
    /** end of fetching lazy loading **/
    return  $this->render('user_home/index.html.twig',
    array('title' =>$products, 'username'=>$user->getEmail()));
}
}
 ?>
