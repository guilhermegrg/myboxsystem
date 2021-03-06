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

/* email_template_read_list_view.template.php */
class __TwigTemplate_f03c41349a19700b95f019faa17a60168821576846958248c277ce118d4db11b extends Template
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

<?php include \"models/";
        // line 4
        echo twig_escape_filter($this->env, ($context["className"] ?? null), "html", null, true);
        echo ".php\"; ?>

<?php include \"admin-header.php\"; ?>


   
   <?php 

    
    if(isset(\$_GET[\"delete\"]))
    {
        \$get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        \$deleteID = \$get[\"delete\"];
        
        if(is_numeric(\$deleteID))
        {
            ";
        // line 20
        echo twig_escape_filter($this->env, ($context["className"] ?? null), "html", null, true);
        echo "::delete(\$deleteID);
            setSuccess(\"Deleted an ";
        // line 21
        echo twig_escape_filter($this->env, ($context["nameForMessages"] ?? null), "html", null, true);
        echo "\");
//            echo \"Deleted a discount!<br>\";
            send(\"";
        // line 23
        echo twig_escape_filter($this->env, ($context["filePrefix"] ?? null), "html", null, true);
        echo "_read_list_view.php\");
        }
    }
    

?>
   
   
   <!-- Modal -->
<div class=\"modal fade\" id=\"staticBackdrop\" data-backdrop=\"static\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"staticBackdropLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog\" role=\"document\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\" id=\"staticBackdropLabel\">Confirm delete</h5>
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span>
        </button>
      </div>
      <div class=\"modal-body\">
        Are you sure you want to delete this ";
        // line 42
        echo twig_escape_filter($this->env, ($context["nameForMessages"] ?? null), "html", null, true);
        echo "? This is definitive and Errors may occur!
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Cancel</button>
        <a id=\"deleteLink\" class=\"btn btn-danger text-white\" >Delete!</a>
      </div>
    </div>
  </div>
</div>
   
   
<h4>";
        // line 53
        echo twig_escape_filter($this->env, ($context["listPageTitle"] ?? null), "html", null, true);
        echo "</h4>
       
     <?php displayMessages(); ?>
   
   <?php  include \"pagination.php\"; ?>
<!--   <div class=\"container\">-->
   <div class=\"row\">
   <div class=\"col mr-auto\">
   <?php   

        \$totalPages = ";
        // line 63
        echo twig_escape_filter($this->env, ($context["className"] ?? null), "html", null, true);
        echo "::getTotalPages();

        \$page = Pagination::show(\"";
        // line 65
        echo twig_escape_filter($this->env, ($context["className"] ?? null), "html", null, true);
        echo "\");

    ?>
    </div>
    <div class=\"col ml-auto text-right\">
        <a href=\"";
        // line 70
        echo twig_escape_filter($this->env, ($context["filePrefix"] ?? null), "html", null, true);
        echo "_create_view.php\" class=\"btn btn-primary text-white\">Create new ";
        echo twig_escape_filter($this->env, ($context["nameForMessages"] ?? null), "html", null, true);
        echo "</a>
    </div>
    </div>
<!--   </div>-->
   
   
   
   
   
   <table class=\"table table-hover table-bordered table-striped\">
       <thead class=\"thead-dark\">
           <tr>
           ";
        // line 82
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["tableFields"] ?? null));
        foreach ($context['_seq'] as $context["tableName"] => $context["fieldName"]) {
            // line 83
            echo "               <th>";
            echo twig_escape_filter($this->env, $context["tableName"], "html", null, true);
            echo "</th>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['tableName'], $context['fieldName'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 85
        echo "           
           <th>Actions</th>
           </tr>
       </thead>
       <tbody>

           <?php 
           

           \$";
        // line 94
        echo twig_escape_filter($this->env, ($context["listVariableName"] ?? null), "html", null, true);
        echo " = ";
        echo twig_escape_filter($this->env, ($context["className"] ?? null), "html", null, true);
        echo "::getPageObjects(\$page);
           
           foreach(\$";
        // line 96
        echo twig_escape_filter($this->env, ($context["listVariableName"] ?? null), "html", null, true);
        echo " as \$";
        echo twig_escape_filter($this->env, ($context["singleObjectVariableName"] ?? null), "html", null, true);
        echo "): ?>
               
               <tr>
                  
";
        // line 100
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["tableFields"] ?? null));
        foreach ($context['_seq'] as $context["tableName"] => $context["fieldname"]) {
            // line 101
            if (twig_in_filter($context["fieldname"], twig_get_array_keys_filter(($context["fields"] ?? null)))) {
                // line 102
                $context["foo"] = (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["fields"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[$context["fieldname"]] ?? null) : null);
                // line 103
                if (twig_in_filter("BOOLEAN", twig_upper_filter($this->env, ($context["foo"] ?? null)))) {
                    // line 104
                    echo "                    <td><?php echo \$";
                    echo twig_escape_filter($this->env, ($context["singleObjectVariableName"] ?? null), "html", null, true);
                    echo "->";
                    echo twig_escape_filter($this->env, $context["fieldname"], "html", null, true);
                    echo "==1?\"<i class='fas fa-check text-success'></i>\":\"<i class='fas fa-times text-danger'></i>\";?></td>
";
                } else {
                    // line 106
                    echo "                    <td><?php echo  \$";
                    echo twig_escape_filter($this->env, ($context["singleObjectVariableName"] ?? null), "html", null, true);
                    echo "->";
                    echo twig_escape_filter($this->env, $context["fieldname"], "html", null, true);
                    echo ";?></td>
";
                }
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['tableName'], $context['fieldname'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 109
        echo "                  
                  

                   
                   <td>
                      <a  class=\"btn btn-primary btn-sm\" href=\"";
        // line 114
        echo twig_escape_filter($this->env, ($context["filePrefix"] ?? null), "html", null, true);
        echo "_edit_view.php?edit=<?php echo  \$";
        echo twig_escape_filter($this->env, ($context["singleObjectVariableName"] ?? null), "html", null, true);
        echo "->id;?>\" >Edit</a>
                      <button type=\"button\" class=\"btn btn-danger btn-sm\" data-toggle=\"modal\" data-target=\"#staticBackdrop\" data-id=\"<?php echo  \$";
        // line 115
        echo twig_escape_filter($this->env, ($context["singleObjectVariableName"] ?? null), "html", null, true);
        echo "->id;?>\">
                      Delete
                      </button>

                   </td>
               </tr>
               
               
               
               <?php
           endforeach;
           
           ?>
                     
                     
                     
           <?php ?>
                      
                                            
       </tbody>
   </table>
   
    <?php   
        Pagination::show(\"";
        // line 138
        echo twig_escape_filter($this->env, ($context["className"] ?? null), "html", null, true);
        echo "\");
    ?>
    
    
    
             </div>
      </div>
      
  </div>
    
    


 
   
   <script src=\"../vendors/jquery-3.4.1.min.js\"></script>
    <script src=\"../vendors/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js\"></script>
    <script>

    \$(document).ready(function(){
//        alert(\"Hell   o!!!\");
        \$('#staticBackdrop').on('show.bs.modal', function (event) {
  var button = \$(event.relatedTarget) // Button that triggered the modal
//  alert(\"Hello!!!\");
  var recipient = button.data('id') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
//  alert(recipient);
  var modal = \$(this)
  modal.find('#deleteLink').attr(\"href\", \"?delete=\"+recipient );
})
        
});
    
    

</script>

</body>
</html>";
    }

    public function getTemplateName()
    {
        return "email_template_read_list_view.template.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  259 => 138,  233 => 115,  227 => 114,  220 => 109,  207 => 106,  199 => 104,  197 => 103,  195 => 102,  193 => 101,  189 => 100,  180 => 96,  173 => 94,  162 => 85,  153 => 83,  149 => 82,  132 => 70,  124 => 65,  119 => 63,  106 => 53,  92 => 42,  70 => 23,  65 => 21,  61 => 20,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "email_template_read_list_view.template.php", "C:\\xampp\\htdocs\\myboxsystem\\admin\\templates\\crud\\email_template_read_list_view.template.php");
    }
}
