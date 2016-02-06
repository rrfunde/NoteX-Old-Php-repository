/**
 * Created by happy on 6/2/16.
 */

var selectedText;
var userSelection = window.getSelection();
if (userSelection.isCollapsed)
    selectedText = "";
else {
    var range = userSelection.getRangeAt(0);
    var clonedSelection = range.cloneContents();
    var div = document.createElement('div');
    div.appendChild(clonedSelection);

    //convert relative address to absolute
    var hrefs = div.querySelectorAll('[href]');
    for (var i=0, len=hrefs.length; i<len; i++)
        hrefs[i].href = hrefs[i].href;
    var srcs = div.querySelectorAll('[src]');
    for (var i=0, len=srcs.length; i<len; i++)
        srcs[i].src = srcs[i].src;

    selectedText = div.innerHTML;
}