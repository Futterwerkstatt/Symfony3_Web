<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\WebConfig;

class WebConfigType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $config = $options['data'];
        $themes = $config->getThemeConfig();
        //var_dump( $config ); die();

        $builder
                ->add('websiteName')
                ->add('websiteDesc')
                ->add('bootstrapTheme', \Symfony\Component\Form\Extension\Core\Type\ChoiceType::class, [
                    'choices' => $themes,
                    'label' => "Theme",
                ])
                ->add('bootstrapEnable')
                ->add('bootstrapCSS', \Symfony\Component\Form\Extension\Core\Type\UrlType::class, [
                    'label' => "Bootstrap CSS", 'disabled' => true
                ])
                ->add('bootstrapJS', \Symfony\Component\Form\Extension\Core\Type\UrlType::class, [
                    'label' => "Bootstrap JS", 'disabled' => true
                ])
                ->add('jQuery', \Symfony\Component\Form\Extension\Core\Type\UrlType::class, [
                    'label' => "jQuery", 'disabled' => true
                ])                
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\WebConfig'
        ));
    }

}
