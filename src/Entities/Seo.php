<?php

/**
 * Part of the Laravel Seo package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.
 *
 * @package    Laravel Seo
 * @version    1.0.1
 * @author     Werxe LTD
 * @license    BSD License (3-clause)
 * @copyright  (c) 2011-2015, Werxe LTD
 * @link       http://werxe.com
 */

namespace Werxe\LaravelSeo\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Werxe\LaravelSeo\Contracts\Seo as SeoInterface;

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
        'meta',
        'title',
        'noindex',
        'keywords',
        'description',
    ];

    /**
     * {@inheritdoc}
     */
    public function entity()
    {
        return $this->morphTo();
    }

    /**
     * {@inheritdoc}
     */
    public function getMetaAttribute($meta)
    {
        return $meta ? new Collection(json_decode($meta, true)) : [];
    }

    /**
     * {@inheritdoc}
     */
    public function setMetaAttribute(array $meta)
    {
        $this->attributes['meta'] = $meta ? json_encode($meta) : '';
    }
}
