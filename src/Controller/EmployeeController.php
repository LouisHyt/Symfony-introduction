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
    #[Route('/employee/edit/{id}', name: 'edit_employee')]
    public function create_edit(Employee $employee = null, Request $request, EntityManagerInterface $entityManager): Response
    {
        if(!$employee){
            $employee = new Employee();
        }
        
        $form = $this->createForm(EmployeeType::class, $employee);
        
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $employee = $form->getData();
            //prepare
            $entityManager->persist($employee);
            //execute
            $entityManager->flush();
            return $this->redirectToRoute("app_employee");
        }
        
        return $this->render('employee/add.html.twig', [
            'addEmployeeForm' => $form,
            'edit' => $employee->getId()
        ]);
    }

    #[Route('/employee/{id}/delete}', name: 'delete_employee')]
    public function delete(Employee $employee, EntityManagerInterface $entityManager) : Response
    {
        $entityManager->remove($employee);
        $entityManager->flush();
        return $this->redirectToRoute("app_employee");
    }

    #[Route('/employee/{id}', name: 'show_employee')]
    public function show(Employee $employee): Response
    {
        return $this->render('employee/show.html.twig', [
            'employee' => $employee
        ]);
    }

}
