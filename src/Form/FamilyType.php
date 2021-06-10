<?php

namespace App\Form;

use App\Entity\Family;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FamilyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numberMember', null, [
                'label'=>'Nombre de membres dans la famille'
            ])
            ->add('qtl', null, [
                'label'=>'Quantité bu en litres au sein de la famille'
            ])
            ->add('socialCategory', null, [
                'label'=>'Catégorie socio-professionnelle'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Family::class,
        ]);
    }
}
