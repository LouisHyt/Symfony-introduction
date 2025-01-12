<?php

namespace App\Form;

use App\Entity\Company;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompanyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                "attr" => [
                   "class" => "form-control"
                ]
            ])
            ->add('creationDate', DateType::class, [
                'widget' => 'single_text',
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('adress', TextType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('postalCode', TextType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('city', TextType::class, [
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
            'data_class' => Company::class,
        ]);
    }
}
