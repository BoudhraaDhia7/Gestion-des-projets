PROCEDURE DE MISE A JOUR DE PHOTOSWIPE
**************************************

Aller sur http://photoswipe.com/documentation/getting-started.html et voir s'il y a une MAJ. Actuellement on utilise la version 4.0.6

- Remplacer les scripts actuels par les nouveaux, et v?rifier s'il n'y a pas de nouvelles inclusions ? mettre dans le code depuis la page "get started" de la documentation.
- v?rifier dans la doc si au niveau du Step2 de la doc que le code HTML n'a pas chang?. En cas de doute le minifier et le copier-coller dans TOWeb  l'endroit de utwData.pas o? il y a un rem // PHOTOSWIPE_HTML
- de m?me en cas de gros changement sur ma mani?re d'instancier la gallerie, modifier le code JS au niveau du rem // PHOTOSWIPE_JS dans utwData.pas (ce code est personnel il n'est pas copi?-coll? du site ? part la ligne qui cr??e la gallerie avec un new PhotoSwipe)

MODIFICATION DU COMPORTEMENT DU BOUTON SHARE
********************************************
On d?tourne ce bouton pour revenir ? la version HTML de la photo

- ouvrir le fichier photoswipe-ui-default.min.js puis rechercher et ins?rer ce bout de code ? cet emplacement :

	F()}},{name:"button--share",option:"shareEl",onInit:function(a){h=a},onTap:function(){
	<AJOUTER>
	document.location.href=a.currItem.href;return;
	</AJOUTER>
	F()}},{name:"button--zoom",option:"zoomEl",onTap:a.toggleDesktopZoom},

- tester le composant avec TOWeb et v?rifier notamment qu'un clic sur le bouton "Share" ram?ne bien ? la version HTML de la page et n'affiche aucun menu de partage

RAJOUT DE LA FONCTION DIAPORAMA
*******************************
Pour rajouter la fonction diapo ? PS, on a utilis? le code de cette page : https://photoswipe.uservoice.com/forums/275302-feature-requests-ideas/suggestions/6964114-autoplay

- au niveau du code JS il est dans TOWeb donc rien ? faire. On peut juste changer le d?lai de 3 secondes (3000ms) si on le souhaite (ou qu'on souhaite le rendre param?trable)

- ouvrir le fichier photoswipe-ui-default.min.js puis rechercher et ins?rer ce bout de code ? cet emplacement :

	{name:"button--zoom",option:"zoomEl",onTap:a.toggleDesktopZoom},
	<AJOUTER>
	{name:"button--autoplay",option:"autoPlay",onTap:function(){if(_autoplayId){clearInterval(_autoplayId);_autoplayId = null;$('.pswp__button--autoplay').removeClass('stop');}else{_autoplayId=setInterval(function(){a.next();},3000);$('.pswp__button--autoplay').addClass('stop');}}},
	</AJOUTER>
	{name:"counter",option:"counterEl",onInit:function(a){g=a}},

- toujours dans le m?me fichier photoswipe-ui-default.min.js ajouter ceci 

	function(){"use strict";
	<AJOUTER>
	var _autoplayId = null;
	</AJOUTER>
	var a=function(a,b)

- ouvrir \default-skin\default-skin.css et copier-coller ces lignes ? la fin

	.pswp__button--autoplay {
		background: transparent url(play_icon.png) no-repeat scroll 16px 14px !important;
		background-size:auto 16px !important;
	}
	.pswp__button--autoplay.stop {
		background-image: url(stop_icon.png) !important;
	}
	
- copier dans \default-skin\ les ic?nes play_icon.png et stop_icon.png qui se trouvent dans C:\LAUYAN\Shared\Dev\Resources\Icons

- lancer un aper?u d'un album et v?rifier que le diaporama fonctionne toujours


