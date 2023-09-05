<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\SubmitButtonTypeInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SaveComponentButtonType extends AbstractType implements SubmitButtonTypeInterface
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'attr' => [
                'data-action' => 'live#action',
                'data-action-name' => 'prevent|save',
            ],
        ]);
    }

    public function getParent()
    {
        return SubmitType::class;
    }
}
