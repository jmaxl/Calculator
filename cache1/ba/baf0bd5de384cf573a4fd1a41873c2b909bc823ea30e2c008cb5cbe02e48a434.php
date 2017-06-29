<?php

/* basic.twig */
class __TwigTemplate_0905b6fbf4169238523c01726729e78642e6a0a20b091acd25921b0820dfd513 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <title>Finanzielle Freiheit Rechner</title>
</head>
<body>
";
        // line 7
        echo twig_escape_filter($this->env, ($context["variable"] ?? null), "html", null, true);
        echo "
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "basic.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 7,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "basic.twig", "C:\\xampp\\htdocs\\calculator\\templates\\basic.twig");
    }
}
