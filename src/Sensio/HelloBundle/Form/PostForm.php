<?php

namespace Sensio\HelloBundle\Form;

use Symfony\Component\Form\Form;

class PostForm extends Form
{
    public function configure()
    {
        $this->setDataClass('Sensio\Blog\Post');

        $this->add('author');
        $this->add('title');
        $this->add('content');
    }
}
