<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Post;
use App\Controller\Response;

class BlogController extends Controller
{
    /**
     * @Route("/blog", name="blog")
     * Latest blog posts
     */
    public function index()
    {
        $q = $this->getDoctrine()
            ->getManager()->createQueryBuilder();

        $posts = $q->select('p')
            ->from('App\Entity\Post', 'p')
            ->where('p.type = ?0')
            ->setParameter(0, 'blog')
            ->setMaxResults(5)
            ->setFirstResult(0)
            ->orderBy('p.date', 'DESC')
            ->getQuery()
            ->getResult();

       dump($posts);
       
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'posts' => $posts,
        ]);
    }

    /**
     * @Route("/blog/create", name="blog_create")
     */
    public function blog_create()
    {

        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_REMEMBERED');

        $this->getDoctrine()
            ->getRepository(Post::class)
            ->createPost('Testtitel', 'blog', $this->getUser(), '', 'Boejah');

            return $this->render('blog/postCreate.html.twig', [
                'controller_name' => 'BlogController',
                'msg' => "Aangemaakt!"
            ]);
    }

    /**
     * @Route("/blog/{id}", name="show_blogpost")
     */
    public function show_post($id)
    {

        $blogpost = $this->getDoctrine()
             ->getRepository(Post::class)
             ->find($id);

        return $this->render('blog/blogpost.html.twig', [
            'blogpost' => $blogpost
        ]);
    }
}
