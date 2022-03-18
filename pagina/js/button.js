let button = document.querySelector('.button');
let buttonText = document.querySelector('.tick');

const tickMark =
  '<svg width="58" height="45" viewBox="0 0 58 45" xmlns="http://www.w3.org/2000/svg"><path fill="#fff" fill-rule="nonzero" d="M19.11 44.64L.27 25.81l5.66-5.66 13.18 13.18L52.07.38l5.65 5.65"/></svg>';

buttonText.innerHTML = 'PDF';

button.addEventListener('click', function () {
  if (buttonText.innerHTML !== 'PDF') {
    buttonText.innerHTML = 'PDF';
  } else if (buttonText.innerHTML === 'PDF') {
    buttonText.innerHTML = tickMark;
  }

  setTimeout(function () {
    window.location = './reportespdf.php';
  }, 1250);

  this.classList.toggle('button__circle');
});
