<?php

namespace App\DTO;

use Illuminate\Http\Request;

class PostForm
{
    public string $title;
    public string $preview;
    public string $description;

    public function __construct(string $title, string $preview, string $description)
    {
        $this->setTitle($title);
        $this->setPreview($preview);
        $this->setDescription($description);
    }

    private function setTitle(string $title)
    {
        $this->title = $title;
    }

    private function setPreview(string $preview)
    {
        $this->preview = $preview;
    }

    private function setDescription(string $description)
    {
        $this->description = $description;
    }

    public static function formRequest(Request $request): PostForm
    {
        return new static(
            $request->get('title'),
            $request->get('preview'),
            $request->get('description'),
        );

    }


}
