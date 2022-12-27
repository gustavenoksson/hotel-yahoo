let button = document.querySelector('button');

button.addEventListener('click', () => {
  if (document.body.style.backgroundColor == 'black') {
    document.body.style.backgroundColor = 'white';
  } else {
    document.body.style.backgroundColor = 'black';
  }
});
