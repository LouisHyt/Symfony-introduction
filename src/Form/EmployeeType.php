<?php

namespace App\Form;

use App\Entity\Company;
use App\Entity\Employee;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('lastname', TextType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('birthdate', DateType::class, [
                'widget' => 'single_text',
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('hireDate', DateType::class, [
                'widget' => 'single_text',
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('city', TextType::class, [
                "required" => false,
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('company', EntityType::class, [
                'class' => Company::class,
                'choice_label' => 'name',
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('confirm', SubmitType::class, [
                "attr" => [
                    "class" => "btn btn-primary"
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Employee::class,
        ]);
    }
}
