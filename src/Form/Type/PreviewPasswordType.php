<?php

declare(strict_types=1);

namespace Codeplace\PreviewPasswordTypeBundle\Form\Type;

use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class PreviewPasswordType extends PasswordType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'always_empty' => false,
            'preview_btn_show_label' => 'Show',
            'preview_btn_hide_label' => 'Hide',
            'preview_btn_attr' => [],
        ]);
    }

    public function buildView(FormView $view, FormInterface $form, array $options): void
    {
        if ($options['always_empty']) {
            $view->vars['value'] = '';
        }

        if (!isset($options['preview_btn_attr']['class'])) {
            $options['preview_btn_attr']['class'] = '';
        }

        $options['preview_btn_attr']['class'] = trim('js--preview-password '.$options['preview_btn_attr']['class']);

        $view->vars['preview_btn_attr'] = array_merge(
            $options['preview_btn_attr'],
            [
                'data-target-id' => $view->vars['id'],
                'data-show-label' => $options['preview_btn_show_label'],
                'data-hide-label' => $options['preview_btn_hide_label'],
            ]
        );
    }

    public function getBlockPrefix(): string
    {
        return 'preview_password';
    }
}
