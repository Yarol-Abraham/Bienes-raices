const header = document.querySelector(".header");
const btnMenu = document.querySelector(".header__menu--btn");
const navMenu = document.querySelector(".header__menu");
const headerBox = document.querySelector(".header__box");

export const openMenu = function(){
    btnMenu.addEventListener('click', function(e) {
        e.preventDefault();
        headerBox.classList.toggle("open__box--menu");
        navMenu.classList.toggle("open--menu");
    });
};

export const menuSticky = function () {
    const stickyNav = function(entries) {
        const [entry] = entries;
        if(!entry.isIntersecting){
            headerBox.style.position = "fixed";
           // headerBox.style.background = "rgba(0, 0, 0, 0.575)";
            headerBox.style.background = "#00cba9";
            headerBox.style.width = "100%";
            headerBox.style.zIndex = "100";
            headerBox.style.padding = "1rem";
        }else { 
            headerBox.style.position = "";
            headerBox.style.background = "";
            headerBox.style.width = "";
            headerBox.style.zIndex = "";
            headerBox.style.padding = "";
         }
      };
      const headerObserver = new IntersectionObserver(
        stickyNav,
        {
          root: null,
          threshold: 0    
        }
      );
      headerObserver.observe(header);  
};