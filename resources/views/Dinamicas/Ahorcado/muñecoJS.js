(function (cjs, an) {

var p; // shortcut to reference prototypes
var lib={};var ss={};var img={};

var cabeza;
var brazoDe;
var brazoIz;
var torzo;
var piernaIz;
var piernaDe;

lib.ssMetadata = [
		{name:"ahorcado_atlas_", frames: [[0,487,143,177],[429,487,62,109],[347,487,80,101],[510,183,81,320],[329,0,174,227],[250,487,95,103],[145,487,103,103],[0,326,508,159],[0,0,327,324],[505,0,191,181]]}
];


// symbols:



(lib.CachedBmp_10 = function() {
	this.initialize(ss["ahorcado_atlas_"]);
	this.gotoAndStop(0);
}).prototype = p = new cjs.Sprite();



(lib.CachedBmp_9 = function() {
	this.initialize(ss["ahorcado_atlas_"]);
	this.gotoAndStop(1);
}).prototype = p = new cjs.Sprite();



(lib.CachedBmp_8 = function() {
	this.initialize(ss["ahorcado_atlas_"]);
	this.gotoAndStop(2);
}).prototype = p = new cjs.Sprite();



(lib.CachedBmp_7 = function() {
	this.initialize(ss["ahorcado_atlas_"]);
	this.gotoAndStop(3);
}).prototype = p = new cjs.Sprite();



(lib.CachedBmp_6 = function() {
	this.initialize(ss["ahorcado_atlas_"]);
	this.gotoAndStop(4);
}).prototype = p = new cjs.Sprite();



(lib.CachedBmp_5 = function() {
	this.initialize(ss["ahorcado_atlas_"]);
	this.gotoAndStop(5);
}).prototype = p = new cjs.Sprite();



(lib.CachedBmp_4 = function() {
	this.initialize(ss["ahorcado_atlas_"]);
	this.gotoAndStop(6);
}).prototype = p = new cjs.Sprite();



(lib.CachedBmp_3 = function() {
	this.initialize(ss["ahorcado_atlas_"]);
	this.gotoAndStop(7);
}).prototype = p = new cjs.Sprite();



(lib.CachedBmp_2 = function() {
	this.initialize(ss["ahorcado_atlas_"]);
	this.gotoAndStop(8);
}).prototype = p = new cjs.Sprite();



(lib.CachedBmp_1 = function() {
	this.initialize(ss["ahorcado_atlas_"]);
	this.gotoAndStop(9);
}).prototype = p = new cjs.Sprite();
// helper functions:

function mc_symbol_clone() {
	var clone = this._cloneProps(new this.constructor(this.mode, this.startPosition, this.loop));
	clone.gotoAndStop(this.currentFrame);
	clone.paused = this.paused;
	clone.framerate = this.framerate;
	return clone;
}

function getMCSymbolPrototype(symbol, nominalBounds, frameBounds) {
	var prototype = cjs.extend(symbol, cjs.MovieClip);
	prototype.clone = mc_symbol_clone;
	prototype.nominalBounds = nominalBounds;
	prototype.frameBounds = frameBounds;
	return prototype;
	}


(lib.Torzo = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Capa_1
	this.instance = new lib.CachedBmp_10();
	this.instance.setTransform(-0.5,-0.5,0.5,0.5);

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

	this._renderFirstFrame();

}).prototype = getMCSymbolPrototype(lib.Torzo, new cjs.Rectangle(-0.5,-0.5,71.5,88.5), null);


(lib.PiernaIz = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Capa_1
	this.instance = new lib.CachedBmp_9();
	this.instance.setTransform(-0.5,-0.5,0.5,0.5);

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

	this._renderFirstFrame();

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-0.5,-0.5,31,54.5);


(lib.PiernaDer = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Capa_1
	this.instance = new lib.CachedBmp_8();
	this.instance.setTransform(-0.5,-0.5,0.5,0.5);

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

	this._renderFirstFrame();

}).prototype = getMCSymbolPrototype(lib.PiernaDer, new cjs.Rectangle(-0.5,-0.5,40,50.5), null);


(lib.Cabeza = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Capa_1
	this.instance = new lib.CachedBmp_6();
	this.instance.setTransform(-0.5,-0.5,0.5,0.5);

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

	this._renderFirstFrame();

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-0.5,-0.5,87,113.5);


(lib.BrazoIz = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Capa_1
	this.instance = new lib.CachedBmp_5();
	this.instance.setTransform(-0.5,-0.5,0.5,0.5);

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

	this._renderFirstFrame();

}).prototype = getMCSymbolPrototype(lib.BrazoIz, new cjs.Rectangle(-0.5,-0.5,47.5,51.5), null);


(lib.BrazoDer = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Capa_1
	this.instance = new lib.CachedBmp_4();
	this.instance.setTransform(38.5,5.85,0.5,0.5);

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

	this._renderFirstFrame();

}).prototype = getMCSymbolPrototype(lib.BrazoDer, new cjs.Rectangle(38.5,5.9,51.5,51.5), null);


(lib.personaje = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Cabeza
	this.cabeza = new lib.Cabeza();
	this.cabeza.setTransform(18.6,94.2,1,1,0,0,0,43.1,56.1);

	this.timeline.addTween(cjs.Tween.get(this.cabeza).wait(1));

	// Soga
	this.instance = new lib.CachedBmp_7();
	this.instance.setTransform(-0.5,-0.5,0.5,0.5);

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

	// brazoDer
	this.brazoDer = new lib.BrazoDer();
	this.brazoDer.setTransform(38.55,175.45,1,1,0,0,0,44.6,28.4);

	this.timeline.addTween(cjs.Tween.get(this.brazoDer).wait(1));

	// piernaDer
	this.piernaDer = new lib.PiernaDer();
	this.piernaDer.setTransform(59.95,239.85,1,1,0,0,0,19.5,24.8);

	this.timeline.addTween(cjs.Tween.get(this.piernaDer).wait(1));

	// Torzo
	this.torzo = new lib.Torzo();
	this.torzo.setTransform(26.35,185.8,1,1,0,0,0,35.3,43.7);

	this.timeline.addTween(cjs.Tween.get(this.torzo).wait(1));

	// brazoIz
	this.brazoIz = new lib.BrazoIz();
	this.brazoIz.setTransform(-18.15,191.2,1,1,0,0,0,23.2,25.3);

	this.timeline.addTween(cjs.Tween.get(this.brazoIz).wait(1));

	// piernaIz
	this.piernaIz = new lib.PiernaIz();
	this.piernaIz.setTransform(0.6,248.5,1,1,0,0,0,14.9,26.8);

	this.timeline.addTween(cjs.Tween.get(this.piernaIz).wait(1));

	this._renderFirstFrame();

	//Guardar en variables globales
	cabeza = this.cabeza;
	brazoDe = this.brazoDer;	
	piernaDe = this.piernaDer;
	torzo = this.torzo;
	brazoIz = this.brazoIz; 
	piernaIz = this.piernaIz;
	ocultarPiezas();

}).prototype = getMCSymbolPrototype(lib.personaje, new cjs.Rectangle(-41.8,-0.5,125.8,276.2), null);


// stage content:
(lib.ahorcado2 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Personaje
	this.instance = new lib.personaje();
	this.instance.setTransform(90.55,51.6,0.5466,0.468,0,10.3012,7.4734,19.6,80.4);

	this.timeline.addTween(cjs.Tween.get(this.instance).to({regX:19.7,regY:80.5,scaleY:0.4679,skewX:-5.9316,skewY:-8.7581,x:99.6,y:51.9},39).to({regX:19.6,regY:80.4,scaleY:0.468,skewX:10.3012,skewY:7.4734,x:90.55,y:51.6},40).wait(1));

	// Soga
	this.instance_1 = new lib.CachedBmp_1();
	this.instance_1.setTransform(98.35,0,0.5,0.5);

	this.timeline.addTween(cjs.Tween.get(this.instance_1).wait(80));

	// Horca
	this.instance_2 = new lib.CachedBmp_2();
	this.instance_2.setTransform(58.9,2.8,0.5,0.5);

	this.timeline.addTween(cjs.Tween.get(this.instance_2).wait(80));

	// Escalera
	this.instance_3 = new lib.CachedBmp_3();
	this.instance_3.setTransform(0,143.7,0.5,0.5);

	this.timeline.addTween(cjs.Tween.get(this.instance_3).wait(80));

	this._renderFirstFrame();

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(127,111.5,127,111.69999999999999);
// library properties:
lib.properties = {
	id: '4921798AC5B22C42BF9B911A71A12F7E',
	width: 254,
	height: 223,
	fps: 30,
	color: "#FFFFFF",
	opacity: 1.00,
	manifest: [
		{src:"images/ahorcado_atlas_.png", id:"ahorcado_atlas_"}
	],
	preloads: []
};



// bootstrap callback support:

(lib.Stage = function(canvas) {
	createjs.Stage.call(this, canvas);
}).prototype = p = new createjs.StageGL();

p.setAutoPlay = function(autoPlay) {
	this.tickEnabled = autoPlay;
}
p.play = function() { this.tickEnabled = true; this.getChildAt(0).gotoAndPlay(this.getTimelinePosition()) }
p.stop = function(ms) { if(ms) this.seek(ms); this.tickEnabled = false; }
p.seek = function(ms) { this.tickEnabled = true; this.getChildAt(0).gotoAndStop(lib.properties.fps * ms / 1000); }
p.getDuration = function() { return this.getChildAt(0).totalFrames / lib.properties.fps * 1000; }

p.getTimelinePosition = function() { return this.getChildAt(0).currentFrame / lib.properties.fps * 1000; }

an.bootcompsLoaded = an.bootcompsLoaded || [];
if(!an.bootstrapListeners) {
	an.bootstrapListeners=[];
}

an.bootstrapCallback=function(fnCallback) {
	an.bootstrapListeners.push(fnCallback);
	if(an.bootcompsLoaded.length > 0) {
		for(var i=0; i<an.bootcompsLoaded.length; ++i) {
			fnCallback(an.bootcompsLoaded[i]);
		}
	}
};

an.compositions = an.compositions || {};
an.compositions['4921798AC5B22C42BF9B911A71A12F7E'] = {
	getStage: function() { return exportRoot.stage; },
	getLibrary: function() { return lib; },
	getSpriteSheet: function() { return ss; },
	getImages: function() { return img; }
};

an.compositionLoaded = function(id) {
	an.bootcompsLoaded.push(id);
	for(var j=0; j<an.bootstrapListeners.length; j++) {
		an.bootstrapListeners[j](id);
	}
}

an.getComposition = function(id) {
	return an.compositions[id];
}


an.makeResponsive = function(isResp, respDim, isScale, scaleType, domContainers) {		
	var lastW, lastH, lastS=1;		
	window.addEventListener('resize', resizeCanvas);		
	resizeCanvas();		
	function resizeCanvas() {			
		var w = lib.properties.width, h = lib.properties.height;			
		var iw = window.innerWidth, ih=window.innerHeight;			
		var pRatio = window.devicePixelRatio || 1, xRatio=iw/w, yRatio=ih/h, sRatio=1;			
		if(isResp) {                
			if((respDim=='width'&&lastW==iw) || (respDim=='height'&&lastH==ih)) {                    
				sRatio = lastS;                
			}				
			else if(!isScale) {					
				if(iw<w || ih<h)						
					sRatio = Math.min(xRatio, yRatio);				
			}				
			else if(scaleType==1) {					
				sRatio = Math.min(xRatio, yRatio);				
			}				
			else if(scaleType==2) {					
				sRatio = Math.max(xRatio, yRatio);				
			}			
		}			
		domContainers[0].width = w * pRatio * sRatio;			
		domContainers[0].height = h * pRatio * sRatio;			
		domContainers.forEach(function(container) {				
			container.style.width = w * sRatio + 'px';				
			container.style.height = h * sRatio + 'px';			
		});			
		stage.scaleX = pRatio*sRatio;			
		stage.scaleY = pRatio*sRatio;			
		lastW = iw; lastH = ih; lastS = sRatio;            
		stage.tickOnUpdate = false;            
		stage.update();            
		stage.tickOnUpdate = true;		
	}
}

mostrarPieza = function(val){
	switch(val){
		case 0: piernaIz.visible = true; break;
		case 1: piernaDe.visible = true; break;
		case 2: brazoIz.visible = true; break;
		case 3: brazoDe.visible = true; break;
		case 4: torzo.visible = true; break;
		case 5: cabeza.visible = true; break;
	}
}

ocultarPiezas = function(){
	piernaIz.visible = false;
	piernaDe.visible = false;
	brazoIz.visible = false; 
	brazoDe.visible = false; 
	torzo.visible = false; 
	cabeza.visible = false; 
}

})(createjs = createjs||{}, AdobeAn = AdobeAn||{});
var createjs, AdobeAn;