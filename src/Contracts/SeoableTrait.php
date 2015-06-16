<?php

namespace Werxe\Seo\Contracts;

interface SeoableTrait
{
    /**
     * Returns the seo entry that belongs to entity.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function seo();

    /**
     * Determines if the entity has a seo entry attached.
     *
     * @return bool
     */
    public function hasSeo();

    /**
     * Creates a new seo entry with the given attributes.
     *
     * @param  array  $attributes
     * @return \Werxe\Seo\Contract
     */
    public function createSeo(array $attributes);

    /**
     * Updates the seo entry with the given attributes.
     *
     * @param  array  $attributes
     * @return \Werxe\Seo\Contract
     */
    public function updateSeo(array $attributes);

    /**
     * Deletes the seo entry that's attached to the entity.
     *
     * @return \Werxe\Seo\Contract
     */
    public function deleteSeo();
}
