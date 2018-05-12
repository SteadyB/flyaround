<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 12/05/18
 * Time: 17:14
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType
{
    /**
     * {@inheritdoc} adding User register fields that aren't in FOSUser Bundle.
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, ['attr' => ['maxlength'=> 200, 'label' => 'First Name']])
            ->add('lastName', TextType::class, ['attr' => ['maxlength'=> 250, 'label' => 'Last Name']])
            ->add('isACertifiedPilot', CheckboxType::class, ['required' => false, 'label' => 'Certified Pilot'])
            ->add('phoneNumber', TelType::class, ['attr' => ['min' => 10, 'max' => 12, 'label' => 'Phone Number']])
            ->add('birthDate', BirthdayType::class, ['placeholder' => ['year' => 'Year', 'month' => 'Month', 'day' => 'Day']])
            //->add('creationDate', HiddenType::class, ['data' => new \DateTime('now')])
            ->add('agreeTerms', CheckboxType::class, ['mapped' => false]);
    }

    /**
     */
    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    /**
     * {@inheritdoc} Targeting Review entity
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => 'AppBundle\Entity\User']);
    }

    /**
     * {@inheritdoc} getName() is now deprecated
     */
    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }
}