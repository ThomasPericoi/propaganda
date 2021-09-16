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
    window.onfocus = function () {
        document.title = originalTitle;
    };
    window.onblur = function () {
        document.title = string;
    };
}

/* Functions about responsive */

function isMobile() {
    let check = false;
    (function (a) { if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) check = true; })(navigator.userAgent || navigator.vendor || window.opera);
    return check;
};