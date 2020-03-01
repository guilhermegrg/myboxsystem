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

/* email_template_create_view.template.php */
class __TwigTemplate_06fcfe6a8777c1c2646ac175754c43f6394fda00fc698cc81355802cffa341f1 extends Template
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
        echo "
<?php include_once(\"../includes/functions.php\") ?>

<?php include \"admin-header.php\"; ?>

<?php

include \"";
        // line 8
        echo twig_escape_filter($this->env, ($context["filePrefix"] ?? null), "html", null, true);
        echo "_create_process.php\";
                          

//var_dump(\$discount);

//var_dump(\$_SESSION);
//echo \"active: \" . \$active;

//echo \"Errors: \" . getFormValidationField(\"DISCOUNT\",\"name\"); 

//\$vals = Discount::getValidations();
//var_dump(\$vals);
//
//\$rule = Discount::getHTMLValidationRule(\"name\");
//var_dump(\$rule);
?>
 
 <h4>Create ";
        // line 25
        echo twig_escape_filter($this->env, ($context["nameForMessages"] ?? null), "html", null, true);
        echo "</h4>
 
  
    <?php displayMessages(); ?>
<?php 



//\$val = \$discount->getHTMLValidation(\"name\");
//var_dump(\$val);

//->getHTMLValidation();

?>
  

  <form action=\"";
        // line 41
        echo twig_escape_filter($this->env, ($context["filePrefix"] ?? null), "html", null, true);
        echo "_create_view.php\" method=\"post\" >
   
    ";
        // line 43
        echo twig_include($this->env, $context, "htmlFormTemplate.php");
        echo "
    
    <div class=\"form-group\">
        <a href=\"";
        // line 46
        echo twig_escape_filter($this->env, ($context["filePrefix"] ?? null), "html", null, true);
        echo "_read_list_view.php\" class=\"btn btn-secondary text-white\">Cancel</a>
        <input type=\"submit\" class=\"btn btn-primary\" name=\"create\" value=\"Create\">
    </div>

    
</form>   
              
       
<?php cleanFormValidation(\"";
        // line 54
        echo twig_escape_filter($this->env, ($context["validationTAG"] ?? null), "html", null, true);
        echo "\"); ?>

    
<?php include \"admin-footer.php\"; ?>";
    }

    public function getTemplateName()
    {
        return "email_template_create_view.template.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 54,  96 => 46,  90 => 43,  85 => 41,  66 => 25,  46 => 8,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "email_template_create_view.template.php", "C:\\xampp\\htdocs\\myboxsystem\\admin\\templates\\crud\\email_template_create_view.template.php");
    }
}
