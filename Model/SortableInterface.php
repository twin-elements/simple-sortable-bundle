<?php
namespace TwinElements\SortableBundle\Model;

interface SortableInterface
{
    public function getPosition();
    public function setPosition($position);
}