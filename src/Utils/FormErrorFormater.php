<?php

declare(strict_types=1);

namespace App\Utils;

use Symfony\Component\Form\FormInterface;

class FormErrorFormater
{
    /*
     * Permet de transformer une type FormErrorIterator en tableau avec
     * label => label du champs
     * message => message de l'erreur
     */
    public function formateFormErrors(FormInterface $form): array
    {
        $errors = [];
        foreach ($form->getErrors(true) as $formError) {
            $errors[] = ['label' => $formError->getOrigin()->getConfig()->getOption('label'), 'message' => $formError->getMessage()];
        }

        return $errors;
    }
}
