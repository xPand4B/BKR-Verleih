// Wait until page is loaded
$(document).ready(function(){
    // Run if you type inside the searchbar
    $('#searchBar').keyup(function() {
        var val = $(this).val().replace(/\s/g,'').toLowerCase();
        var items = document.getElementsByClassName("itemView");

        for (var i = 0; i < items.length; i++) {
            var hide = true;
            var item = items[i];
            var subItems = item.getElementsByTagName("div");

            for (var j = 0; j < subItems.length; j++) {
                var subItem = subItems[j];
                var text = subItem.innerText.replace(/\s/g,'').toLowerCase();
                if (text.search(val) >= 0) { hide = false; }
            }

            item.style.display = hide ? "none" : "block";
        }
    });
});
