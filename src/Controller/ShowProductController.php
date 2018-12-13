<?php
/* ez végzi el az SQL adatok megjelenítését */
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Product;
class ShowProductController extends Controller
{

     /**
     * @Route("/message", name="message", methods="POST")
     */
    public function index(Request $request)
    {
        $name = $request->get("productID");
        $message = $request->get("message");
        return $this->render('show_product/index.html.twig', ["name"=>$name,
        "message"=>$this->packagefind($name)]);
    }




    /**
    * @Route("/status/")
    */
    public function packagefind($id)
    {
      $productdata = $this->getDoctrine()
          ->getRepository(Product::class)
          ->findOneBySomeField($id);

      if (!$productdata) {
          throw $this->createNotFoundException(
              'No product found for id '.$id
          );
      }
      $p=$productdata->getStatus()->getDescriptionEN().$productdata->getStatus()->getDescriptionHU();
      var_dump($p);
      //$p=$productdata->getStatus()->getDescriptionHU();
      return  $p;

    }
}
