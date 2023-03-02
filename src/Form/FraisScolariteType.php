<?php

namespace App\Form;

use App\Entity\FraisScolarite;
use App\Entity\Formation;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;         
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FraisScolariteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('description')
                  ->add('formations', EntityType::class, [
                'class' => Formation::class,
                'choice_label' => 'titre',
                'expanded' => true,
                'multiple' => true,
                'by_reference' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FraisScolarite::class,
        ]);
    }
}
