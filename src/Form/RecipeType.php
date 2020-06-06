<?php

namespace App\Form;

use App\Entity\BeerType;
use App\Entity\Recipe;
use App\Entity\Yeast;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('mashTime', NumberType::class, [
                'label' => 'Temps d\'empâtage',
                'html5' => true,
                'attr' => ['min' => 0, 'step' => 1],
                'help' => 'En minute',
            ])
            ->add('boilingTime', NumberType::class, [
                'label' => 'Temps d\'ébullition',
                'html5' => true,
                'attr' => ['min' => 0, 'step' => 1],
                'help' => 'En minute',
            ])
            ->add('abv', NumberType::class, [
                'label' => 'ABV',
                'html5' => true,
                'attr' => ['min' => 0, 'max' => 100, 'step' => 1],
                'help' => 'En pourcentage',
            ])
            ->add('yeast', EntityType::class, [
                'label' => 'Levure',
                'class' => Yeast::class,
                'choice_label' => 'name',
                'choice_value' => 'id',
                'choice_name' => 'name',
            ])
            ->add('type', EntityType::class, [
                'label' => 'Type',
                'class' => BeerType::class,
                'choice_label' => 'name',
                'choice_value' => 'id',
                'choice_name' => 'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Recipe::class,
        ]);
    }
}
