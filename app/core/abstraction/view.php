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
        if (file_exists("app/" . $this->role . "//views/" . $this->template_view)) {
            include "app/" . $this->role . "//views/" . $this->template_view;
        } else {
            include "app/views/" . $this->template_view;
        }
    }

    public static function redirect($url)
    {
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/' . $url);
        exit;
    }
}
