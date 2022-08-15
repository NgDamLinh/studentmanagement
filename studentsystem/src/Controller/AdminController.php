<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class AdminController extends AbstractController
{
    #[Route('/index', name: 'admin_index')]
    public function adminIndex()
    {
        $author = $this->getDoctrine()->getRepository(Admin::class)->findAll();
        return $this->render('admin/index.html.twig',
        [
            'admin' => $author,
        ]);    
    }
}
