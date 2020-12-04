<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    /**
     * @Route("/post/{id}", name="post")
     */
    public function index($id): Response
    {
        $post = $this->getDoctrine() // on récupère Doctrine
            ->getRepository(Post::class) // on récupère le répository correspondant au Post
            ->find($id); // on récupère le post dont l'id correspond à l'id passé en URL

        // dans le cas contraire j'affiche l'article
        return $this->render('singlePost.html.twig', [
            'post' => $post
        ]);
    }
}
