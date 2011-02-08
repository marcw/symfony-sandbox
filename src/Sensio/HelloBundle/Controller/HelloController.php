<?php

namespace Sensio\HelloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Blog\Post;
use Sensio\Blog\Author;
use Sensio\HelloBundle\Form\PostForm;

class HelloController extends Controller
{
    public function indexAction($max = 10)
    {
        $em = $this->get('doctrine.orm.default_entity_manager');

        $posts = $em->createQuery('SELECT p, a FROM Sensio\Blog\Post p JOIN p.author a')
            ->setMaxResults($max)
            ->getResult();

        return $this->render('HelloBundle:Post:index.html.twig', array('posts' => $posts));
    }

    public function createAction()
    {
        $form = PostForm::create($this->get('form.context'), 'post');

        $post = new Post();
        $form->bind($this->get('request'), $post);
        if ($form->isValid()) {
            $em = $this->get('doctrine.orm.default_entity_manager');
            $em->persist($post);
            $em->flush();

            return $this->redirect($this->generateUrl('blog_home'));
        }

        return $this->render('HelloBundle:Post:new.html.twig', array('form' => $form));
    }

    public function viewAction($id)
    {
        $em = $this->get('doctrine.orm.default_entity_manager');

        $post = $em->createQuery('SELECT p, a FROM Sensio\Blog\Post p JOIN p.author a WHERE p.id = :id')
                   ->setParameter('id', $id)
                   ->getSingleResult();

        return $this->render('HelloBundle:Post:view.html.twig', array('post' => $post));
    }
}
