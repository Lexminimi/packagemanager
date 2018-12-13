<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Debug\Debug;
class TaskController extends AbstractController
{
  /**
* @Route("/form/")
*/
    public function new(Request $request)
    {
        // createFormBuilder is a shortcut to get the "form factory"
        // and then call "createBuilder()" on it

        $form = $this->createFormBuilder()
            ->add('Csomag', TextType::class)
            ->getForm();

        return $this->render('form.html.twig', array(
            'form' => $form->createView(),
        ));


        $form->handleRequest($request);
        echo "pppppppppppppppp";

       if ($form->isSubmitted() && $form->isValid()) {
           $data = $form->getData();

echo "pppppppppppppppp";
           // ... perform some action, such as saving the data to the database

           $obj= new ArticleController();
           $obj->packagefind($data);

    }

    return  $this->render('article/showproduct.html.twig',
    ['title' => $obj->packagefind($data),]);
}
}
?>
