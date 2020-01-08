$(document).ready(function() {
    // alert("main file");
    $("#product_image").on("change", function() {
        //on file input change
        if (
            window.File &&
            window.FileReader &&
            window.FileList &&
            window.Blob
        ) {
            //check File API supported browser   &amp;
            var data = $(this)[0].files; //this file data

            $.each(data, function(index, file) {
                //loop though each file
                if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) {
                    //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file) {
                        //trigger function on successful read
                        return function(e) {
                            var img = $("<img/>")
                                .addClass("thumb")
                                .attr("src", e.target.result); //create image element
                            $("#thumb-output").append(img); //append image to output element
                        };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });
        } else {
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
    });

    //setup before functions
    var typingTimer; //timer identifier
    var doneTypingInterval = 5000; //time in ms (5 seconds)

    //on keyup, start the countdown
    $("#myInput").keyup(function() {
        clearTimeout(typingTimer);
        if ($("#myInput").val()) {
            typingTimer = setTimeout(doneTyping, doneTypingInterval);
        }
    });

    //user is "finished typing," do something
    function doneTyping() {
        // alert("fin typing");
        // document.getElementById("#myInput").style.color = "blue";
        var x;
        x = document.getElementById("#myInput").val();
        console.log(x);
    }
});
