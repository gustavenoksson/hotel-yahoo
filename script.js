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
const roomTag = ['r1', 'r2', 'r3'];

let header = document.querySelector('h3');
let img = document.querySelector("img[src='images/room1.jpeg']");
// const td = document.querySelector('td');
const reset = document.getElementsByTagName('td');
const collection = document.getElementsByClassName('r1');
for (let i = 0; i < collection.length; i++) {
  collection[i].style.backgroundColor = 'yellowgreen';
}

newroom.addEventListener('click', () => {
  roomIndex++;

  header.innerText = roomText[roomIndex];
  img.src = roomImg[roomIndex];

  // td.style.backgroundColor = 'white';

  for (let i = 0; i < reset.length; i++) {
    reset[i].style.backgroundColor = 'white';
  }

  let collection = document.getElementsByClassName(roomTag[roomIndex]);
  for (let i = 0; i < collection.length; i++) {
    collection[i].style.backgroundColor = 'yellowgreen';
  }

  if (roomIndex == 2) {
    roomIndex = -1;
  }
  let element = document.getElementsByClassName('roomI');
  element.value = roomIndex;
  element.form.submit();
});

let rr = document.getElementById('rr');
rr.style.backgroundColor = 'red';

// const collection = document.getElementsByClassName('r2');
// for (let i = 0; i < collection.length; i++) {
//   collection[i].style.backgroundColor = 'green';
// }
