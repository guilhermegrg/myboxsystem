 <?php  

class Pagination {
    
    public static function show($className){

    $page = 1;
    if(isset($_GET["page"]))
    {
        $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        $page = $get["page"];
        
        if(!is_numeric($page))
            $page = 1;
        else
        if($page<=0)
            $page=1;
    }
    
    $totalPages = $className::getTotalPages();
    ?>
   
   
<nav>
  <ul class="pagination">
    <li class="page-item <?php echo $page==1?"disabled":"";?>">
      <a class="page-link" href="?page=<?php echo $page-1;?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    
    
    <?php for($i=1; $i<=$totalPages;++$i): ?>
        <li class="page-item <?php echo $i==$page?"active":"";?>"><a class="page-link" href="?page=<?php echo $i;?>"><?php echo $i; ?></a></li>
    <?php endfor; ?>
    
    
    <li class="page-item  <?php echo $page==$totalPages?"disabled":"";?>">
      <a class="page-link" href="?page=<?php echo $page+1;?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>






<?php 
        return $page;
    }

}

?>