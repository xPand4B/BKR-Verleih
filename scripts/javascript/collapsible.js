var coll = document.getElementsByClassName("collapsible-open");

for (var i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
        var content = this.nextElementSibling;
        if (content.style.display === "block") {
            content.style.display = "none";
            $("i", this).removeClass("fa fa-angle-right");
            $("i", this).toggleClass("fa fa-angle-down");
        } else {
            content.style.display = "block";
            $("i", this).removeClass("fa fa-angle-down");
            $("i", this).toggleClass("fa fa-angle-right");
        }
        console.log(this);
    });
}
