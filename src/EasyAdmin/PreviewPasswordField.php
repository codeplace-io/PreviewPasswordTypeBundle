<?php

declare(strict_types=1);

namespace Codeplace\PreviewPasswordTypeBundle\EasyAdmin;

use Codeplace\PreviewPasswordTypeBundle\Form\Type\PreviewPasswordType;
use EasyCorp\Bundle\EasyAdminBundle\Contracts\Field\FieldInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\FieldTrait;

final class PreviewPasswordField implements FieldInterface
{
    use FieldTrait;

    public static function new(string $propertyName, ?string $label = null)
    {
        return (new self())
            ->setProperty($propertyName)
            ->setLabel($label)
            ->setFormType(PreviewPasswordType::class);
    }
}