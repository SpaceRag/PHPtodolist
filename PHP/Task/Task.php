<?php

class Task
{
    private $title;
    private $description;
    private $important;
    private $id;

    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title)
    {
        return $this->title = $title;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        return $this->description = $description;
    }
    public function getImportant()
    {
        return $this->important;
    }
    public function setImportant($important)
    {
        return $this->important = $important;
    }
    public function getID()
    {
        return $this->id;
    }
    public function setID($id)
    {
        return $this->id = $id;
    }
}

?>