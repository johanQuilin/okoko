<?php

namespace App\Controller;

use App\Entity\Proprietaires;
use App\Form\ProprietairesType;


use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Argument\ArgumentInterface;
use Symfony\Component\DependencyInjection\Extension\ConfigurationExtensionInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProprietairesController extends AbstractController
{
    /**
     * @Route ("/", name="app_proprietaires")
     */

    public function index(ManagerRegistry $doctrine): Response {
        $repo = $doctrine->getRepository(Proprietaires::class);
        $proprietaires=$repo->findAll();
        return $this->render('propreitaires/index.html.twig', ['proprietaires' =>$proprietaires]);
    }

    /**
     * @Route("/proprietaires/ajouter", name="app_proprietaires_ajouter")
     */
    public function ajouter(ManagerRegistry $doctrine, Request $request): Response
    {
        $proprietaires = new Proprietaires();
        $form = $this->createForm(ProprietairesType::class, $proprietaires);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $em = $doctrine->getManager();
            $em->persist($proprietaires);
            $em->flush();
            return $this->redirectToRoute("app_proprietaires");
        }
        return $this->render("proprietaires\ajouter.html.twig", [
            "formulaire"=>$form->createView()
        ]);
    }




}
