<?php

class Compile extends View
{
    public $templatePath;
    public $compilePath;
    public $compileFile;
    public $content;
    private $T_P = array();
    private $T_R = array();

    public function init(){
        $this->templatePath='view/html/template/';
        $this->compilePath='view/html/compile/';
        //{$var}
        $this->T_P[] = "/\{\\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\}/";
        //{foreach $b}或者{loop $b}
        $this->T_P[] = "/\{(loop|foreach) \\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\}/i";

        //{[K|V]}
        $this->T_P[] = "/\{([K|V])\}/";
        //{/foreach}或者{\loop}或者{\if}
        $this->T_P[] = "/\{\/(loop|foreach|if)}/i";
        //{if (condition)}
        $this->T_P[] = "/\{if (.* ?)\}/i";
        //{(else if | elseif)}
        $this->T_P[] = "/\{(else if|elseif) (.* ?)\}/i";
        //{else}
        $this->T_P[] = "/\{else\}/i";

        //{#...# 或者 *...#，注释}
        $this->T_P[] = "/\{(\#|\*)(.* ?)(\#|\*)\}/";
        $this->T_R[] = "<?php echo \$\\1; ?>";
        $this->T_R[] = "<?php foreach ((array)\$\\2 as \$K => \$V) { ?>";
        $this->T_R[] = "<?php echo \$\\1; ?>";
        $this->T_R[] = "<?php } ?>";
        $this->T_R[] = "<?php if (\\1) { ?>";
        $this->T_R[] = "<?php }else if (\\2) { ?>";
        $this->T_R[] = "<?php }else{ ?>";
        $this->T_R[] = "";
    }

    public function display($templateFile){
        $this->setCompileFile($templateFile);
        $this->setContent($templateFile);
        $this->setCompileContent();

        $this->setCompileContentToCompileFile();

        return $this->compileFile;

    }

    public function setCompileFile($templateFile){
        $templateFile=str_replace('/','.',$templateFile);
        $this->compileFile=$this->compilePath.md5($templateFile).'.php';
    }

    public function setContent($templateFile){
        $this->content = file_get_contents($this->templatePath.$templateFile.'.html');
    }

    public function setCompileContent(){

        $this->content = preg_replace($this->T_P, $this->T_R, $this->content);
    }

    public function setCompileContentToCompileFile(){
        file_put_contents($this->compileFile, $this->content);
    }





}