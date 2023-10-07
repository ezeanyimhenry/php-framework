<?php
namespace Framework\Template;

class TemplateEngine {
    private $data = [];

    public function __construct($data = []) {
        $this->data = $data;
    }

    // Function to replace placeholders with values in the template
    private function replacePlaceholders($template, $data) {
        // Use a regular expression to find placeholders like {{ variable }}
        $pattern = '/{{\s*(.*?)\s*}}/';
        $callback = function ($matches) use ($data) {
            $placeholder = $matches[1];
            return $data[$placeholder] ?? '';
        };
        return preg_replace_callback($pattern, $callback, $template);
    }

    public function render($templateFile, $contentPage = '', array $data = []) {
        if (file_exists($templateFile)) {
            ob_start();
            extract($data);
            
            if (!empty($contentPage) && file_exists($contentPage)) {
                // Load and replace placeholders in the content page
                $content = file_get_contents($contentPage);
                $content = $this->replacePlaceholders($content, $data);
                echo $content;
            }
            
            include $templateFile;
            return ob_get_clean();
        } else {
            throw new \Exception("Template file not found: $templateFile");
        }
    }
}
