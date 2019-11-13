<?php

namespace App;



abstract class Search
{
    static function results($table, $searchWord)
    {
        if ($searchWord) {
            return   $post = $table->posts()->where('title', 'LIKE', "%{$searchWord}%")->simplePaginate(6);
        } else {
            return   $post = $table->posts()->simplePaginate(6);
        }
    }
}
