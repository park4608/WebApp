"use strict";
$(textArea).style.fontSize = "12pt";

window.onload = function(){

const pimpBtn = document.getElementById("pimpBtn"),
  bling = document.getElementById("bling"),
  snoopBtn = document.getElementById("snoopBtn"),
  pigLatinBtn = document.getElementById("piglatinBtn"),
  malkovBtn = document.getElementById("malkovBtn");
pimpBtn.onclick = startSizeUp;
bling.onchange = popsUp;
snoopBtn.onclick = addSuffix;
pigLatinBtn.onclick = pigLatin;
malkovBtn.onclick = Malkovitch;
}

const boxText = document.getElementById("textArea");

function sizeUp() {
  let font = boxText.style;
  let currentFontSize = parseInt(font.fontSize);
  font.fontSize = currentFontSize + 2 + "pt";
}

function startSizeUp() {
  setInterval(sizeUp, 500);
}

function popsUp() {
  const blingBox = $("bling").checked;
  const text = boxText.style;

  if (blingBox) {
    text.fontWeight = "bold";
    text.color = "green";
    text.textDecoration = "underline";
    text.backgroundImage = "url('https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/8/hundred.jpg')";
  } else {
    text.fontWeight = "inherit"
    text.color = "black";
    text.textDecoration = "none";
    text.backgroundImage = "none";
  }
}

function addSuffix() {
  const text = boxText.value.split('');
  let i;
  for (i = 0; i < text.length; i++) {
    if (text[i] == '.') {
      text[i] = "-izzle" + text[i];
    }
  }

  boxText.value = text.join('');
}

function pigLatin() {
  const wordAry = boxText.value.split(" ");
  const vowels = ["a", "e", "i", "o", "u"];
  let sentence = [];
  let i;
  for (i = 0; i < wordAry.length; i++) {
    let word = wordAry[i];
    if (vowels.includes(word[0])) {
      word += "ay";
    } else {
      const lastIdx = word.length;
      const words = word.split('');
      let k;
      for (k = 1; k < words.length; k++) {
        if (!vowels.includes(words[i])) {
          words.push(words.shift());
        }
        else{
          words.push("ay");
          break;
        }
      }
      console.log(words.join(''));
      sentence.push(words.join(''));
    }
  }
  boxText.value = sentence.join('');
}

function Malkovitch() {
  const boxText = $("textArea");
  if (boxText.value.length >= 5)
    boxText.value = "Malkovich";
}
