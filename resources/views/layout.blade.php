<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Page Title: -->
    <title>Global Settings</title>

    <!-- Fonts: -->
    {{--    <link href="https://fonts.bunny.net/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">--}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">


    <!-- Styles: -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    {{--    <link href="{{ mix('css/app.css') }}" rel="stylesheet">--}}
    {{--    <link href="{{ asset('css/global_settings.css') }}" rel="stylesheet">--}}

    <style>
        :root {
            scroll-behavior: auto !important;
        }
        html, html > body {
            box-sizing: border-box;
            color: #000;
            font-family: 'Open Sans', sans-serif;
            font-size: 1.0rem;
            line-height: 1.6;
            min-height: 100vh;
            margin: 0rem;
            padding: 0rem;
            scroll-behavior: auto !important;
        }
        body {
            background-color: #FFF;
            {{--            background-image: url("{{ asset('images/linktree/BackgroundDots_4x4.gif') }}");--}}
background-image: url("data:image/gif;base64,R0lGODlhBAAEAIAAAP///87KxSH/C05FVFNDQVBFMi4wAwEAAAAh+QQEAAAAACwAAAAABAAEAAACBAyOqQUAOw==");
            margin: 0.0rem !important;
            padding: 0.0rem !important;
        }

        html > body {
            line-height: 1.6 !important;
            position: relative;
        }

        #app {
            display: flex;
            flex-flow: column;
            min-height: 100vh;
        }
        #app #header {
            background-color: #FFF;
            border-bottom: 2px solid #0066CC;
            flex-basis: auto;
            flex-grow: 0;
            flex-shrink: 1;
            padding: 0.5rem;
        }
        #app #page_content {
            flex-grow: 1;
            flex-shrink: 1;
            flex-basis: auto;
            padding: 1.0rem;
        }
        #app #footer {
            background-color: #FFF;
            border-top: 2px solid #888;
            flex-basis: auto;
            flex-grow: 0;
            flex-shrink: 1;
            padding: 0.5rem;
        }

        .fieldset {
            background-color: #FFF;
            border: 2px solid #495057;
            box-shadow: 4px 4px 0 #869099;
            padding: 0.5rem;
        }
        .fieldset legend {
            background-color: #FFF;
            font-size: 120% !important;
            border: 2px solid #495057;
            border-bottom: none;
            color: #000;
            display: flex;
            flex-direction: row;
            float: none !important;
            font-size: 15px;
            line-height: 1;
            margin: 0;
            margin-bottom: 0px;
            margin-bottom: 0;
            padding: 0.5rem;
            text-align: center;
            text-shadow: 0px 2px 2px #fff;
            width: auto;
        }

        .hover_up {
            position: relative;
            top: 0px;
            transition: top 0.1s;
        }
        .hover_up.active {

        }
        .hover_up.active,
        .hover_up:hover {
            top: -4px;
        }

        /*.font_family_monospace {*/
        /*    font-family: "Lucida Console", SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;*/
        /*}*/
        .textarea_code:is(textarea) {
            font-size: 85%;
            line-height: 1.25;
        }
        /*.textarea_code {*/
        /*    font-family: "Lucida Console", SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;*/
        /*    !*font-size: 85%;*!*/
        /*    !*line-height: 1.15;*!*/
        /*    !*padding: 0.25rem;*!*/
        /*}*/

        .global_setting_form input[name=key],
        .global_setting_form select[name=type],
        .global_setting_form [name=value] {
            font-family: "Lucida Console", SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            padding: 0.25rem;
        }

        #existing_global_settings_list {
            padding-bottom: 0.5rem;
        }
        #existing_global_settings_list li {
            background-color: #FFF;
        }
        #existing_global_settings_list li:not(:last-child) {
            border-bottom: 1px solid #888;
            /*margin-bottom: 0.5rem;*/

        }
        #existing_global_settings_list li:nth-child(even) {
            background-color: #F8F8F8;
        }
        #existing_global_settings_list li:hover,
        #existing_global_settings_list li:nth-child(odd) {
            background-color: #EEE;
        }


        .notifyjs-bootstrap-base {
            background-color: #fff;
            border-width: 2px;
            border-style: solid;
            font-weight: bold;
            padding: 0.75rem;
            text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
            white-space: nowrap;
            z-index: 1100;
        }

        .notifyjs-bootstrap-base [data-notify-text], .notifyjs-bootstrap-base [data-notify-html] {
            vertical-align: middle;
        }

        .notifyjs-bootstrap-base:before {
            display: inline-block;
            font-family: Fontello;
            font-size: 22px;
            vertical-align: middle;
        }

        .notifyjs-bootstrap-base.notifyjs-bootstrap-success {
            background-color: #6ee4ae;
            border-color: #198754;
            color: #051b11;
        }

        .notifyjs-bootstrap-base.notifyjs-bootstrap-success:before {
            content: "\e803";
        }

        .notifyjs-bootstrap-base.notifyjs-bootstrap-danger {
            background-color: #f6cdd1;
            border-color: #DC3545;
            color: #7c151f;
        }

        .notifyjs-bootstrap-base.notifyjs-bootstrap-danger:before {
            content: "\e804";
        }

        .notifyjs-bootstrap-base.notifyjs-bootstrap-warning {
            background-color: #ffeeba;
            border-color: #FFC107;
            color: #866500;
        }

        .notifyjs-bootstrap-base.notifyjs-bootstrap-warning:before {
            content: "\e814";
        }

        .notifyjs-bootstrap-base.notifyjs-bootstrap-info {
            background-color: #b4d5e6;
            border-color: #3A87AD;
            color: #1a3c4e;
        }

        .notifyjs-bootstrap-base.notifyjs-bootstrap-info:before {
            content: "\f129";
        }

    </style>
</head>
<body>
<div id="app">
    <header id="header">
        <h1 class="fw-bold my-0">Global Settings</h1>
        <p class="mb-0">Persistent Global Settings for use throughout a Laravel application. | <a class="hover_up" href="{{ route(Config::get('global_settings.routes.name_prefix', '') . "index") }}">Home</a> | <a class="hover_up" href="{{ route(Config::get('global_settings.routes.name_prefix', '') . "about") }}">About</a> | <a class="hover_up" href="{{ route(Config::get('global_settings.routes.name_prefix', '') . "github") }}" target="_blank">GitHub</a></p>
    </header>
    <section id="page_content">
        @include('global_settings::_flash')

        @yield('pageContent')
    </section>
    <footer id="footer">
        <ul class="list-unstyled mb-0 d-flex flex-row">
            @foreach(GlobalSettings::info() as $key => $global_setting_info)
                <li class="me-3"><strong>{{ $key }}:</strong> {{ $global_setting_info }}</li>
            @endforeach
        </ul>
    </footer>
</div>




<script src="https://releases.jquery.com/git/jquery-3.x-git.min.js" id="jquery"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script type="text/javascript">
    // AutosizeTextarea:
    !function(e){"function"==typeof define&&define.amd?define(["jquery"],e):e(window.jQuery||window.$)}(function(e){var t,o={className:"autosizejs",append:"",callback:!1,resizeDelay:10},i=["fontFamily","fontSize","fontWeight","fontStyle","letterSpacing","textTransform","wordSpacing","textIndent"],n=e('<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; padding: 0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>').data("autosize",!0)[0];n.style.lineHeight="99px","99px"===e(n).css("lineHeight")&&i.push("lineHeight"),n.style.lineHeight="",e.fn.autosize=function(s){return this.length?(s=e.extend({},o,s||{}),n.parentNode!==document.body&&e(document.body).append(n),this.each(function(){var o,a,r,l=this,d=e(l),c=0,h=e.isFunction(s.callback),u={height:l.style.height,overflow:l.style.overflow,overflowY:l.style.overflowY,wordWrap:l.style.wordWrap,resize:l.style.resize},f=d.width();function p(){var t,o;"getComputedStyle"in window?(t=window.getComputedStyle(l),o=l.getBoundingClientRect().width,e.each(["paddingLeft","paddingRight","borderLeftWidth","borderRightWidth"],function(e,i){o-=parseInt(t[i],10)}),n.style.width=o+"px"):n.style.width=Math.max(d.width(),0)+"px"}function z(){var r,u;t!==l?function a(){var r={};if(t=l,n.className=s.className,o=parseInt(d.css("maxHeight"),10),e.each(i,function(e,t){r[t]=d.css(t)}),e(n).css(r),p(),window.chrome){var c=l.style.width;l.style.width="0px",l.offsetWidth,l.style.width=c}}():p(),n.value=l.value+s.append,n.style.overflowY=l.style.overflowY,u=parseInt(l.style.height,10),n.scrollTop=0,n.scrollTop=9e4,r=n.scrollTop,o&&r>o?(l.style.overflowY="scroll",r=o):(l.style.overflowY="hidden",r<a&&(r=a)),u!==(r+=c)&&(l.style.height=r+"px",h&&s.callback.call(l,l))}function g(){clearTimeout(r),r=setTimeout(function(){var e=d.width();e!==f&&(f=e,z())},parseInt(s.resizeDelay,10))}!d.data("autosize")&&(d.data("autosize",!0),("border-box"===d.css("box-sizing")||"border-box"===d.css("-moz-box-sizing")||"border-box"===d.css("-webkit-box-sizing"))&&(c=d.outerHeight()-d.height()),a=Math.max(parseInt(d.css("minHeight"),10)-c||0,d.height()),d.css({overflow:"hidden",overflowY:"hidden",wordWrap:"break-word",resize:"none"===d.css("resize")||"vertical"===d.css("resize")?"none":"horizontal"}),"onpropertychange"in l?"oninput"in l?d.on("input.autosize keyup.autosize",z):d.on("propertychange.autosize",function(){"value"===event.propertyName&&z()}):d.on("input.autosize",z),!1!==s.resizeDelay&&e(window).on("resize.autosize",g),d.on("autosize.resize",z),d.on("autosize.resizeIncludeStyle",function(){t=null,z()}),d.on("autosize.destroy",function(){t=null,clearTimeout(r),e(window).off("resize",g),d.off("autosize").off(".autosize").css(u).removeData("autosize")}),z())})):this}});

    // NotifyJS:
    !function(t){"function"==typeof define&&define.amd?define(["jquery"],t):"object"==typeof module&&module.exports?module.exports=function(i,n){return void 0===n&&(n="undefined"!=typeof window?require("jquery"):require("jquery")(i)),t(n),n}:t(jQuery)}(function(t){var i=[].indexOf||function(t){for(var i=0,n=this.length;i<n;i++)if(i in this&&this[i]===t)return i;return -1},n="notify",e=n+"js",o=n+"!blank",s={t:"top",m:"middle",b:"bottom",l:"left",c:"center",r:"right"},r=["l","c","r"],a=["t","m","b"],h=["t","b","l","r"],l={t:"b",m:null,b:"t",l:"r",c:null,r:"l"},c=function(i){var n;return n=[],t.each(i.split(/\W+/),function(t,i){var e;if(s[e=i.toLowerCase().charAt(0)])return n.push(e)}),n},p={},u={name:"core",html:'<div class="'+e+'-wrapper">\n	<div class="'+e+'-arrow"></div>\n	<div class="'+e+'-container"></div>\n</div>',css:"."+e+"-corner {\n	position: fixed;\n	margin: 0.5rem;\n	z-index: 1100;\n}\n\n."+e+"-corner ."+e+"-wrapper,\n."+e+"-corner ."+e+"-container {\n	position: relative;\n	display: block;\n	height: inherit;\n	width: inherit;\n	margin-bottom: 0.5rem;\n}\n\n."+e+"-wrapper {\n	z-index: 1;\n	position: absolute;\n	display: inline-block;\n	height: 0;\n	width: 0;\n}\n\n."+e+"-container {\n	display: none;\n	z-index: 1;\n	position: absolute;\n}\n\n."+e+"-hidable {\n	cursor: pointer;\n}\n\n[data-notify-text],[data-notify-html] {\n	position: relative;\n}\n\n."+e+"-arrow {\n	position: absolute;\n	z-index: 2;\n	width: 0;\n	height: 0;\n}"},d={"border-radius":["-webkit-","-moz-"]},f=function(t){return p[t]},m=function(t){if(!t)throw"Missing Style name";p[t]&&delete p[t]},y=function(i,o){if(!i)throw"Missing Style name";if(!o)throw"Missing Style definition";if(!o.html)throw"Missing Style HTML";var s=p[i];s&&s.cssElem&&(window.console&&console.warn(n+": overwriting style '"+i+"'"),p[i].cssElem.remove()),o.name=i,p[i]=o;var r="";o.classes&&t.each(o.classes,function(i,n){return r+="."+e+"-"+o.name+"-"+i+" {\n",t.each(n,function(i,n){return d[i]&&t.each(d[i],function(t,e){return r+="	"+e+i+": "+n+";\n"}),r+="	"+i+": "+n+";\n"}),r+="}\n"}),o.css&&(r+="/* styles for "+o.name+" */\n"+o.css),r&&(o.cssElem=w(r),o.cssElem.attr("id","notify-"+o.name));var a={},h=t(o.html);$("html",h,a),$("text",h,a),o.fields=a},w=function(i){var n;(n=S("style")).attr("type","text/css"),t("head").append(n);try{n.html(i)}catch(e){n[0].styleSheet.cssText=i}return n},$=function(i,n,e){var s;return"html"!==i&&(i="text"),b(n,"["+(s="data-notify-"+i)+"]").each(function(){var n;(n=t(this).attr(s))||(n=o),e[n]=i})},b=function(t,i){return t.is(i)?t:t.find(i)},g={clickToHide:!0,autoHide:!0,autoHideDelay:5e3,arrowShow:!0,arrowSize:5,breakNewLines:!0,elementPosition:"bottom",globalPosition:"top right",style:"bootstrap",className:"error",showAnimation:"slideDown",showDuration:400,hideAnimation:"slideUp",hideDuration:200,gap:5},v=function(i,n){var e;return(e=function(){}).prototype=i,t.extend(!0,new e,n)},x=function(i){return t.extend(g,i)},S=function(i){return t("<"+i+"></"+i+">")},_={},P=function(i){var n;return i.is("[type=radio]")&&(i=(n=i.parents("form:first").find("[type=radio]").filter(function(n,e){return t(e).attr("name")===i.attr("name")})).first()),i},C=function(t,i,n){var e,o;if("string"==typeof n)n=parseInt(n,10);else if("number"!=typeof n)return;if(!isNaN(n))return e=s[l[i.charAt(0)]],o=i,void 0!==t[e]&&(i=s[e.charAt(0)],n=-n),void 0===t[i]?t[i]=n:t[i]+=n,null},k=function(t,i,n){if("l"===t||"t"===t)return 0;if("c"===t||"m"===t)return n/2-i/2;if("r"===t||"b"===t)return n-i;throw"Invalid alignment"},H=function(t){return H.e=H.e||S("div"),H.e.text(t).html()};function j(i,n,o){"string"==typeof o&&(o={className:o}),this.options=v(g,t.isPlainObject(o)?o:{}),this.loadHTML(),this.wrapper=t(u.html),this.options.clickToHide&&this.wrapper.addClass(e+"-hidable"),this.wrapper.data(e,this),this.arrow=this.wrapper.find("."+e+"-arrow"),this.container=this.wrapper.find("."+e+"-container"),this.container.append(this.userContainer),i&&i.length&&(this.elementType=i.attr("type"),this.originalElement=i,this.elem=P(i),this.elem.data(e,this),this.elem.before(this.wrapper)),this.container.hide(),this.run(n)}j.prototype.loadHTML=function(){var i;i=this.getStyle(),this.userContainer=t(i.html),this.userFields=i.fields},j.prototype.show=function(t,i){var n,e,o,s,r,a;if(e=(a=this,function(){if(t||a.elem||a.destroy(),i)return i()}),r=this.container.parent().parents(":hidden").length>0,o=this.container.add(this.arrow),n=[],r&&t)s="show";else if(r&&!t)s="hide";else if(!r&&t)s=this.options.showAnimation,n.push(this.options.showDuration);else{if(r||t)return e();s=this.options.hideAnimation,n.push(this.options.hideDuration)}return n.push(e),o[s].apply(o,n)},j.prototype.setGlobalPosition=function(){var i=this.getPosition(),n=i[0],o=i[1],r=s[n],a=s[o],h=n+"|"+o,l=_[h];if(!l||!document.body.contains(l[0])){l=_[h]=S("div");var c={};c[r]=0,"middle"===a?c.top="45%":"center"===a?c.left="45%":c[a]=0,l.css(c).addClass(e+"-corner"),t("body").append(l)}return l.prepend(this.wrapper)},j.prototype.setElementPosition=function(){var n,e,o,c,p,u,d,f,m,y,w,$,b,g,v,x,S,_,P,H,j,A,N,M,T,z,D,E,L;for(M=(D=this.getPosition())[0],A=D[1],N=D[2],w=this.elem.position(),f=this.elem.outerHeight(),$=this.elem.outerWidth(),m=this.elem.innerHeight(),y=this.elem.innerWidth(),L=this.wrapper.position(),p=this.container.height(),u=this.container.width(),_=s[M],j=s[H=l[M]],(d={})[j]="b"===M?f:"r"===M?$:0,C(d,"top",w.top-L.top),C(d,"left",w.left-L.left),g=0,x=(E=["top","left"]).length;g<x;g++)T=E[g],(P=parseInt(this.elem.css("margin-"+T),10))&&C(d,T,P);if(C(d,j,b=Math.max(0,this.options.gap-(this.options.arrowShow?o:0))),this.options.arrowShow){for(v=0,o=this.options.arrowSize,e=t.extend({},d),n=this.userContainer.css("border-color")||this.userContainer.css("border-top-color")||this.userContainer.css("background-color")||"white",S=h.length;v<S;v++)z=s[T=h[v]],T!==H&&(c=z===_?n:"transparent",e["border-"+z]=o+"px solid "+c);C(d,s[H],o),i.call(h,A)>=0&&C(e,s[A],2*o)}else this.arrow.hide();if(i.call(a,M)>=0?(C(d,"left",k(A,u,$)),e&&C(e,"left",k(A,o,y))):i.call(r,M)>=0&&(C(d,"top",k(A,p,f)),e&&C(e,"top",k(A,o,m))),this.container.is(":visible")&&(d.display="block"),this.container.removeAttr("style").css(d),e)return this.arrow.removeAttr("style").css(e)},j.prototype.getPosition=function(){var t,n,e,o,s,l,p,u;if(0===(t=c(u=this.options.position||(this.elem?this.options.elementPosition:this.options.globalPosition))).length&&(t[0]="b"),n=t[0],0>i.call(h,n))throw"Must be one of ["+h+"]";return(1===t.length||(e=t[0],i.call(a,e)>=0&&(o=t[1],0>i.call(r,o)))||(s=t[0],i.call(r,s)>=0&&(l=t[1],0>i.call(a,l))))&&(p=t[0],t[1]=i.call(r,p)>=0?"m":"l"),2===t.length&&(t[2]=t[1]),t},j.prototype.getStyle=function(t){var i;if(t||(t=this.options.style),t||(t="default"),!(i=p[t]))throw"Missing style: "+t;return i},j.prototype.updateClasses=function(){var i,n;return i=["base"],t.isArray(this.options.className)?i=i.concat(this.options.className):this.options.className&&i.push(this.options.className),n=this.getStyle(),i=t.map(i,function(t){return e+"-"+n.name+"-"+t}).join(" "),this.userContainer.attr("class",i)},j.prototype.run=function(i,n){var e,s,r,a,h;if(t.isPlainObject(n)?t.extend(this.options,n):"string"===t.type(n)&&(this.options.className=n),this.container&&!i){this.show(!1);return}if(this.container||i){for(r in s={},t.isPlainObject(i)?s=i:s[o]=i,s)e=s[r],(a=this.userFields[r])&&("text"===a&&(e=H(e),this.options.breakNewLines&&(e=e.replace(/\n/g,"<br/>"))),h=r===o?"":"="+r,b(this.userContainer,"[data-notify-"+a+h+"]").html(e));this.updateClasses(),this.elem?this.setElementPosition():this.setGlobalPosition(),this.show(!0),this.options.autoHide&&(clearTimeout(this.autohideTimer),this.autohideTimer=setTimeout(this.show.bind(this,!1),this.options.autoHideDelay))}},j.prototype.destroy=function(){this.wrapper.data(e,null),this.wrapper.remove()},t[n]=function(i,e,o){return i&&i.nodeName||i.jquery?t(i)[n](e,o):(o=e,e=i,new j(null,e,o)),i},t.fn[n]=function(i,n){return t(this).each(function(){var o=P(t(this)).data(e);o&&o.destroy(),new j(t(this),i,n)}),this},t.extend(t[n],{defaults:x,addStyle:y,removeStyle:m,pluginOptions:g,getStyle:f,insertCSS:w}),y("bootstrap",{html:"<div>\n<span data-notify-text></span>\n</div>",classes:{base:{},danger:{},success:{},info:{},warning:{}}}),t(function(){w(u.css).attr("id","core-notify"),t(document).on("click","."+e+"-hidable",function(i){t(this).trigger("notify-hide")}),t(document).on("notify-hide","."+e+"-wrapper",function(i){var n=t(this).data(e);n&&n.show(!1)})})});
</script>
@yield('pageScripts')
</body>
</html>
