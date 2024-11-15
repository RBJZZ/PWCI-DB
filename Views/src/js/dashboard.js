const scrollContainer = document.querySelector('.horizontal-scroll-container');
const scrollContainer2=document.querySelector('.horizontal-scroll-container2');

  let isDown = false;
  let startX;
  let scrollLeft;

  scrollContainer.addEventListener('mousedown', (e) => {
    isDown = true;
    scrollContainer.classList.add('active');
    startX = e.pageX - scrollContainer.offsetLeft;
    scrollLeft = scrollContainer.scrollLeft;
  });

  scrollContainer.addEventListener('mouseleave', () => {
    isDown = false;
    scrollContainer.classList.remove('active');
  });

  scrollContainer.addEventListener('mouseup', () => {
    isDown = false;
    scrollContainer.classList.remove('active');
  });

  scrollContainer.addEventListener('mousemove', (e) => {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - scrollContainer.offsetLeft;
    const walk = (x - startX) * 1; 
    scrollContainer.scrollLeft = scrollLeft - walk;
  });

//CONTAINER 2
  scrollContainer2.addEventListener('mousedown', (e) => {
    isDown = true;
    scrollContainer2.classList.add('active');
    startX = e.pageX - scrollContainer2.offsetLeft;
    scrollLeft = scrollContainer2.scrollLeft;
  });

  scrollContainer2.addEventListener('mouseleave', () => {
    isDown = false;
    scrollContainer2.classList.remove('active');
  });

  scrollContainer2.addEventListener('mouseup', () => {
    isDown = false;
    scrollContainer2.classList.remove('active');
  });

  scrollContainer2.addEventListener('mousemove', (e) => {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - scrollContainer2.offsetLeft;
    const walk = (x - startX) * 1; 
    scrollContainer2.scrollLeft = scrollLeft - walk;
  });

  