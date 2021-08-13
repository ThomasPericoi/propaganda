/*____________________________________ USEFOOL FUNCTIONS ____________________________________*/

/* Functions about random */

function getRandomIntBetween(min, max) {
    // Output
    return Math.floor(Math.random() * (max - min + 1) + min);
}

function getRandomIdFromArray(arrayName) {
    // Output
    return Math.floor(Math.random() * arrayName.length);
}

function getRandomValueFromArray(arrayName) {
    // Output
    return arrayName[getRandomIdFromArray(arrayName)];
}

function probability(probability, on = 100) {
    // Var(s)
    happened = false;
    // Process
    getRandomIntBetween(0, on) <= probability ?
        (happened = true) :
        (happened = false);
    // Output
    return happened;
}

function getRandomColor() {
    // Var(s)
    var hexLetters = [
        "0",
        "1",
        "2",
        "3",
        "4",
        "5",
        "6",
        "7",
        "8",
        "9",
        "a",
        "b",
        "c",
        "d",
        "e",
        "f",
    ];
    var randomColor = "#";
    // Process
    for (var i = 0; i < 6; i++) {
        randomColor += getRandomValueFromArray(hexLetters);
    }
    // Output
    return randomColor;
}

/* Functions about formats */

function isConsonant(x) {
    // Output
    return (
        [
            "b",
            "c",
            "d",
            "f",
            "g",
            "h",
            "j",
            "k",
            "l",
            "m",
            "n",
            "p",
            "q",
            "r",
            "s",
            "t",
            "v",
            "w",
            "x",
            "z",
        ].indexOf(x.toLowerCase()) !== -1
    );
}

function isVowel(x) {
    // Output
    return ["a", "e", "i", "o", "u", "y"].indexOf(x.toLowerCase()) !== -1;
}

function beautifyNumber(x) {
    // Output
    return x.toString().replace(/\B(?!\.\d*)(?=(\d{3})+(?!\d))/g, " ");
}

function countCharacter(string, character) {
    // Output
    return string.split(character).length - 1;
}

/* Functions about styles */

function isLight(color) {
    // Var(s)
    const hex = color.replace("#", "");
    const r = parseInt(hex.substr(0, 2), 16);
    const g = parseInt(hex.substr(2, 2), 16);
    const b = parseInt(hex.substr(4, 2), 16);
    // Process
    const brightness = (r * 299 + g * 587 + b * 114) / 1000;
    // Output
    return brightness > 155;
}

function changeElementBgColor(element, color) {
    // Output
    element.style.backgroundColor = color;
}

function transformToBlob(element) {
    // Var(s)
    function randomRadius() {
        var percentage1 = getRandomIntBetween(25, 75);
        var percentage1bis = 100 - percentage1;
        var percentage2 = getRandomIntBetween(25, 75);
        var percentage2bis = 100 - percentage2;
        var percentage3 = getRandomIntBetween(25, 75);
        var percentage3bis = 100 - percentage3;
        var percentage4 = getRandomIntBetween(25, 75);
        var percentage4bis = 100 - percentage4;
        return `${percentage1}% ${percentage1bis}% ${percentage2bis}% ${percentage2}% / ${percentage3}% ${percentage4}% ${percentage4bis}% ${percentage3bis}%`;
    }
    // Output
    element.style.borderRadius = randomRadius();
}

/* Functions about clipboard */

function copyToClipboard(value) {
    // Var(s)
    var temporaryInput = document.createElement("input");
    // Process
    temporaryInput.setAttribute("value", value);
    document.body.appendChild(temporaryInput);
    temporaryInput.select();
    // Output
    document.execCommand("copy");
    console.log(
        '%c"' + value + '" successfully copied to clipboard!',
        "color: green"
    );
    // Cleaning
    document.body.removeChild(temporaryInput);
}

/* Functions about Google and searching */

function searchOnGoogle(query) {
    window.open("https://google.com/search?q=" + query, "newTab");
}

function searchOnGoogleImage(query) {
    window.open("https://google.com/search?q=" + query + "&tbm=isch", "newTab");
}

function openUrl(query) {
    window.open(query, "newTab");
}

/* Functions about page title */

function changeTitleOnBlur(string) {
    // Var(s)
    var originalTitle = document.title;

    // Process
    window.onfocus = function() {
        document.title = originalTitle;
    };
    window.onblur = function() {
        document.title = string;
    };
}