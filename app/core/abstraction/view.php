<?php
class View
{
    protected $template_view = 'TemplateView.php';
    private $role;

    public function __construct($role = '')
    {
        $this->role = $role;
    }

    function generate($content_view, $data = NULL)
    {
        include "app/" . $this->role . "views/" . $this->template_view;
    }
}
