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

/* email_template_read_list_view.template.php.template */
class __TwigTemplate_0d6a4c18d4e4069faa3c3e66b0f98177f9f09a6b58b8295a7f0dad014c1969fa extends Template
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
           <th>#</th>
           <th>Name</th>
           <th>Title</th>
           <th>Actions</th>
           </tr>
       </thead>
       <tbody>

           <?php 
           

           \$";
        // line 93
        echo twig_escape_filter($this->env, ($context["listVariableName"] ?? null), "html", null, true);
        echo " = ";
        echo twig_escape_filter($this->env, ($context["className"] ?? null), "html", null, true);
        echo "::getPageObjects(\$page);
           
           foreach(\$";
        // line 95
        echo twig_escape_filter($this->env, ($context["listVariableName"] ?? null), "html", null, true);
        echo " as \$";
        echo twig_escape_filter($this->env, ($context["singleObjectVariableName"] ?? null), "html", null, true);
        echo "): ?>
               
               <tr>
                   <td><?php echo  \$";
        // line 98
        echo twig_escape_filter($this->env, ($context["singleObjectVariableName"] ?? null), "html", null, true);
        echo "->id;?> </td>
                   <td><?php echo  \$";
        // line 99
        echo twig_escape_filter($this->env, ($context["singleObjectVariableName"] ?? null), "html", null, true);
        echo "->name;?></td>
                   <td><?php echo  \$";
        // line 100
        echo twig_escape_filter($this->env, ($context["singleObjectVariableName"] ?? null), "html", null, true);
        echo "->title;?></td>
                   <td>
                      <a  class=\"btn btn-primary btn-sm\" href=\"";
        // line 102
        echo twig_escape_filter($this->env, ($context["filePrefix"] ?? null), "html", null, true);
        echo "_edit_view.php?edit=<?php echo  \$";
        echo twig_escape_filter($this->env, ($context["singleObjectVariableName"] ?? null), "html", null, true);
        echo "->id;?>\" >Edit</a>
                      <button type=\"button\" class=\"btn btn-danger btn-sm\" data-toggle=\"modal\" data-target=\"#staticBackdrop\" data-id=\"<?php echo  \$";
        // line 103
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
        // line 126
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
        return "email_template_read_list_view.template.php.template";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  220 => 126,  194 => 103,  188 => 102,  183 => 100,  179 => 99,  175 => 98,  167 => 95,  160 => 93,  132 => 70,  124 => 65,  119 => 63,  106 => 53,  92 => 42,  70 => 23,  65 => 21,  61 => 20,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "email_template_read_list_view.template.php.template", "C:\\xampp\\htdocs\\myboxsystem\\admin\\templates\\crud\\email_template_read_list_view.template.php.template");
    }
}
