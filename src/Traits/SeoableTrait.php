<?php

namespace Werxe\Seo\Traits;

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
     * @return \Werxe\Seo\Contracts\Seo
     */
    public function createSeo(array $attributes)
    {
        return $this->seo()->create($attributes);
    }

    /**
     * Updates the seo entry with the given attributes.
     *
     * @param  array  $attributes
     * @return \Werxe\Seo\Contracts\Seo
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
     * @return \Werxe\Seo\Contracts\Seo
     */
    public function deleteSeo()
    {
        return $this->seo->delete();
    }
}
