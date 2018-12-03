
var dragitem;
var dropitem;
var ouderfrom;
var ouderto;
var fotoid;

/*		Web-Page functies		*/

function dragitdropit() {
	strfotos = "123456789";
	fotoid = shuffleword(strfotos);
	fotoid = fotoid.substr(0, 1);
	str0 = "123456789";
	str1 = shuffleword(str0);

	for (i=1; i<=9; i++) {
		j = i - 1;
		pictnr = str1.substr(j, 1);
		document.write ('<div class="captchablock" id="captchacontainer' + i + '" ondrop="drop(event)" ondragover="allowDrop(event)" >');
		document.write ('	<img id="captchimg' + pictnr + '" src="afbeeldingen/captchafotos/foto' + fotoid + pictnr + '.png" draggable="true" ondragstart="drag(event)" alt="image' + pictnr + '" />');
		document.write ('	<div id="fotoid"></div>');
		document.write ('</div>');
	}
	yfotoid = document.getElementById("fotoid");
	yfotoid.value = fotoid;
}


/*		Drag & Drop functies		*/

function allowDrop(ev) {
	ev.preventDefault();
}

function drag(ev) {
	ev.dataTransfer.setData("text", ev.target.id);
	dragitem = ev.target;
	ouderfrom = document.getElementById(dragitem.id).parentElement.id;
}

function drop(ev) {
	ev.preventDefault();
	var data = ev.dataTransfer.getData("text");
	ev.target.appendChild(document.getElementById(data));
	dropitem = ev.target;
	clndrag = dragitem.cloneNode(false);
	clndrop = dropitem.cloneNode(false);

	dragid = dragitem.id;
	dropid = dropitem.id;
	ouderto = document.getElementById(dropid).parentElement.id;

	$("#" + ouderfrom).empty();
	$("#" + ouderto).empty();
	document.getElementById(ouderfrom).appendChild(clndrop);
	document.getElementById(ouderto).appendChild(clndrag);

	bchk = true; oplosstr = fotoid + "_";
	for (i=1; i<=9; i++) {
		prtbox = document.getElementById("captchimg" + i).parentElement.id;
		chldimg = document.getElementById("captchacontainer" + i).firstElementChild.id;
		j = chldimg.replace("captchimg", "");
		oplosstr = oplosstr + j;
	}
	captchaopl = document.getElementById("captchavolgorde");
	captchaopl.value = oplosstr;
}
