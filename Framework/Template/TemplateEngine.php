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
            $content = $this->replaceForEachStatement($content, $this->data);

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
                // Handle nested arrays and placeholders recursively
                $nestedTemplate = $template;
                foreach ($value as $nestedKey => $nestedValue) {
                    $nestedPlaceholder = $key . '.' . $nestedKey;
                    $nestedTemplate = $this->replacePlaceholders($nestedTemplate, [$nestedPlaceholder => $nestedValue]);
                }
                $template = $nestedTemplate;
            } else {
                // Replace placeholders in the template
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
        // Define a regular expression pattern for @foreach directive
        $pattern = '/@foreach\((.*?)\s+as\s+(\$?\w+)\)(.*?)@endforeach/s';
    
        // Define a callback function to process the @foreach directive
        $callback = function ($matches) use ($data) {
            $arrayExpression = $data[$matches[1]]; // Extract the array expression
            $itemVariable = $matches[2]; // Extract the item variable
            $content = $matches[3]; // Extract the loop content
        
            $array = $arrayExpression;
        
            $result = '';
        
            if (is_array($array)) {
                for ($i=0; $i < count($array); $i++) {
                    $itemContent = str_replace($itemVariable, $matches[1].'.'.$i, $content);
                    // Replace placeholders within the loop content
                    $itemContent = $this->replacePlaceholders($itemContent, $data);
                    $result .= $itemContent;
                }
            }
            return $result;
        };        
        // Use preg_replace_callback to replace @foreach directives
        return preg_replace_callback($pattern, $callback, $template);
    }
    



}