$(document).ready(function(){function d(a,b){a.timer&&clearInterval(a.timer);a.timer=setInterval(function(){for(var d in b){var c=parseInt,e;e=d;e=a.currentStyle?a.currentStyle[e]:getComputedStyle(a,!1)[e];c=(c=c(e))?c:0;e=(b[d]-c)/5;e=0<e?Math.ceil(e):Math.floor(e);a.style[d]=c+e+"px";c==b[d]&&clearInterval(a.timer)}},30)}function f(){d(u,{left:-a*v});a<l?d(h,{left:0}):a+l<=c?d(h,{left:-(a-l+1)*m}):d(h,{left:-(c-3)*m});for(var b=0;b<c;b++)g[b].className="",b==a&&(g[b].className="on")}function k(){a++;a=a==c?0:a;f()}var b=document.getElementById("picBox"),w=document.getElementById("listBox"),n=document.getElementById("prev"),p=document.getElementById("next"),q=document.getElementById("prevTop"),r=document.getElementById("nextTop"),x=b.getElementsByTagName("li"),g=w.getElementsByTagName("li"),y=x.length,c=g.length,u=b.getElementsByTagName("ul")[0],h=w.getElementsByTagName("ul")[0],v=x[0].offsetWidth,m=g[0].offsetWidth;u.style.width=v*y+"px";h.style.width=m*c+"px";var a=0,l=Math.ceil(1.5);r.onclick=p.onclick=function(){a++;a=a==c?0:a;f()};n.onmouseover=p.onmouseover=q.onmouseover=r.onmouseover=function(){clearInterval(t)};n.onmouseout=p.onmouseout=q.onmouseout=r.onmouseout=function(){t=setInterval(k,5E3)};q.onclick=n.onclick=function(){a--;a=-1==a?c-1:a;f()};for(var t=null,t=setInterval(k,5E3),b=0;b<c;b++)g[b].index=b,g[b].onclick=function(){a=this.index;f()}});$().ready(function(){window.setTimeout(function(){$(".locfca").click(function(){$("html,body").animate({scrollTop:$(".locfcap").offset().top-20},370)});$(".locfcb").click(function(){$("html,body").animate({scrollTop:$(".locfcbp").offset().top-20},370)});$(".locfcc").click(function(){$("html,body").animate({scrollTop:$(".locfccp").offset().top-20},370)})},400)});$(document).ready(function(){var d=$("#sticky"),f=d.offset().top,k=d.css("marginTop");d.css("marginLeft");$(window).scroll(function(){var b=$(window).scrollTop();b>=f&&d.css({marginTop:-630,position:"fixed"});b<f&&d.css({marginTop:k,position:"relative"})})});