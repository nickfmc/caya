/**
 * GutenDevTheme scripts (footer)
 * This file contains any js scripts you want added to the theme's footer. 
 */

// *********************** START CUSTOM JS *********************************

// // grab element for Headroom
// var headroomElement = document.querySelector("#c-page-header");
// console.log(headroomElement);

// // get height of element for Headroom
// var headerHeight = headroomElement.offsetHeight; 
// console.log(headerHeight);

// // construct an instance of Headroom, passing the element
// var headroom = new Headroom(headroomElement, {
//   "offset": headerHeight,
//   "tolerance": 5,
//   "classes": {
//     "initial": "animate__animated",
//     "pinned": "animate__slideInDown",
//     "unpinned": "animate__slideOutUp"
//   }
// });
// headroom.init();

// *********************** END CUSTOM JS *********************************


// better accessible dropdown menu
document.addEventListener('DOMContentLoaded', function() {
  const dropdownButtons = document.querySelectorAll('.dropdown-toggle');
  
  dropdownButtons.forEach(button => {
      button.addEventListener('click', function(e) {
          e.preventDefault();
          const isExpanded = this.getAttribute('aria-expanded') === 'true';
          this.setAttribute('aria-expanded', !isExpanded);
          
          // Toggle submenu visibility
          const submenu = this.parentElement.querySelector('ul');
          if (submenu) {
              submenu.classList.toggle('is-active');
          }
      });
  }); 
  
  // Close dropdowns when clicking outside
  document.addEventListener('click', function(e) { 
      if (!e.target.closest('.menu-item-has-children')) {
          dropdownButtons.forEach(button => {
              button.setAttribute('aria-expanded', 'false');
              const submenu = button.parentElement.querySelector('ul');
              if (submenu) {
                  submenu.classList.remove('is-active');
              }
          });
      }
  });
});
//END better accessible dropdown menu


// external link accessibility script
class AccessibilityEnhancer {
  constructor() {
      this.newTabText = '(Opens in a new tab)';
      this.externalLinkText = '(External link)';
      this.pdfText = '(PDF file)'; 
  }

  enhanceLinks() {
      const links = document.querySelectorAll('a');
      
      links.forEach(link => {
          this.enhanceSingleLink(link);
      });
  }

  enhanceSingleLink(link) {
    const isNewTab = link.target === '_blank' || link.target === 'blank';
    const isExternal = this.isExternalLink(link);
    const isPDF = this.isPDFLink(link); // Add this line
    const existingLabel = link.getAttribute('aria-label');
    const linkText = link.textContent || link.innerText;
    
    let newLabel = existingLabel || linkText;

    // Add appropriate notices
    if (isNewTab && !newLabel.includes(this.newTabText)) {
        newLabel += ` ${this.newTabText}`;
    }
    if (isExternal && !newLabel.includes(this.externalLinkText)) {
        newLabel += ` ${this.externalLinkText}`;
    }
    if (isPDF && !newLabel.includes(this.pdfText)) { // Add this block
        newLabel += ` ${this.pdfText}`;
    }

      // Set the enhanced label
      if (newLabel !== linkText) {
          link.setAttribute('aria-label', newLabel.trim());
      }

      // Add security attributes for external links
      if (isNewTab || isExternal) {
          const rel = 'noopener noreferrer';
          const currentRel = link.getAttribute('rel');
          if (!currentRel || !currentRel.includes(rel)) {
              link.setAttribute('rel', rel);
          }
      }
  }

  isExternalLink(link) {
      if (!link.href) return false;
      
      const currentDomain = window.location.hostname;
      try {
          const linkDomain = new URL(link.href).hostname;
          return linkDomain !== currentDomain;
      } catch (e) {
          return false;
      }
  }

  isPDFLink(link) {
      if (!link.href) return false;
      
      // Check if the URL ends with .pdf
      if (link.href.toLowerCase().endsWith('.pdf')) return true;
      
      // Check if the MIME type is available and is PDF
      if (link.type && link.type.toLowerCase() === 'application/pdf') return true;
      
      // Check if the download attribute exists and the file ends with .pdf
      if (link.hasAttribute('download')) {
          const downloadValue = link.getAttribute('download');
          if (downloadValue && downloadValue.toLowerCase().endsWith('.pdf')) return true;
      }
      
      return false;
  }
  

  // Method to handle dynamically added content
  observe() {
      const observer = new MutationObserver((mutations) => {
          mutations.forEach(mutation => {
              mutation.addedNodes.forEach(node => {
                  if (node.nodeType === 1) { // ELEMENT_NODE
                      // Check the added element itself
                      if (node.tagName === 'A') {
                          this.enhanceSingleLink(node);
                      }
                      // Check for links within the added element
                      const links = node.querySelectorAll('a');
                      links.forEach(link => this.enhanceSingleLink(link));
                  }
              });
          });
      });

      observer.observe(document.body, {
          childList: true,
          subtree: true
      });
  }
}

// Usage
const accessibilityEnhancer = new AccessibilityEnhancer();

document.addEventListener('DOMContentLoaded', () => {
  accessibilityEnhancer.enhanceLinks();
  accessibilityEnhancer.observe(); // Optional: observe for dynamic content
});
// END external link accessibility script

// *********************** START CUSTOM JQUERY DOC READY SCRIPTS *******************************
jQuery( document ).ready(function( $ ) {

   // get Template URL
   var templateUrl = object_name.templateUrl;
   

   $('#mobile-nav').hcOffcanvasNav({
    disableAt: 1024,
    width: 280,
    customToggle: $('.toggle'),
     pushContent: '.menu-slide',
    levelTitles: true,
    position: 'right',
    levelOpen: 'expand',
    navTitle: $('<div class="c-mobile-menu-header"><a href="/"><img src="'+ templateUrl + '/img/logo_caya.png"></a></div>'),
    levelTitleAsBack: true
  });

  // modal menu init ----------------------------------
  // var modal_menu = jQuery("#c-modal-nav-button").animatedModal({
  //   modalTarget: 'modal-navigation',
  //   animatedIn: 'slideInDown',
  //   animatedOut: 'slideOutUp',
  //   animationDuration: '0.40s',
  //   color: '#dedede',
  //   afterClose: function() {
  //     $( 'body, html' ).css({ 'overflow': '' });
  //   }
  // });

  // // get last and current hash + update on hash change
  // var currentHash = function() {
  //   return location.hash.replace(/^#/, '')
  // }
  // var last_hash
  // var hash = currentHash()
  // $(window).bind('hashchange', function(event) {
  //   last_hash = hash;
  //   hash = currentHash();
  // });

  // enable back/foward to close/open modal --------------------------
  // $("#c-modal-nav-button").on('click', function(){ window.location.href = ensureHash("#menu"); });
  // function ensureHash(newHash) {
  //   if (window.location.hash) {
  //     return window.location.href.substring(0, window.location.href.lastIndexOf(window.location.hash)) + newHash;
  //   }
  //   return window.location.hash + newHash;
  // }
  // // if back button is pressed, close the modal
  // $(window).on('hashchange', function (event) {
  //   if (last_hash == 'menu' && hash == '') {
  //     modal_menu.close();
  //     history.replaceState('', document.title, window.location.pathname);
  //   } // if forward button, open the modal
  //   else if (window.location.hash == "#menu"){
  //     modal_menu.open();
  //   }
  // });

  // // if close button is clicked, clear the #menu hash added above
  // $('.close-modal-navigation').on('click', function (e) {
  //   history.replaceState('', document.title, window.location.pathname);
  // });

  // // close modal menu if esc key is used ------------------------
  // $(document).keyup(function(ev){
  //   if(ev.keyCode == 27 && hash == 'menu') {
  //     window.history.back();
  //   }
  // });


  // Magnific as menu popup
  // MENU POPUP
  // $('#c-modal-nav-button').magnificPopup({
  //   type: 'inline',
  //   removalDelay: 700, //delay removal by X to allow out-animation
  //   showCloseBtn: false,
  //   closeOnBgClick: false,
  //   autoFocusLast: false,
  //   fixedContentPos: false, 
  //   fixedContentPos: true,
  //   callbacks: {
  //     beforeOpen: function() {
  //        this.st.mainClass = 'mfp-move-from-side menu-popup';
  //        $('body').addClass('mfp-active');
  //     },
  //     open: function() { 
  //       $('#close-modal, .close-modal-navigation').on('click',function(event){
  //         event.preventDefault();
  //         $.magnificPopup.close(); 
  //       }); 
  //   },
  //   beforeClose: function() {
  //   $('body').removeClass('mfp-active');
  // }
  //   },
  //   midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
  // });

});
// *********************** END CUSTOM JQUERY DOC READY SCRIPTS *********************************
