<?php namespace Vidya\SimpleMedia\Models;

// use Eloquent;
use Illuminate\Database\Eloquent\Model;

class Media extends Eloquent
{
    const TYPE_FILE = 'file';
    const TYPE_IMAGE = 'image';
    const TYPE_PDF = 'pdf';

    protected $table = 'medias';

    /**
     * Create the polymorphic relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
        // public function content()
        // {
        //     return $this->morphTo();
        // }

    /**
     * Get the original path for a media-file.
     *
     * @return string
     */
    public function getOriginalPath()
    {
        return public_path().'/files'.'/'.$this->id.'/'.$this->path;
    }

    /**
     * Get the original URL to a media-file.
     *
     * @return string
     */
    public function getOriginalURL()
    {
        return substr($this->getOriginalPath(), strlen(public_path()));
    }

    /**
     * Determine the type of a file.
     *
     * @return string
     */
    public function getType()
    {
        switch ($this->extension) {
            case 'png';
            case 'jpg':
            case 'jpeg':
                $type = self::TYPE_IMAGE;
                break;
            case 'pdf':
                $type = self::TYPE_PDF;
                break;
            default:
                $type = self::TYPE_FILE;
                break;
        }

        return $type;
    }
}