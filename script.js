// let button = document.querySelector('button');
let button = document.querySelector('light');

light.addEventListener('click', () => {
  if (document.body.style.backgroundColor == 'black') {
    document.body.style.backgroundColor = 'white';
  } else {
    document.body.style.backgroundColor = 'black';
  }
});

let roomIndex = 0;
const roomText = [
  'Cheap room Closer to Nature (4$) ->',
  'The Old B(o)y Standard room (5$) ->',
  'Yahoo Delux-API double room (6$) ->',
];
const roomImg = ['images/room1.jpeg', 'images/room2.jpeg', 'images/room3.jpeg'];

let header = document.querySelector('h3');
let img = document.querySelector("img[src='images/room1.jpeg']");

newroom.addEventListener('click', () => {
  roomIndex++;

  header.innerText = roomText[roomIndex];
  img.src = roomImg[roomIndex];

  if (roomIndex == 2) {
    roomIndex = -1;
  }
});
