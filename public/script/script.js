function increment(cart_id) {
  document.getElementById('inputQuantity-' + cart_id).stepUp();
}

function decrement(cart_id) {
  document.getElementById('inputQuantity-' + cart_id).stepDown();
}

let total = 0
function addItem(el) {
  let count = document.getElementById('product_count')
  if (el.checked) {
    total += 1;
    count.innerHTML = total;
    return
  }
  total -= 1;
  count.innerHTML = total;
}

categoryForm = document.getElementById("categoryForm");

function add() {
  var newForm = categoryForm.cloneNode(true);
  newForm.style.value = "";
  categoryForm.parentNode.appendChild(newForm);
}

function previewImage() {
  const image = document.querySelector('#image_thumbnail');
  const imgPreview = document.querySelector('.img-preview');
  imgPreview.classList.remove("d-none")
  // Image awalnya display inline (default), diubah ke display block
  imgPreview.style.display = 'block';

  const oFReader = new FileReader();
  oFReader.readAsDataURL(image.files[0]);
  oFReader.onload = function (oFREvent) {
    imgPreview.src = oFREvent.target.result;
  }
}

function previewImage2() {
  const image = document.querySelector('#image_background');
  const imgPreview = document.querySelector('.img-preview-2');
  imgPreview.classList.remove("d-none")
  // Image awalnya display inline (default), diubah ke display block
  imgPreview.style.display = 'block';

  const oFReader = new FileReader();
  oFReader.readAsDataURL(image.files[0]);
  oFReader.onload = function (oFREvent) {
    imgPreview.src = oFREvent.target.result;
  }
}
