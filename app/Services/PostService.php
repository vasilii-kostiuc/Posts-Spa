<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    public function search(
        array $filters = [],
        $search = '',
        $sort = [],
        $limit = 5
    ) {
        $sort_dir = $sort['sort_dir'] ?? '';
        $sort_field = $sort['sort_field'] ?? '';
        $posts = Post::when(
            count($filters) > 0,
            function ($query) use ($filters) {
                foreach ($filters as $column => $value) {
                    $query->where($column, 'LIKE', '%'.$value.'%');
                }
            }
        )->when($search != '', function ($query) {
            $query->where(function ($q) {
                $q->where('title', 'LIKE', '%'.request('search').'%')
                    ->orWhere('post_text', 'LIKE', '%'.request('search').'%')
                    ->orWhere('created_at', 'LIKE', '%'.request('search').'%');
            });
        })->when(request('category_id', '') != '', function ($query) {
            $query->where('category_id', request('category_id'));
        })->orderBy($sort_field, $sort_dir)->paginate($limit);

        return $posts;
    }

}
