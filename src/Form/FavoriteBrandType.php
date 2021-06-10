<?php

namespace App\Form;

use App\Entity\Brand;
use App\Entity\FavoriteBrand;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FavoriteBrandType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstFav',EntityType::class,[
                'class'=>Brand::class,
                'choice_label'=>'label'
            ])
            ->add('secondFav',EntityType::class,[
                'class'=>Brand::class,
                'choice_label'=>'label'
            ])
            ->add('thirdFav',EntityType::class,[
                'class'=>Brand::class,
                'choice_label'=>'label'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FavoriteBrand::class,
        ]);
    }
}
