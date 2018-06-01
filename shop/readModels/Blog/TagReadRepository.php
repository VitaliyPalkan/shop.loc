<?php

namespace shop\readModels\Blog;

use shop\entities\Blog\Tag;

class TagReadRepository
{
    public function find($id): ?Tag
    {
        return Tag::findOne($id);
    }

    public function findBySlug($slug): ?Tag
    {
        return Tag::find()->andWhere(['slug' => $slug])->one();
    }
}