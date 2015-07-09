<?php 
/**
 * Media Model definition
 *
 * @package laravel-simplemedia
 */
namespace Vidya\SimpleMedia;

trait SimpleMediaTrait
{
    function addMedia($media) {
        $this->medias()->save($media);
    }
}