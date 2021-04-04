$(document).ready(function(){

    // $("#giphy_search").keyup(function(){

    let apiKey = 'Oa1dCJJTFFfduUE9A4V5rv4qgJZWiD21';
    let route = `https://api.giphy.com/v1/gifs/search?api_key=${apiKey}`;
    let query_url;
    let offset;
    let results_count;

    // Getting the current value of textarea
    var currentText = $(this).val();

    // Init a timeout variable to be used below
    let timeout = null;

    // Listen for keystroke events
    let input;
    input = document.querySelector("#giphy_search");

    var old = null;
    let url;

    input.addEventListener('keydown', function (e) {
        // Clear the timeout if it has already been set.
        // This will prevent the previous task from executing
        // if it has been less than <MILLISECONDS>
        clearTimeout(timeout);

        if (e.keyCode == '13')
        {
            e.preventDefault();
        }
        else {

        }

        // Make a new timeout set to go off in 1000ms (1 second)
        timeout = setTimeout(function () {

            // Trim for white spaces
            let currentTextTrimed = input.value.trim();

            // Split to array to it can be manipulated better
            currentTextTrimed = currentTextTrimed.split(' ');

            // remove empty arrays if exist
            currentTextTrimed = currentTextTrimed.filter(function(x){
                return (x !== (undefined || null || ''));
            });

            // Convert array to string joining it with +
            currentTextTrimed = currentTextTrimed.join("+");
            if (currentTextTrimed != (undefined || null || '') && (old != currentTextTrimed))
            {
                url = `${route}&limit=10&q=${currentTextTrimed}`
                fetchImages(url)
                old = currentTextTrimed;
            }
        }, 1000);
    });

    function renderImg(images)
    {
        document.getElementById("giphy_results").innerHTML ="";

        var preview_gif_url = [];
        // console.log(images);
        for (var i = 0; i < images.data.length; i++)
        {
            preview_gif_url[i] = images.data[i].images.original.url;
            // console.log('URL :' + images.data[i].images.original.url);
            // console.log('Preview url :' + preview_gif_url);
            if (images.meta.status == 200)
            {
                console.log(preview_gif_url);
                var img = document.createElement("img");
                img.setAttribute("src", images.data[i].images.fixed_height_small.url);
                img.setAttribute("alt", images.data[i].title);
                img.setAttribute("id", images.data[i].id);
                img.setAttribute("class", "item");
                img.onclick = function (){let attach = fetchImages(this.id, true)};
                img.onmouseover = function(){
                    console.log('<img src="'+ preview_gif_url[i] +'"/>');
                    $(this).balloon({ position: "top",
                        html: true,
                        contents: '<img src="'+ preview_gif_url[i] +'"/>',
                    });
                };

                document.getElementById("giphy_results").appendChild(img);
            }
        }
    }

    function fetchImageUrl(id)
    {

    }

    function fetchImages(query, id = false)
    {
        if (id)
        {
            query = `https://api.giphy.com/v1/gifs/${query}?api_key=${apiKey}`;
        }

        query_url = query;
        fetch(query)
        .then( response => response.json() )
        .then( content => {
            if (id) {
                insert_text('[img]' + content.data.images.original.url + '[/img]');
            }
            else {
                offset = content.pagination.offset;
                results_count = content.pagination.total_count;
                loadPreviousButton();
                renderImg(content);
                // console.log(content);
                loadNextButton();
            }
        })
        .catch(err=>{
            console.error(err);
        });
    }

    function giphy_original_size(img_id)
    {
        alert(img_id);
        fetchImages(img_id, true);
    }

    function loadPreviousButton()
    {
        var buttonPrevious = document.getElementById("giphy_previous_btn");
        if (offset === 0)
        {
            // console.log(buttonPrevious.style);
            if (buttonPrevious.style.display === "block")
            {
                buttonPrevious.style.display="none";
                // buttonPrevious.style.visibility='hidden';
            }
        }
        else
        {
            if (buttonPrevious.style.display === "none")
            {
                buttonPrevious.style.display="block";
            }
        }
    }

    function loadNextButton()
    {
        var buttonNext = document.getElementById("giphy_next_btn");
        if (results_count >= 10)
        {
            if (buttonNext.style.display === "none")
            {
                buttonNext.style.display = "block";
            }
        }
        else
        {
            if (buttonNext.style.display === "block")
            {
                buttonNext.style.display="none";
            }
        }

        // console.log('This is the url ' + query_url);
        console.log('This is the offset ' + offset);
        console.log('This is the results_count ' + results_count);
        // if (offset = 0)
        // {
        //     var next_button = document.createElement('BTN');
        //     next_button.setAttribute('type', 'button');
        //     var button_text = document.createTextNode("Load Next");
        //     next_button.appendChild(button_text);
        //     document.getElementById("giphy_results").appendChild(next_button);
        // }
    }

    // let hover = document.getElementsByClassName("giphy_image");
    // // console.log(hover);
    // if(hover)
    // {
    //     // hover.addEventListener("onclick", function(event)
    //     // {
    //     //     alert("shit");
    //     // });
    // }


});
