<?php

namespace App\Form;

use App\Entity\Location;
use App\Entity\Champion;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ChampionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Name')
            ->add('image')
            ->add('lore')
            ->add('passive')
            ->add('passiveImg')
            ->add('qDescription')
            ->add('qHability')
            ->add('wDescription')
            ->add('wHability')
            ->add('eDescription')
            ->add('eHability')
            ->add('rDescription')
            ->add('rHability')
            ->add('Location', EntityType::class,
            [
                'class' => Location::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => true
            ])
            ->add('Envia', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Champion::class,
        ]);
    }
}
