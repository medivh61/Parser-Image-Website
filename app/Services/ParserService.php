<?php

namespace App\Services;

use Symfony\Component\DomCrawler\Crawler;

class ParserService implements ParserServiceContract
{
    private $images;
    private $countSizeImage = 0;
    private $countAmountImage = 0;

    private $url;

    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    public function getData()
    {
        return [
            'url' => $this->url,
            'images' => $this->images,
            'countSizeImage' => $this->countSizeImage,
            'countAmountImage' => $this->countAmountImage,
        ];
    }

    public function setCount()
    {
        $this->countSizeImage = $this->getSizeImage();
        $this->countAmountImage = $this->getAmountImage();

        return $this;
    }

    //Парсим изображения с сайта
    public function setImagesFromURL()
    {
        try {
            $html = file_get_contents($this->url);
            $crawler = new Crawler($html);

            //Получаем иображения со страницы сайта
            $baseUrl = $this->getBaseUrl($this->url);
            $images = $crawler->filter('img')->each(function (Crawler $node) use ($baseUrl) {
                $imageUrl = $node->attr('src');
                $imageUrl = $this->getAbsoluteURL($imageUrl, $baseUrl);
                return $imageUrl;
            });

            //Отфильтровываем изображения с указанными разрешениями
            $this->images = array_filter($images, function ($image) {
                $extension = pathinfo(parse_url($image, PHP_URL_PATH), PATHINFO_EXTENSION);
                return in_array($extension, ['jpg', 'jpeg', 'png', 'gif']);
            });
            return $this;
        } catch (\Exception $e) {
            abort(403);
        }

    }

    //Возвращаем полный базовый URL
    public function getBaseUrl($baseUrl)
    {
        $url = parse_url($baseUrl);
        return $url['scheme'] . "://" . $url['host'];
    }

    //Проверка относительного URL-адреса
    public function getAbsoluteURL($relativeUrl, $baseUrl)
    {
        if (strpos($relativeUrl, 'http') === 0) {
            return $relativeUrl;
        }
        return $baseUrl . '' . $relativeUrl;
    }

    //Получаем размер изобржаений
    public function getSizeImage()
    {
        $totalSizeBytes = 0;
        foreach ($this->images as $image_url) {
            $headers = get_headers($image_url, true);
            $totalSizeBytes += $headers['Content-Length'];
        }
        return round($totalSizeBytes / (1024 * 1024), 2);
    }

    //Получаем количество изображений
    public function getAmountImage()
    {
        return count($this->images);
    }
}
