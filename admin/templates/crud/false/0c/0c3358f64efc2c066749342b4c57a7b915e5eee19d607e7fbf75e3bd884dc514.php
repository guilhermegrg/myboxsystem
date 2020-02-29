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

/* email_template_create_process.template.php2 */
class __TwigTemplate_5f0ed6101709d303ab5ef14a96ee30222a73ec48fc8c144b4d4e9499a6842493 extends Template
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
<?php include \"models/";
        // line 2
        echo twig_escape_filter($this->env, ($context["className"] ?? null), "html", null, true);
        echo ".php\"; ?>


<?php

    
    if(isset(\$_POST[\"create\"])){
//        echo \"post!\";
        
        \$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//        var_dump(\$post);
        
        \$";
        // line 14
        echo twig_escape_filter($this->env, ($context["singleObjectVariableName"] ?? null), "html", null, true);
        echo " = new ";
        echo twig_escape_filter($this->env, ($context["className"] ?? null), "html", null, true);
        echo "();
        ladil láaa
        ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["fields"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["fieldname"]) {
            // line 17
            echo "        \$";
            echo twig_escape_filter($this->env, ($context["singleObjectVariableName"] ?? null), "html", null, true);
            echo "->";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fieldname"], "key", [], "any", false, false, false, 17), "html", null, true);
            echo " = \$post[\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fieldname"], "key", [], "any", false, false, false, 17), "html", null, true);
            echo "\"];
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['fieldname'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "        
        
//        \$";
        // line 21
        echo twig_escape_filter($this->env, ($context["singleObjectVariableName"] ?? null), "html", null, true);
        echo "->name = \$post[\"name\"];
//        \$";
        // line 22
        echo twig_escape_filter($this->env, ($context["singleObjectVariableName"] ?? null), "html", null, true);
        echo "->title = \$post[\"title\"];
//        \$";
        // line 23
        echo twig_escape_filter($this->env, ($context["singleObjectVariableName"] ?? null), "html", null, true);
        echo "->content = \$post[\"content\"];
        
//        if(isset(\$post['active']))
//            \$paymentMethod->active = (\$post[\"active\"]==\"on\");
//        else
//            \$paymentMethod->active = false;
        
        
                
//        \$discount->import(\$post);
        
        \$errors = \$";
        // line 34
        echo twig_escape_filter($this->env, ($context["singleObjectVariableName"] ?? null), "html", null, true);
        echo "->validate();
        
//        echo \"<br><br><pre>\";
//        var_dump(\$errors);
//        echo \"</pre><br><br>\";


        
        if(!empty(\$errors))
        {
//            echo \"sending back to form to revalidate!<br>\";
            setError(\"Please correct the form and submit again\");
            setFormValidation(\"";
        // line 46
        echo twig_escape_filter($this->env, ($context["validationTAG"] ?? null), "html", null, true);
        echo "\",\$errors);
            
//            send(\"discount_create_view.php\");
//            var_dump(\$_SESSION);
//            exit;
        }else{
        
        echo \"Creating ";
        // line 53
        echo twig_escape_filter($this->env, ($context["nameForMessages"] ?? null), "html", null, true);
        echo "!!<br>\";
//            \$active= (\$active==\"on\"?1:0);
            
            \$";
        // line 56
        echo twig_escape_filter($this->env, ($context["singleObjectVariableName"] ?? null), "html", null, true);
        echo "->save();
            
            
           setSuccess(\"Created new ";
        // line 59
        echo twig_escape_filter($this->env, ($context["nameForMessages"] ?? null), "html", null, true);
        echo " Nº \" . \$id); 
           send(\"";
        // line 60
        echo twig_escape_filter($this->env, ($context["filePrefix"] ?? null), "html", null, true);
        echo "_read_list_view.php\"); 
            exit;
        }
        
    }else{
//        echo \"No POST!<br>\";
//         \$name=\"\";
//    \$value=\"\";
//    \$active=\"off\";
        \$";
        // line 69
        echo twig_escape_filter($this->env, ($context["singleObjectVariableName"] ?? null), "html", null, true);
        echo " = new ";
        echo twig_escape_filter($this->env, ($context["className"] ?? null), "html", null, true);
        echo "();
    }
//echo \"hello!\";

//echo \"name: \" . \$name;
//echo \"value: \" . \$value;
//echo \"active: \". \$active;
    
    
    ?>

";
    }

    public function getTemplateName()
    {
        return "email_template_create_process.template.php2";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  158 => 69,  146 => 60,  142 => 59,  136 => 56,  130 => 53,  120 => 46,  105 => 34,  91 => 23,  87 => 22,  83 => 21,  79 => 19,  66 => 17,  62 => 16,  55 => 14,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "email_template_create_process.template.php2", "C:\\xampp\\htdocs\\myboxsystem\\admin\\templates\\crud\\email_template_create_process.template.php2");
    }
}
