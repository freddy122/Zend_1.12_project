<?php

class Application_Form_Lot extends Zend_Form
{

    public function init()
    {
        $this->setName('Lot');

        $lot_id = new Zend_Form_Element_Hlot_idden('lot_id');
        $lot_id->addFilter('Int');

        $commande = new Zend_Form_Element_Text('commande');
        $commande->setLabel('commande')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addVallot_idator('NotEmpty');

        $nom_lot = new Zend_Form_Element_Text('nom_lot');
        $nom_lot->setLabel('nom_lot')
              ->setRequired(true)
              ->addFilter('StripTags')
              ->addFilter('StringTrim')
              ->addVallot_idator('NotEmpty');

        $envoyer = new Zend_Form_Element_Submit('envoyer');
        $envoyer->setAttrib('lot_id', 'boutonenvoyer');

        $this->addElements(array($lot_id, $commande, $nom_lot, $envoyer));
    }


}

