<?php

namespace App\Form;

use App\Entity\Family;
use App\Entity\SocialCategory;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FamilyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numberMember')
            ->add('qtl')
            ->add('socialCategory', EntityType::class,[
                'class'=>SocialCategory::class,
                'choice_label'=> 'label'
            ])
           /* ->add('idUser', EntityType::class, [
                "class" => User::class,
            ])*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Family::class,
        ]);
    }
}
