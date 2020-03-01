<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* simpleBooleanField.php */
class __TwigTemplate_2fe8b2915f9c50dcc88de95043d3ac65423222fdce38626daf77c52ab2eea11e extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "    <div class=\"form-group form-check\">
        <input type=\"checkbox\" class=\"form-check-input\" name=\"";
        // line 2
        echo twig_escape_filter($this->env, ($context["fieldName"] ?? null), "html", null, true);
        echo "\" <?php  echo \$";
        echo twig_escape_filter($this->env, ($context["singleObjectVariableName"] ?? null), "html", null, true);
        echo "->";
        echo twig_escape_filter($this->env, ($context["fieldName"] ?? null), "html", null, true);
        echo "? \"checked\":\"\";?>>
        <label for=\"";
        // line 3
        echo twig_escape_filter($this->env, ($context["fieldName"] ?? null), "html", null, true);
        echo "\" class=\"form-check-label\" >";
        echo twig_escape_filter($this->env, ($context["formFieldName"] ?? null), "html", null, true);
        echo ":</label>
    </div>";
    }

    public function getTemplateName()
    {
        return "simpleBooleanField.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "simpleBooleanField.php", "C:\\xampp\\htdocs\\myboxsystem\\admin\\templates\\crud\\simpleBooleanField.php");
    }
}
