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

/* email_template_create_process.template.php */
class __TwigTemplate_96aa317120b37659e4653346bf013035320ab37785eda165b6e1799cba0b44b5 extends Template
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

";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["createFields"] ?? null));
        foreach ($context['_seq'] as $context["fieldname"] => $context["type"]) {
            // line 17
            if (twig_in_filter($context["fieldname"], twig_get_array_keys_filter(($context["fields"] ?? null)))) {
                // line 18
                $context["foo"] = (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["fields"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[$context["fieldname"]] ?? null) : null);
                // line 19
                if (twig_in_filter("BOOLEAN", twig_upper_filter($this->env, ($context["foo"] ?? null)))) {
                    // line 20
                    echo "        if(isset(\$post['";
                    echo twig_escape_filter($this->env, $context["fieldname"], "html", null, true);
                    echo "']))
            \$";
                    // line 21
                    echo twig_escape_filter($this->env, ($context["singleObjectVariableName"] ?? null), "html", null, true);
                    echo "->";
                    echo twig_escape_filter($this->env, $context["fieldname"], "html", null, true);
                    echo " = (\$post[\"";
                    echo twig_escape_filter($this->env, $context["fieldname"], "html", null, true);
                    echo "\"]==\"on\");
        else
            \$";
                    // line 23
                    echo twig_escape_filter($this->env, ($context["singleObjectVariableName"] ?? null), "html", null, true);
                    echo "->";
                    echo twig_escape_filter($this->env, $context["fieldname"], "html", null, true);
                    echo " = false;
";
                } else {
                    // line 25
                    echo "        \$";
                    echo twig_escape_filter($this->env, ($context["singleObjectVariableName"] ?? null), "html", null, true);
                    echo "->";
                    echo twig_escape_filter($this->env, $context["fieldname"], "html", null, true);
                    echo " = \$post[\"";
                    echo twig_escape_filter($this->env, $context["fieldname"], "html", null, true);
                    echo "\"];
";
                }
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['fieldname'], $context['type'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "        
        
        
                
//        \$discount->import(\$post);
        
        \$errors = \$";
        // line 35
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
        // line 47
        echo twig_escape_filter($this->env, ($context["validationTAG"] ?? null), "html", null, true);
        echo "\",\$errors);
            
//            send(\"discount_create_view.php\");
//            var_dump(\$_SESSION);
//            exit;
        }else{
        
        echo \"Creating ";
        // line 54
        echo twig_escape_filter($this->env, ($context["nameForMessages"] ?? null), "html", null, true);
        echo "!!<br>\";
//            \$active= (\$active==\"on\"?1:0);
            
           \$id = \$";
        // line 57
        echo twig_escape_filter($this->env, ($context["singleObjectVariableName"] ?? null), "html", null, true);
        echo "->save();
            
            
           setSuccess(\"Created new ";
        // line 60
        echo twig_escape_filter($this->env, ($context["nameForMessages"] ?? null), "html", null, true);
        echo " Nº \" . \$";
        echo twig_escape_filter($this->env, ($context["singleObjectVariableName"] ?? null), "html", null, true);
        echo "->id); 
           send(\"";
        // line 61
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
        // line 70
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
        return "email_template_create_process.template.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  171 => 70,  159 => 61,  153 => 60,  147 => 57,  141 => 54,  131 => 47,  116 => 35,  108 => 29,  93 => 25,  86 => 23,  77 => 21,  72 => 20,  70 => 19,  68 => 18,  66 => 17,  62 => 16,  55 => 14,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "email_template_create_process.template.php", "C:\\xampp\\htdocs\\myboxsystem\\admin\\templates\\crud\\email_template_create_process.template.php");
    }
}
