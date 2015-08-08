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
        $defaults = $this->medias()->get()->pluck('default')->toArray();
        // Add as default if no other is
        $isDefault = array_search(1, $defaults) === false;
        $media = new Media([
            'object_id'   => $this->id,
            'object_type' => get_class($this),
            'object_slug' => $this->slug,
            'name' => $name,
            'path' => $path,
            'default' => $isDefault
        ]);
        $this->medias()->save($media);
    }
}