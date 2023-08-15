let slideIndex = 0;
showSlides();

function showSlides() {
  const slides = document.getElementsByClassName("carousel-slide");
  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {
    slideIndex = 1;
  }
  slides[slideIndex - 1].style.display = "block";
  setTimeout(showSlides, 3000); // Cambiar de imagen cada 3 segundos
}

const productCards = document.querySelectorAll('.product-card');

productCards.forEach(card => {
  card.addEventListener('click', () => {
    // Remover la selección de todas las tarjetas
    productCards.forEach(card => {
      card.classList.remove('selected');
    });

    // Agregar la clase 'selected' a la tarjeta clicada
    card.classList.add('selected');
    
    // Obtener el ID del producto seleccionado
    const productId = card.getAttribute('data-product-id');
    console.log(`Producto seleccionado: ${productId}`);
  });
});