window.onload = function() {
    window.scrollTo(0, 0);
};

const leftArrow = document.getElementById('left-btn');
const rightArrow = document.getElementById('right-btn');
const carousel = document.getElementById('carousel-products');

carousel.innerHTML += carousel.innerHTML;

let scrollInterval = null;
const scrollSpeed = 2;

function startScrolling(direction) {
    if (scrollInterval) return;

    scrollInterval = setInterval(() => {
        
        if (direction === 'left') {
            if (carousel.scrollLeft <= 0) {
                carousel.scrollLeft = carousel.scrollWidth / 2;
            }
            carousel.scrollLeft = carousel.scrollLeft - scrollSpeed;
        } else if (direction === 'right') {
            if (carousel.scrollLeft >= carousel.scrollWidth / 2) {
                carousel.scrollLeft = 0;
            }
            carousel.scrollLeft = carousel.scrollLeft + scrollSpeed;
        }
    }, 10);
}

function stopScrolling() {
    clearInterval(scrollInterval);
    scrollInterval = null;
}

leftArrow.addEventListener('mouseover', () => startScrolling('left'));
leftArrow.addEventListener('mouseout', stopScrolling);

rightArrow.addEventListener('mouseover', () => startScrolling('right'));
rightArrow.addEventListener('mouseout', stopScrolling);



function showContent(sectionId, containerId) {
    // Selectează containerul produsului specific
    var container = document.getElementById(containerId);
    
    // Ascunde toate secțiunile de conținut din containerul respectiv
    var contents = container.querySelectorAll('.content');
    contents.forEach(function(content) {
        content.classList.remove('active');
    });

    // Afișează secțiunea selectată
    container.querySelector(`#${sectionId}`).classList.add('active');

    // Schimbă starea butoanelor din containerul respectiv
    var buttons = container.querySelectorAll('.button-group button');
    buttons.forEach(function(button) {
        button.classList.remove('active');
    });

    // Activează butonul corespunzător secțiunii selectate
    container.querySelector(`[onclick="showContent('${sectionId}', '${containerId}')"]`).classList.add('active');
}

// Opțional: activează secțiunea „Descripción” la încărcarea paginii pentru fiecare produs
window.onload = function() {
    showContent('descripción', 'container-tahitian-noni');
    showContent('descripción', 'container-culturiix');
};




        
        
        


