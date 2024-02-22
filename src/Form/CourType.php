<?php

namespace App\Form;

use App\Entity\Cour;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CourType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('description', TextareaType::class) 
            ->add('niveau', ChoiceType::class, [
                'choices' => [
                    
                    'Beginner' => 'Beginner',
                    'Intermidiate' => 'Intermidiate',
                    'Difficult' => 'Difficult',
                   
                ],
            ])
            ->add('categorie', ChoiceType::class, [
                'choices' => [
                    
                    'nature' => 'nature',
                    'Biodiversity' => 'Biodiversity',
                    'sensitization' => 'sensitization',

                
                ],
            ])
            ->add('pdfpath', FileType::class, [
                'label' => 'PDF File',
                'mapped' => false, // This field is not mapped to an entity property
                'required' => true,
                'constraints' => [
                    new File([
                        'maxSize' => '10024k', // Adjust maximum file size if needed
                        'mimeTypes' => [
                            'application/pdf',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid PDF document',
                    ])
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cour::class,
        ]);
    }
}
