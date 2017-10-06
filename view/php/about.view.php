<?php view('common/header', compact('title')); ?>
    <div class="container">
        <ol class="nav">
            <li class="nav-item nav-level-1 active"><a class="nav-link" href="#一个简单的MVC-提供基本的功能"><span
                            class="nav-number">1.</span> <span class="nav-text">一个简单的MVC(提供基本的功能)</span></a>
                <ol class="nav-child">
                    <li class="nav-item nav-level-3"><a class="nav-link" href="#快速开始"><span
                                    class="nav-number">1.0.1.</span> <span class="nav-text">快速开始</span></a></li>
                    <li class="nav-item nav-level-3"><a class="nav-link" href="#访问-yourdomainapp"><span class="nav-number">1.0.2.</span>
                            <span class="nav-text">访问 your.domain.app</span></a></li>
                    <li class="nav-item nav-level-3"><a class="nav-link" href="#路由-xxxxxxxxx"><span class="nav-number">1.0.3.</span>
                            <span class="nav-text">路由 /xxxx/xxxxx</span></a></li>
                    <li class="nav-item nav-level-3"><a class="nav-link" href="#controller"><span class="nav-number">1.0.4.</span>
                            <span class="nav-text">controller</span></a></li>
                    <li class="nav-item nav-level-3"><a class="nav-link" href="#数据库-配置在-config-文件夹下"><span
                                    class="nav-number">1.0.5.</span> <span
                                    class="nav-text">数据库</span></a></li>
                    <li class="nav-item nav-level-3 active active-current"><a class="nav-link" href="#model"><span
                                    class="nav-number">1.0.6.</span> <span class="nav-text">model</span></a></li>
                    <li class="nav-item nav-level-3"><a class="nav-link" href="#view"><span
                                    class="nav-number">1.0.7.</span> <span class="nav-text">view</span></a></li>
                    <li class="nav-item nav-level-3"><a class="nav-link" href="#提供widget"><span class="nav-number">1.0.8.</span>
                            <span class="nav-text">提供widget</span></a></li>
                    <li class="nav-item nav-level-3"><a class="nav-link" href="#END"><span
                                    class="nav-number">1.0.9.</span> <span class="nav-text">END</span></a></li>
                </ol>
            </li>
        </ol>

        <div class="panel-body">

            <h1 class="text-center">
                一个简单的 PHP-simple-mvc （提供基本的功能）
            </h1>


        </div>

        <div class="entry-content">
            <div class="markdown-body" id="emojify">
                <p>ps: 写的第一个，不足之处，欢迎拍砖</p>
                <p><a href="https://github.com/jc91715/php-simple-mvc">Github</a></p>
                <p>---只是想用自己的方法一步步去实现一些框架看似高大上的小功能（比如说 模型中的toArray toJson setAttribute getAttribute）以此加深理解，提高自己</p>
                <h3 id="快速开始">快速开始<a href="#快速开始" class="anchorific">#</a></h3>
                <pre class=" language-php"><code class="  language-php">git clone  https<span
                                class="token punctuation">:</span><span class="token comment" spellcheck="true">//github.com/jc91715/php-simple-mvc.git project</span></code></pre>
                <h3 id="访问-yourdomainapp">访问 your.domain.app/<a href="#访问-yourdomainapp" class="anchorific">#</a>
                </h3>
                <h3 id="路由-xxxxxxxxx">路由 /xxxx/xxxxx<a href="#路由-xxxxxxxxx" class="anchorific">#</a></h3>
                <p>eg</p>
                <pre class=" language-php"><code class="  language-php"><span
                                class="token operator">/</span>index<span class="token operator">/</span>index  映射到 controllers<span
                                class="token operator">/</span>indexController 下的 index 方法</code></pre>
                <h3 id="controller">controller<a href="#controller" class="anchorific">#</a></h3>
                <p>在controllers文件下 继承自 basicController</p>
                <p>eg</p>
                <pre class=" language-php"><code class="  language-php"><span class="token comment"
                                                                              spellcheck="true">//controllers/indexController.php</span>
<span class="token delimiter">&lt;?php</span>

<span class="token keyword">class</span> <span class="token class-name">indexController</span> <span
                                class="token keyword">extends</span> <span
                                class="token class-name">basicController</span>

<span class="token punctuation">{</span>
    <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">index</span><span
                                class="token punctuation">(</span><span class="token punctuation">)</span>
    <span class="token punctuation">{</span>

    <span class="token punctuation">}</span>
<span class="token punctuation">}</span></code></pre>
                <h3 id="数据库-配置在-config-文件夹下">数据库 配置在 config 文件夹下<a href="#数据库-配置在-config-文件夹下"
                                                                   class="anchorific">#</a></h3>
                <p>eg</p>
                <pre class=" language-php"><code class="  language-php"><span class="token comment"
                                                                              spellcheck="true">//config/database.php</span>

<span class="token keyword">return</span> <span class="token punctuation">[</span>
    <span class="token string">'host'</span> <span class="token operator">=</span><span
                                class="token operator">&gt;</span><span class="token string">'localhost'</span><span
                                class="token punctuation">,</span>
    <span class="token string">'dbname'</span> <span class="token operator">=</span><span
                                class="token operator">&gt;</span><span class="token string">'demo4'</span><span
                                class="token punctuation">,</span>
    <span class="token string">'username'</span> <span class="token operator">=</span><span
                                class="token operator">&gt;</span> <span
                                class="token string">'homestead'</span><span class="token punctuation">,</span>
    <span class="token string">'password'</span> <span class="token operator">=</span><span
                                class="token operator">&gt;</span><span class="token string">'secret'</span>
<span class="token punctuation">]</span><span class="token punctuation">;</span></code></pre>
                <h3 id="model">model<a href="#model" class="anchorific">#</a></h3>
                <p>在 model 文件夹下 继承 baseModel 提供 增删改查功能</p>
                <p>eg</p>
                <pre class=" language-php"><code class="  language-php"><span class="token comment"
                                                                              spellcheck="true">//model/userModel.php</span>
<span class="token delimiter">&lt;?php</span>

<span class="token keyword">class</span> <span class="token class-name">userModel</span> <span class="token keyword">extends</span> <span
                                class="token class-name">baseModel</span>
<span class="token punctuation">{</span>
   <span class="token variable">$table</span><span class="token operator">=</span><span
                                class="token string">'users'</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span></code></pre>
                <p>如何使用 </p>
                <pre class=" language-php"><code class="  language-php"><span
                                class="token variable">$user</span><span class="token operator">=</span><span
                                class="token keyword">new</span> <span
                                class="token class-name">userModel</span><span
                                class="token punctuation">(</span><span class="token punctuation">)</span>

<span class="token variable">$user</span><span class="token operator">-</span><span
                                class="token operator">&gt;</span><span class="token function">find</span><span
                                class="token punctuation">(</span><span class="token variable">$id</span><span
                                class="token punctuation">)</span>

<span class="token variable">$user</span><span class="token operator">-</span><span
                                class="token operator">&gt;</span><span class="token function">get</span><span
                                class="token punctuation">(</span><span class="token punctuation">)</span>

<span class="token variable">$user</span><span class="token operator">-</span><span class="token function">create</span><span
                                class="token punctuation">(</span><span
                                class="token variable">$arrayData</span><span class="token punctuation">)</span>

<span class="token variable">$user</span><span class="token operator">-</span><span
                                class="token operator">&gt;</span><span class="token function">update</span><span
                                class="token punctuation">(</span><span
                                class="token variable">$arrayData</span><span
                                class="token punctuation">,</span><span class="token variable">$id</span><span
                                class="token punctuation">)</span> <span class="token keyword">or</span> <span
                                class="token variable">$user</span><span class="token operator">-</span><span
                                class="token operator">&gt;</span><span class="token function">find</span><span
                                class="token punctuation">(</span><span class="token number">1</span><span
                                class="token punctuation">)</span><span class="token operator">-</span><span
                                class="token operator">&gt;</span><span class="token function">update</span><span
                                class="token punctuation">(</span><span
                                class="token variable">$arrayData</span><span
                                class="token punctuation">)</span> <span class="token keyword">or</span>
<span class="token variable">$user</span><span class="token operator">=</span><span
                                class="token variable">$user</span><span class="token operator">-</span><span
                                class="token operator">&gt;</span><span class="token function">find</span><span
                                class="token punctuation">(</span><span class="token variable">$id</span><span
                                class="token punctuation">)</span>
<span class="token variable">$user</span><span class="token operator">-</span><span
                                class="token operator">&gt;</span><span class="token property">name</span><span
                                class="token operator">=</span>xxxx
<span class="token variable">$user</span><span class="token operator">-</span><span
                                class="token operator">&gt;</span><span class="token function">save</span><span
                                class="token punctuation">(</span><span class="token punctuation">)</span>

<span class="token variable">$user</span><span class="token operator">-</span><span
                                class="token operator">&gt;</span><span class="token function">delete</span><span
                                class="token punctuation">(</span><span class="token variable">$id</span><span
                                class="token punctuation">)</span>

<span class="token comment" spellcheck="true">//转换为数组</span>
   <span class="token variable">$user</span><span class="token operator">-</span><span
                                class="token operator">&gt;</span><span class="token function">find</span><span
                                class="token punctuation">(</span><span class="token variable">$id</span><span
                                class="token punctuation">)</span><span class="token operator">-</span><span
                                class="token operator">&gt;</span><span class="token function">toArray</span><span
                                class="token punctuation">(</span><span class="token punctuation">)</span>
 <span class="token comment" spellcheck="true">//转换为json</span>
 <span class="token variable">$user</span><span class="token operator">-</span><span
                                class="token operator">&gt;</span><span class="token function">toJson</span><span
                                class="token punctuation">(</span><span class="token punctuation">)</span>

<span class="token comment" spellcheck="true">//提供了两个简单的hook 如果你取出数据之前需要对数据进行格式化 eg</span>

<span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">getName</span><span
                                class="token punctuation">(</span><span class="token variable">$val</span><span
                                class="token punctuation">)</span>
<span class="token punctuation">{</span>

    <span class="token keyword">return</span> <span class="token function">ucwords</span><span
                                class="token punctuation">(</span><span class="token variable">$val</span><span
                                class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span>

<span class="token comment" spellcheck="true">//如果你插入数据之前需要对数据进行格式化(一个字段需要是json格式的) eg</span>

<span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">setName</span><span
                                class="token punctuation">(</span><span class="token variable">$val</span><span
                                class="token punctuation">)</span>
<span class="token punctuation">{</span>
    <span class="token keyword">return</span> <span class="token function">json_encode</span><span
                                class="token punctuation">(</span><span class="token variable">$val</span><span
                                class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span>

<span class="token comment" spellcheck="true">//后续可能会有 beforeUpdate() afterUpdate  beforeCreate afterCreate 等等</span>

<span class="token comment"
      spellcheck="true">//如果你想在laravel 试试(只是试试而已~~) 可以让 user 继承 baseModel 在构造函数中手动配置下数据库就可以了</span>
<span class="token comment" spellcheck="true">//$config = include 'config/database.php';</span>
<span class="token this">$this</span><span class="token operator">-</span><span class="token operator">&gt;</span><span
                                class="token property">dbh</span> <span class="token operator">=</span> <span
                                class="token keyword">new</span> <span class="token class-name">PDO</span><span
                                class="token punctuation">(</span>
            <span class="token string">"mysql:host=localhost;dbname=xxxx"</span><span class="token punctuation">,</span> <span
                                class="token string">'username'</span><span class="token punctuation">,</span> <span
                                class="token string">'password'</span><span class="token punctuation">]</span>
            <span class="token punctuation">,</span> <span class="token punctuation">[</span><span class="token scope">PDO<span
                                    class="token punctuation">::</span></span><span class="token constant">ATTR_PERSISTENT</span> <span
                                class="token operator">=</span><span class="token operator">&gt;</span> <span
                                class="token boolean">true</span><span class="token punctuation">]</span>
        <span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
                <h3 id="view">view<a href="#view" class="anchorific">#</a></h3>
                <p>支持原生 php 模板（默认推荐） 和 自定义 html模板(正则匹配是 是从php核心技术与最佳实践上引用的)</p>
                <pre class=" language-php"><code class="  language-php">ps<span class="token punctuation">:</span> 找不到原生模板的情况下会去找 自定义模板

<span class="token comment" spellcheck="true">//不推荐使用</span>
<span class="token comment" spellcheck="true">//模板标签</span>
<span class="token punctuation">{</span><span class="token variable">$var</span><span class="token punctuation">}</span>

<span class="token punctuation">{</span><span class="token keyword">foreach</span> <span
                                class="token variable">$arr</span><span class="token punctuation">}</span>
    <span class="token punctuation">{</span><span class="token variable">$V</span><span
                                class="token punctuation">}</span>
<span class="token punctuation">{</span><span class="token operator">/</span><span
                                class="token keyword">foreach</span><span class="token punctuation">}</span>

<span class="token punctuation">{</span><span class="token keyword">if</span><span class="token punctuation">}</span>

<span class="token punctuation">{</span><span class="token keyword">endif</span><span class="token punctuation">}</span></code></pre>
                <p>1 在控制其中使用</p>
                <p>eg</p>
                <pre class=" language-php"><code class="  language-php"><span class="token comment"
                                                                              spellcheck="true">//controllers/indexController</span>
<span class="token delimiter">&lt;?php</span>

 <span class="token keyword">class</span> <span class="token class-name">indexController</span> <span
                                class="token keyword">extends</span> <span
                                class="token class-name">basicController</span>

    <span class="token punctuation">{</span>
        <span class="token keyword">public</span> <span class="token keyword">function</span> <span
                                class="token function">index</span><span class="token punctuation">(</span><span
                                class="token punctuation">)</span>
        <span class="token punctuation">{</span>
            <span class="token variable">$title</span><span class="token operator">=</span><span class="token string">'index done'</span>
            <span class="token function">view</span><span class="token punctuation">(</span><span class="token string">'index'</span><span
                                class="token punctuation">)</span><span class="token punctuation">;</span><span
                                class="token comment" spellcheck="true">//加载 view/php/index.view.php</span>

            <span class="token function">view</span><span class="token punctuation">(</span><span class="token string">'index/index'</span><span
                                class="token punctuation">)</span><span class="token punctuation">;</span><span
                                class="token comment" spellcheck="true">//加载 view/php/index/index.view.php</span>

            <span class="token function">view</span><span class="token punctuation">(</span><span class="token string">'index'</span><span
                                class="token punctuation">,</span><span class="token function">compact</span><span
                                class="token punctuation">(</span><span class="token string">'title'</span><span
                                class="token punctuation">)</span><span class="token punctuation">)</span><span
                                class="token punctuation">;</span><span class="token comment" spellcheck="true">//传递变量 $title 到视图上</span>

        <span class="token punctuation">}</span>
    <span class="token punctuation">}</span></code></pre>
                <p>2 在视图中使用（为了代码重用 包含header 和 footer等等需要重用的文件）</p>
                <p>eg </p>
                <pre class=" language-php"><code class="  language-php"><span class="token comment"
                                                                              spellcheck="true">// view/php/index.view.php</span>

<span class="token php"><span class="token delimiter">&lt;?php</span> <span class="token function">view</span><span
            class="token punctuation">(</span><span class="token string">'common/header'</span><span
            class="token punctuation">,</span> <span class="token function">compact</span><span
            class="token punctuation">(</span><span class="token string">'title'</span><span
            class="token punctuation">)</span><span class="token punctuation">)</span><span
            class="token punctuation">;</span> <span class="token delimiter">?&gt;</span></span> <span
                                class="token comment" spellcheck="true">//包含 view/php/common/header.view.php 并传递数据（compact('title') 是从控制器传递过来的）</span>

<span class="token comment" spellcheck="true">//view/php/common/header.view.php</span>

 <span class="token markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>title</span><span
                 class="token punctuation">&gt;</span></span></span>jc91715<span class="token operator">-</span>php<span
                                class="token operator">-</span>simple<span class="token operator">-</span>mvc <span
                                class="token php"><span class="token delimiter">&lt;?php</span> <span
                                    class="token keyword">echo</span> <span
                                    class="token variable">$title</span><span
                                    class="token punctuation">;</span><span
                                    class="token delimiter">?&gt;</span></span><span class="token markup"><span
                                    class="token tag"><span class="token tag"><span
                                            class="token punctuation">&lt;/</span>title</span><span
                                        class="token punctuation">&gt;</span></span></span></code></pre>
                <h3 id="提供widget">提供widget<a href="#提供widget" class="anchorific">#</a></h3>
                <p>等等 widget 有什么用 </p>
                <p>不是有 view 么</p>
                <p>请 瞅一下这里 <a href="http://leo108.github.io/SinglePHP/doc.html#widget">@leo</a></p>
                <p>使用widget </p>
                <p>必须继承 basicWidget.php 并实现 display 方法</p>
                <p>eg</p>
                <pre class=" language-php"><code class="  language-php"><span class="token comment"
                                                                              spellcheck="true">// widget/indexWidget.php</span>

<span class="token delimiter">&lt;?php</span>

<span class="token keyword">class</span> <span class="token class-name">indexWidget</span> <span class="token keyword">extends</span> <span
                                class="token class-name">basicWidget</span>
<span class="token punctuation">{</span>
    <span class="token keyword">public</span> <span class="token keyword">function</span> <span class="token function">display</span><span
                                class="token punctuation">(</span><span class="token variable">$val</span><span
                                class="token punctuation">)</span><span class="token punctuation">{</span>
        <span class="token comment" spellcheck="true">//$val 是从视图传过来的值</span>
       <span class="token keyword">return</span>  <span class="token string">"widget/index/index.widget加载成功(我是从view传过来的经过了widget的处理) "</span><span
                                class="token punctuation">;</span>
    <span class="token punctuation">}</span>
<span class="token punctuation">}</span></code></pre>
                <p>在视图中调用</p>
                <pre class=" language-php"><code class="  language-php"><span class="token comment"
                                                                              spellcheck="true">//view/php/index.widget.php</span>

<span class="token php"><span class="token delimiter">&lt;?php</span> <span class="token function">w</span><span
            class="token punctuation">(</span><span class="token string">'index'</span><span
            class="token punctuation">,</span> <span class="token variable">$title</span><span
            class="token punctuation">)</span> <span class="token delimiter">?&gt;</span></span><span
                                class="token comment" spellcheck="true">//加载 widget/index/index.widget.php</span>
<span class="token php"><span class="token delimiter">&lt;?php</span> <span class="token function">w</span><span
            class="token punctuation">(</span><span class="token string">'index.test'</span><span
            class="token punctuation">,</span> <span class="token variable">$title</span><span
            class="token punctuation">)</span> <span class="token delimiter">?&gt;</span></span><span
                                class="token comment"
                                spellcheck="true">//加载 widget/index/test.widget.php</span></code></pre>
                <h3 id="END">END<a href="#END" class="anchorific">#</a></h3>

                <a class="popover-with-html" data-content="作者署名" target="_blank"
                   style="display: block;width: 30px;color: #ccc;margin: 22px 0 8px;"
                   href="https://laravel-china.org/topics/3422" data-original-title="" title=""><i class="fa fa-paw"
                                                                                                   aria-hidden="true"></i></a>
                <p>DEMO</p>

            </div>
        </div>


        <br><br>
        <div class="clearfix"></div>
    </div>


    </div>
    </div>
<?php view('common/js'); ?>
<?php view('common/footer'); ?>