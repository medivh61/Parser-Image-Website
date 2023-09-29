<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParserRequest;
use App\Services\ParserServiceContract;
use Illuminate\Http\Request;

class ImageParserController extends Controller
{

    private $parserService;

    public function __construct(ParserServiceContract $parserService)
    {
        $this->parserService = $parserService;
    }


    public function index()
    {
        return view('parser.index');
    }

    public function parse(ParserRequest $request)
    {
        $url = $request->validated();

        $data = $this->parserService
            ->setUrl($url['url'])
            ->setImagesFromURL()
            ->setCount()
            ->getData();

        return view('parser.result', compact('data'));
    }
}


