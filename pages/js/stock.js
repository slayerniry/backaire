function formatMoney(amount, decimalCount = 0, decimal = ".", thousands = " ") {
  try {
    decimalCount = Math.abs(decimalCount);
    decimalCount = isNaN(decimalCount) ? 2 : decimalCount;

    const negativeSign = amount < 0 ? "-" : "";

    let i = parseInt(
      (amount = Math.abs(Number(amount) || 0).toFixed(decimalCount))
    ).toString();
    let j = i.length > 3 ? i.length % 3 : 0;

    return (
      negativeSign +
      (j ? i.substr(0, j) + thousands : "") +
      i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) +
      (decimalCount
        ? decimal +
          Math.abs(amount - i)
            .toFixed(decimalCount)
            .slice(2)
        : "")
    );
  } catch (e) {
    console.log(e);
  }
}

function formatDateYYYYMMDD(date) {
  date = new Date(date);

  var day = ("0" + date.getDate()).slice(-2);
  var month = ("0" + (date.getMonth() + 1)).slice(-2);
  var year = date.getFullYear();

  return year + "-" + month + "-" + day;
}

function formatDate(str) {
  if (str != null) {
    var mydate = new Date(str);
    return mydate.toLocaleDateString("en-GB");
  } else {
    return "-";
  }
}

function anio() {
  var today = new Date().toISOString().split("T")[0];

  return today;
}

function rampitso(daty) {
  var daty = new Date(daty);

  var demain = daty.setDate(daty.getDate() + 1);

  demain = formatDateYYYYMMDD(demain);

  return demain;
}

function lastday(y, m) {
  var mois = parseInt(m);

  var day = 0;
  switch (mois) {
    case 1:
    case 3:
    case 5:
    case 7:
    case 8:
    case 10:
    case 12:
      day = 31;
      break;
    case 4:
    case 6:
    case 9:
    case 11:
      day = 30;
      break;
    case 2:
      if (y % 4 == 0) day = 29;
      else day = 28;
      break;
  }

  return day;
}

function getFirstDayOfMonth(year, month) {
  var daty = new Date(year, month, 1);

  return formatDateYYYYMMDD(daty);
}

const date = new Date();

function commuterApostrophes(texte) {
    var texteCorrige = '';
    for (var i = 0; i < texte.length; i++) {
        // Si le caractère est une apostrophe typographique, remplacez-la par une apostrophe standard
        if (texte.charCodeAt(i) === 8217) {
            texteCorrige += "'";
        } else {
            texteCorrige += texte[i];
        }
    }
    return texteCorrige;
}


// Sélectionnez tous les éléments textarea et input de type texte
var textInputs = document.querySelectorAll('textarea, input[type="text"]');

// Parcourez tous les éléments sélectionnés et ajoutez un écouteur d'événements 'blur' à chacun
textInputs.forEach(function(input) {
    input.addEventListener('blur', function() {
        // Appliquez la fonction commuterApostrophes au contenu de l'élément
        input.value = commuterApostrophes(input.value);
    });
});
