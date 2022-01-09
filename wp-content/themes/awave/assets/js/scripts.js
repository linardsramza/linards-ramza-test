// Mobile menu toggle
var menuToggler = document.querySelector("#menu-toggler");
var mobileMenu = document.querySelector("#mobile-menu");

menuToggler.addEventListener("click", function(e) {
  e.preventDefault();
  mobileMenu.classList.toggle("hidden");
});

// Add form with AJAX
var contactBtn = document.querySelector("#contact-btn");

if (contactBtn) {
  contactBtn.addEventListener("click", function(e) {
    e.preventDefault();
    var formData = {
      "title": document.querySelector('#contact-form input[name="first-name"]').value + " " + document.querySelector('#contact-form input[name="last-name"]').value,
      "content": document.querySelector('#contact-form textarea[name="message"]').value,
      "status": "publish",
      "acf": {
        "first_name": document.querySelector('#contact-form input[name="first-name"]').value,
        "last_name": document.querySelector('#contact-form input[name="last-name"]').value,
        "phone_number": document.querySelector('#contact-form input[name="phone-number"]').value,
        "email": document.querySelector('#contact-form input[name="email"]').value
      } 
    }

    var addLog = new XMLHttpRequest();
    addLog.open("POST", dataForAjax.siteURL + "/wp-json/wp/v2/form-log");
    addLog.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    addLog.setRequestHeader("X-WP-Nonce", dataForAjax.nonce);
    addLog.send(JSON.stringify(formData));
    addLog.onreadystatechange = function() {
      if (addLog.readyState == 4) {
        if (addLog.status == 201) {
          document.querySelector('#contact-form input[name="first-name"]').value = '';
          document.querySelector('#contact-form input[name="last-name"]').value = '';
          document.querySelector('#contact-form input[name="phone-number"]').value = '';
          document.querySelector('#contact-form input[name="email"]').value = '';
          document.querySelector('#contact-form textarea[name="message"]').value = '';
        } else {
          alert("Error, please try again.");
        }
      }
    }
  });
};

// Show more submissions with AJAX
var postsPerPage = dataForAjax.posts_per_page;
var maxNumPages = dataForAjax.max_page;

var currentPagePosts = 1;

var showMoreBtn = document.querySelector("#show-more-posts");
var loadingText = document.querySelector('#loading-text');

if (showMoreBtn) {
  showMoreBtn.addEventListener("click", function(e) {
    e.preventDefault();
    currentPagePosts = currentPagePosts + 1;

    var showMorePosts = new XMLHttpRequest();
    showMorePosts.open("GET", dataForAjax.siteURL + "/wp-json/wp/v2/form-log?per_page=" + postsPerPage + "&page=" + currentPagePosts);

    showMorePosts.onprogress = function() {
      showMoreBtn.style.display = 'none';
      loadingText.style.display = 'block';
    };

    showMorePosts.onload = function() {
      showMoreBtn.style.display = 'block';
      loadingText.style.display = 'none';
      if (showMorePosts.status == 200 ) {
        var data = JSON.parse(showMorePosts.responseText);
        // console.log(data);
        data.forEach(function(entry){
          var formEntry = document.createElement('div');
          formEntry.classList.add('form-entry');
          formEntry.innerHTML = '<h2 class="form-entry__title">' + entry.title.rendered + '</h2><p class="form-entry__info"><span class="contact-link"><a href="tel:' + entry.acf.phone_number.replace(" ", "") + '">' + entry.acf.phone_number + '</a></span><span class="separator"> | </span><span class="contact-link"><a href="mailto:' + entry.acf.email + '">' + entry.acf.email + '</a></span></p><div class="form-entry__content">' + entry.content.rendered + '</div><hr>';
          document.querySelector('.submissions__block').appendChild(formEntry);
        });
        if (currentPagePosts == maxNumPages) {
          showMoreBtn.style.display = 'none';
        }
      } else {
        alert("Error");
      }
    };

    showMorePosts.onerror = function() {
      alert("Connection error");
    };

    showMorePosts.send();
  });
}











// Show more submissions with AJAX in gutenberg page
var postsPerPageACF = dataForAjax.posts_per_page_acf;
var maxNumPagesACF = dataForAjax.max_page_acf;

var currentPagePosts = 1;

var showMoreBtnACF = document.querySelector("#show-more-posts-acf");
var loadingText = document.querySelector('#loading-text');

if (showMoreBtnACF) {
  showMoreBtnACF.addEventListener("click", function(e) {
    e.preventDefault();
    currentPagePosts = currentPagePosts + 1;

    var showMorePosts = new XMLHttpRequest();
    showMorePosts.open("GET", dataForAjax.siteURL + "/wp-json/wp/v2/form-log?per_page=" + postsPerPageACF + "&page=" + currentPagePosts);

    showMorePosts.onprogress = function() {
      showMoreBtnACF.style.display = 'none';
      loadingText.style.display = 'block';
    };

    showMorePosts.onload = function() {
      showMoreBtnACF.style.display = 'block';
      loadingText.style.display = 'none';
      if (showMorePosts.status == 200 ) {
        var data = JSON.parse(showMorePosts.responseText);
        // console.log(data);
        data.forEach(function(entry){
          var formEntry = document.createElement('div');
          formEntry.classList.add('form-entry');
          formEntry.innerHTML = '<h2 class="form-entry__title">' + entry.title.rendered + '</h2><p class="form-entry__info"><span class="contact-link"><a href="tel:' + entry.title.rendered + '">' + entry.title.rendered + '</a></span><span class="separator"> | </span><span class="contact-link"><a href="mailto:' + entry.title.rendered + '">' + entry.title.rendered + '</a></span></p><div class="form-entry__content">' + entry.content.rendered + '</div><hr>';
          document.querySelector('.submissions__block').appendChild(formEntry);
        });
        if (currentPagePosts == maxNumPagesACF) {
          showMoreBtnACF.style.display = 'none';
        }
      } else {
        alert("Error");
      }
    };

    showMorePosts.onerror = function() {
      alert("Connection error");
    };

    showMorePosts.send();
  });
}