<?php

class Paginate
{
    public $pageAll;
    public $currAge;
    public $pagiHtml;
    public function __construct($pageAll,$currAge,$link)
    {
      $this->pageAll=$pageAll;
      $this->currAge=$currAge;

      $this->render($link);
    }

    public function render($link){
        $li='';
        if($this->currAge==1){
            $prevPage=1;
        }else{
            $prevPage=$this->currAge-1;
        }

        if($this->currAge==$this->pageAll){
            $nextPage=$this->pageAll;
        }else{
            $nextPage=$this->currAge+1;
        }

        $prev='<li class="prev"><a href="/'.$link.'?page='.$prevPage.'">&laquo;</a></li>';
        $next='<li class="prev"><a href="/'.$link.'?page='.$nextPage.'">&raquo;</a></li>';
        for ($i=1;$i<$this->pageAll+1;$i++){
             $li.='<li><a href="/'.$link.'?page='.$i.'">'.$i.'</a></li>';

        }

        $this->pagiHtml='<ul class="pagination">'.$prev.$li.$next.'</ul>';
    }

}