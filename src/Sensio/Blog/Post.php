<?php

namespace Sensio\Blog;

/**
 * @orm:Entity
 */
class Post
{
    /**
     * @orm:Id @orm:Column(type="integer")
     * @orm:GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @orm:Column(type="string", length=50)
     * @validation:NotBlank
     * @validation:MinLength(4)
     */
    private $title = '';

    /**
     * @orm:Column(type="string", length=5000)
     * @validation:NotBlank
     */
    private $content = '';

    /**
     * @orm:ManyToOne(targetEntity="Sensio\Blog\Author")
     **/
    private $author;

    public function getId()
    {
        return $this->id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor(Author $author)
    {
        $this->author = $author;
    }
}

