<?php

namespace App\Http\Controllers\Api\User\Content;

use App\Models\Content;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\User\Content\ContentRepositories;
use App\Http\Traits\ApiResponse;

class ContentController extends Controller
{
    use ApiResponse;

    private $contentRepository;

    public function __construct(ContentRepositories $contentRepository)
    {
        $this->contentRepository = $contentRepository;
    }

    public function __invoke()
    {
        $cate = $this->contentRepository->index();

        return response()->json([
            'status' => 1,
            'message' => 'Success',
            'data' => $cate
        ]);
    }
}