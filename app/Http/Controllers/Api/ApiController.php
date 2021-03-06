<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Article\ArticleCollection;
use App\Http\Resources\Article\ArticleResource;
use App\Http\Resources\Project\ProjectCollection;
use App\Models\Article\Article;
use App\Models\Project\Project;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/get-articles/{article_slug}",
     *      operationId="getArticles",
     *      tags={"Articles"},
     *      summary="Returns articles",
     *      description="Returns one or more articles",
     *      @OA\Parameter(
     *          name="article_slug",
     *          description="Article slug",
     *          required=false,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Пакет получен",
     *          @OA\JsonContent(
     *              @OA\Examples(example="result_not_id", value={"articles": {"user": "Valera","category": "Memes","catetitlegory": "Johan Wyman","short_description": "Tenetur dolor modi voluptatem sit repudiandae eveniet. Doloremque quisquam est aperiam ut et. Itaque aut ratione et et et consequatur. Ab adipisci omnis et delectus iusto. Saepe aliquam incidunt sunt deserunt illo. Quos reprehenderit quas omnis sapiente maxime vel. Eaque qui inventore sint. Quo aut laudantium deleniti et eaque consequuntur. Sunt voluptas eos sit fuga. Sit officiis eos commodi enim suscipit necessitatibus. Inventore tempore nesciunt et quia sequi nemo fugiat. Et nihil eum debitis facilis cumque. Iusto consequatur quisquam dolorum accusantium corporis.","long_description": "Laudantium labore assumenda suscipit sit vel aut qui et. Non et quas aliquid cupiditate. Non commodi harum itaque et deleniti rerum aut. In laborum soluta omnis tempora non laborum. Quas qui unde ducimus neque et. Et debitis qui ut possimus blanditiis voluptatum eveniet itaque. Odit alias non sequi qui voluptatem dolore fuga. Officiis quo eos est non. Libero tempore repudiandae voluptatem et aut distinctio dolores. Praesentium aliquam maiores similique vitae. Ut odio quod pariatur in. Aut omnis velit distinctio sapiente. Fuga cupiditate qui vitae voluptatem quaerat et exercitationem. Ipsum sed perspiciatis pariatur. Ad in temporibus vel est maiores asperiores consectetur. Officiis ut laudantium commodi cupiditate nemo et. Nemo ea sed doloribus eum. Ut laudantium ea inventore optio.","place": "news","date": "17.06.2022 14:37"},{"user": "Valera","category": "News","catetitlegory": "Marlee Davis","short_description": "Enim consequatur dicta dolore maxime accusantium. Id quis in et non ad voluptatum. Praesentium id eos modi ratione. Est placeat qui repellendus rem saepe. Qui ea aut suscipit deserunt. Aut aliquid provident ipsa accusantium voluptatibus doloremque repellat. Doloremque quo repellat saepe accusantium iste molestiae. Atque facere distinctio est dolorem et aut. Minus eligendi laudantium et corporis sunt et. Aliquam non est aut architecto. Ad dolores consequatur quam reiciendis aut aliquam et. Quos quo ducimus veritatis dolores. Aut aliquam vel quia ut doloremque sint dolore inventore. Temporibus iure excepturi corrupti modi sed sequi. Unde in assumenda et dolores maxime reiciendis. Ratione est est voluptatem et aut impedit omnis et. Hic qui alias voluptatum illo. Deserunt sit laudantium nesciunt quasi.","long_description": "Molestiae ducimus sit impedit quia. Tenetur pariatur itaque iure veritatis laboriosam cum. Occaecati iusto voluptas molestiae pariatur. Est asperiores harum qui. Excepturi eum excepturi unde nesciunt doloremque. Et quis incidunt tempora voluptates dolor distinctio aut ut. Aut numquam ut sit iusto. Quo officiis facere et repellendus placeat quam. Architecto qui est reprehenderit nulla. Eaque rerum nulla illo non fugiat magni. Cum quas dolorem soluta modi veritatis asperiores. Enim delectus quis veniam cupiditate ducimus reiciendis. Accusantium ad qui id eos sint. Ut consequuntur dolorem aut similique sed. Ut quas voluptatem recusandae modi. Hic neque dolorem consequatur est. Voluptatem magni consequuntur minima libero veniam. Quas ut qui explicabo distinctio temporibus. Et architecto omnis nam nostrum. Nisi rerum laboriosam cum praesentium. Omnis ab ipsum est est. Non corrupti est qui est. Ut vero dignissimos labore. Assumenda quam ullam nihil sint ut ut. Qui animi dolorem quisquam hic qui. Eveniet hic fugiat sit. Sequi occaecati labore porro recusandae molestiae quia. Hic sequi molestias rerum voluptatum cupiditate dolor in. Maxime libero vel nemo consequatur. Aut similique culpa eos ipsa soluta. Rerum debitis ad ducimus. Aut vitae impedit saepe aliquid fugiat. Mollitia nulla quasi pariatur suscipit expedita. Aliquid at aut officiis beatae consequatur quis. Quae aspernatur consequatur quasi vel voluptatum est incidunt.","place": "news","date": "17.06.2022 14:37"}}, summary="Результат без передачей api_id"),
     *              @OA\Examples(example="result_with_id", value={"articles": {"user": "Valera","category": "Memes","catetitlegory": "Johan Wyman","short_description": "Tenetur dolor modi voluptatem sit repudiandae eveniet. Doloremque quisquam est aperiam ut et. Itaque aut ratione et et et consequatur. Ab adipisci omnis et delectus iusto. Saepe aliquam incidunt sunt deserunt illo. Quos reprehenderit quas omnis sapiente maxime vel. Eaque qui inventore sint. Quo aut laudantium deleniti et eaque consequuntur. Sunt voluptas eos sit fuga. Sit officiis eos commodi enim suscipit necessitatibus. Inventore tempore nesciunt et quia sequi nemo fugiat. Et nihil eum debitis facilis cumque. Iusto consequatur quisquam dolorum accusantium corporis.","long_description": "Laudantium labore assumenda suscipit sit vel aut qui et. Non et quas aliquid cupiditate. Non commodi harum itaque et deleniti rerum aut. In laborum soluta omnis tempora non laborum. Quas qui unde ducimus neque et. Et debitis qui ut possimus blanditiis voluptatum eveniet itaque. Odit alias non sequi qui voluptatem dolore fuga. Officiis quo eos est non. Libero tempore repudiandae voluptatem et aut distinctio dolores. Praesentium aliquam maiores similique vitae. Ut odio quod pariatur in. Aut omnis velit distinctio sapiente. Fuga cupiditate qui vitae voluptatem quaerat et exercitationem. Ipsum sed perspiciatis pariatur. Ad in temporibus vel est maiores asperiores consectetur. Officiis ut laudantium commodi cupiditate nemo et. Nemo ea sed doloribus eum. Ut laudantium ea inventore optio.","place": "news","date": "17.06.2022 14:37"}}, summary="Результат с передачей api_id"),
     *          )
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *       ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden",
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not Found"
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal Server Error"
     *      )
     *     )
     */
    public function getArticles(Request $request, $article_slug = null)
    {
        try {
            $articles = new Article;
            if(!is_null($article_slug)){
                $articles->whereSlug($article_slug);
            }
            $articles = $articles->get();
        }
        catch (QueryException $e){
            abort(400);
        }

        return new ArticleCollection($articles);
    }

    public function createArticle()
    {

    }

    public function updateArticle()
    {

    }

    public function deleteArticle()
    {

    }

    /**
     * @OA\Get(
     *      path="/api/v1/get-projects/{project_slug}",
     *      operationId="getProjects",
     *      tags={"Projects"},
     *      summary="Returns projects",
     *      description="Returns one or more projects",
     *      @OA\Parameter(
     *          name="project_slug",
     *          description="Projects slug",
     *          required=false,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Пакет получен",
     *          @OA\JsonContent(
     *              @OA\Examples(example="result_not_id", value={"projects": {{"title": "Julio Cole","category": "Games","short_description": "Consequatur rerum natus autem optio. Voluptate sit sapiente ipsa rerum consequatur. Cum ipsum reprehenderit ipsa id. A doloribus odio molestiae minima. Nihil libero exercitationem fugiat debitis. Unde mollitia deleniti repellendus aliquam consequatur eligendi. Ea ipsa non doloribus nobis nesciunt in. Dolore sed ut quod enim quasi. Excepturi facere perspiciatis rerum hic. Molestias odit sit et officia enim. Esse at in non non. Sunt rerum at ut beatae eaque quod. Nesciunt molestias accusamus assumenda esse repudiandae sit. Consequuntur non vitae sint ab at nulla fugit earum. Rerum fugiat ea esse ipsam eaque voluptatem. Ut modi quas eligendi quasi quibusdam veritatis quis.","long_description": "Accusamus vel maiores accusamus qui. Distinctio dolorem provident quis similique et ipsam dolorum. Fugiat animi iure vero hic vel. Incidunt sed velit dolorum veniam adipisci officia sit quis. Et nihil et est. Optio enim distinctio culpa neque qui veritatis qui. Ut ea ullam at sint laudantium. Mollitia neque rem quo eos amet aut. Delectus expedita vitae eius deserunt. Excepturi sapiente corrupti dicta quis sed. Est nisi ea totam omnis nihil. Quis sunt voluptas unde iste nihil. Dolor dolor aliquid sit dolor. Adipisci adipisci sit ea. Eum voluptatem molestiae doloremque provident nemo. Sequi dolore rerum maxime autem earum natus ex sint. Dolorem dicta enim aut reprehenderit quis ut porro. Eos deserunt ratione ipsum voluptas. Molestiae maxime qui et minima unde est maxime. Odit consequatur atque rerum nesciunt. Eos ullam laudantium eum vel nulla voluptatem voluptatem sint. Autem molestiae voluptates numquam porro. Dicta laudantium facilis officia amet iure occaecati. Quia ea impedit possimus sequi. Vero temporibus aliquid nesciunt. Dolor itaque voluptatibus modi et officiis unde.","version": "v1.4.2","finished": true,"slug": "julio-cole","date": "17.06.2022 14:37","development_tools": {{"parent": null,"title": "Python","short_description": "short_description","long_description": "long_description","version": null,"link": null,"slug": "python","date": "17.06.2022 14:37"},{"parent": null,"title": "C#","short_description": "short_description","long_description": "long_description","version": null,"link": null,"slug": "c-1","date": "17.06.2022 14:37"},{"parent": null,"title": "Java","short_description": "short_description","long_description": "long_description","version": null,"link": null,"slug": "java","date": "17.06.2022 14:37"},{"parent": null,"title": "Memcached","short_description": "short_description","long_description": "long_description","version": null,"link": null,"slug": "memcached","date": "17.06.2022 14:37"},{"parent": null,"title": "MS Sql","short_description": "short_description","long_description": "long_description","version": null,"link": null,"slug": "ms-sql","date": "17.06.2022 14:37"},{"parent": {"id": 1,"parent_id": null,"title": "PHP","short_description": "short_description","long_description": "long_description","version": null,"link": null,"logo": null,"slug": "php","created_at": "2022-06-17T14:37:45.000000Z","updated_at": "2022-06-17T14:37:45.000000Z"},"title": "Laravel","short_description": "short_description","long_description": "long_description","version": null,"link": null,"slug": "laravel","date": "17.06.2022 14:37"}},"type": {{"title": "MMO","slug": "mmo","date": "17.06.2022 14:37"},{"title": "RPG","slug": "rpg","date": "17.06.2022 14:37"},{"title": "Strategy","slug": "strategy","date": "17.06.2022 14:37"},{"title": "Sports","slug": "sports","date": "17.06.2022 14:37"}}},{"title": "Mr. Philip Jacobson","category": "Games","short_description": "Autem eum aliquam qui non. Nihil eaque et aperiam eos soluta sunt asperiores sit. Beatae corporis non consequuntur sapiente ut. Voluptatem ut hic reprehenderit dolorem repellat et possimus. Pariatur temporibus rerum assumenda dolor maiores. Soluta error eligendi numquam. Sunt consectetur id blanditiis. Voluptatibus quam voluptatem quasi quidem eos quo voluptatem. Cupiditate aliquam omnis ut est ratione. Libero dolores molestiae repellat aut delectus. Corporis quos eius non suscipit voluptas. Dolorem error vero tempore aspernatur voluptas. Blanditiis in voluptatem perspiciatis optio modi dicta quia illo. Necessitatibus dolores rem fuga est facere maxime rerum. Repellat maxime a sit et.","long_description": "Exercitationem necessitatibus nam dolor voluptatem provident. A ut doloribus beatae voluptatem sunt. Voluptates molestias vel minima sit a quo. Et dolor tempore cupiditate quidem eum ut nobis ut. Voluptas vitae rem magni placeat aperiam rerum. Possimus aliquam ullam quis voluptatibus odit facere aut. Labore molestias eligendi ducimus quia. Voluptatem tenetur velit architecto dolorem est rerum fugiat. Nihil ducimus delectus molestias facere provident earum. Quia dignissimos nobis deleniti est. Sit debitis autem tenetur ut incidunt temporibus ipsa harum. Totam officiis voluptate non eum sequi atque sit. Sed error consequatur impedit at placeat corporis. Repellat sint aut cumque qui quo distinctio fugit. Vel explicabo labore minus iusto provident. Consectetur sit ducimus quibusdam tempore. Quod sint qui suscipit mollitia est modi amet et. Eum modi et architecto tempore odio dolorum impedit. Qui praesentium enim deserunt quaerat. Eos quas doloribus illo nobis aliquid. Sunt ex illum assumenda et. Mollitia fugit qui velit assumenda. Deserunt adipisci magnam ea unde laudantium labore.","version": "v2.7.3","finished": true,"slug": "mr-philip-jacobson","date": "17.06.2022 14:37","development_tools": {{"parent": null,"title": "PHP","short_description": "short_description","long_description": "long_description","version": null,"link": null,"slug": "php","date": "17.06.2022 14:37"},{"parent": null,"title": "Python","short_description": "short_description","long_description": "long_description","version": null,"link": null,"slug": "python","date": "17.06.2022 14:37"},{"parent": null,"title": "Go","short_description": "short_description","long_description": "long_description","version": null,"link": null,"slug": "go","date": "17.06.2022 14:37"},{"parent": null,"title": "C#","short_description": "short_description","long_description": "long_description","version": null,"link": null,"slug": "c-1","date": "17.06.2022 14:37"},{"parent": null,"title": "Java","short_description": "short_description","long_description": "long_description","version": null,"link": null,"slug": "java","date": "17.06.2022 14:37"},{"parent": null,"title": "Redis","short_description": "short_description","long_description": "long_description","version": null,"link": null,"slug": "redis","date": "17.06.2022 14:37"},{"parent": null,"title": "Mysql","short_description": "short_description","long_description": "long_description","version": null,"link": null,"slug": "mysql","date": "17.06.2022 14:37"},{"parent": null,"title": "Postgresql","short_description": "short_description","long_description": "long_description","version": null,"link": null,"slug": "postgresql","date": "17.06.2022 14:37"},{"parent": {"id": 1,"parent_id": null,"title": "PHP","short_description": "short_description","long_description": "long_description","version": null,"link": null,"logo": null,"slug": "php","created_at": "2022-06-17T14:37:45.000000Z","updated_at": "2022-06-17T14:37:45.000000Z"},"title": "Laravel","short_description": "short_description","long_description": "long_description","version": null,"link": null,"slug": "laravel","date": "17.06.2022 14:37"}},"type": {{"title": "Sports","slug": "sports","date": "17.06.2022 14:37"}}}}}, summary="Результат без передачей api_id"),
     *              @OA\Examples(example="result_with_id", value={"projects": {{"title": "Julio Cole","category": "Games","short_description": "Consequatur rerum natus autem optio. Voluptate sit sapiente ipsa rerum consequatur. Cum ipsum reprehenderit ipsa id. A doloribus odio molestiae minima. Nihil libero exercitationem fugiat debitis. Unde mollitia deleniti repellendus aliquam consequatur eligendi. Ea ipsa non doloribus nobis nesciunt in. Dolore sed ut quod enim quasi. Excepturi facere perspiciatis rerum hic. Molestias odit sit et officia enim. Esse at in non non. Sunt rerum at ut beatae eaque quod. Nesciunt molestias accusamus assumenda esse repudiandae sit. Consequuntur non vitae sint ab at nulla fugit earum. Rerum fugiat ea esse ipsam eaque voluptatem. Ut modi quas eligendi quasi quibusdam veritatis quis.","long_description": "Accusamus vel maiores accusamus qui. Distinctio dolorem provident quis similique et ipsam dolorum. Fugiat animi iure vero hic vel. Incidunt sed velit dolorum veniam adipisci officia sit quis. Et nihil et est. Optio enim distinctio culpa neque qui veritatis qui. Ut ea ullam at sint laudantium. Mollitia neque rem quo eos amet aut. Delectus expedita vitae eius deserunt. Excepturi sapiente corrupti dicta quis sed. Est nisi ea totam omnis nihil. Quis sunt voluptas unde iste nihil. Dolor dolor aliquid sit dolor. Adipisci adipisci sit ea. Eum voluptatem molestiae doloremque provident nemo. Sequi dolore rerum maxime autem earum natus ex sint. Dolorem dicta enim aut reprehenderit quis ut porro. Eos deserunt ratione ipsum voluptas. Molestiae maxime qui et minima unde est maxime. Odit consequatur atque rerum nesciunt. Eos ullam laudantium eum vel nulla voluptatem voluptatem sint. Autem molestiae voluptates numquam porro. Dicta laudantium facilis officia amet iure occaecati. Quia ea impedit possimus sequi. Vero temporibus aliquid nesciunt. Dolor itaque voluptatibus modi et officiis unde.","version": "v1.4.2","finished": true,"slug": "julio-cole","date": "17.06.2022 14:37","development_tools": {{"parent": null,"title": "Python","short_description": "short_description","long_description": "long_description","version": null,"link": null,"slug": "python","date": "17.06.2022 14:37"},{"parent": null,"title": "C#","short_description": "short_description","long_description": "long_description","version": null,"link": null,"slug": "c-1","date": "17.06.2022 14:37"},{"parent": null,"title": "Java","short_description": "short_description","long_description": "long_description","version": null,"link": null,"slug": "java","date": "17.06.2022 14:37"},{"parent": null,"title": "Memcached","short_description": "short_description","long_description": "long_description","version": null,"link": null,"slug": "memcached","date": "17.06.2022 14:37"},{"parent": null,"title": "MS Sql","short_description": "short_description","long_description": "long_description","version": null,"link": null,"slug": "ms-sql","date": "17.06.2022 14:37"},{"parent": {"id": 1,"parent_id": null,"title": "PHP","short_description": "short_description","long_description": "long_description","version": null,"link": null,"logo": null,"slug": "php","created_at": "2022-06-17T14:37:45.000000Z","updated_at": "2022-06-17T14:37:45.000000Z"},"title": "Laravel","short_description": "short_description","long_description": "long_description","version": null,"link": null,"slug": "laravel","date": "17.06.2022 14:37"}},"type": {{"title": "MMO","slug": "mmo","date": "17.06.2022 14:37"},{"title": "RPG","slug": "rpg","date": "17.06.2022 14:37"},{"title": "Strategy","slug": "strategy","date": "17.06.2022 14:37"},{"title": "Sports","slug": "sports","date": "17.06.2022 14:37"}}}}}, summary="Результат с передачей api_id"),
     *          )
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *       ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden",
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not Found"
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal Server Error"
     *      )
     *     )
     */
    public function getProjects(Request $request, $project_slug = null)
    {
        try {
            $projects = new Project;
            if(!is_null($project_slug)){
                $projects->whereSlug($project_slug);
            }
            $projects = $projects->get();
        }
        catch (QueryException $e){
            abort(400);
        }

        return new ProjectCollection($projects);
    }
}
