<?php 
/**
 * Media Model definition
 *
 * @package laravel-simplemedia
 */
namespace Vidya\SimpleMedia;

use Vidya\SimpleMedia\Models\Media;

trait SimpleMediaTrait
{
    function addMedia($name, $path) {
        $media = new Media([
            'object_id'   => $this->id,
            'object_type' => get_class($this),
            'object_slug' => $this->slug,
            'name' => $name,
            'path' => $path,
            'default' => false
        ]);
        $this->medias()->save($media);
    }
}