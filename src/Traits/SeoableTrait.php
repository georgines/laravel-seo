<?php

namespace Werxe\Seo\Traits;

trait SeoableTrait
{
    /**
     * {@inheritdoc}
     */
    public function hasSeo()
    {
        return (bool) $this->seo;
    }

    /**
     * {@inheritdoc}
     */
    public function createSeo(array $attributes)
    {
        return $this->seo()->create($attributes);
    }

    /**
     * {@inheritdoc}
     */
    public function updateSeo(array $attributes)
    {
        $seo = $this->seo;
        $seo->fill($attributes)->save();

        return $seo;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteSeo()
    {
        return $this->seo->delete();
    }
}
