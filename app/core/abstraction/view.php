<?php
class View
{
    private $template_view = 'TemplateView.php';

    function generate($content_view, $data = null)
    {
        include 'app/views/'.$this->template_view;
    }
}
