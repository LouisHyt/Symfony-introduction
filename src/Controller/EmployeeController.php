<?php

namespace App\Controller;

use App\Entity\Employee;
use App\Form\EmployeeType;
use App\Repository\EmployeeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EmployeeController extends AbstractController
{
    #[Route('/employee', name: 'app_employee')]
    public function index(EmployeeRepository $employeeRepository): Response
    {

        $employees = $employeeRepository->findAll();

        return $this->render('employee/index.html.twig', [
            'employees' => $employees,
        ]);
    }

    #[Route('/employee/add', name: 'add_employee')]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $employee = new Employee();

        
        $form = $this->createForm(EmployeeType::class, $employee);
        
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $employee = $form->getData();
            //prepare
            $entityManager->persist($employee);
            //execute
            $entityManager->flush();
            return $this->redirectToRoute("app_company");
        }
        
        return $this->render('employee/add.html.twig', [
            'addEmployeeForm' => $form
        ]);
    }

    #[Route('/employee/{id}', name: 'show_employee')]
    public function show(Employee $employee): Response
    {
        return $this->render('employee/show.html.twig', [
            'employee' => $employee
        ]);
    }
}
