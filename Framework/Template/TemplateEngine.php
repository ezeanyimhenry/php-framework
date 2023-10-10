<?php
namespace Framework\Template;

class TemplateEngine
{
    private $data = [];

    public function assign($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function render($template_name, $data)
    {
        foreach ($data as $key => $value) {
            $this->assign($key, $value);
        }
        $path = $template_name . '.php';
        if (file_exists($path)) {
            $content = file_get_contents($path);

            $content = $this->replacePlaceholders($content, $this->data);
            $content = $this->replaceIfStatement($content);

            eval('?>' . $content . '<?php');
        } else {
            throw new \Exception("Template file not found: $path");
        }
    }

    private function replacePlaceholders($template, $data)
    {
        foreach ($data as $key => $value) {
            if ($value === null) {
                continue; // Skip null values
            }

            if (is_array($value)) {
                // Recursively replace placeholders within nested arrays
                $nestedPlaceholders = [];
                foreach ($value as $nestedKey => $nestedValue) {
                    $nestedPlaceholders[$key . '.' . $nestedKey] = $nestedValue;
                }
                $template = $this->replacePlaceholders($template, $nestedPlaceholders);
            } else {
                $template = preg_replace('/\{\{\s' . $key . '\s\}\}/', $value, $template);
            }
        }
        return $template;
    }

    private function replaceIfStatement($template)
{

    $template = preg_replace('/\@if\((.*?)\)/', '<?php if ($1) : ?>', $template);
    $template = preg_replace('/\@else/', '<?php else : ?>', $template);
    $template = preg_replace('/\@endif/', '<?php endif; ?>', $template);

    return $template;
}

private function replaceForEachStatement($template, $data)
{
$template = $this->replacePlaceholders($template, $data);

$template = preg_replace('/\@if\((.*?)\)/', '<?php if ($1) : ?>', $template);
$template = preg_replace('/\@else/', '<?php else : ?>', $template);
$template = preg_replace('/\@endif/', '<?php endif; ?>', $template);

return $template;
}

}