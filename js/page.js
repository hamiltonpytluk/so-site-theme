jQuery.easing['jswing'] = jQuery.easing['swing'];

jQuery.extend( jQuery.easing,
{
	def: 'easeOutQuad',
	swing: function (x, t, b, c, d) {
		//alert(jQuery.easing.default);
		return jQuery.easing[jQuery.easing.def](x, t, b, c, d);
	},
	easeInQuad: function (x, t, b, c, d) {
		return c*(t/=d)*t + b;
	},
	easeOutQuad: function (x, t, b, c, d) {
		return -c *(t/=d)*(t-2) + b;
	},
	easeInOutQuad: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t + b;
		return -c/2 * ((--t)*(t-2) - 1) + b;
	},
	easeInCubic: function (x, t, b, c, d) {
		return c*(t/=d)*t*t + b;
	},
	easeOutCubic: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t + 1) + b;
	},
	easeInOutCubic: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t + b;
		return c/2*((t-=2)*t*t + 2) + b;
	},
	easeInQuart: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t + b;
	},
	easeOutQuart: function (x, t, b, c, d) {
		return -c * ((t=t/d-1)*t*t*t - 1) + b;
	},
	easeInOutQuart: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t + b;
		return -c/2 * ((t-=2)*t*t*t - 2) + b;
	},
	easeInQuint: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t*t + b;
	},
	easeOutQuint: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t*t*t + 1) + b;
	},
	easeInOutQuint: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t*t + b;
		return c/2*((t-=2)*t*t*t*t + 2) + b;
	},
	easeInSine: function (x, t, b, c, d) {
		return -c * Math.cos(t/d * (Math.PI/2)) + c + b;
	},
	easeOutSine: function (x, t, b, c, d) {
		return c * Math.sin(t/d * (Math.PI/2)) + b;
	},
	easeInOutSine: function (x, t, b, c, d) {
		return -c/2 * (Math.cos(Math.PI*t/d) - 1) + b;
	},
	easeInExpo: function (x, t, b, c, d) {
		return (t==0) ? b : c * Math.pow(2, 10 * (t/d - 1)) + b;
	},
	easeOutExpo: function (x, t, b, c, d) {
		return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
	},
	easeInOutExpo: function (x, t, b, c, d) {
		if (t==0) return b;
		if (t==d) return b+c;
		if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
		return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
	},
	easeInCirc: function (x, t, b, c, d) {
		return -c * (Math.sqrt(1 - (t/=d)*t) - 1) + b;
	},
	easeOutCirc: function (x, t, b, c, d) {
		return c * Math.sqrt(1 - (t=t/d-1)*t) + b;
	},
	easeInOutCirc: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return -c/2 * (Math.sqrt(1 - t*t) - 1) + b;
		return c/2 * (Math.sqrt(1 - (t-=2)*t) + 1) + b;
	},
	easeInElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return -(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
	},
	easeOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return a*Math.pow(2,-10*t) * Math.sin( (t*d-s)*(2*Math.PI)/p ) + c + b;
	},
	easeInOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d/2)==2) return b+c;  if (!p) p=d*(.3*1.5);
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		if (t < 1) return -.5*(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
		return a*Math.pow(2,-10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )*.5 + c + b;
	},
	easeInBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*(t/=d)*t*((s+1)*t - s) + b;
	},
	easeOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;
	},
	easeInOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158; 
		if ((t/=d/2) < 1) return c/2*(t*t*(((s*=(1.525))+1)*t - s)) + b;
		return c/2*((t-=2)*t*(((s*=(1.525))+1)*t + s) + 2) + b;
	},
	easeInBounce: function (x, t, b, c, d) {
		return c - jQuery.easing.easeOutBounce (x, d-t, 0, c, d) + b;
	},
	easeOutBounce: function (x, t, b, c, d) {
		if ((t/=d) < (1/2.75)) {
			return c*(7.5625*t*t) + b;
		} else if (t < (2/2.75)) {
			return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
		} else if (t < (2.5/2.75)) {
			return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
		} else {
			return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
		}
	},
	easeInOutBounce: function (x, t, b, c, d) {
		if (t < d/2) return jQuery.easing.easeInBounce (x, t*2, 0, c, d) * .5 + b;
		return jQuery.easing.easeOutBounce (x, t*2-d, 0, c, d) * .5 + c*.5 + b;
	}
});

(function(){var e,t;e=function(){function e(e){var t,n;this.options={target:"instafeed",get:"popular",resolution:"thumbnail",sortBy:"most-recent",links:!0,limit:15,mock:!1};if(typeof e=="object")for(t in e)n=e[t],this.options[t]=n;this.unique=this._genKey()}return e.prototype.run=function(){var t,n,r;if(typeof this.options.clientId!="string"&&typeof this.options.accessToken!="string")throw new Error("Missing clientId or accessToken.");if(typeof this.options.accessToken!="string"&&typeof this.options.clientId!="string")throw new Error("Missing clientId or accessToken.");return this.options.before!=null&&typeof this.options.before=="function"&&this.options.before.call(this),typeof document!="undefined"&&document!==null&&(r=document.createElement("script"),r.id="instafeed-fetcher",r.src=this._buildUrl(),t=document.getElementsByTagName("head"),t[0].appendChild(r),n="instafeedCache"+this.unique,window[n]=new e(this.options),window[n].unique=this.unique),!0},e.prototype.parse=function(e){var t,n,r,i,s,o,u,a,f,l,c,h,p,d,v;if(typeof e!="object"){if(this.options.error!=null&&typeof this.options.error=="function")return this.options.error.call(this,"Invalid JSON data"),!1;throw new Error("Invalid JSON response")}if(e.meta.code!==200){if(this.options.error!=null&&typeof this.options.error=="function")return this.options.error.call(this,e.meta.error_message),!1;throw new Error("Error from Instagram: "+e.meta.error_message)}if(e.data.length===0){if(this.options.error!=null&&typeof this.options.error=="function")return this.options.error.call(this,"No images were returned from Instagram"),!1;throw new Error("No images were returned from Instagram")}this.options.success!=null&&typeof this.options.success=="function"&&this.options.success.call(this,e);if(this.options.sortBy!=="most-recent"){this.options.sortBy==="random"?c=["","random"]:c=this.options.sortBy.split("-"),l=c[0]==="least"?!0:!1;switch(c[1]){case"random":e.data.sort(function(){return.5-Math.random()});break;case"recent":e.data=this._sortBy(e.data,"created_time",l);break;case"liked":e.data=this._sortBy(e.data,"likes.count",l);break;case"commented":e.data=this._sortBy(e.data,"comments.count",l);break;default:throw new Error("Invalid option for sortBy: '"+this.options.sortBy+"'.")}}if(typeof document!="undefined"&&document!==null&&this.options.mock===!1){document.getElementById(this.options.target).innerHTML="",u=e.data,u.length>this.options.limit&&(u=u.slice(0,this.options.limit+1||9e9));if(this.options.template!=null&&typeof this.options.template=="string"){i="",o="";for(h=0,d=u.length;h<d;h++)s=u[h],o=this._makeTemplate(this.options.template,{model:s,id:s.id,link:s.link,image:s.images[this.options.resolution].url,caption:this._getObjectProperty(s,"caption.text"),likes:s.likes.count,comments:s.comments.count,location:this._getObjectProperty(s,"location.name")}),i+=o;document.getElementById(this.options.target).innerHTML=i}else{n=document.createDocumentFragment();for(p=0,v=u.length;p<v;p++)s=u[p],a=document.createElement("img"),a.src=s.images[this.options.resolution].url,this.options.links===!0?(t=document.createElement("a"),t.href=s.link,t.appendChild(a),n.appendChild(t)):n.appendChild(a);document.getElementById(this.options.target).appendChild(n)}r=document.getElementsByTagName("head")[0],r.removeChild(document.getElementById("instafeed-fetcher")),f="instafeedCache"+this.unique,window[f]=void 0;try{delete window[f]}catch(m){}}return this.options.after!=null&&typeof this.options.after=="function"&&this.options.after.call(this),!0},e.prototype._buildUrl=function(){var e,t,n;e="https://api.instagram.com/v1";switch(this.options.get){case"popular":t="media/popular";break;case"tagged":if(typeof this.options.tagName!="string")throw new Error("No tag name specified. Use the 'tagName' option.");t="tags/"+this.options.tagName+"/media/recent";break;case"location":if(typeof this.options.locationId!="number")throw new Error("No location specified. Use the 'locationId' option.");t="locations/"+this.options.locationId+"/media/recent";break;case"user":if(typeof this.options.userId!="number")throw new Error("No user specified. Use the 'userId' option.");if(typeof this.options.accessToken!="string")throw new Error("No access token. Use the 'accessToken' option.");t="users/"+this.options.userId+"/media/recent";break;default:throw new Error("Invalid option for get: '"+this.options.get+"'.")}return n=""+e+"/"+t,this.options.accessToken!=null?n+="?access_token="+this.options.accessToken:n+="?client_id="+this.options.clientId,n+="&count="+this.options.limit,n+="&callback=instafeedCache"+this.unique+".parse",n},e.prototype._genKey=function(){var e;return e=function(){return((1+Math.random())*65536|0).toString(16).substring(1)},""+e()+e()+e()+e()},e.prototype._makeTemplate=function(e,t){var n,r,i,s,o;r=/(?:\{{2})([\w\[\]\.]+)(?:\}{2})/,n=e;while(r.test(n))i=n.match(r)[1],s=(o=this._getObjectProperty(t,i))!=null?o:"",n=n.replace(r,""+s);return n},e.prototype._getObjectProperty=function(e,t){var n,r;t=t.replace(/\[(\w+)\]/g,".$1"),r=t.split(".");while(r.length){n=r.shift();if(!(e!=null&&n in e))return null;e=e[n]}return e},e.prototype._sortBy=function(e,t,n){var r;return r=function(e,r){var i,s;return i=this._getObjectProperty(e,t),s=this._getObjectProperty(r,t),n?i>s?1:-1:i<s?1:-1},e.sort(r.bind(this)),e},e}(),t=typeof exports!="undefined"&&exports!==null?exports:window,t.Instafeed=e}).call(this);
var feed = new Instafeed({
    get: 'tagged',
    tagName: 'starlightorchestras',
    limit: 20,
    clientId: '43d2e373598e472b8481ee043570f462',
    resolution: 'thumbnail',
    template: '<a href="{{link}}" target="_blank"><img src="{{image}}" /></a>'
	
});
feed.run();

$(document).ready(function(){
	
	if($('#header').hasClass('interior')){
		$('#content').slideDown(2000,'easeInOutExpo');
	}
	$('.social a').attr('target','_blank');
	var num = $('.slide').length,
		cur = 1,
		ww = $(window).width();
		num++;
		
	$('#slides').css('width',num*ww);
	$('.slide').width(ww);
	if($('#header-slides img').height()<=425) {
		$('#header-slides img').addClass('stay');
	} else {
		$('#header-slides img').removeClass('stay');
	}
	$(window).resize(function(){
		ww = $(window).width();
		$('#slides').css('width',num*ww);
		$('.slide').width(ww);
		if($('#header-slides img').height()<=425) {
			$('#header-slides img').addClass('stay');
		} else {
			$('#header-slides img').removeClass('stay');
		}
	});

	$('.slide').each(function(e){
		$('<li class="to-slide-'+(e+1)+'" />').html('<a href="#"><span></span></a>').appendTo('#buttons ul');
	}); $('.to-slide-1').addClass('on');
	
	//build first
	$('#slide-1').fadeIn(600, function(){
		$('h2', this).animate({'opacity':1, 'left':0}, 600, 'easeOutExpo');
		$('.button', this).delay(200).animate({'opacity':1, 'left':0}, 600, 'easeOutExpo');			
	});  
	
	var running = false; 
	$('#buttons li a').on('click', function(e){
	
		e.preventDefault();
		clearInterval(autoslider);
		
		if(!running) {
			running = true;
			cur = $('#buttons li.on').index();
			cur++;
			var was = cur,
				cur = $(this).parent().attr('class').replace('to-slide-','');
				
				$('#slide-'+was+' h2').animate({'opacity':0, 'left':-2000}, 600, 'easeInExpo');
				$('#slide-'+was+' .button').delay(200).animate({'opacity':0, 'left':-2000}, 600, 'easeInExpo', function(){ 
					$('#slide-'+was).fadeOut(600);
					running = false;
				});			 			
				
				$('#slide-'+cur).delay(600).css('z-index',10).fadeIn(600, function(){
					$('#slide-'+cur+' h2').animate({'opacity':1, 'left':0}, 600, 'easeOutExpo');
					$('#slide-'+cur+' .button').delay(200).animate({'opacity':1, 'left':0}, 600, 'easeOutExpo', function(){
						$('#slide-'+cur).css('z-index',1);	
						running = false;	
					});			
				});		
				
				$('.to-slide-'+cur).addClass('on').siblings().removeClass('on');
				
		} else { return false; }
	});
	
	function autoslide(){
		var was = cur;
			cur++;
			if(num<=cur) { cur = 1; }
			
			$('#slide-'+was+' h2').animate({'opacity':0, 'left':-2000}, 600, 'easeInExpo');
			$('#slide-'+was+' .button').delay(200).animate({'opacity':0, 'left':-2000}, 600, 'easeInExpo', function(){ 
				$('#slide-'+was).fadeOut(600);
			});			 			
			
			$('#slide-'+cur).delay(600).css('z-index',10).fadeIn(600, function(){
				$('#slide-'+cur+' h2').animate({'opacity':1, 'left':0}, 600, 'easeOutExpo');
				$('#slide-'+cur+' .button').delay(200).animate({'opacity':1, 'left':0}, 600, 'easeOutExpo', function(){
					$('#slide-'+cur).css('z-index',1);		
				});			
			});		
			
			$('.to-slide-'+cur).addClass('on').siblings().removeClass('on');
			
	}	var autoslider = setInterval( autoslide, 5000);
	
	$('*[title="Blog"]').attr('target','_blank');
	
	//testimonials
	var ts = $('.testimonial ul li').length;
	function testimonials(){
		var next = $('.testimonial ul li.on').index();
		next++;
		if(ts==next) { next == 0 }
		$('.testimonial ul li.on').animate({'top':'-200px'}, 1200, 'easeInOutExpo', function(){
			$(this).removeClass('on').css('top','0');
		});
		$('.testimonial ul li').eq(next).css('top',200).addClass('on').animate({'top':'0px'}, 1200, 'easeInOutExpo');
	}	var autostart = setInterval(function(){testimonials()}, 7500)
	
	$('.slide .button a[href="#video"]').on('click', function(e){
		e.preventDefault();
		var video = '<div class="embed-container"><iframe src="http://www.youtube.com/embed/cXyFBSSmDH4" frameborder="0" allowfullscreen></iframe></div>';
		$('<div class="popup-overlay" />').appendTo('body').fadeIn(600, function(){
			$('<div class="popup-box" />').appendTo('body').fadeIn(1000);
			$('<div class="video" />').html(video).appendTo('.popup-box');
		});		
		$('<div class="popup-close"><a href="#">Close Window</a></div>').appendTo('body').fadeIn(600);
		$('.popup-close a').on('click', function(e){
			e.preventDefault();
			$('.popup-close, .popup-overlay, .popup-box').fadeOut(600, function(){
				$(this).remove();
			});
		});
	}); 
	
	var hscur = 0,
		hslen = $('#header-slides ul li').length;
		$('#header-slides ul li').eq(hscur).show();
	function headerslides(){
		var was = hscur;
			hscur++;
			if(hslen<=hscur) { hscur = 0; }
		$('#header-slides ul li').eq(was).css('z-index','1').fadeOut(1000);
		$('#header-slides ul li').eq(hscur).css('z-index','10').fadeIn(1000);					
	}	var headerslider = setInterval( headerslides, 5000);

});
