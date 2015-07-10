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
 * @version    1.0.0
 * @author     Werxe LTD
 * @license    BSD License (3-clause)
 * @copyright  (c) 2011-2015, Werxe LTD
 * @link       http://werxe.com
 */

namespace Werxe\LaravelSeo\Traits;

trait SeoableTrait
{
    /**
     * Returns the seo entry that belongs to entity.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    abstract public function seo();

    /**
     * Determines if the entity has a seo entry attached.
     *
     * @return bool
     */
    public function hasSeo()
    {
        return (bool) $this->seo;
    }

    /**
     * Creates a new seo entry with the given attributes.
     *
     * @param  array  $attributes
     * @return \Werxe\LaravelSeo\Contracts\Seo
     */
    public function createSeo(array $attributes)
    {
        return $this->seo()->create($attributes);
    }

    /**
     * Updates the seo entry with the given attributes.
     *
     * @param  array  $attributes
     * @return \Werxe\LaravelSeo\Contracts\Seo
     */
    public function updateSeo(array $attributes)
    {
        $seo = $this->seo;

        $seo->fill($attributes)->save();

        return $seo;
    }

    /**
     * Deletes the seo entry that's attached to the entity.
     *
     * @return \Werxe\LaravelSeo\Contracts\Seo
     */
    public function deleteSeo()
    {
        return $this->seo->delete();
    }
}
