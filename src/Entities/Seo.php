<?php

namespace Werxe\Seo\Entities;

use Illuminate\Database\Eloquent\Model;
use Werxe\Seo\Contracts\Seo as SeoInterface;

class Seo extends Model implements SeoInterface
{
    /**
     * {@inheritdoc}
     */
    protected $table = 'seo';

    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'title',
        'noindex',
        'keywords',
        'description',
    ];

    /**
     * {@inheritdoc}
     */
    public function item()
    {
        return $this->morphTo();
    }
}
