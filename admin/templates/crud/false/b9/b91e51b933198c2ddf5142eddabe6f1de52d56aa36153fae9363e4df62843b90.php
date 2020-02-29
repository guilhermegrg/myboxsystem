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

/* email_template_edit_process.template.php */
class __TwigTemplate_1b06888bcaf329637013bef00e98e69c44a50ed0c08ccbd3dacdf0b81817cc65 extends Template
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
        echo "<?php include \"models/";
        echo twig_escape_filter($this->env, ($context["className"] ?? null), "html", null, true);
        echo ".php\"; ?>



<?php
    
    if(isset(\$_POST[\"edit\"])){
//        echo \"post!\";
        
        \$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//        var_dump(\$post);
        
        \$";
        // line 13
        echo twig_escape_filter($this->env, ($context["singleObjectVariableName"] ?? null), "html", null, true);
        echo " = new ";
        echo twig_escape_filter($this->env, ($context["className"] ?? null), "html", null, true);
        echo "();
        
        ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["fields"] ?? null));
        foreach ($context['_seq'] as $context["fieldname"] => $context["type"]) {
            // line 16
            echo "\$";
            echo twig_escape_filter($this->env, ($context["singleObjectVariableName"] ?? null), "html", null, true);
            echo "->";
            echo twig_escape_filter($this->env, $context["fieldname"], "html", null, true);
            echo " = \$post[\"";
            echo twig_escape_filter($this->env, $context["fieldname"], "html", null, true);
            echo "\"];
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['fieldname'], $context['type'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "        
//        \$id = \$post[\"id\"];
//        \$name = \$post[\"name\"];
//        \$title = \$post[\"title\"];
//        \$content = \$post[\"content\"];
        
        
        
        
//        if(isset(\$post['active']))
//            \$paymentMethod->active = (\$post[\"active\"] == \"on\");
//        else
//            \$paymentMethod->active = false;

        
        
        \$errors = \$";
        // line 34
        echo twig_escape_filter($this->env, ($context["singleObjectVariableName"] ?? null), "html", null, true);
        echo "->validate();
 

        
        //todo check for uniqueness of name
        
//        var_dump(\$discount);


        
        if(!empty(\$errors))
        {
            
            setError(\"Please correct the form and submit again\");
            setFormValidation(\"";
        // line 48
        echo twig_escape_filter($this->env, ($context["validationTAG"] ?? null), "html", null, true);
        echo "\",\$errors);
            
//            send(\"discount_create_view.php\");
//            var_dump(\$_SESSION);
//            exit;
        }else{
        
//         echo \"active: \$active<br>\";
//        \$input_active= (\$active==\"on\"?1:0);
//             echo \"active 4: \$active<br>\";
            \$";
        // line 58
        echo twig_escape_filter($this->env, ($context["singleObjectVariableName"] ?? null), "html", null, true);
        echo "->save();
//           cleanFormValues(\"DISCOUNT\");
            
           setSuccess(\"Updated ";
        // line 61
        echo twig_escape_filter($this->env, ($context["nameForMessages"] ?? null), "html", null, true);
        echo " Nº \" . \$id); 
           send(\"";
        // line 62
        echo twig_escape_filter($this->env, ($context["filePrefix"] ?? null), "html", null, true);
        echo "_read_list_view.php\"); 
            exit;
        }
        
    }elseif(isset(\$_GET[\"edit\"])){
        \$get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        \$id = \$get[\"edit\"];
        
        if(!is_numeric(\$id)){
            send(\"";
        // line 71
        echo twig_escape_filter($this->env, ($context["filePrefix"] ?? null), "html", null, true);
        echo "_read_list_view.php\");
            exit;
        }
        else
        if(\$id<=0){
            send(\"";
        // line 76
        echo twig_escape_filter($this->env, ($context["filePrefix"] ?? null), "html", null, true);
        echo "_read_list_view.php\");
            exit;
        }
        
        
        //load values from db
        \$";
        // line 82
        echo twig_escape_filter($this->env, ($context["singleObjectVariableName"] ?? null), "html", null, true);
        echo " = ";
        echo twig_escape_filter($this->env, ($context["className"] ?? null), "html", null, true);
        echo "::get(\$id);
//        \$name = \$discount[\"name\"];
//        \$value = \$discount[\"value\"];
//        \$active = \$discount[\"active\"];
//        
////         echo \"active 2: \$active<br>\";
//        \$active = (\$active == 1?\"on\":\"off\");
//         echo \"active 3: \$active<br>\";
    }
    

//echo \"name: \" . \$name;
//echo \"value: \" . \$value;
//echo \"active: \". \$active;
    
    
    ?>

";
    }

    public function getTemplateName()
    {
        return "email_template_edit_process.template.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  164 => 82,  155 => 76,  147 => 71,  135 => 62,  131 => 61,  125 => 58,  112 => 48,  95 => 34,  77 => 18,  64 => 16,  60 => 15,  53 => 13,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "email_template_edit_process.template.php", "C:\\xampp\\htdocs\\myboxsystem\\admin\\templates\\crud\\email_template_edit_process.template.php");
    }
}
