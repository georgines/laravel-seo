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

namespace Werxe\LaravelSeo\Tests\Entities;

use Werxe\LaravelSeo\Entities\Seo;
use Werxe\LaravelSeo\Tests\Stubs\Post;
use Werxe\LaravelSeo\Tests\FunctionalTestCase;

class SeoTest extends FunctionalTestCase
{
    public function createPost()
    {
        return Post::create([ 'title' => 'My awesome title' ]);
    }

    /** @test */
    public function it_can_create_a_seo_record_on_an_entity()
    {
        $post = $this->createPost();

        $post->storeSeo([
            'title'       => 'My Seoable Post Title',
            'description' => 'Foo',
            'meta' => [
                'published_time' => time(),
                'section'        => 'news',
            ],
        ]);

        $post = $post->fresh();

        $this->assertSame('news', $post->seo->meta->get('section'));
        $this->assertSame('My Seoable Post Title', $post->seo->title);

        $seo = Seo::find(1);

        $this->assertSame('My awesome title', $seo->entity->title);

        return $post;
    }

    /** @test */
    public function it_can_update_the_seo_record_from_an_entity()
    {
        $post = $this->it_can_create_a_seo_record_on_an_entity();

        $post->storeSeo([
            'title'       => 'My Updated Seoable Post Title',
            'description' => 'Foo',
        ]);

        $post = $post->fresh();

        $this->assertSame('My Updated Seoable Post Title', $post->seo->title);
    }

    /** @test */
    public function it_can_delete_the_seo_record_from_an_entity()
    {
        $post = $this->it_can_create_a_seo_record_on_an_entity();

        $this->assertTrue($post->hasSeo());

        $post->deleteSeo();

        $post = $post->fresh();

        $this->assertFalse($post->hasSeo());
    }
}
