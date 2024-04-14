<?php

namespace App\Kitchen\Application\Forms;


use App\Kitchen\Domain\Entity\Ingredient;
use App\Kitchen\Domain\Entity\Pizza;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CreatePizzaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Name',
                'required' => true,
                'attr'=>
                    [
                        'class'=>'form-control'
                    ]
            ])
            ->add('description', TextType::class, [
                'label' => 'Description',
                'required' => true,
                'attr'=>
                    [
                        'class'=>'form-control'
                    ]
            ])
            ->add('size', ChoiceType::class, [
                'label' => 'Size',
                'choices' => [
                    'Small' => 'Small',
                    'Medium' => 'Medium',
                    'Large' => 'Large',
                ],
                'required' => true,
                'attr'=>
                    [
                        'class'=>'form-control'
                    ]
            ])
            ->add('price', NumberType::class, [
                'label' => 'Price',
                'required' => true,
                'attr'=>
                    [
                        'class'=>'form-control'
                    ]
            ])
            ->add('ingredients', EntityType::class, [
                'label' => 'Ingredients',
                'class' => Ingredient::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
                'required' => true,
                'attr'=>
                    [
                        'class'=>'form-control'
                    ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pizza::class,
        ]);
    }
}
