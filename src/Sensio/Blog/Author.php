<?php

namespace Sensio\Blog;

/**
 * @orm:Entity
 */
class Author
{
    /**
     * @orm:Id @orm:Column(type="integer")
     * @orm:GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @orm:Column(type="string", length=50)
     * @validation:NotBlank
     */
    private $name;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function __toString()
    {
        return $this->name;
    }
}

