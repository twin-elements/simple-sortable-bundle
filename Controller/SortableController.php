<?php

namespace TwinElements\SortableBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SortableController extends Controller
{
    /**
     * @Route("te_sortable/sort", name="te_sortable_sort")
     */
    public function sortableAction(Request $request)
    {
        // only ajax //
        if (!$request->isXmlHttpRequest()) {
            throw $this->createAccessDeniedException();
        }

        $sortableData = $request->get('sortableData');
        $entity = $request->get('entity');

        $repository = $this->getDoctrine()->getRepository($entity);
        // if repository not found //
        if (null === $repository) {
            return new Response(json_encode(['error' => $this->get('translator')->trans('te_sortable.no_access')]));
        }

        $em = $this->getDoctrine()->getManager();

        $count = 0;
        foreach ($sortableData as $id) {
            $update = $repository->find($id);
            // if entity is not found //
            if (null === $update) {
                return new Response(json_encode(['error' => $this->get('translator')->trans('te_sortable.no_items')]));
            }

            $update->setPosition($count);
            $em->persist($update);
            $count++;
        }
        $em->flush();


        return new Response(json_encode(['done' => $this->get('translator')->trans('te_sortable.changed_done')]));
    }
}
