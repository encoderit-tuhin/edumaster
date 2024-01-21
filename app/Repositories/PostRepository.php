<?php

namespace App\Repositories;

use App\Post;

class PostRepository
{
    public function getPostsByCategory(?int $categoryId = null, $postStatus = 'publish', int $limit = 6)
    {
        return Post::where('category_id', $categoryId)
            ->where('post_status', $postStatus)
            ->orderBy('id', 'desc')
            ->limit($limit)
            ->get();
    }
    public function getPostsByCategoryBySearch($categoryId, $postStatus = 'publish',  $from_date, $to_date, $searchKeyWord)
    {

        return Post::leftjoin('post_contents', "posts.id", 'post_contents.post_id')
            ->where('posts.category_id', $categoryId)
            ->where('posts.post_status', $postStatus)
            ->Where('post_contents.post_content', 'LIKE', "%$searchKeyWord%")
            ->orWhere('post_contents.post_title', 'LIKE', "%$searchKeyWord%")
            ->orWhere(function ($query) use ($from_date, $to_date) {
                // Use whereBetween for both date conditions if you want both to match
                $query->whereBetween('posts.created_at', [$from_date, $to_date])
                    ->whereBetween('posts.updated_at', [$from_date, $to_date]);
            })
            ->orderBy('id', 'desc')
            ->select(
                'posts.id',
                'posts.slug',
                'posts.featured_image',
                'post_contents.post_content',
                'post_contents.post_title',
                'posts.created_at',
                'posts.updated_at'
            )
            ->get();
    }
}
