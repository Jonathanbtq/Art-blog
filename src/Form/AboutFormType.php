<?php

namespace App\Form;

use App\Entity\About;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AboutFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pseudo', TextType::class, [
                'label' => 'Pseudo'
            ])
            ->add('domaine_list', TextType::class, [
                'label' => 'Domaine'
            ])
            ->add('birthday_date', DateType::class, [
                'label' => 'Date de naissance'
            ])
            ->add('location')
            ->add('description', TextType::class, [
                'label' => 'Description'
            ])
            ->add('favorite_game', TextType::class, [
                'label' => 'Jeux préféré'
            ])
            ->add('favorite_books', TextType::class, [
                'label' => 'Livres préféré'
            ])
            ->add('favorite_movies', TextType::class, [
                'label' => 'Films préféré'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => About::class,
        ]);
    }
}
