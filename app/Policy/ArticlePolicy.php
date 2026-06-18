namespace App\Policies;

use App\Models\Article;
use App\Models\User;

/**
 * Controls who can edit or delete an article.
 * Registered in AuthServiceProvider via $policies array.
 */
class ArticlePolicy
{
    /**
     * Only the article owner may edit it.
     */
    public function update(User $user, Article $article): bool
    {
        return $user->id === $article->user_id;
    }

    /**
     * Only the article owner may delete it.
     */
    public function delete(User $user, Article $article): bool
    {
        return $user->id === $article->user_id;
    }
}