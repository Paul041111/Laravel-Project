<?php 
namespace App\Policies;

use App\Models\User;
use App\Models\Article;

class ArticlePolicy
{
    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Article $article)
    {
        return true;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Article $article)
    {
        return $user->id === $article->user_id;
    }

    public function delete(User $user, Article $article)
    {
        return $user->id === $article->user_id;
    }
}
?>