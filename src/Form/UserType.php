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
            ->add('password', null, [
                'label'=>'Mot de passe'
            ])
            ->add('firstName', null,[
                'label'=> 'Prénom'
            ])
            ->add('lastName',null,[
                'label'=> 'Nom'
            ])
            ->add('age', null,[
                'attr' => array('style' => 'width: 200px')
            ])
            ->add('gender', ChoiceType::class,[
                'label'=> 'Genre',
                'choices'=>[
                    'Homme'=>'Homme',
                    'Femme'=>'Femme',
                    'Other' =>'Autre'
                ],
                'attr' => array('style' => 'width: 100%')

            ])
            ->add('qtl',null,[
                'label'=> 'Consommation (en litres par mois et par personne) '
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
