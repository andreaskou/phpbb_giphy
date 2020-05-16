$(document).ready(function(){

    // $("#giphy_search").keyup(function(){

    let apiKey = 'Oa1dCJJTFFfduUE9A4V5rv4qgJZWiD21';
    let route = `https://api.giphy.com/v1/gifs/search?api_key=${apiKey}`;

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
        var wrapperDivWidth = document.getElementById("giphy_wrapper").offsetWidth;
        console.log(wrapperDivWidth);
        var giphyResultsDiv = document.getElementById("giphy_results");
        if (giphyResultsDiv.hasChildNodes())
        {
            alert('I have child(s)');
        }
        else {
            alert('I am not a parrent yet!');
        }
        giphyResultsDiv.innerHTML = "";
        // document.getElementById("giphy_results").innerHTML ="";

        for (var i = 0; i < images.data.length; i++)
        {
            if (images.meta.status == 200)
            {   var img = document.createElement("img");
                img.setAttribute("src", images.data[i].images.preview_gif.url);
                img.setAttribute("alt", images.data[i].title);
                img.setAttribute("id", images.data[i].id);
                img.setAttribute("class", "giphy_image");
                img.onclick = function (){
                    let attach = fetchImages(this.id, true);
                }
                document.getElementById("giphy_results").appendChild(img);
            }
        }
    }

    function fetchImages(query, id = false)
    {
        if (id)
        {
            query = `https://api.giphy.com/v1/gifs/${query}?api_key=${apiKey}`;
        }

        fetch(query)
        .then( response => response.json() )
        .then( content => {
            if (id) {
                insert_text('[img]' + content.data.images.original.url + '[/img]');
            }
            else {
                renderImg(content);
                console.log(content);
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
