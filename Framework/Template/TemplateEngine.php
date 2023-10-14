<?php
namespace Framework\Template;

use Framework\Exceptions\NotFoundException;

class TemplateEngine
{
    private $data = [];
    private $sections = [];

    public function assign($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function render($template_name, $data)
    {
        foreach ($data as $key => $value) {
            $this->assign($key, $value);
        }

        // Get the content of the main template
        $content = $this->renderTemplate($template_name);

        // Extract the layout template name using a regular expression
        preg_match('/@extend\(\'(.*?)\'\)/', $content, $extendMatch);
        if (!empty($extendMatch)) {
            $layout_template_name = $extendMatch[1];
        } else {
            // Set a default layout template name if @extend is not specified
            $layout_template_name = 'layout/default_layout';
        }

        // Render the layout template
        $layoutContent = $this->renderTemplate($layout_template_name);

        // Replace the @extend directive with an empty string
        $content = preg_replace('/@extend\(.*?\)/', '', $content);

        // Extract sections and replace placeholders with section content
        preg_match_all('/@section\(\'(.*?)\'\)(.*?)@endsection/s', $content, $sections, PREG_SET_ORDER);
        foreach ($sections as $section) {
            $sectionName = $section[1];
            $sectionContent = trim($section[2]);
            $layoutContent = str_replace("@yield('$sectionName')", $sectionContent, $layoutContent);
        }
        // Output the final layout with the main content and sections
        echo $layoutContent;
    }






    private function renderTemplate($template_name)
    {
        $path = VIEWS_URL . $template_name . '.php';

        if (file_exists($path)) {
            $content = file_get_contents($path);

            $content = $this->replacePlaceholders($content, $this->data);
            $content = $this->replaceIfStatement($content);
            $content = $this->replaceForEachStatement($content, $this->data);

            ob_start();
            eval('?>' . $content);
            $content = ob_get_clean();

            return $content;
        } else {
            throw new NotFoundException("Template file not found: $path");
        }
    }


    private function replacePlaceholders($template, $data, $functionName = '')
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
                // Handle custom template functions
                $pattern = '/\{\{\s*([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\(' . $key . '\)\s*\}\}/';
                if (preg_match($pattern, $template, $matches)) {
                    $functionName = $matches[1];
                    $newPattern = '{{ ' . $key . ' }}';
                    $template = preg_replace($pattern, $newPattern, $template);
                    $template = $this->replacePlaceholders($template, [$key => $value], $functionName);
                } else {
                    // Replace placeholders in the template
                    if ($functionName != '') {
                        $functionResult = $this->callCustomFunction($functionName, $value);
                        $template = preg_replace('/\{\{\s*' . $key . '\s*\}\}/', $functionResult, $template);
                    } else {
                        $template = preg_replace('/\{\{\s*' . $key . '\s*\}\}/', $value, $template);
                    }

                }
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
                for ($i = 0; $i < count($array); $i++) {
                    $itemContent = str_replace($itemVariable, $matches[1] . '.' . $i, $content);
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

    // Custom function handler
    private function callCustomFunction($functionName, $functionArgs)
    {
        // Define your custom template functions
        if ($functionName === 'ucfirst') {
            // Example: Handle ucfirst function
            $args = $this->parseFunctionArgs($functionArgs);
            return ucfirst($args);
        } elseif ($functionName === 'strtolower') {
            // Handle strtolower function
            $args = $this->parseFunctionArgs($functionArgs);
            return strtolower($args);
        } elseif ($functionName === 'strtoupper') {
            // Handle strtoupper function
            $args = $this->parseFunctionArgs($functionArgs);
            return strtoupper($args);
        } elseif ($functionName === 'strlen') {
            // Handle strlen function
            $args = $this->parseFunctionArgs($functionArgs);
            return strlen($args);
        }

        // Add more custom functions as needed

        return ''; // Default to an empty string if the function is not defined
    }

    // Helper function to parse function arguments
    private function parseFunctionArgs($args)
    {
        // Implement your own logic to parse function arguments if needed
        return $args;
    }




}