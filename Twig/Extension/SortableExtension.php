<?php

namespace TwinElements\SortableBundle\Twig\Extension;

class SortableExtension extends \Twig_Extension
{

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'sortable_extension';
    }

    public function getFunctions(){
        return [
            new \Twig_SimpleFunction('renderSortable',[$this, 'renderSortable'],[
                'needs_environment' => true,
                'is_safe' => ['html']
            ])
        ];
    }

    public function renderSortable(\Twig_Environment $environment, $entity){
        return $environment->render('@TwinElementsSortable/script_ajax.html.twig',[
            'entity' => $entity
        ]);
    }
}
