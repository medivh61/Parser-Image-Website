<?php

namespace App\Services;

interface ParserServiceContract
{
    public function setUrl($url);
    public function getData();
    public function setCount();
    public function setImagesFromURL();
    public function getBaseUrl($baseUrl);
    public function getAbsoluteURL($relativeUrl, $baseUrl);
    public function getSizeImage();
    public function getAmountImage();
}
