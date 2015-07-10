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

namespace Werxe\LaravelSeo\Contracts;

interface Seo
{
    /**
     * Returns the entity that belongs to this seo entry.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function entity();

    /**
     * Accessor for the "meta" attribute.
     *
     * @param  string  $meta
     * @return array
     */
    public function getMetaAttribute($meta);

    /**
     * Mutator for the "meta" attribute.
     *
     * @param  array  $meta
     * @return void
     */
    public function setMetaAttribute(array $meta);
}
