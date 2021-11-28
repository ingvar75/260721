<?php

namespace components;

use app\views\dto\AbstractViewDTO;

class Template
{
    private string $templatesDir;
    private string $layoutsDir;
    private string $defaultLayout;
    private string $extension;
    private string $notFoundTemplate;

    private string $content = '';
    private ?AbstractViewDTO $variables = null;

    public function __construct(
        string $templatesDir,
        string $layoutsDir,
        string $defaultLayout,
        string $extension,
        string $notFoundTemplate
    ) {
        $this->templatesDir = $templatesDir;
        $this->layoutsDir = $layoutsDir;
        $this->defaultLayout = $defaultLayout;
        $this->extension = $extension;
        $this->notFoundTemplate = $notFoundTemplate;
    }

    public function render(string $template, ?AbstractViewDTO $variables = null, ?string $layout = null): string
    {
        $this->variables = $variables;

        $templateRout = "{$this->templatesDir}/{$template}.{$this->extension}";
        $this->content = $this->requireFile($templateRout);

        $layout = $layout ?: $this->defaultLayout;
        $layoutRout = "{$this->layoutsDir}/{$layout}.{$this->extension}";
        return $this->requireFile($layoutRout);
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getVariables(): ?AbstractViewDTO
    {
        return $this->variables;
    }

    public function render404(?AbstractViewDTO $variables = null, ?string $layout = null): string
    {
        return $this->render($this->notFoundTemplate, $variables, $layout);
    }

    private function requireFile(string $rout): string
    {
        ob_start();
        require($rout);
        return ob_get_clean();
    }
}