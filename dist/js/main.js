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

function printJumbotronHeader(title, description) {
  if (typeof description === 'undefined') { description = ''; }
  document.write('<div class="jumbotron">'
              +   '<div class="container">'
              +     '<h1>' + title + '</h1>'
              +     '<p>' + description + '</p>'
              +   '</div>'
              +  '</div>');
}
