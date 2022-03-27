<?php
class View
{
    private $template_view = 'TemplateView.php';

    function generate($content_view, $data = NULL)
    {
        include 'app/views/'.$this->template_view;
    }
}
