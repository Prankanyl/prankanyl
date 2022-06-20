<?php

namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Summary API",
 *      description="API my test Laravel Project",
 *      @OA\Contact(
 *          email="v752433@icloud.com"
 *      ),
 * )
 *
 * @OA\Server(
 *      url="https://summary-php.herokuapp.com",
 *      description="Heroku host"
 * )
 *
 * @OA\Server(
 *      url="http://127.0.0.1:8000",
 *      description="Local host"
 * )
 *
 * @OA\Tag(
 *     name="Articles",
 *     description="Methods for Articles"
 * )
 *
 * @OA\Tag(
 *     name="Projects",
 *     description="Methods for Projects"
 * )
 */
class Controller extends BaseController
{

}
