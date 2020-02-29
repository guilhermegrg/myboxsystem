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

/* email_template_edit_view.template.php */
class __TwigTemplate_b461d76b83b2ffa81c0816d6169f5f62605604f3f1e9ee1e39f1993593347af2 extends Template
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
        echo "_edit_process.php\";
                          

//var_dump(\$_SESSION);
//echo \"active: \" . \$active;
?>

<h4>Edit ";
        // line 15
        echo twig_escape_filter($this->env, ($context["nameForMessages"] ?? null), "html", null, true);
        echo "</h4>

  <?php displayMessages(); ?>

    

  <form action=\"";
        // line 21
        echo twig_escape_filter($this->env, ($context["filePrefix"] ?? null), "html", null, true);
        echo "_edit_view.php\" method=\"post\" >
   
   
   <div class=\"form-group\">
        <label for=\"name\">Id:</label>
        <input type=\"text\" class=\"form-control\" name=\"id\" value=\"<?php echo \$";
        // line 26
        echo twig_escape_filter($this->env, ($context["singleObjectVariableName"] ?? null), "html", null, true);
        echo "->id; ?>\" readonly>
    </div>
   
   
     ";
        // line 30
        echo twig_include($this->env, $context, "htmlFormTemplate.php");
        echo "
    
    <div class=\"form-group\">
       <a href=\"";
        // line 33
        echo twig_escape_filter($this->env, ($context["filePrefix"] ?? null), "html", null, true);
        echo "_read_list_view.php\" class=\"btn btn-secondary text-white\">Cancel</a>
        <input type=\"submit\" class=\"btn btn-primary\" name=\"edit\" value=\"Save\">
    </div>

    
</form>   
              
       
<?php cleanFormValidation(\"";
        // line 41
        echo twig_escape_filter($this->env, ($context["validationTAG"] ?? null), "html", null, true);
        echo "\"); ?>
   

    
    
<?php include \"admin-footer.php\"; ?>";
    }

    public function getTemplateName()
    {
        return "email_template_edit_view.template.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 41,  86 => 33,  80 => 30,  73 => 26,  65 => 21,  56 => 15,  46 => 8,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "email_template_edit_view.template.php", "C:\\xampp\\htdocs\\myboxsystem\\admin\\templates\\crud\\email_template_edit_view.template.php");
    }
}
