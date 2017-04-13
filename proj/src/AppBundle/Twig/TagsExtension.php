<?php
/**
 * Created by PhpStorm.
 * User: klara
 * Date: 13.04.17
 * Time: 19:48
 */

namespace AppBundle\Twig;


class TagsExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('tags_filter', array($this, 'golomp')),
        );
    }

    public function golomp($tags)
    {
        return implode(', ', $tags);
    }
}