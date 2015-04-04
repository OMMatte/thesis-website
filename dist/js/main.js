// For the clickable images
function printIHoverImage(imageUrl, title, description) {
  if (typeof description === 'undefined') { description = ''; }
   document.write('<div class="col-md-4">'
                +   '<div class="ih-item square effect13 bottom_to_top">'
                +     '<a href="#">'
                +       '<div class="img">'
                +         '<img src="' + imageUrl + '" alt="...">'
                +       '</div>'
                +       '<div class="info">'
                +         '<h3>' + title + '</h3>'
                +         '<p>' + description + '</p>'
                +       '</div>'
                +     '</a>'
                +   '</div>'
                +'</div>');
}

// For the "header" of the site. 
function printJumbotronHeader(title, description) {
  if (typeof description === 'undefined') { description = ''; }
  document.write('<div class="jumbotron">'
              +   '<div class="container">'
              +     '<h1>' + title + '</h1>'
              +     '<p>' + description + '</p>'
              +   '</div>'
              +  '</div>');
}


// Functions for showing/hiding content
function hideContent(d) {
  document.getElementById(d).style.display = "none";
}

function showContent(d) {
  document.getElementById(d).style.display = "block";
}
function reverseDisplay(d) {
  if(document.getElementById(d).style.display == "none") 
    { 
      document.getElementById(d).style.display = "block"; 
    }
  else { document.getElementById(d).style.display = "none"; }
}

