console.log("[olark] This site is using the Olark Wordpress Plugin");
console.log("[olark] site ID = "+olark_vars.site_ID);
(function(o,l,a,r,k,y){if(o.olark)return;
r="script";y=l.createElement(r);r=l.getElementsByTagName(r)[0];
y.async=1;y.src="//"+a;r.parentNode.insertBefore(y,r);
y=o.olark=function(){k.s.push(arguments);k.t.push(+new Date)};
y.extend=function(i,j){y("extend",i,j)};
y.identify=function(i){y("identify",k.i=i)};
y.configure=function(i,j){y("configure",i,j);k.c[i]=j};
k=y._={s:[],t:[+new Date],c:{},l:a};
})(window,document,"static.olark.com/jsclient/loader.js");
/* Add configuration calls below this comment */
if (olark_vars.expand != 0){
	olark.configure('box.start_expanded', true);
	console.log("[olark] Wordpress start_expanded option is enabled");
}else {
    olark.configure('box.start_expanded', false);
	console.log("[olark] The wordpress plugin has start_expanded set to false");
};
if (olark_vars.float != 0){
	olark.configure('system.hb_detached', true);
	console.log("[olark] Wordpress detached option is enabled");
}else {
    olark.configure('system.hb_detached', false);
	console.log("[olark] The wordpress plugin has detached set to false");
};
olark.configure("system.localization", olark_vars.lang);
console.log("[olark] Language chosen in Wordpress is " +olark_vars.lang);
eval(olark_vars.api);
if (olark_vars.api.length < 2) {
	console.log("[olark] There are no additional api calls used in the Wordpress plugin");
}else {
	console.log("[olark] additional api calls in Wordpress are as follows " +olark_vars.api);
};
olark.identify(olark_vars.site_ID);
