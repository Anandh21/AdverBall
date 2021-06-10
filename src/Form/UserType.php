<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', null, [
                'label'=>'Email'
            ])

            ->add('nbBalls',HiddenType::class, [
                'data' => 2,
            ])
            ->add('password')
            ->add('firstName', null,[
                'label'=> 'FirstName'
            ])
            ->add('lastName',null,[
                'label'=> 'LastName'
            ])
            ->add('age', null,[
                'attr' => array('style' => 'width: 200px')
            ])
            ->add('gender', ChoiceType::class,[
                'choices'=>[
                    'Homme'=>'Male',
                    'Femme'=>'Female',
                    'Other' =>'Other'
                ],
                'attr' => array('style' => 'width: 100%')

            ])
            ->add('qtl',null,[
                'label'=> 'Consommation '
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
