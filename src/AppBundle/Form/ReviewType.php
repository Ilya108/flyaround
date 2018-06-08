<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 05/06/18
 * Time: 16:44
 */
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReviewType extends AbstractType
{
    /**
     * {@inheritdoc} Including all fields from Review entity.
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('text')
            ->add('publicationDate')
            ->add('note')
            ->add('userRated')
            ->add('reviewAuthor');
    }

    /**
     * {@inheritdoc} Targeting Review entity
     */

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Review'
        ));
    }

    /**
     * {@inheritdoc} getName() is now deprecated
     */

    public function getBlockPrefix()
    {
        return 'appbundle_review';
    }



}