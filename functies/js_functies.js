
//$("document").ready(function() {
//
//}

function naarprofiel(profiel, autid, auteur) {
//    alert ("hallo " + auteur + "!  Jouw id = " + autid);
    if (profiel == "y") {
        adr = window.location.href;
        pqm = adr.search ("\\?");
        if (pqm >= 0) { teken = "&";} else { teken = "?"; }
        adr = adr + teken + "profiel=" + autid;
//      alert ("adr = " + adr);
        window.location.href = adr;
    }
}

function shuffleword(word) {
    var shuffledword = '';
    word = word.split('');
    while (word.length > 0) {
      shuffledword += word.splice(word.length * Math.random() << 0, 1);
    }
    return shuffledword;
}

function sortfunctie(arg) {
    knop = document.getElementById(arg);
    if (knop.value == "A") {
        waarde = "ASC";
        knop.value = "D";
    } else {
        waarde = "DESC";
        knop.value = "A";
    }
    kolomnaam = arg.replace("sort", "");

    window.location.href = "index.php?sorteer=" + kolomnaam + "&sortdir=" + waarde;
}

function set_filterdata(i) {
//    alert (i);

    selrubriekin = document.getElementById("filterin" + i);
    selrubriekuit = document.getElementById("filteruit" + i);
//    alert ("nu in set_filterdata... option = " + selrubriek.id + ", " + selrubriek.value);
    selrubriekuit.value = selrubriekin.value;
}

//function tiepen () {
//    alert ("Hallo!");
//}

//$(function() {
//	$("#zoekreset").click(function() {
//        zoekresetknop = document.getElementById("zoekresetknop");
//        zoekresetknop.value = true;
//	});
//});



$(function() {
	$("#nieuwerubriek").mouseup(function() {
        tabelrij = document.getElementById("trnieuwerubriek");
        tabelrij.style.visibility = 'visible';
	});
});


$(function() {
	$("#filterrubriek").click(function() {
        divrubriek = document.getElementById('filterenrubriek');
        divauteur = document.getElementById('filterenauteur');
        wisselknop = document.getElementById('filterauteur');
        filtertype = document.getElementById('filtertype');
        filtertype.value = "rubriek";
        this.style.color = "#036";
        wisselknop.style.color = "#555";
        divauteur.style.display = "none";
        divrubriek.style.display = "block";
//        window.location.href = "index.php";
	});
});

$(function() {
	$("#filterauteur").click(function() {
        divrubriek = document.getElementById('filterenrubriek');
        divauteur = document.getElementById('filterenauteur');
        wisselknop = document.getElementById('filterrubriek');
        filtertype = document.getElementById('filtertype');
        filtertype.value = "auteur";
        this.style.color = "#036";
        wisselknop.style.color = "#555";
        divrubriek.style.display = "none";
        divauteur.style.display = "block";
//        window.location.href = "index.php";
	});
});

$(function() {
	$("#bericht").keyup(function() {
        afk = document.getElementById('afkortingen').value;
        tekst = document.getElementById('bericht').value;

        len = tekst.length;
        for (i = 5; i >= 2; i--) {
            if (len >= i) {
                b = decodeer_afk(afk, tekst, i);
                if (b == true) { break; }
//            p3 = afk.search (l3);
//            if (p3 > 0) {
//                rechts = afk.substr (p3 + 4);
//                q1 = rechts.search (",");
//                woord = rechts.substr (0, q1);
//                links = tekst.substr (0, len - 3);
//                tekst = links + woord;
//                document.getElementById('bericht').value = tekst;
//            }
            }
        }
	});
});

function decodeer_afk (afk, tekst, i) {
    b = false;
    len = tekst.length;
    lx = tekst.substr (len - i, i);
    pos = afk.search (lx);
    if (pos > 0) {
        dp0 = afk.substr (pos - 1, 1);
        dp1 = afk.substr (pos + i, 1);
//        alert ("dp = " + dp);
    }
//    alert ("i, len, lx, pos: " + i + ", " + len + ", " + lx + ", " + pos + ", ");
    if (pos > 0 && dp0 == ":" && dp1 == ":") {
        rechts = afk.substr (pos + i + 1);
        q1 = rechts.search (",");
        woord = rechts.substr (0, q1);
        links = tekst.substr (0, len - i);
        tekst = links + woord;
        document.getElementById('bericht').value = tekst;
    }
    return b;
}


//$(function() {
//	$(".btblcel1").hover(function() {
//        profiel = document.getElementById('titel').innerHTML;
//        alert (profiel.substr (0, 13));
//        if (profiel.substr (0, 13) == "Profielpagina") {
//            alert ("profiel = profielpagina");
//            $(this).removeClass ("btblcel1");
//        } else {
//            alert ("profiel != profielpagina");
//            $(this).addClass ("btblcel1");
//        }
//	});
//});
