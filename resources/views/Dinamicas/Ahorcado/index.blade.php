@extends('layouts.index')

@section('content')

<link rel="stylesheet" href="{{asset('css/Dinamicas/ahorcado.css')}}">  

<!-- write your code here -->
<script src="https://code.createjs.com/1.0.0/createjs.min.js"></script>

<!--Bootstrap-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<script type='text/javascript' src="{{ asset('js/Dinamicas/Ahorcado/munecoJS.js')}}"></script>

<script>
	var canvas, stage, exportRoot, anim_container, dom_overlay_container, fnStartAnimation;
	function init() {
		canvas = document.getElementById("canvas");
		anim_container = document.getElementById("animation_container");
		dom_overlay_container = document.getElementById("dom_overlay_container");
		var comp=AdobeAn.getComposition("4921798AC5B22C42BF9B911A71A12F7E");
		var lib=comp.getLibrary();
		var loader = new createjs.LoadQueue(false);
		loader.addEventListener("fileload", function(evt){handleFileLoad(evt,comp)});
		loader.addEventListener("complete", function(evt){handleComplete(evt,comp)});
		var lib=comp.getLibrary();
		loader.loadManifest(lib.properties.manifest);
	}
	function handleFileLoad(evt, comp) {
		var images=comp.getImages();	
		if (evt && (evt.item.type == "image")) { images[evt.item.id] = evt.result; }	
	}
	function handleComplete(evt,comp) {
		//This function is always called, irrespective of the content. You can use the variable "stage" after it is created in token create_stage.
		var lib=comp.getLibrary();
		var ss=comp.getSpriteSheet();
		var queue = evt.target;
		var ssMetadata = lib.ssMetadata;
		for(i=0; i<ssMetadata.length; i++) {
			ss[ssMetadata[i].name] = new createjs.SpriteSheet( {"images": [queue.getResult(ssMetadata[i].name)], "frames": ssMetadata[i].frames} )
		}
		exportRoot = new lib.ahorcado2();
		stage = new lib.Stage(canvas);	
		//Registers the "tick" event listener.
		fnStartAnimation = function() {
			stage.addChild(exportRoot);
			createjs.Ticker.framerate = lib.properties.fps;
			createjs.Ticker.addEventListener("tick", stage);
		}	    
		//Code to support hidpi screens and responsive scaling.
		AdobeAn.makeResponsive(true,'both',true,1,[canvas,anim_container,dom_overlay_container]);	
		AdobeAn.compositionLoaded(lib.properties.id);
		fnStartAnimation();
	}
</script>
	<div class="cuerpo">
		<div class="row">
			<div class="col-md-12">
				
				<div class="row">
					<div class="col-md-12">
						
						<div class="materias">
							<select id="asignatura">
								<option value="fisica" selected>Fisica</option>
								<option value="artes">Artes</option>
								<option value="geografia">Geografia</option>
							</select>
							
							<input type="button" value="Iniciar Juego" id="btnCorrer" >
						</div>
										
					</div>
				</div>

				<div class="row">
					<div class="col-md-7">
				
						<div class="palabras">
							<label class="letra">JUEGO DEL AHORCADO</label>
							<!-- Aqui van los espacios de las palabras-->
						</div>
			
						<div id="animation_container">
							<canvas id="canvas"  style="position: absolute; display: block;"></canvas>
							<div id="dom_overlay_container" style="pointer-events:none; overflow:hidden; position: absolute; left: 0px; top: 0px; display: block;"></div>
						</div>
					</div>
			
					<div class="col-md-5">
						
						<div class="alfabeto">
							<!-- Aqui van los botones con las letras-->
						</div>
						
					</div>
				</div>

			</div>
		</div>
	</div>
	
	  
	<script type='text/javascript' src="{{ asset('js/Dinamicas/Ahorcado/ahorcadoJS.js')}}"></script>


@endsection