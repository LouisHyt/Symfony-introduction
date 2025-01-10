<?php

namespace App\Controller;

use App\Entity\Company;
use App\Form\CompanyType;
use App\Repository\CompanyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class CompanyController extends AbstractController
{
    #[Route('/company', name: 'app_company')]
    public function index(CompanyRepository $companyRepository): Response
    {
        $companies = $companyRepository->findAll();

        return $this->render('company/index.html.twig', [
            'companies' => $companies
        ]);
    }
    
    #[Route('/company/add', name: 'add_company')]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $company = new Company();
        
        $form = $this->createForm(CompanyType::class, $company);
        
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $company = $form->getData();
            //prepare
            $entityManager->persist($company);
            //execute
            $entityManager->flush();
            return $this->redirectToRoute("app_company");
        }

        return $this->render('company/add.html.twig', [
            'addCompanyForm' => $form
        ]);
    }
    
    #[Route('/company/{id}', name: 'show_company')]
    public function show(Company $company): Response
    {
        return $this->render('company/show.html.twig', [
            'company' => $company
        ]);
    }

}
