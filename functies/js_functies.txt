
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
