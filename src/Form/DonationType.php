<?php

namespace App\Form;

use App\Entity\Donation;
use Doctrine\DBAL\Types\TextType;
use Karser\Recaptcha3Bundle\Form\Recaptcha3Type;
use Karser\Recaptcha3Bundle\Validator\Constraints\Recaptcha3;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Type;

class DonationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('address')
            //->add('date')
            ->add(
                'firstName'
            )
            ->add('lastName')
            ->add('phoneNumber', IntegerType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Le numéro de téléphone est requis.']),
                    new Type(['type' => 'integer', 'message' => 'Le numéro de téléphone doit être un entier.']),
                ],
            ])

            ->add('amount', NumberType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Le montant est requis.']),
                    new Type(['type' => 'float', 'message' => 'Le montant doit être un nombre décimal.']),
                ]
            ])


            ->add('save', SubmitType::class, [
                'label' => 'Donate', // This sets the label for the submit button
                'attr' => ['class' => 'btn btn-primary py-3 px-4']
            ])
            ->add('captcha', Recaptcha3Type::class, [
                'constraints' => new Recaptcha3(),
                'action_name' => 'homepage',
                'constraints' => new Recaptcha3(['message' => 'There were problems with your captcha. Please try again or contact with support and provide following code(s): {{ errorCodes }}']),
                'locale' => 'de',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Donation::class,
        ]);
    }
}
