var TO_RADIANS = Math.PI / 180;
var canvas;
var ctx;
var vez = "true";
var x;
var y;
var dragok = false;
var peca_1;
var peca_2;
var peca_3;
var peca_4;
var peca_5;
var peca_6;
var peca_7;
var key;
var pecas = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28"];
var pecasInimigas = [];

function Peca() {

	this.posX;
	this.PosY;
	this.img;
	this.drag = false;
	this.keyQ = false;
	this.jogada = "false";
}

function clear() {
	ctx.clearRect(0, 0, canvas.width, canvas.height);
}

function criarImagens() {

	peca_1 = new Peca();
	peca_1.posX = canvas.width - 200;
	peca_1.posY = canvas.height - 400;
	peca_1.img = new Image();
	pecas = shuffle(pecas);
	peca_1.img.src = "sprites/peca_" + pecas[0] + ".gif";
	pecas.splice(0, 1);

	peca_2 = new Peca();
	peca_2.posX = canvas.width - 200;
	peca_2.posY = canvas.height - 350;
	peca_2.img = new Image();
	pecas = shuffle(pecas);
	peca_2.img.src = "sprites/peca_" + pecas[1] + ".gif";
	pecas.splice(1, 1);

	peca_3 = new Peca();
	peca_3.posX = canvas.width - 200;
	peca_3.posY = canvas.height - 300;
	peca_3.img = new Image();
	pecas = shuffle(pecas);
	peca_3.img.src = "sprites/peca_" + pecas[2] + ".gif";
	pecas.splice(2, 1);

	peca_4 = new Peca();
	peca_4.posX = canvas.width - 200;
	peca_4.posY = canvas.height - 250;
	peca_4.img = new Image();
	pecas = shuffle(pecas);
	peca_4.img.src = "sprites/peca_" + pecas[3] + ".gif";
	pecas.splice(3, 1);

	peca_5 = new Peca();
	peca_5.posX = canvas.width - 100;
	peca_5.posY = canvas.height - 400;
	peca_5.img = new Image();
	pecas = shuffle(pecas);
	peca_5.img.src = "sprites/peca_" + pecas[4] + ".gif";
	pecas.splice(4, 1);

	peca_6 = new Peca();
	peca_6.posX = canvas.width - 100;
	peca_6.posY = canvas.height - 350;
	peca_6.img = new Image();
	pecas = shuffle(pecas);
	peca_6.img.src = "sprites/peca_" + pecas[5] + ".gif";
	pecas.splice(5, 1);

	peca_7 = new Peca();
	peca_7.posX = canvas.width - 100;
	peca_7.posY = canvas.height - 300;
	peca_7.img = new Image();
	pecas = shuffle(pecas);
	peca_7.img.src = "sprites/peca_" + pecas[6] + ".gif";
	pecas.splice(6, 1);

	peca_1.img.onload = function() {
		ctx.drawImage(peca_1.img, peca_1.posX, peca_1.posY);
	};

	peca_2.img.onload = function() {
		ctx.drawImage(peca_2.img, peca_2.posX, peca_2.posY);
	};

	peca_3.img.onload = function() {
		ctx.drawImage(peca_3.img, peca_3.posX, peca_3.posY);
	};

	peca_4.img.onload = function() {
		ctx.drawImage(peca_4.img, peca_4.posX, peca_4.posY);
	};

	peca_5.img.onload = function() {
		ctx.drawImage(peca_5.img, peca_5.posX, peca_5.posY);
	};

	peca_6.img.onload = function() {
		ctx.drawImage(peca_6.img, peca_6.posX, peca_6.posY);
	};

	peca_7.img.onload = function() {
		ctx.drawImage(peca_7.img, peca_7.posX, peca_7.posY);
	};

}

function loadCanvas(requestXML){

  //canvas = document.getElementById("mesaDomino");
  //ctx = canvas.getContext("2d");
   
  var pecasIni = requestXML.getElementsByTagName("peca");
  
	 for(var i=0; i<pecasIni.length; i++){
	 	
	 //	alert("i = "+i);
         
         pecasInimigas[i] = new Peca();
         pecasInimigas[i].img = new Image();
         pecasInimigas[i].img.src = pecasIni[i].getAttribute("img");
         pecasInimigas[i].posX = pecasIni[i].getAttribute("posX");
         pecasInimigas[i].posY = pecasIni[i].getAttribute("posY");
         //lado = (pecasIni[i].getAttribute("virada") == "true")?true:false;
         //alert(test);
         pecasInimigas[i].keyQ = (pecasIni[i].getAttribute("virada") === "true");
         //pecasInimigas[i].keyQ = pecasIni[i].getAttribute("virada");
         
       //  alert("img.src = "+pecasInimigas[i].img.src);
         //alert("keyQ = "+pecasInimigas[i].keyQ);
         
         if(pecasInimigas[i].keyQ) {
      
           pecasInimigas[i].img.onload = function() {
           
             drawRotatedImage(pecasInimigas[i].img, pecasInimigas[i].posX, pecasInimigas[i].posY, 90);
           
           };
      
         }else {
         
           pecasInimigas[i].img.onload = function() {
    
             ctx.drawImage(pecasInimigas[i].img, pecasInimigas[i].posX, pecasInimigas[i].posY);
         
           };
         
         }
         
         
				//alert(pecas[i].getAttribute("posX"));
	 }

}

function init() {
	canvas = document.getElementById("mesaDomino");
	ctx = canvas.getContext("2d");
	canvas.addEventListener('keydown', doKeyDown, true);
	ctx.fillRect(50, 20, 90, 30);

	criarImagens();
	return setInterval(draw, 10);
}

function draw() {
	clear();
	ctx.fillRect(500, 0, 40, canvas.height);
	if (peca_1.drag == true) {
		if (peca_1.keyQ)
			drawRotatedImage(peca_1.img, peca_1.posX, peca_1.posY, 90);
		else
			ctx.drawImage(peca_1.img, x - (peca_1.img.width / 2), y - (peca_1.img.height / 2));
	} else {
		if (peca_1.keyQ)
			drawRotatedImage(peca_1.img, peca_1.posX, peca_1.posY, 90);
		else
			ctx.drawImage(peca_1.img, peca_1.posX, peca_1.posY);
	}
	if (peca_2.drag == true) {
		if (peca_2.keyQ)
			drawRotatedImage(peca_2.img, peca_2.posX, peca_2.posY, 90);
		else
			ctx.drawImage(peca_2.img, x - (peca_2.img.width / 2), y - (peca_2.img.height / 2));
	} else {
		if (peca_2.keyQ)
			drawRotatedImage(peca_2.img, peca_2.posX, peca_2.posY, 90);
		else
			ctx.drawImage(peca_2.img, peca_2.posX, peca_2.posY);
	}
	if (peca_3.drag == true) {
		if (peca_3.keyQ)
			drawRotatedImage(peca_3.img, peca_3.posX, peca_3.posY, 90);
		else
			ctx.drawImage(peca_3.img, x - (peca_3.img.width / 2), y - (peca_3.img.height / 2));
	} else {
		if (peca_3.keyQ)
			drawRotatedImage(peca_3.img, peca_3.posX, peca_3.posY, 90);
		else
			ctx.drawImage(peca_3.img, peca_3.posX, peca_3.posY);
	}
	if (peca_4.drag == true) {
		if (peca_4.keyQ)
			drawRotatedImage(peca_4.img, peca_4.posX, peca_4.posY, 90);
		else
			ctx.drawImage(peca_4.img, x - (peca_4.img.width / 2), y - (peca_4.img.height / 2));
	} else {
		if (peca_4.keyQ)
			drawRotatedImage(peca_4.img, peca_4.posX, peca_4.posY, 90);
		else
			ctx.drawImage(peca_4.img, peca_4.posX, peca_4.posY);
	}
	if (peca_5.drag == true) {
		if (peca_5.keyQ)
			drawRotatedImage(peca_5.img, peca_5.posX, peca_5.posY, 90);
		else
			ctx.drawImage(peca_5.img, x - (peca_5.img.width / 2), y - (peca_5.img.height / 2));
	} else {
		if (peca_5.keyQ)
			drawRotatedImage(peca_5.img, peca_5.posX, peca_5.posY, 90);
		else
			ctx.drawImage(peca_5.img, peca_5.posX, peca_5.posY);
	}
	if (peca_6.drag == true) {
		if (peca_6.keyQ)
			drawRotatedImage(peca_6.img, peca_6.posX, peca_6.posY, 90);
		else
			ctx.drawImage(peca_6.img, x - (peca_6.img.width / 2), y - (peca_6.img.height / 2));
	} else {
		if (peca_6.keyQ)
			drawRotatedImage(peca_6.img, peca_6.posX, peca_6.posY, 90);
		else
			ctx.drawImage(peca_6.img, peca_6.posX, peca_6.posY);
	}
	if (peca_7.drag == true) {
		if (peca_7.keyQ)
			drawRotatedImage(peca_7.img, peca_7.posX, peca_7.posY, 90);
		else
			ctx.drawImage(peca_7.img, x - (peca_7.img.width / 2), y - (peca_7.img.height / 2));
	} else {
		if (peca_7.keyQ)
			drawRotatedImage(peca_7.img, peca_7.posX, peca_7.posY, 90);
		else
			ctx.drawImage(peca_7.img, peca_7.posX, peca_7.posY);
	}
   
  for(var j=0; pecasInimigas.length; j++) {
  
    if(pecasInimigas[j].keyQ) drawRotatedImage(pecasInimigas[j].img, pecasInimigas[j].posX, pecasInimigas[j].posY, 90);
    else ctx.drawImage(pecasInimigas[j].img, pecasInimigas[j].posX, pecasInimigas[j].posY);
  
  }
}

function doKeyDown(evt) {
	if (evt.keyCode == 81) {
		if (peca_1.drag)
			peca_1.keyQ = (peca_1.keyQ == false) ? peca_1.keyQ = true : peca_1.keyQ == false;
		if (peca_2.drag)
			peca_2.keyQ = (peca_2.keyQ == false) ? peca_2.keyQ = true : peca_2.keyQ == false;
		if (peca_3.drag)
			peca_3.keyQ = (peca_3.keyQ == false) ? peca_3.keyQ = true : peca_3.keyQ == false;
		if (peca_4.drag)
			peca_4.keyQ = (peca_4.keyQ == false) ? peca_4.keyQ = true : peca_4.keyQ == false;
		if (peca_5.drag)
			peca_5.keyQ = (peca_5.keyQ == false) ? peca_5.keyQ = true : peca_5.keyQ == false;
		if (peca_6.drag)
			peca_6.keyQ = (peca_6.keyQ == false) ? peca_6.keyQ = true : peca_6.keyQ == false;
		if (peca_7.drag)
			peca_7.keyQ = (peca_7.keyQ == false) ? peca_7.keyQ = true : peca_7.keyQ == false;
	}
}

function myMove(e) {
	if (dragok) {
		x = event.clientX;
		y = event.clientY;

		if (peca_1.drag) {
			peca_1.posX = x - (peca_1.img.width / 2);
			peca_1.posY = y - (peca_1.img.height / 2);
		} else if (peca_2.drag) {
			peca_2.posX = x - (peca_2.img.width / 2);
			peca_2.posY = y - (peca_2.img.height / 2);
		} else if (peca_3.drag) {
			peca_3.posX = x - (peca_3.img.width / 2);
			peca_3.posY = y - (peca_3.img.height / 2);
		} else if (peca_4.drag) {
			peca_4.posX = x - (peca_4.img.width / 2);
			peca_4.posY = y - (peca_4.img.height / 2);
		} else if (peca_5.drag) {
			peca_5.posX = x - (peca_5.img.width / 2);
			peca_5.posY = y - (peca_5.img.height / 2);
		} else if (peca_6.drag) {
			peca_6.posX = x - (peca_6.img.width / 2);
			peca_6.posY = y - (peca_6.img.height / 2);
		} else if (peca_7.drag) {
			peca_7.posX = x - (peca_7.img.width / 2);
			peca_7.posY = y - (peca_7.img.height / 2);
		}

	}
}

function myDown(e) {

	//alert("mouseX: "+event.clientX+">"+(peca_1.posX)+"\n"+"mouseX:"+event.clientX+"<"+(peca_1.posX+40)+"\nmouseY:"+event.clientY+">"+(peca_1.posY)+"\nmouseY:"+event.clientY+"<"+(peca_1.posY+30));
	if ((event.clientX > peca_1.posX && event.clientX < peca_1.posX + 40) && (event.clientY > peca_1.posY && event.clientY < peca_1.posY + 30)) {
		x = event.clientX;
		y = event.clientY;
		dragok = true;
		peca_1.drag = true;
		peca_2.drag = false;
		peca_3.drag = false;
		peca_4.drag = false;
		peca_5.drag = false;
		peca_6.drag = false;
		peca_7.drag = false;
		canvas.onmousemove = myMove;
	}

	if ((event.clientX > peca_2.posX && event.clientX < peca_2.posX + 40) && (event.clientY > peca_2.posY && event.clientY < peca_2.posY + 30)) {
		x = event.clientX;
		y = event.clientY;
		dragok = true;
		peca_1.drag = false;
		peca_2.drag = true;
		peca_3.drag = false;
		peca_4.drag = false;
		peca_5.drag = false;
		peca_6.drag = false;
		peca_7.drag = false;
		canvas.onmousemove = myMove;
	}

	if ((event.clientX > peca_3.posX && event.clientX < peca_3.posX + 40) && (event.clientY > peca_3.posY && event.clientY < peca_3.posY + 30)) {
		x = event.clientX;
		y = event.clientY;
		dragok = true;
		peca_1.drag = false;
		peca_2.drag = false;
		peca_3.drag = true;
		peca_4.drag = false;
		peca_5.drag = false;
		peca_6.drag = false;
		peca_7.drag = false;
		canvas.onmousemove = myMove;
	}

	if ((event.clientX > peca_4.posX && event.clientX < peca_4.posX + 40) && (event.clientY > peca_4.posY && event.clientY < peca_4.posY + 30)) {
		x = event.clientX;
		y = event.clientY;
		dragok = true;
		peca_1.drag = false;
		peca_2.drag = false;
		peca_3.drag = false;
		peca_4.drag = true;
		peca_5.drag = false;
		peca_6.drag = false;
		peca_7.drag = false;
		canvas.onmousemove = myMove;
	}

	if ((event.clientX > peca_5.posX && event.clientX < peca_5.posX + 40) && (event.clientY > peca_5.posY && event.clientY < peca_5.posY + 30)) {
		x = event.clientX;
		y = event.clientY;
		dragok = true;
		peca_1.drag = false;
		peca_2.drag = false;
		peca_3.drag = false;
		peca_4.drag = false;
		peca_5.drag = true;
		peca_6.drag = false;
		peca_7.drag = false;
		canvas.onmousemove = myMove;
	}

	if ((event.clientX > peca_6.posX && event.clientX < peca_6.posX + 40) && (event.clientY > peca_6.posY && event.clientY < peca_6.posY + 30)) {
		x = event.clientX;
		y = event.clientY;
		dragok = true;
		peca_1.drag = false;
		peca_2.drag = false;
		peca_3.drag = false;
		peca_4.drag = false;
		peca_5.drag = false;
		peca_6.drag = true;
		peca_7.drag = false;
		canvas.onmousemove = myMove;
	}

	if ((event.clientX > peca_7.posX && event.clientX < peca_7.posX + 40) && (event.clientY > peca_7.posY && event.clientY < peca_7.posY + 30)) {
		x = event.clientX;
		y = event.clientY;
		dragok = true;
		peca_1.drag = false;
		peca_2.drag = false;
		peca_3.drag = false;
		peca_4.drag = false;
		peca_5.drag = false;
		peca_6.drag = false;
		peca_7.drag = true;
		canvas.onmousemove = myMove;
	}

}

function myUp() {
	dragok = false;
	canvas.onmousemove = null;
	vez = "false";
}

function drawRotatedImage(image, x, y, angle) {
	// save the current co-ordinate system
	// before we screw with it
	ctx.save();

	// move to the middle of where we want to draw our image
	ctx.translate(x, y);

	// rotate around that point, converting our
	// angle from degrees to radians
	ctx.rotate(angle * TO_RADIANS);

	// draw it up and to the left by half the width
	// and height of the image
	ctx.drawImage(image, -(image.width / 2), -(image.height / 2));

	// and restore the co-ords to how they were when we began
	ctx.restore();
}

function shuffle(o) {//v1.0
	for (var j, x, i = o.length; i; j = Math.floor(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
	return o;
};

function verificarVez() {
	var xmlhttp;
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();

	} else if (window.ActiveXObject) {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

	} else {
		alert("Your browser does not support XMLHTTP!");
		return;

	}

	// Carrega a função de execução do AJAX
	xmlhttp.onreadystatechange = function() {

		if (xmlhttp.readyState == 4) {
			// Quando estiver completado o Carregamento
			var resultados = xmlhttp.responseText;
			if (resultados == "true") {
				canvas.onmousedown = myDown;
				canvas.onmouseup = myUp;
				//vez = "true";
			} else {
				canvas.onmousedown = null;
				canvas.onmouseup = null;
				vez = "true";
			}

		}
	};

	// Envia via método GET as informações
	xmlhttp.open("GET", "../control/VezJogador.php", true);
	// 'GET',classePHP
	xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=iso-8859-1");
	xmlhttp.send(null);

}

function verificarJogada() {
	var xmlhttp;
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();

	} else if (window.ActiveXObject) {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

	} else {
		alert("Your browser does not support XMLHTTP!");
		return;

	}

	// Carrega a função de execução do AJAX
	xmlhttp.onreadystatechange = function() {

		if (xmlhttp.readyState == 4) {
			// Quando estiver completado o Carregamento
			var resultados = xmlhttp.responseText;

		}
	};

	// Envia via método GET as informações
	xmlhttp.open("POST", "../control/jogada.php", true);
	// 'GET',classePHP
	xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=iso-8859-1");
	xmlhttp.send("vez=" + vez);

}

function pecasJogadas() {

	var xmlhttp;
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();

	} else if (window.ActiveXObject) {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

	} else {
		alert("Your browser does not support XMLHTTP!");
		return;

	}

	// Carrega a função de execução do AJAX
	xmlhttp.onreadystatechange = function() {

		if (xmlhttp.readyState == 4) {
			// Quando estiver completado o Carregamento
			var resultados = xmlhttp.responseText;

			//alert(resultados);

			if (resultados == "peca1") {
				peca_1.jogada = true;

			} else if (resultados == "peca2") {
				peca_2.jogada = true;

			} else if (resultados == "peca3") {
				peca_3.jogada = true;

			} else if (resultados == "peca4") {
				peca_4.jogada = true;

			} else if (resultados == "peca5") {
				peca_5.jogada = true;

			} else if (resultados == "peca6") {
				peca_6.jogada = true;

			} else if (resultados == "peca7") {
				peca_7.jogada = true;

			}
		}
	};

	// Envia via método POST as informações
	xmlhttp.open("POST", "../control/ControlePecas.php", true);
	// 'GET',classePHP
	xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=iso-8859-1");
	xmlhttp.send(
		"p1_img=" + peca_1.img.src + "&p1_posX=" + peca_1.posX + "&p1_posY=" + peca_1.posY + "&p1_virada=" + String(peca_1.keyQ) + "&p1_jogada=" + String(peca_1.jogada) + "&p1_dragok="+ String(dragok) +
		"&p2_img=" + peca_2.img.src + "&p2_posX=" + peca_2.posX + "&p2_posY=" + peca_2.posY + "&p2_virada=" + String(peca_2.keyQ) + "&p2_jogada=" + String(peca_2.jogada) + "&p2_dragok="+ String(dragok) + 
		"&p3_img=" + peca_3.img.src + "&p3_posX=" + peca_3.posX + "&p3_posY=" + peca_3.posY + "&p3_virada=" + String(peca_3.keyQ) + "&p3_jogada=" + String(peca_3.jogada) + "&p3_dragok="+ String(dragok) + 
		"&p4_img=" + peca_4.img.src + "&p4_posX=" + peca_4.posX + "&p4_posY=" + peca_4.posY + "&p4_virada=" + String(peca_4.keyQ) + "&p4_jogada=" + String(peca_4.jogada) + "&p4_dragok="+ String(dragok) + 
		"&p5_img=" + peca_5.img.src + "&p5_posX=" + peca_5.posX + "&p5_posY=" + peca_5.posY + "&p5_virada=" + String(peca_5.keyQ) + "&p5_jogada=" + String(peca_5.jogada) + "&p5_dragok="+ String(dragok) +
		"&p6_img=" + peca_6.img.src + "&p6_posX=" + peca_6.posX + "&p6_posY=" + peca_6.posY + "&p6_virada=" + String(peca_6.keyQ) + "&p6_jogada=" + String(peca_6.jogada) + "&p6_dragok="+ String(dragok) + 
		"&p7_img=" + peca_7.img.src + "&p7_posX=" + peca_7.posX + "&p7_posY=" + peca_7.posY + "&p7_virada=" + String(peca_7.keyQ) + "&p7_jogada=" + String(peca_7.jogada) + "&p7_dragok="+ String(dragok));

}

function pecasInimigo() {

	var xmlhttp;
	//alert("oioi");
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();

	} else if (window.ActiveXObject) {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

	} else {
		alert("Your browser does not support XMLHTTP!");
		return;

	}

	// Carrega a função de execução do AJAX
	xmlhttp.onreadystatechange = function() {
		//alert("entrou no onread");

		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			//alert("entrou no state");
			// Quando estiver completado o Carregamento

			var resultados = xmlhttp.responseXML;

			//pecas = resultados.getElementsByTagName("peca");
         
      //FUNCAO LOADCANVAS RECEBE O REQUEST_XML
      //ESSA FUNÇÃO IRÁ RECARREGAR O CANVAS TODA VEZ QUE O AJAX FOR CHAMADO, POIS IMAGENS SÓ PODEM SER CARREGADAS ONLOAD
      //TEM UM FOR DESENHANDO AS IMAGENS CASO ELAS EXISTAM NA FUNCAO DRAW()
			loadCanvas(resultados);
         
			//for(var i=0; i<pecas.length; i++){
         //pecasInimigas[i] = new Peca();
				//alert(pecas[i].getAttribute("virada"));
			//}

		}
	};

	// Envia via método GET as informações
	xmlhttp.open("GET", "../control/ControlePecaRetornar.php", true);
	// 'GET',classePHP
	xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=iso-8859-1");
	xmlhttp.send(null);

}

function verificarVencedor() {

	var xmlhttp;
	//alert("oioi");
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();

	} else if (window.ActiveXObject) {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

	} else {
		alert("Your browser does not support XMLHTTP!");
		return;

	}

	// Carrega a função de execução do AJAX
	xmlhttp.onreadystatechange = function() {
		//alert("entrou no onread");

		if (xmlhttp.readyState == 4) {
			//alert("entrou no state");
			// Quando estiver completado o Carregamento

			var resultados = xmlhttp.responseText;
			
			if (resultados != "null") {
				canvas.onmousedown = null;
				canvas.onmouseup = null; 
				
				alert(resultados);
				
				//window.location = "Partidas.php";
				
				
			}
		}
	};

	// Envia via método GET as informações
	xmlhttp.open("GET", "../control/ControleVencedor.php", true);
	// 'GET',classePHP
	xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=iso-8859-1");
	xmlhttp.send(null);

}


init();
canvas.onmousedown = myDown;
canvas.onmouseup = myUp; 