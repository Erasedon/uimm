<?php

namespace App\Form;

use App\Entity\Stats;
use App\Entity\Formation;
use App\Entity\Niveau;
use App\Repository\FormationRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StatsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('annee')
            ->add('taux')
            ->add('obtenir_formation',EntityType::class,['class'=>Formation::class,'query_builder' => function (FormationRepository $er) {
                return $er->createQueryBuilder('f')
                    ->select('f')
                    ->join('f.niveau','fniveau');
            },'choice_label'=>'titre'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Stats::class,
        ]);
    }
}
