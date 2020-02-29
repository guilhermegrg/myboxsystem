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

/* simpleTextField.php */
class __TwigTemplate_b8f4115989bc61b32d63dca7786e2218bb8d44a9ce6e36ae4f7562ed2def3ff1 extends Template
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
        echo "<div class=\"form-group\">
        <label for=\"";
        // line 2
        echo twig_escape_filter($this->env, ($context["fieldName"] ?? null), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, ($context["formFieldName"] ?? null), "html", null, true);
        echo ":</label>
        <input type=\"text\" class=\"form-control <?php echo isValid(\"";
        // line 3
        echo twig_escape_filter($this->env, ($context["validationTAG"] ?? null), "html", null, true);
        echo "\",\"";
        echo twig_escape_filter($this->env, ($context["fieldName"] ?? null), "html", null, true);
        echo "\")?\"\":\"is-invalid\";?>\" name=\"";
        echo twig_escape_filter($this->env, ($context["fieldName"] ?? null), "html", null, true);
        echo "\" placeholder=\"Enter the ";
        echo twig_escape_filter($this->env, ($context["fieldName"] ?? null), "html", null, true);
        echo "\" value=\"<?php echo \$";
        echo twig_escape_filter($this->env, ($context["singleObjectVariableName"] ?? null), "html", null, true);
        echo "->";
        echo twig_escape_filter($this->env, ($context["fieldName"] ?? null), "html", null, true);
        echo "; ?>\" <?php echo ";
        echo twig_escape_filter($this->env, ($context["className"] ?? null), "html", null, true);
        echo "::getHTMLValidationRule(\"";
        echo twig_escape_filter($this->env, ($context["fieldName"] ?? null), "html", null, true);
        echo "\"); ?> >
        <div class=\"invalid-feedback\">
          <?php echo getFormValidationField(\"";
        // line 5
        echo twig_escape_filter($this->env, ($context["validationTAG"] ?? null), "html", null, true);
        echo "\",\"";
        echo twig_escape_filter($this->env, ($context["fieldName"] ?? null), "html", null, true);
        echo "\"); ?>
        </div>
</div>";
    }

    public function getTemplateName()
    {
        return "simpleTextField.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 5,  46 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "simpleTextField.php", "C:\\xampp\\htdocs\\myboxsystem\\admin\\templates\\crud\\simpleTextField.php");
    }
}
