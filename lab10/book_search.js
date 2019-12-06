window.onload = function() {
  var radioBtn = $$("input[type=\"radio\"]");

  $("b_xml").onclick = function() {
    //construct a Prototype Ajax.request object
    var bookList = getCheckedRadio(radioBtn);
    new Ajax.Request("books.php", {
      method: "get",
      parameters: {
        category: bookList
      },
      onSuccess: showBooks_XML,
      onFailure: ajaxFailed,
      onException: ajaxFailed
    });
  }

  $("b_json").onclick = function() {
    //construct a Prototype Ajax.request object
    var bookList2 = getCheckedRadio(radioBtn);
    new Ajax.Request("books_json.php", {
      method: "get",
      parameters: {
        category: bookList2
      },
      onSuccess: showBooks_JSON,
      onFailure: ajaxFailed,
      onException: ajaxFailed
    });
  }
};

function getCheckedRadio(radio_button) {
  for (var i = 0; i < radio_button.length; i++) {
    if (radio_button[i].checked) {
      return radio_button[i].value;
    }
  }
  return undefined;
}

function showBooks_XML(ajax) {
  const books = ajax.responseXML.documentElement.querySelectorAll('book');
  const lastChildren = $('books').querySelectorAll('li');

  for (var j = 0; j < lastChildren.length; j++)
    lastChildren[j].remove();

  for (var i = 0; i < books.length; i++) {
    const title = books[i].querySelector("title").firstChild.nodeValue,
      author = books[i].querySelector("author").firstChild.nodeValue,
      year = books[i].querySelector("year").firstChild.nodeValue;
    var liNode = new Element('li', {}).update(title + ', by ' + author + ' (' + year + ')');
    $('books').appendChild(liNode);
  }
}

function showBooks_JSON(ajax) {
  const lastChildren = $('books').querySelectorAll('li');

  for (var j = 0; j < lastChildren.length; j++)
    lastChildren[j].remove();

  console.log(ajax.responseText);
  var data = JSON.parse(ajax.responseText);
  console.log(data);
  console.log(data.books[0]);
  for (var i = 0; i < data.books.length; i++) {
    const li = document.createElement("li");
    li.innerHTML = data.books[i].title + ", by " + data.books[i].author +
      " (" + data.books[i].year + ")";
    $('books').appendChild(li);
  }
}

function ajaxFailed(ajax, exception) {
  var errorMessage = "Error making Ajax request:\n\n";
  if (exception) {
    errorMessage += "Exception: " + exception.message;
  } else {
    errorMessage += "Server status:\n" + ajax.status + " " + ajax.statusText +
      "\n\nServer response text:\n" + ajax.responseText;
  }
  alert(errorMessage);
}
