<?php

namespace AppBundle\Controller;
use  AppBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\TextareType;
use Symfony\Component\Form\Extension\Core\Type\PercentType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\HttpFoundation\Response;
class CURDController extends Controller
{
   
    /**
     * @Route("Products/view", name="view")
     */
    public function productview(Request $request)
    {
        $product = $this->getDoctrine()
        ->getRepository('AppBundle:Product')
        ->findAll();
       
       return $this->render('products/view.html.twig',array('data'=>$product));
    }
     /**
     * @Route("Products/add", name="add")
     */
    public function addproduct(Request $request)
    {
       
            $pro = new Product();
             $form = $this->createFormBuilder($pro)
                 ->add('name',TextType::class,array('required'=>false))
                ->add('price',TextType::class)
                ->add('discription',TextType::class)
                ->add('save',SubmitType::class,array('label'=>'Submit'))
                ->getForm();
             $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) { 
               $product= $form->getData();
               $doct = $this->getDoctrine()->getManager();
               $doct->persist($product);
               $doct->flush();
               return $this->redirectToRoute('view');

            }else{
                return $this->render('products/from.html.twig', array('form' => $form->createView(), ));
            }

                
 
    }
      /**
     * @Route("Products/update/{id}", name="update")
     */
    public function updateproduct($id,Request $request)
    {
       $doct = $this->getDoctrine()->getManager(); 
       $product = $this->getDoctrine()
                  ->getRepository('AppBundle:Product')
                   ->find($id);
        if(!$product) {
          throw $this->createNotFoundException('No product');
        }
       $pro = new Product();
             $form = $this->createFormBuilder($product)
                 ->add('name',TextType::class,array('required'=>false))
                ->add('price',TextType::class)
                ->add('discription',TextType::class)
                ->add('save',SubmitType::class,array('label'=>'Submit'))
                ->getForm();
             $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) { 
               $product= $form->getData();
               $doct = $this->getDoctrine()->getManager();
               $doct->persist($product);
               $doct->flush();
               return $this->redirectToRoute('view');

            }else{
                return $this->render('products/from.html.twig', array('form' => $form->createView(), ));
            }
    }
      /**
     * @Route("Products/delete/{id}", name="delete")
     */
    public function deleteproduct($id,Request $request)
    {
        $doct = $this->getDoctrine()->getManager(); 
        $product = $this->getDoctrine()
                   ->getRepository('AppBundle:Product')
                    ->find($id);
         if(!$product) {
           throw $this->createNotFoundException('No product');
         }
        $doct->remove($product);
        $doct->flush();
       return $this->redirectToRoute('view');
    }


  
}
