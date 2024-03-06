<?php

namespace App\Form;

use App\Entity\Job;
use App\Entity\Application;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class ApplicationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('email', null, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Email cannot be empty',
                    ]),
                    new Regex([
                        'pattern' => '/^[^\s@]+@[^\s@]+\.[^\s@]+$/', // expression régulière à vérifier
                        'message' => 'Email address invalid!',
                    ]),
                ],
            ])

            ->add('pdf',FileType::class,[
                "mapped"=>false,
                "required"=>false,
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Application::class,
        ]);
    }
}
